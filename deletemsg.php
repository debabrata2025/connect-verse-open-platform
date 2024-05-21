<?php
session_start();
include 'connection.php';

$id = $_GET['id'];
$postuseremail = $_GET['postuseremail'];
$email = $_SESSION['pemail'];

// Select the comment details
$emailselect = "SELECT * FROM comments WHERE id='$id'";
$emailselectquery = mysqli_query($con, $emailselect);
$emaildata = mysqli_fetch_array($emailselectquery);

$db_email = $emaildata['u_email'];           // Commenter's email
$db_post_user_email = $emaildata['p_u_email']; // Post user's email

// Check if the session email matches either the commenter's email or the post user's email
if ($db_email == $email || $db_post_user_email == $email) {
    $deletemsg = "DELETE FROM comments WHERE id='$id'";
    $deletemsgquery = mysqli_query($con, $deletemsg);
    
    if ($deletemsgquery) {
        ?>
        <script>
            alert('Message deleted');
            location.replace("home.php");
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Message not deleted');
        </script>
        <?php
    }
} else {
    ?>
    <script>
        alert("You do not have permission to delete this message");
        location.replace("home.php");
    </script>
    <?php
}
?>
