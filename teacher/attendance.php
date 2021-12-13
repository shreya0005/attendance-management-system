<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{
  header('location: login.php');
}
?>

<?php
    include('connect.php');
    try{
      
    if(isset($_POST['att'])){

      $course = $_POST['whichcourse'];

      foreach ($_POST['st_status'] as $i => $st_status) {
        
        $stat_id = $_POST['stat_id'][$i];
        $dp = date('Y-m-d');
        $course = $_POST['whichcourse'];
        
        $stat = mysqli_query($con,"insert into attendance(stat_id,course,st_status,stat_date) values('$stat_id','$course','$st_status','$dp')");
        
        $att_msg = "Attendance Recorded.";

      }



    }
  }
  catch(Execption $e){
    $error_msg = $e->$getMessage();
  }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Attendance Management System</title>
<meta charset="UTF-8">

  <link rel="stylesheet" type="text/css" href="../css/main.css">
  <link rel="stylesheet" type="text/css" href="styleteach.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
   
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
   
  <link rel="stylesheet" href="styles.css" >
   
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<style type="text/css">
  .status{
    font-size: 10px;
  }

</style>

</head>
<body>

<header>

  <h1>Attendance Management System</h1>
  <div class="navbar">
  <a href="index.php" style="text-decoration:none;">Home</a>
  <a href="students.php" style="text-decoration:none;">Students</a>
  <a href="teachers.php" style="text-decoration:none;">Faculties</a>
  <a href="attendance.php" style="text-decoration:none;">Attendance</a>
  <a href="report.php" style="text-decoration:none;">Report</a>
  <a href="../logout.php" style="text-decoration:none;">Logout</a>

</div>

</header>

<center>

<div class="row">

  <div class="content">
    <h3>Attendance of <?php echo date('Y-m-d'); ?></h3>
    <br>

    <center><p><?php if(isset($att_msg)) echo $att_msg; if(isset($error_msg)) echo $error_msg; ?></p></center> 
    
    <form action="" method="post" class="form-horizontal col-md-6 col-md-offset-3">

     <div class="form-group">
                <label>Enter Batch</label>&nbsp;&nbsp;&nbsp;
                <input type="text" name="whichbatch" id="input2" placeholder="Enter passing year">&nbsp;&nbsp;&nbsp;&nbsp;
      </div>
      <!-- added filters -->
      <div class="form-group">
                <label>Enter Department (Computer/IT/Entc)</label>&nbsp;&nbsp;&nbsp;
                <!-- <select name="whichcourse" id="input"> -->
                <input type="text" name="whichbranch" id="input3" placeholder="Enter Department">&nbsp;&nbsp;&nbsp;&nbsp;
      </div>

     <input type="submit" class="loginbtn-green"  value="Search" name="batch" />

    </form>
    <br>
    <br>
    <div class="content"></div>
    <form action="" method="post">

      <div class="form-group">

        <label >Select Subject</label>&nbsp;&nbsp;&nbsp;&nbsp;
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

    <table class="table table-stripped">
      <thead>
        <tr>
          <th scope="col">PRN</th>
          <th scope="col">Name</th>
          <th scope="col">Department</th>
          <th scope="col">Batch</th>
          <th scope="col">Semester</th>
          <th scope="col">Email</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
   <?php

    if(isset($_POST['batch'])){
     $i=0;
     $radio = 0;
     $batch = $_POST['whichbatch'];
     $branch=$_POST['whichbranch'];
     $all_query = mysqli_query($con,"select * from students where students.st_batch = '$batch' order by st_id asc");

     $branch = $_POST['whichbranch'];
     $all_query = mysqli_query($con,"select * from students where students.st_dept = '$branch' order by st_id asc");

     while ($data = mysqli_fetch_array($all_query)) {
       $i++;
    ?>
  <body>
     <tr>
       <td><?php echo $data['st_id']; ?> <input type="hidden" name="stat_id[]" value="<?php echo $data['st_id']; ?>"> </td>
       <td><?php echo $data['st_name']; ?></td>
       <td><?php echo $data['st_dept']; ?></td>
       <td><?php echo $data['st_batch']; ?></td>
       <td><?php echo $data['st_sem']; ?></td>
       <td><?php echo $data['st_email']; ?></td>
       <td>
         <label>Present</label>&nbsp;
         <input type="radio" name="st_status[<?php echo $radio; ?>]" value="Present" >&nbsp;&nbsp;&nbsp;&nbsp;
         <label>Absent </label>&nbsp;
         <input type="radio" name="st_status[<?php echo $radio; ?>]" value="Absent" checked>
       </td>
     </tr>
  </body>

     <?php

        $radio++;
      } 
}
      ?>
    </table>

    <center><br>
    <input type="submit" class="loginbtn-blue" value="Save" name="att" />
  </center>

</form>
  </div>

</div>

</center>

</body>
</html>
