<?php
include 'connection.php';

// Check if current_time is set in POST data
if(isset($_POST['current_time'])) {
    $current_time = intval($_POST['current_time']); // Ensure it's an integer

    // Calculate the expiration time (2 minutes ago)
    $expiration_time = $current_time - (24 * 60 * 60); // 2 minutes in seconds

    // Delete stories older than 2 minutes
    $delete_query = "DELETE FROM story WHERE created_at < $expiration_time";
    $result = mysqli_query($con, $delete_query);
    $delet_ass0_file = "SELECT * FROM story WHERE created_at < $expiration_time";
    $del_res = mysqli_query($con, $delet_ass0_file);

    while($res = mysqli_fetch_array($del_res)){
        unlink($res['story_p']);
    }
    if ($result) {
        $response = array('message' => 'Expired stories deleted successfully.');
        error_log("Expired stories deleted successfully.");
    } else {
        $response = array('message' => 'No expired stories to delete.');
        error_log("No expired stories to delete: " . mysqli_error($con));
    }

    // Set JSON header
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    $response = array('message' => 'current_time not provided.');
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
