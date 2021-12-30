<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{

  header('location: ../index.php');
}
?>


<?php

//establishing connection
include('connect.php');

  try{

    //validation of empty fields
      if(isset($_POST['signup'])){

        if(empty($_POST['email'])){
          throw new Exception("Email can't be empty.");
        }

          if(empty($_POST['uname'])){
             throw new Exception("Username can't be empty.");
          }

            if(empty($_POST['pass'])){
               throw new Exception("Password can't be empty.");
            }
              
              if(empty($_POST['fname'])){
                 throw new Exception("Username can't be empty.");
              }
                if(empty($_POST['phone'])){
                   throw new Exception("Username can't be empty.");
                }
                  if(empty($_POST['type'])){
                     throw new Exception("Username can't be empty.");
                  }

        //insertion of data to database table admininfo
        $result = mysqli_query($con,"insert into admininfo(username,password,email,fname,phone,type) values('$_POST[uname]','$_POST[pass]','$_POST[email]','$_POST[fname]','$_POST[phone]','$_POST[type]')");
        $success_msg="Signup Successfully!";

  
  }
}
  catch(Exception $e){
    $error_msg =$e->getMessage();
  }

?>

<!DOCTYPE html>
<html lang="en">

<!-- head started -->
<head>
<title>Attendance Management System</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="stylead.css" >
  <link rel="stylesheet" type="text/css" href="../css/main.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
   
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
   
  <link rel="stylesheet" href="styles.css" >
   
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
        <a href="signup.php" style="text-decoration:none;">Create Users</a>
        <a href="index.php" style="text-decoration:none;">Add Student/Teacher</a>
        <a href="v-students.php" style="text-decoration:none;">View Students</a>
      <a href="v-teachers.php" style="text-decoration:none;">View Teachers</a>
        <a href="../logout.php" style="text-decoration:none;">Logout</a>
      </div>

    </header>
    <!-- Menus ended -->

<center>
<h1>All Students</h1>

<div class="content">

  <div class="row">
    <!-- <form method="POST" action="delete.php"> -->
    <table class="table table-striped table-hover">
    
        <thead>
        
        <tr>
        
          <th scope="col">PRN </th>
          <th scope="col">Name</th>
          <th scope="col">Department</th>
          <th scope="col">Batch</th>
          <th scope="col">Semester</th>
          <th scope="col">Email</th>
          <th scope="col">Remove</th>
        </tr>
        </thead>
     <?php
       
       $i=0;
       
       $all_query = mysqli_query($con,"SELECT * from students ORDER BY st_id asc");
       
       while ($row = mysqli_fetch_array($all_query)) {
         $i++;
         $id=$row['st_id'];
         $name=$row['st_name']; 
         $department=$row['st_dept']; 
         $batch=$row['st_batch']; 
         $sem=$row['st_sem']; 
         $email=$row['st_email'];
       
   
      echo ' <tr>
       
      

         <th scope="row">'.$id.'</th>
         <td>'.$name.'</td>
         <td>'.$department.'</td>
         <td>'.$batch.'</td>
         <td>'.$sem.'</td>
         <td>'.$email.'</td>
         <td><button class="btn btn-danger"> <a href="delete-s.php?
      deleteid='.$id.'" class="text-light">Delete</a></
      button></td>



       </tr>';
  
       
            } 
                         
            
        ?>

      </table>
      
    </div>
    

</div>


</center>

</body>
<!-- Body ended  -->

</html>
