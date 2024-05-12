<?php
session_start();
include 'connection.php';

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the post ID and user ID from the AJAX request
    $postId = $_POST['postId'];
    // Assuming you have a way to identify the user, you can get the user ID from session or somewhere else
    $userId = $_SESSION['user_id']; // Change this based on your authentication mechanism

    // Check if the user has already liked the post
    $checkLikeQuery = "SELECT * FROM likes WHERE post_id = $postId AND user_id = $userId";
    $checkLikeResult = mysqli_query($con, $checkLikeQuery);

    if ($checkLikeResult) {
        if (mysqli_num_rows($checkLikeResult) > 0) {
            // User has already liked the post, update the active_status
            $row = mysqli_fetch_assoc($checkLikeResult);
            $activeStatus = ($row['active_status'] == 1) ? 0 : 1; // Toggle active status
            $updateLikeQuery = "UPDATE likes SET active_status = $activeStatus WHERE post_id = $postId AND user_id = $userId";
            $updateResult = mysqli_query($con, $updateLikeQuery);
            if ($updateResult) {
                // Get the updated like count
                $countLikesQuery = "SELECT COUNT(*) AS likeCount FROM likes WHERE post_id = $postId  AND active_status = 1";
                $result = mysqli_query($con, $countLikesQuery);
                $row = mysqli_fetch_assoc($result);
                $likeCount = $row['likeCount'];
                
                $isLiked = ($activeStatus == 1) ? true : false;
                // Return JSON response with updated like count
                echo json_encode(['success' => true, 'isLiked' => $isLiked, 'likeCount' => $likeCount]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to update like']);
            }
        } else {
            // User has not liked the post yet, insert a new like record
            $insertLikeQuery = "INSERT INTO likes (post_id, user_id, active_status) VALUES ($postId, $userId, 1)";
            $insertResult = mysqli_query($con, $insertLikeQuery);
            if ($insertResult) {
                // Get the updated like count
                $countLikesQuery = "SELECT COUNT(*) AS likeCount FROM likes WHERE post_id = $postId  AND active_status = 1";
                $result = mysqli_query($con, $countLikesQuery);
                $row = mysqli_fetch_assoc($result);
                $likeCount = $row['likeCount'];
                
                // Return JSON response with updated like count
                echo json_encode(['success' => true, 'isLiked' => true, 'likeCount' => $likeCount]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to insert like']);
            }
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Database query error']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
?>
