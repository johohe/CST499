<?php
require "header.php";
error_reporting(E_ALL ^ E_NOTICE);
include 'db_actions.php';
require_once 'protected/db_config.php';
$db_action = new Database();
$host = DBHOST;
$db = DBNAME;
$uname = DBUSER;
$db_pass = DBPASS;
$con = ["mysql:host=$host;dbname=$db", "$uname", "$db_pass"];
$stmt = new mysqli($host,$uname,$db_pass,$db);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $course_id = $_POST['course_id'];

    $sql = "INSERT INTO registrations (`user_id`, `course_id`) VALUES ('$user_id', '$course_id')";

    if ($db_action->executeQuery($con, $sql)) {
        echo "Successfully registered for the course!";
    } else {
        echo "Error";
    }
}

$courses_query = "SELECT * FROM Courses";
$courses_result = $stmt->query($courses_query);

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
        <h1>Please Register for a Class Below</h1>
    </div>
    <div>
        <form method="POST" action="register_class.php">
        <label for="course_id">Select Course:</label>
        <select name="course_id" id="course_id">
            <?php while($course = $courses_result->fetch_assoc()): ?>
                <option value="<?php echo $course['course_id']; ?>">
                    <?php echo $course['course_name']; ?>
                </option>
            <?php endwhile; ?>
        </select>
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
        <button type="submit">Register</button>
    </form>
</div>
    <?php include 'footer.php'; ?>
</body>

</html>