<?php
require "header.php";
include 'db_actions.php';
require_once ('protected/db_config.php');
$host = DBHOST;
$db = DBNAME;
$uname = DBUSER;
$db_pass = DBPASS;
$con = ["mysql:host=$host;dbname=$db", "$uname", "$db_pass"];

$db_action = new Database();

$fname = $_POST['fname'];
$lname = $_POST["lname"];
$email = $_POST["email"];
$pass = password_hash($_POST["password"],PASSWORD_DEFAULT);
$phone = $_POST["phone"];
$sub_results;

//check to see if email already in use
if ($db_action->checkEmail($email, $con) == 0) {
    $sql = "INSERT INTO user_profile (`first_name`,`last_name`,`email`,`pass`,`phone`) 
    VALUES ('$fname', '$lname', '$email', '$pass', '$phone')";

    $db_action->executeQuery($con, $sql);
    
    $sub_results = 'The information has been saved successfully';
} else {
    $sub_results = 'The email already exists. Please use a different email.';
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Submission Page </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include 'master.php'; ?>
    <div class="container text-center">
        <h1><?php echo $sub_results ?></h1>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>