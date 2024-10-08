<?php
session_start();
include 'connection.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Retrieve session ID from session
$session_id =  $_SESSION['session_id'];

// Delete the specific session record
$sql = "DELETE FROM user_sessions WHERE session_id='$session_id'";
if (!mysqli_query($con, $sql)) {
    die("Error: " . mysqli_error($con));   
}

// Destroy the session
session_destroy();

// Delete cookies by setting their expiration time in the past
setcookie('user_id', '', time() - 3600, "/");
setcookie('email', '', time() - 3600, "/");
setcookie('name', '', time() - 3600, "/");
setcookie('pimg', '', time() - 3600, "/");
setcookie('sid', '', time() - 3600, "/");

// Redirect to the login page
header('Location: login.php');
exit();
?>
