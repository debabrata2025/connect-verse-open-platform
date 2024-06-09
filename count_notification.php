<?php
include 'connection.php';
session_start();

$receiverId = $_SESSION['user_id'];

$query = "SELECT COUNT(id) AS Total FROM friend_req WHERE receiver_id='$receiverId' AND req_status='pending' 
AND notification_status='yes'";
$result = mysqli_query($con, $query);

$response = array();

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $response['success'] = true;
    $response['count'] = $row['Total'];
} else {
    $response['success'] = false;
    $response['count'] = 0;
}

mysqli_close($con);

header('Content-Type: application/json');
echo json_encode($response);
?>
