<?php
include 'connection.php';
session_start();
header('Content-Type: application/json');

$user_id = $_SESSION['user_id'];

$sql = "SELECT status FROM demodata WHERE id=$user_id";
$result = mysqli_query($con, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode(['success' => true, 'status' => $row['status']]);
} else {
    echo json_encode(['success' => false, 'error' => mysqli_error($con)]);
}

mysqli_close($con);
?>
