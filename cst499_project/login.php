<?php
require "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
    <?php require 'master.php'; ?>
    <div class="container text-center">
        <h1>Please Log In Below</h1>
    </div>
    <form action="logged_in.php" method="post">
        <fieldset>
            <p><label>Email:</label>
                <input name="email" required type="text" /></p>
            <p><label>Password:</label>
                <input name="pass" required type="password" /></p>
            <input type="submit" name="Login" />
        </fieldset>
    </form>
    <?php require_once 'footer.php'; ?>
</body>
</html>