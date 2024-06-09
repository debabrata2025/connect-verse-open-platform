<?php
include 'connection.php';
session_start();

$receiverId = $_SESSION['user_id'];

$query = "UPDATE friend_req SET notification_status = 'no'
 WHERE receiver_id = '$receiverId' AND notification_status = 'yes' AND req_status = 'pending'";

$result = mysqli_query($con, $query);

if ($result) {
    // Update successful
    echo json_encode(array('success' => true));
} else {
    // Update failed
    echo json_encode(array('success' => false));
}

mysqli_close($con);
?>
