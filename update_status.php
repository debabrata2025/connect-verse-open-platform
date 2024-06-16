<?php
include 'connection.php';
session_start();
header('Content-Type: application/json');

// Get the raw POST data
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Check if status is set
if (isset($data['status'])) {
    $user_id = $_SESSION['user_id'];
    $status = mysqli_real_escape_string($con, $data['status']);
    $sql = "UPDATE demodata SET status='$status' WHERE id=$user_id"; // Adjust the query as per your requirements

    if (mysqli_query($con, $sql)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => mysqli_error($con)]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid data']);
}

mysqli_close($con);
?>
