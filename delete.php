<?php

 session_start();

  include 'connection.php';
    $id = $_GET['id'];
    $email = $_SESSION['pemail'];

    $emailselect = "select * from mailtable where id='$id'";
    $emailselectquery = mysqli_query($con, $emailselect);
    $emaildata = mysqli_fetch_array($emailselectquery);
    $db_email = $emaildata['email'];


if($db_email == $email){
      $deletemsg = "delete from mailtable where id='$id' and email='$email'";
      $deletemsgquery = mysqli_query($con, $deletemsg);
    if($deletemsgquery){
        ?>
          <script>
            alert('message deleted');
            location.replace("home.php");
          </script>
        <?php
    }else{
        ?>
          <script>
            alert('message not deleted');
          </script>
        <?php
    }
  }else{
    ?>
      <script>
        alert("please delete your own message");
        location.replace("home.php");
      </script>
    <?php
  }

    
?>