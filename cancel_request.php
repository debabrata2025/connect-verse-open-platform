<?php
include 'connection.php';
session_start();

// Check if request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract data from the POST request
    $postData = json_decode(file_get_contents("php://input"), true);

    // Check if the request contains the requestId
    if (isset($postData["requestId"])) {
        $requestId = $postData["requestId"];

        // Delete the friend request from the database
        $query1 = "DELETE FROM friend_req WHERE sender_id='$requestId' AND req_status='pending'";

        if (mysqli_query($con, $query1)) {
            // Send success response if query executed successfully
            $response = array("success" => true);
            echo json_encode($response);
        } else {
            // Send error response if query execution failed
            $response = array("success" => false, "error" => mysqli_error($con));
            echo json_encode($response);
        }
    } else {
        // Send error response if requestId is not provided
        $response = array("success" => false, "error" => "Request ID not provided");
        echo json_encode($response);
    }
} else {
    // Send error response if request method is not POST
    $response = array("success" => false, "error" => "Invalid request method");
    echo json_encode($response);
}
?>
