<?php
include 'connection.php';
session_start();

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['requestId'])) {
    $receiverId = $data['requestId'];
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
        mysqli_free_result($result);
    } else {
        echo json_encode(['success' => false, 'error' => 'Query failed']);
        exit();
    }

    mysqli_close($con);

    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'data' => $response]);

} else {
    echo json_encode(['success' => false, 'error' => 'Invalid data']);
}
?>
