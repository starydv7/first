<?php
session_start();
require "dbcon.php";
if(isset($_POST['save_student']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email= mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    $query = "INSERT_INTO belt(name,email,phone)VALUES(
        '$name','$email','$phone'
    ) ";
    $query_run = mysqli_query($con,$query);
    if($query_run){
        $_SESSION['message'] = "student created successFully";
        header("Location:stuent-create.php");
        exit(0);
    }
    else{
         $_SESSION['message'] = "student not created successFully";
        header("Location:stuent-create.php");
        exit(0);
    }
}
?>