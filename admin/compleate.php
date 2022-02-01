<?php
include "config.php";

// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: index.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: index.php');
}

$servername = "localhost";
$username = "sammy";
$password = "password";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM Ticket WHERE id='".$_GET["id"]."'";

if ($conn->query($sql) === TRUE) {
  echo "<script> location.href='http://192.168.2.221/admin/home.php'; </script>";
} else {
  echo "Error deleting record: " . $conn->error;
}
$conn->close();
?>

