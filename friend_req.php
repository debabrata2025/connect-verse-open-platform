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
        
        if ($row['req_status'] == 'pending') {
            if ($receiverId == $row['sender_id']) {
                // Update the request to set req_status to 'friend' and notification_status to 'no'
                $updateQuery = "UPDATE friend_req SET req_status = 'friend', notification_status = 'no' WHERE sender_id = '$receiverId' AND receiver_id = '$senderId'";
                if (mysqli_query($con, $updateQuery)) {
                    echo json_encode(['success' => true, 'status' => 'friend']);
                } else {
                    echo json_encode(['success' => false, 'error' => mysqli_error($con)]);
                }
            } else {
                echo json_encode(['success' => false, 'error' => 'Request already pending']);
            }
        } elseif ($row['req_status'] == 'friend') {
            echo json_encode(['success' => false, 'error' => 'Already friends']);
        } else {
            echo json_encode(['success' => false, 'error' => 'Request already exists']);
        }
    } else {
        // Insert a new friend request if not already existing
        $query = "INSERT INTO friend_req (sender_id, receiver_id, req_status, notification_status) VALUES ('$senderId', '$receiverId', 'pending', 'yes')";
        if (mysqli_query($con, $query)) {
            echo json_encode(['success' => true, 'status' => 'pending']);
        } else {
            echo json_encode(['success' => false, 'error' => mysqli_error($con)]);
        }
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid data']);
}

mysqli_close($con);
?>
