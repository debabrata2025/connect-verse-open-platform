<?php
include 'connection.php';
session_start();

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['despText'])) {
     // Apply nl2br to convert newlines to <br> tags
    $desp_Text = nl2br($data['despText']);
    // Sanitize the input to prevent SQL injection
    $desp_Text = mysqli_real_escape_string($con, $desp_Text);
    $user_email = $_SESSION['pemail'];
            $updateQuery = "UPDATE demodata SET description='$desp_Text' WHERE email='$user_email'";
            if (mysqli_query($con, $updateQuery)) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'error' => mysqli_error($con)]);
            }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid data']);
}

mysqli_close($con);
?>