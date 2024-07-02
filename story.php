<?php
session_start();
include 'connection.php';

// Initialize response array
$response = array('success' => false);

// Check if the request method is POST and file 'story_image' is set
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['story_image'])) {
    // Extract file details
    $file = $_FILES['story_image'];
    $filename = $file['name'];
    $filepath = $file['tmp_name'];
    $fileerror = $file['error'];

    // Assuming these variables are sent via POST
    $p_email = $_SESSION['pemail'];
    $current_time = $_POST['current_time']; // Get current time in seconds from POST data

    // Fetching username based on email from demodata table
    $nameshow = "SELECT * FROM demodata WHERE email='$p_email'";
    $namequery = mysqli_query($con, $nameshow);

    if ($namequery && mysqli_num_rows($namequery) > 0) {
        $namedata = mysqli_fetch_assoc($namequery);
        $username = $namedata['name'];
        $userimg = $namedata['image'];

        if ($fileerror == 0) {
            $destpath = 'story/' . $filename;

            // Move uploaded file to destination directory
            if (move_uploaded_file($filepath, $destpath)) {
                // Insert data into database
                $fileinsert = "INSERT INTO story (username, email, userimg, story_p, created_at) 
                               VALUES ('$username', '$p_email', '$userimg', '$destpath', '$current_time')";
                $iquery = mysqli_query($con, $fileinsert);

                if ($iquery) {
                    $response['success'] = true;
                    $response['message'] = "File uploaded and data inserted successfully.";
                } else {
                    $response['message'] = "Failed to insert data into the database: " . mysqli_error($con);
                    error_log("Database Insertion Error: " . mysqli_error($con));
                }
            } else {
                $response['message'] = "Failed to move uploaded file.";
                error_log("Failed to move uploaded file: " . $destpath);
            }
        } else {
            $response['message'] = "Error uploading file: " . $fileerror;
            error_log("Error uploading file: " . $fileerror);
        }
    } else {
        $response['message'] = "Failed to fetch username from demodata.";
        error_log("Failed to fetch username from demodata for email: " . $p_email);
    }
} else {
    $response['message'] = "No file uploaded or wrong request method.";
}

// Set JSON header
header('Content-Type: application/json');
echo json_encode($response);
?>
