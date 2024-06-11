<?php
include 'connection.php';
session_start();

$receiverId = $_SESSION['user_id'];

$query = "
    SELECT demodata.id, demodata.name, demodata.email, demodata.phone, demodata.image, demodata.description
    FROM friend_req
    JOIN demodata ON (friend_req.sender_id = demodata.id OR friend_req.receiver_id = demodata.id)
    WHERE (friend_req.sender_id = '$receiverId' OR friend_req.receiver_id = '$receiverId')
    AND friend_req.req_status = 'friend' 
    AND demodata.id <> '$receiverId' 
    ORDER BY demodata.id DESC";

$result = mysqli_query($con, $query);

$response = array();
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $response[] = $row;
    }
}

mysqli_close($con);

header('Content-Type: application/json');
echo json_encode(array('success' => true, 'data' => $response));
?>
