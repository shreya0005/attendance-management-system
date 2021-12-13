<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{
  header('location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- head started -->
<head>
<title>Attendance Management System</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../css/main.css">
<link rel="stylesheet" href="stylestu.css">

</head>
<!-- head ended -->

<!-- body started -->
<body>

<!-- Menus started-->
<header>

  <h1>Attendance Management System</h1>
<div class="navbar">

  <a href="index.php">Home</a>
  <a href="students.php" >Students</a>
  <a href="report.php" >Report Section</a>
  <a href="account.php" >My Account</a>
  <a class="logoutright" href="../logout.php" >Logout</a>
</div>


</header>
<!-- Menus ended -->

<center>

<!-- Content, Tables, Forms, Texts, Images started -->
<div class="row">
    <div class="content">
    <h1>WELCOME TO STUDENT LOGIN.</h1>
    <img src="../img/student.png" width="400px" />

  </div>

</div>
<!-- Contents, Tables, Forms, Images ended -->

</center>

</body>
<!-- Body ended  -->

</html>
