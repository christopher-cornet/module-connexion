<?php

include "Database.php";

class User {

    public $id;
    public $username;
    public $email;
    private $pdo;

    function __construct($username, $email) {
        $this->username = $username;
        $this->email = $email;
        $this->pdo = new Database();
    }

    // Register the User
    public function register($firstname, $lastname, $password) {

        // Tests the password security by checking if there are characters, special characters, uppercase letters, lowercase letters and numbers
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $numbers = preg_match('@[0-9]@', $password);
        $special_chars = preg_match('@[^\w]@', $password);
        $validEmail = filter_var($this->email, FILTER_VALIDATE_EMAIL);
        
        // 
        if ($uppercase && $lowercase && $numbers && $special_chars && strlen($password) >= 8 && $validEmail) {
            
            // Verify if the email already exists
            $query = $this->pdo->db->prepare( "SELECT * FROM users WHERE email = ?" );
            $query->execute( [$this->email] );
            $user = $query->fetch();
            
            // If the email doesn't exists, add the User to the Database
            if(empty($user)) {
                $query = $this->pdo->db->prepare( "INSERT INTO users (username, email, firstname, lastname, password) VALUES (?,?,?,?,?)" );
                $query->execute( [$this->username, $this->email, $firstname, $lastname, hash("sha256", $password)] );
                return true;
            }
            
            // If the Email already exists, don't register and return false
            echo "Ce compte est déjà inscrit.";
            return false;

        }
        else {
            // If the Password is not safe enough display an Error, else Register the User
            echo "Le mot de passe doit contenir au minimum une majuscule, une minuscule, un chiffre, un caractère spécial et 8 caractères.";
            return false;
        }

    }

    // Log In the User
    public function connect($password) {

        // Authenticate the User based on the username and password
        $query = $this->pdo->db->prepare( "SELECT * FROM users WHERE username = ? AND password = ?" );
        $query->execute( [$this->username, hash("sha256", $password)] );
        $user = $query->fetch();
        
        // If $user contains a value, define session values
        if ($user) {

            $_SESSION["email"] = $user["email"];
            $_SESSION["username"] = $user["username"];
            
            return true;

        }
        
        // Else if $user do not contains any value, reset session values
        $_SESSION["email"] = "";
        $_SESSION["username"] = "";

        return false;

    }

    // Edit User's Profile
    public function editProfile($password) {

    }
}

?>