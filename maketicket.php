<?php
// database connection code
if(isset($_POST['txtName']))
{
$username = "sammy"; 
$password = "password"; 
$database = "test"; 
$con = mysqli_connect("localhost", $username, $password, $database);


// get the post records

$txtName = $_POST['txtName'];
$txtEmail = $_POST['txtEmail'];
$txtMessage = $_POST['txtMessage'];

// database insert SQL code
$sql = "INSERT INTO `Ticket` (`name`, `issue`, `message`) VALUES ('$txtName', '$txtEmail',  '$txtMessage')";

// insert in database 
$rs = mysqli_query($con, $sql);
if($rs)
{

        echo "<script> location.href='index.html'; </script>";
        exit;
}
}

?>
