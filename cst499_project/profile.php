<?php
require "header.php";
require_once 'protected/db_config.php';
$host = DBHOST;
$db = DBNAME;
$uname = DBUSER;
$db_pass = DBPASS;
$conn = new mysqli($host,$uname,$db_pass,$db);
$query = "SELECT courses.course_name, courses.description, courses.credits, courses.course_id 
FROM registrations JOIN courses ON registrations.course_id = courses.course_id WHERE registrations.user_id = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
$conn->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli($host,$uname,$db_pass,$db);
    $course_id = $_POST['course_id'];

    echo $_POST['course_id'];
    //echo $_SESSION['user_id'];
    $stmt = $conn->prepare("DELETE FROM Registrations WHERE user_id = ? AND course_id = ?");
    $stmt->bind_param("ii", $_SESSION['user_id'], $course_id);

    if ($stmt->execute()) {
        header("Location: profile.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Student Profile Page </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include 'master.php'; ?>
    <div class="container text-center">
        <h1>Welcome to Your Student Profile Page</h1>
    </div>
    <div>
        <table>
            <tr>
                <td>Name: </td>
                <td><?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname'];?></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><?php echo $_SESSION['email'];?></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><?php echo $_SESSION['password'];?></td>
            </tr>
            <tr>
                <td>Phone: </td>
                <td><?php echo $_SESSION['phone'];?></td>
            </tr>
            <tr>
            <td>Enrolled Courses: </td>
            </tr>
            </table>
            <ul>
             <?php while ($row = $result->fetch_assoc()): ?>
                        <li>
                            <?php echo $row['course_id']; ?> -
                            <?php echo $row['course_name']; ?> -
                            <?php echo $row['description']; ?> -
                            <?php echo $row['credits']; ?> credits
                            <form method="POST" action="profile.php" >
                                <input type="hidden" name='course_id' value="<?php echo $row['course_id']; ?>" >
                                <button type="submit">Delete</button>
                            </form>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
    <?php require_once 'footer.php'; ?>
</body>

</html>