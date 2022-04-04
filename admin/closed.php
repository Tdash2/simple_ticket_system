<?php


    $url1=$_SERVER['REQUEST_URI'];
    header("Refresh: 10; URL=$url1");


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
?>
<!DOCTYPE html>
<html>
<head>
<title>Curent Support Tickets</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
.topnav {
  overflow: hidden;
  background-color: #333;
}
.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}
.topnav a:hover {
  background-color: #ddd;
  color: black;
}
.topnav a.active {
  background-color: #04AA6D;
  color: white;
}
.center {
  margin: auto;
}
</style>
</head>
<body>
<div class="topnav">
  <a class="active" href="home.php">Home</a>
  <a class="active" style="position: relative;left: 9pt; " href="closed.php">Closed</a>
  <form method='post' action="">
     <input style="background: #4c35ae; border: transparent;border-radius: 0pt;position: relative;left: 18pt;color: white;font-size: 15pt;height: 36pt;" type="submit" value="Logout" name="but_logout">
</div>
<div style="padding-left:16px">
</div>
<?php 
$query = "SELECT * FROM `Ticket` where status = \"0\"";
?>
<b> <center style="padding: 15pt;"  >Curent Open Tickets: </center> </b> <br> <br>
<?php
if ($result = $con->query($query)) {

    while ($row = $result->fetch_assoc()) {
        $field1name = $row["id"];
        $field2name = $row["issue"];

        echo '<center><br> <a href="/admin/viewclosedticket.php?id='.$field1name.'">'.$field2name.'</a> <br/> <center/>';
        


    }
/*freeresultset*/
$result->free();
}

?>
</body>
</html>