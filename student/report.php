<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{
  header('location: login.php');
}
?>
<?php include('connect.php');?>

<!DOCTYPE html>
<html lang="en">

<!-- head started -->
<head>
<title>Attendance Management System</title>
<meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../css/main.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
   
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
   
  <link rel="stylesheet" href="styles.css" >
  <link rel="stylesheet" href="stylestu.css" >
   
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<!-- head ended -->

<!-- body started -->
<body>

<!-- Menus started-->
<header>

  <h1>Attendance Management System</h1>
  <div class="navbar">
  <a href="index.php" style="text-decoration:none;">Home</a>
  <a href="students.php" style="text-decoration:none;">Students</a>
  <a href="report.php" style="text-decoration:none;">Report Section</a>
  <a href="account.php" style="text-decoration:none;">My Account</a>
  <a href="../logout.php" style="text-decoration:none;">Logout</a>

</div>

</header>
<!-- Menus ended -->

<center>

<!-- Content, Tables, Forms, Texts, Images started -->
<div class="row">

  <div class="content">
    <h3>Student Report</h3>
    <br>
    <form method="post" action="" class="form-horizontal col-md-6 col-md-offset-3">

  <div class="form-group">

    <label  for="input1" class="col-sm-3 control-label">Select Subject</label>
      <div class="col-sm-4">
      <select name="whichcourse" id="input1">
      <option  value="sel">--Select--</option>
      <option  value="aiml">AI/ML</option>
      <option  value="ds">Data science</option>
        <option  value="algo">Data Structures and Algorithms</option>
        <option  value="algolab">Data Structures and Algorithms Lab</option>
        <option  value="dbms">Database Management System</option>
        <option  value="dbmslab">Database Management System Lab</option>
        <option  value="cns">Computer Networks</option>
        <option  value="os">System Programming and Operating System</option>
        <option  value="oslab">System Programming and Operating System Lab</option>
        <option  value="oop">Object Oriented Programming</option>
        <option  value="dm">Discrete Mathematics</option>
        <option  value="em">Engineering Mathematics</option>
        <option  value="iot">Internet Of Thinngs</option>
        <option  value="hci">Human Computer Interface</option>
        <option  value="py">Python Programming</option>
        <option  value="toc">Theory of Computation</option>
        <option  value="deld">Digital Electronics And Login Design</option>
        <option  value="micro">Microprocessor</option>

      </select>
      </div>

  </div>

        <div class="form-group">
           <label for="input1" class="col-sm-3 control-label">Enter PRN </label>
              <div class="col-sm-7">
                  <input type="text" name="sr_id"  class="form-control" id="input1" placeholder="Enter your PRN" />
              </div>
        </div>
        <input type="submit" class="loginbtn-green" style="border-radius:0%" value="Find" name="sr_btn" />
    </form>

    <div class="content"><br></div>

    <form method="post" action="" class="form-horizontal col-md-6 col-md-offset-3">
    <table class="table table-striped">

   <?php

    //checking the form for ID
    if(isset($_POST['sr_btn'])){

    //initializing ID 
     $sr_id = $_POST['sr_id'];
     $course = $_POST['whichcourse'];

     $i=0;
     $count_pre = 0;
     
     //query for searching respective ID
   
     $all_query = mysqli_query($con,"select stat_id,count(*) as countP from attendance where attendance.stat_id='$sr_id' and attendance.course = '$course' and attendance.st_status='Present'");
     $singleT= mysqli_query($con,"select count(*) as countT from attendance where attendance.stat_id='$sr_id' and attendance.course = '$course'");
     $count_tot;
     if ($row=mysqli_fetch_row($singleT))
     {
     $count_tot=$row[0];
     }

     while ($data = mysqli_fetch_array($all_query)) {
       $i++;
    
       if($i <= 1){
     ?>
        

     <tbody>
      <tr>
          <td>PRN </td>
          <td><?php echo $data['stat_id']; ?></td>
      </tr>

      <tr>
        <td>Total Class (Days): </td>
        <td><?php echo $count_tot; ?> </td>
      </tr>

      <tr>
        <td>Present (Days): </td>
        <td><?php echo $data[1]; ?> </td>
      </tr>

      <tr>
        <td>Absent (Days): </td>
        <td><?php echo $count_tot -  $data[1]; ?> </td>
      </tr>

    </tbody>

   <?php

     }  
    }}
     ?>
    </table>
  </form>
  </div>

</div>
<!-- Contents, Tables, Forms, Images ended -->

</center>

</body>


</html>
