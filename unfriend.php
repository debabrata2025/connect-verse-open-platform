<?php
include 'connection.php';
session_start();

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['senderId']) && isset($data['receiverId'])) {
    $senderId = mysqli_real_escape_string($con, $data['senderId']);
    $receiverId = mysqli_real_escape_string($con, $data['receiverId']);

    // Check if the friend request already exists
    $checkQuery = "SELECT * FROM friend_req WHERE (sender_id = '$senderId' AND receiver_id = '$receiverId') OR (sender_id = '$receiverId' AND receiver_id = '$senderId')";
    $checkResult = mysqli_query($con, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Fetch the existing request details
        $row = mysqli_fetch_assoc($checkResult);
        if ($row['req_status'] == 'friend') {
            // Unfriend the user by deleting the record
            $deleteQuery = "DELETE FROM friend_req WHERE (sender_id = '$senderId' AND receiver_id = '$receiverId') OR (sender_id = '$receiverId' AND receiver_id = '$senderId')";
            if (mysqli_query($con, $deleteQuery)) {
                echo json_encode(['success' => true, 'status' => 'connect']);
            } else {
                echo json_encode(['success' => false, 'error' => mysqli_error($con)]);
            }
        }else {
            echo json_encode(['success' => false, 'error' => 'Request already exists']);
        }
    } else {
            echo json_encode(['success' => false, 'error' => mysqli_error($con)]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid data']);
}

mysqli_close($con);
?>
