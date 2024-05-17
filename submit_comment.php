<?php
include 'connection.php';
session_start(); // Ensure session is started

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['postId']) && isset($data['userName']) && isset($data['userImg']) && isset($data['comment'])) {
    $postId = mysqli_real_escape_string($con, $data['postId']);
    $userName = mysqli_real_escape_string($con, $data['userName']);
    $userImg = mysqli_real_escape_string($con, $data['userImg']);
    $comment = mysqli_real_escape_string($con, $data['comment']);

    $query = "INSERT INTO comments (post_id, user_name, user_img, comment) VALUES ('$postId', '$userName', '$userImg', '$comment')";

    if (mysqli_query($con, $query)) {
        echo json_encode(['success' => true, 'userName' => $userName, 'userImg' => $userImg, 'comment' => $comment]);
    } else {
        echo json_encode(['success' => false, 'error' => mysqli_error($con)]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid data']);
}

mysqli_close($con);
?>
