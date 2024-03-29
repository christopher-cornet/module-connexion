# Login module
<b> This project is a login module written in PHP. </b> <br>

## Demo
https://christopher-cornet.students-laplateforme.io/module-connexion/index.php

## Installation
To run this project, you need to have a web server with PHP and MySQL installed.
<br><br> You also need to create a database named "moduleconnexion" and import the moduleconnexion.sql file into it. This file contains the schema and some sample data for the project.

To install the project, follow these steps :

* Clone this repository to your web server’s document root directory.
* Open your web browser and go to http://localhost/module-connexion/index.php (or the corresponding URL for your web server).

## What I learn in this project
* Create a database <br>
* Form management <br>
* Define and use sessions </b>

## My plan to build this project
* Create the database "moduleconnexion" with phpMyAdmin
* Create a table user which contains the following fields : id, login, firstname, lastname, password
* A home page that presents the site (index.php)
* A page containing a registration form (registration.php) The form should contain a password confirmation. This must be at least eight characters, with a capital letter, a number and a special character in the minimum. Of the that a user completes this form, the data is inserted into the database data and the user is redirected to the login page.
* A page containing a login form (login.php) When the form is validated, if there is a user in db corresponding to this information, then the user is considered to be connected and one variable of session is created.
* A page allowing you to modify your profile (profil.php)
* An administration page (admin.php) accessible ONLY for the “admin” user. She allows to list all user information present in the database data.

## Screenshots
![image](https://github.com/christopher-cornet/module-connexion/assets/115154379/1e7868a6-0022-431a-a463-b929adfc7f0c)


