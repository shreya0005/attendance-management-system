<?php
//establishing connection with database.

$con = mysqli_connect('localhost','root','','attmgsystem') or die('Cannot connect to server');


if(isset($_GET['deleteid'])) {
    $id=$_GET['deleteid'];

    $sql = "DELETE FROM `students` WHERE st_id=$id";
    $result = mysqli_query($con,$sql);
    if ($result){
        // echo "DELETED SUCCESSFULLY";
        header ('location: v-students.php');
    }else{
        echo "COULDN'T DELETE";
    }
}

?> 