<?php
  session_start();
  include 'connection.php';
  $id = $_GET['id'];
  $email = $_SESSION['pemail'];

  $viddel = "delete from main_content where id='$id' and email='$email'";
  $videodelquery = mysqli_query($con,$viddel);

  if($videodelquery){
    ?>
      <script>
        alert("deleted");
        location.replace("profile.php");
      </script>
    <?php
  }else{
    ?>
      <script>
        alert("not deleted");
        location.replace("profile.php");
      </script>
    <?php
  }

?>