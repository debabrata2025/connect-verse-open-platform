<?php
session_start();
include 'connection.php';
// Check if the user is already logged in via cookies
if (isset($_COOKIE['user_id']) && isset($_COOKIE['email']) && isset($_COOKIE['name']) && isset($_COOKIE['pimg']) && isset($_COOKIE['sid'])) {
    // Set session variables based on cookies
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['pemail'] = $_COOKIE['email'];
    $_SESSION['name'] = $_COOKIE['name'];
    $_SESSION['pimg'] = $_COOKIE['pimg'];
    $_SESSION['session_id'] = $_COOKIE['sid'];
    ?>
    <script>
        location.replace("home.php");
    </script>
    <?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="icon" type="images/webp" href="p2.webp">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="loading-bar"></div>
    <div class="main_div">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
            <?php
            include 'connection.php';
            if (isset($_POST['submit'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];

                //email validation
                $emailquery = "select * from demodata where email='$email'";
                $query = mysqli_query($con, $emailquery);
                $emailcount = mysqli_num_rows($query);
                if ($emailcount > 0) {
                    $email_pass = mysqli_fetch_array($query);
                    $db_pass = $email_pass['password'];
                    $_SESSION['name'] = $email_pass['name'];
                    $_SESSION['pimg'] = $email_pass['image'];
                    $_SESSION['user_id'] = $email_pass['id'];
                    $_SESSION['pemail'] = $email;
                    $pass_decode = password_verify($password, $db_pass);
                    if ($pass_decode) {
                        // Insert new session record with device info
                        $session_id = bin2hex(random_bytes(16));
                        $_SESSION['session_id'] = $session_id;
                        $device_info = $_POST['device'];
                        $location = $_POST['location'];
                        $l_time = $_POST['time'];
                        $insert_session_query = "INSERT INTO 
                        user_sessions (user_id, session_id, device_info, location, log_time) VALUES ('{$_SESSION['user_id']}', '$session_id', '$device_info', '$location', '$l_time')";
                        mysqli_query($con, $insert_session_query);
                        $update_cookie_query = "UPDATE demodata SET q_status=1 WHERE id='{$_SESSION['user_id']}'";
                        mysqli_query($con, $update_cookie_query);;

                        setcookie('user_id', $email_pass['id'], time() + (86400 * 30), "/"); // 30 days
                        setcookie('email', $email, time() + (86400 * 30), "/");
                        setcookie('name', $email_pass['name'], time() + (86400 * 30), "/");
                        setcookie('pimg', $email_pass['image'], time() + (86400 * 30), "/");
                        setcookie('sid', $session_id, time() + (86400 * 30), "/");

                        
                        
                    
                        if (isset($_POST['rememberme'])) {
                            setcookie('emailcookie', $email, time() + 86400);
                            setcookie('passwordcookie', $password, time() + 86400);
                            ?>
                            <script>
                                alert("login successful");
                                location.replace("home.php");
                            </script>
                            <?php
                        } else {
                            ?>
                            <script>
                                location.replace("home.php");
                            </script>
                            <?php
                        }
                    } else {
                        ?>
                        <script>
                            alert("incorrect credentials");
                        </script>
                        <?php
                    }
                } else {
                    ?>
                    <script>
                        alert("invalid email");
                    </script>
                    <?php
                }
            }
            ?>
            <div class="box">
                <div class="heading">
                    <div class="c_logo">
                        <img src="logo2_prev_ui.svg" alt="logo" loading="lazy" width="40">
                    </div>
                    <h2 class="mh">login</h2>
                </div>
                <div class="sub_head">
                    <p class="alert">
                        <?php
                        if (isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];
                        } else {
                            echo $_SESSION['msg'] = "you are logged out";
                        }
                        ?>
                    </p>
                </div>
                <div class="grp_div">
                    <input type="text" name="email" placeholder="email" autocomplete="off" required
                        value="<?php if (isset($_COOKIE['emailcookie'])) {
                            echo $_COOKIE['emailcookie'];
                        } ?>" class="mi"
                        autofocus inputmode="email">
                </div>
                <div class="grp_div">
                    <input type="password" name="password" placeholder="password" autocomplete="off" required
                        value="<?php if (isset($_COOKIE['passwordcookie'])) {
                            echo $_COOKIE['passwordcookie'];
                        } ?>"
                        class="pp mi">
                        <input type="hidden" class="infor_div" name="location">
                        <input type="hidden" class="infor_div" name="device">
                        <input type="hidden" class="infor_div" name="time">
                        <div class="show_pass">
                        <i class="fa-regular fa-eye"></i>
                    </div>
                </div>
                <div class="check_div">
                    <input type="checkbox" name="rememberme"> remember me
                </div>
                <a href="recovery.php" class="forgot">forgot password?</a>
                <input type="submit" value="submit" name="submit">
                <p class="lh">don't have an account?<a href="index.php">sign-up</a></p>
            </div>
        </form>
        <div class="internet_status">
            <div class="status"></div>
        </div>
    </div>

    <script src="form1.js"></script>
    <script src="online.js"></script>
    <script src="toploader.js"></script>
    <script src="location_device_time.js"></script>
    <script>
        //show pass
        const showeye = document.querySelector('.fa-eye');
        const inputpp = document.querySelector('.pp');
        inputpp.addEventListener('focus', () => {
            showeye.style.display = "block"
            showeye.addEventListener('click', () => {
                if (inputpp.type == "password") {
                    inputpp.type = 'text';
                } else {
                    inputpp.type = 'password';
                }
            })

        });
    </script>

</body>

</html>