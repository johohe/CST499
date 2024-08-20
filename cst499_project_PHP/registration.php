<?php
require "header.php";
error_reporting(E_ALL ^ E_NOTICE)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Registration Page </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include 'master.php'; ?>
    <div class="container text-center">
        <h1>Please Register Below</h1>
    </div>
    <div>
    <form method='POST' action='insert_db.php' >
        <fieldset>
            <legend>Student Details</legend>
            <p>
                <label>First Name:</label>
                <input type="text" name="fname" />
            </p>
            <p>
                <label>Last Name:</label>
                <input type="text" name="lname" />
            </p>
            <p>
                <label>Email:</label>
                <input type="email" name="email" />
            </p>
            <p>
                <label>Password:</label>
                <input type="password" name="password" />
            </p>
            <p>
                <label>Phone:</label>
                <input type="tel" name="phone" />
            </p>
        </fieldset>
        <input type="submit" name="Submit" />
    </form>
</div>
    <?php include 'footer.php'; ?>
</body>

</html>