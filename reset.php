<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reset password</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="main_div">
     <form action="" method="POST" >
<?php
include 'connection.php';
if(isset($_POST['submit'])){
    
    if($_GET['token']){

        $newpassword = $_POST['password'];
        $cpassword = $_POST['cpassword'];

         // password hashing
        $hasspass = password_hash($newpassword, PASSWORD_BCRYPT); 
        $conhasspass = password_hash($cpassword, PASSWORD_BCRYPT); 
        $token = $_GET['token'];

        if($newpassword === $cpassword){
            $updatepassword = "update demodata set password='$hasspass', cpassword='$conhasspass' where 
            token='$token'";
            $updatequery = mysqli_query($con,$updatepassword);
            if($updatequery){
                $_SESSION['msg'] = "password updated";
                ?>
                  <script>
                    location.replace("login.php");
                  </script>
                <?php
            }else{
                $_SESSION['alert'] = "password not updated";
            }
        }else{
            $_SESSION['alert'] = "password not matched";
        }
    }
}
?>
            <div class="box">
                <div class="heading">
                    <h2 class="reset">password reset</h2>
                </div>
                <div class="sub_head">
                    <p>
                    <?php
                     if(isset($_SESSION['alert'])){ 
                           echo $_SESSION['alert']; 
                        }else{
                           echo $_SESSION['alert'] = "";
                        } 
                     ?>
                    </p>
                </div> 
                <div class="grp_div">
                    <input type="password" name="password" placeholder="new password" autocomplete="off" required >
                </div>
                <div class="grp_div">
                    <input type="password" name="cpassword" placeholder="confirm password" autocomplete="off" required >
                </div>
                <input type="submit" value="update" name="submit">
            </div>
        </form>
    </div>
</body>
</html>