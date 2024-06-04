<?php
session_start();
session_destroy();

// Delete cookies by setting their expiration time in the past
setcookie('user_id', '', time() - 3600, "/");
setcookie('email', '', time() - 3600, "/");
setcookie('name', '', time() - 3600, "/");
setcookie('pimg', '', time() - 3600, "/");

// Redirect to the login page
header('location:login.php');
?>
