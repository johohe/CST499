<?php
//require "header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="jumbotron">
		<div class="container text-center">
			<h1>Hohendorf College Student Portal</h1>
		</div>
	</div>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"></button>

			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-exclamation-sign"></span> About Us</a></li>
					<li><a href="contact_us.php"><span class="glyphicon glyphicon-earphone"></span> Contact Us</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php
					if (isset($_SESSION['email'])) {
						echo '<li><a href="register_class.php"><span class="glyphicon glyphicon-pencil"></span> Course Registry</a></li>';
						echo '<li><a href="profile.php"><span class="glyphicon glyphicon-briefcase"></span> Profile</a></li>';
						echo '<li><a href="index.php?Logout=1"><span class="glyphicon glyphicon-off"></span> Logout</a></li>';
					} else {
						echo '<li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>';
						echo '<li><a href="registration.php"><span class="glyphicon glyphicon-pencil"></span> Register</a></li>';
					}
					?>
				</ul>
			</div>
		</div>
	</nav>
</body>

</html>