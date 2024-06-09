<?php
include 'connection.php';
session_start();

$receiver_id = $_GET['receiver_id'];
$sender_id = $_SESSION['user_id']; // Assuming the sender is the logged-in user

// Check if there is an existing friend request
$checkQuery = "SELECT * FROM friend_req WHERE (sender_id = '$sender_id' AND receiver_id = '$receiver_id') OR (sender_id = '$receiver_id' AND receiver_id = '$sender_id')";
$checkResult = mysqli_query($con, $checkQuery);

if (mysqli_num_rows($checkResult) > 0) {
    $row = mysqli_fetch_assoc($checkResult);
    $status = $row['req_status'];
    $response = ['success' => true, 'status' => $status, 'is_sender' => $row['sender_id'] == $sender_id];
} else {
    $response = ['success' => true, 'status' => 'none'];
}

echo json_encode($response);
mysqli_close($con);
?>
