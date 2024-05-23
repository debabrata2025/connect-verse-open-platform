<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update msg</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="icon" type="images" href="<?php echo $_SESSION['pimg']; ?>">
</head>
<body>
    <div class="main_div">
        <form action="" method="POST" >
<?php
  include 'connection.php';
  
    if($_GET['id']){
        $id = $_GET['id'];
        $email = $_SESSION['pemail'];
        $showvalue = "select * from comments where id='$id' and u_email='$email'";
        $showvaluequery = mysqli_query($con, $showvalue);
        $showdata = mysqli_fetch_array($showvaluequery);

        $emailselect = "select * from comments where id='$id'";
        $emailselectquery = mysqli_query($con, $emailselect);
        $emaildata = mysqli_fetch_array($emailselectquery);
        $db_email = $emaildata['u_email'];

        if($db_email == $email){
            if(isset($_POST['submit'])){
                $ids = $_GET['id'];
                $email = $_SESSION['pemail'];
                $newmsg = mysqli_real_escape_string($con, $_POST['nmsg']);
                $updatemsg = "update comments set id='$ids', comment='$newmsg' where id='$ids' and u_email='$email'";
                $updatemsgquery = mysqli_query($con, $updatemsg);
                    if($updatemsgquery){
                      ?>
                        <script>
                          alert("comment updated");
                          location.replace("home.php");
                        </script>
                     <?php
                   }else{
                      ?>
                        <script>
                          alert("comment not updated");
                        </script>
                      <?php
                    }
                }
        }else{
            ?>
              <script>
                 location.replace("home.php");
                 alert("select your comment to change");
              </script>
            <?php
        }


    }
    
?>
            <div class="box">
                <div class="grp_div">
                    <input type="text" name="nmsg"  autocomplete="off" required 
                    value="<?php echo $showdata['comment']; ?>" >
                </div>
                <input type="submit" value="update" name="submit">
            </div>
        </form>
    </div>
</body>
</html>