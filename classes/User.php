<?php

include "Database.php";

class User {

    public $id;
    public $username;
    public $email;
    private $pdo;

    function __construct() {
        $this->pdo = new Database();
    }

    // Register the User
    public function register($username, $email, $firstname, $lastname, $password) {

        // Tests the password security by checking if there are characters, special characters, uppercase letters, lowercase letters and numbers
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $numbers = preg_match('@[0-9]@', $password);
        $special_chars = preg_match('@[^\w]@', $password);
        $validEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
        
        // If the password passes the security test and if the Email is valid
        if ($uppercase && $lowercase && $numbers && $special_chars && strlen($password) >= 8 && $validEmail) {
            
            // Verify if the email already exists
            $query = $this->pdo->db->prepare( "SELECT * FROM users WHERE email = ?" );
            $query->execute( [$email] );
            $emailExists = $query->fetch();

            // Verify if the username already exists
            $query = $this->pdo->db->prepare( "SELECT * FROM users WHERE username = ?" );
            $query->execute( [$username] );
            $usernameExists = $query->fetch();
            
            // If the email and the username doesn't exists, add the User to the Database
            if(empty($emailExists)) {

                if (empty($usernameExists)) {

                    $query = $this->pdo->db->prepare( "INSERT INTO users (username, email, firstname, lastname, password) VALUES (?,?,?,?,?)" );
                    $query->execute( [$username, $email, $firstname, $lastname, hash("sha256", $password)] );
                    return true;

                }

                // If the Username already exists, don't register and return false
                echo "Ce nom d'utilisateur est déjà pris.";
                return false;
            }
            
            // If the Email already exists, don't register and return false
            echo "Ce compte est déjà inscrit.";
            return false;

        }
        elseif (!$validEmail) {
            echo "Cet email n'est pas valide.";
            return false;
        }
        else {
            // If the Password is not safe enough display an Error, else Register the User
            echo "Le mot de passe doit contenir au minimum une majuscule, une minuscule, un chiffre, un caractère spécial et 8 caractères.";
            return false;
        }

    }

    // Log In the User
    public function login($username, $password) {

        // Authenticate the User based on the username and password
        $query = $this->pdo->db->prepare( "SELECT * FROM users WHERE username = ? AND password = ?" );
        $query->execute( [$username, hash("sha256", $password)] );
        $user = $query->fetch();
        
        // If $user contains a value, define session values
        if ($user) {

            $_SESSION["email"] = $user["email"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["firstname"] = $user["firstname"];
            $_SESSION["lastname"] = $user["lastname"];
            
            return true;

        }
        
        // Else if $user do not contains any value, reset session values
        $_SESSION["email"] = "";
        $_SESSION["username"] = "";

        return false;

    }

    public function editProfile($password) {
        $email = $_SESSION["email"];
        
        $query = $this->pdo->db->prepare( "SELECT * FROM users WHERE email = ?" );
        $query->execute( [$email] );
        $emailExists = $query->fetch();
    }
}

?>