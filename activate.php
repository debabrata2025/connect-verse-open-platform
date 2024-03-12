<?php
session_start();
include 'connection.php';

  if($_GET['token']){
    $token = $_GET['token'];
    $updatestatus = "update demodata set status='active' where token='$token'";
    $query = mysqli_query($con, $updatestatus);
    if($query){
       if(isset($_SESSION['msg'])){
        $_SESSION['msg'] = "Account activated successfully";
        header('location:login.php');
    }else{
        $_SESSION['msg'] = "you are loggged out";
        header('location:login.php');
    }
 }else{
    $_SESSION['msg'] = "Account not updated";
    header('location:index.php');
 }
}
?>