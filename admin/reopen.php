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

// sql to delete a record
$sql = "UPDATE Ticket SET status='1' WHERE id='".$_GET["id"]."'";

//$sql = "DELETE FROM Ticket WHERE id='".$_GET["id"]."'";

if ($con->query($sql) === TRUE) {
  echo "<script> location.href='/admin/home.php'; </script>";
} else {
  echo "Error deleting record: " . $con->error;
}
$conn->close();
?>

