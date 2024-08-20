<?php
require "header.php";
include 'db_actions.php';
if (isset($_POST['Login'])) {
    require_once ('protected/db_config.php');
    $host = DBHOST;
    $db = DBNAME;
    $uname = DBUSER;
    $db_pass = DBPASS;
    $con = ["mysql:host=$host;dbname=$db", "$uname", "$db_pass"];
    $db_act = new Database();

    // Get the form data 
    $username = $_POST['email'];
    $pass = $_POST['pass'];

    // Execute the SQL statement
    $sql = "SELECT * FROM user_profile WHERE email='$username'";
    $user_info = $db_act->executeSelectQuery($con,$sql);

    // Check if the user exists 
    if ($user_info!=null) {
        // Verify the password 
        if (password_verify($pass, $user_info['pass'])) {

            // Set the session variables 
            $_SESSION['email'] = $username;
            $_SESSION['fname'] = $user_info['first_name'];
            $_SESSION['lname'] = $user_info['last_name'];
            $_SESSION['phone'] = $user_info['phone'];
            $_SESSION['password'] = $pass;
            $_SESSION['user_id'] = $user_info['user_id'];

            // Redirect to the user's dashboard
            header('Location: index.php');
            exit;
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "User not found!";

    }

}