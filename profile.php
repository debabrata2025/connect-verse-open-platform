<?php
session_start();
include 'connection.php';

// Function to clear cookies and redirect to login
if (!isset($_SESSION['user_id']) && !isset($_COOKIE['user_id'])) {
    echo "<script>location.replace('login.php');</script>";
    exit;
}

// If cookies are set, but session is not, set the session from cookies
if (!isset($_SESSION['user_id']) && isset($_COOKIE['user_id'])) {
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['name'] = $_COOKIE['name'];
    $_SESSION['pimg'] = $_COOKIE['pimg'];
    $_SESSION['pemail'] = $_COOKIE['email'];
    $_SESSION['session_id'] = $_COOKIE['sid'];
}

// Update user status for maintaining all the sessions
$user_id = mysqli_real_escape_string($con, $_SESSION['user_id']);
$check_cookie_query = "SELECT q_status FROM demodata WHERE id='$user_id'";
$query_result = mysqli_query($con, $check_cookie_query);
$rd = mysqli_fetch_array($query_result);

if ($rd['q_status'] == 0) {
    // Delete cookies by setting their expiration time in the past
    setcookie('user_id', '', time() - 3600, "/");
    setcookie('email', '', time() - 3600, "/");
    setcookie('name', '', time() - 3600, "/");
    setcookie('pimg', '', time() - 3600, "/");
    setcookie('sid', '', time() - 3600, "/");
    echo "<script>location.replace('login.php');</script>";
    exit;
} else {
    $update_cookie_query = "UPDATE demodata SET q_status=1 WHERE id='$user_id'";
    mysqli_query($con, $update_cookie_query);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $_SESSION['name']; ?>
    </title>
    <link rel="stylesheet" href="01.css?v=<?php echo time(); ?>">
    <link rel="icon" type="images" href="<?php echo $_SESSION['pimg']; ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="loading-bar"></div>
    <div class="main" id="loader">
        <h1>CONNECT</h1>
        <h2 id="titleid"></h2>
        <div class="dot_div">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>
    <div class="main_div">
        <form action="" method="POST" enctype="multipart/form-data">
            <!-- header -->
            <div class="nav_div">
                <div class="c_logo">
                    <a href="home.php">
                        <img src="logo2_prev_ui.svg" alt="logo" loading="lazy">
                    </a>
                </div>
                <div class="menu">
                    <ul>
                        <li><a href="home.php" class="dtext">home</a></li>
                        <li><a href="#" class="dtext">recent</a></li>
                        <li><a href="#" class="dtext">contacts</a></li>
                        <li>
                            <a href="#" class="dtext">
                                <i class="fa-solid fa-circle-half-stroke darkm"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="profile" tooltip="profile" flow="down">
                                    <img src="<?php echo $_SESSION['pimg']; ?>" alt="profile_img">
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- profile box -->
            <div class="box active">
                <div class="heading" tooltip="profile name" flow="down">
                    <h2>Hi,
                        <?php
                        include 'connection.php';
                        $cemail = $_SESSION['pemail'];
                        $nameshow = "select * from demodata where email='$cemail'";
                        $namequery = mysqli_query($con, $nameshow);
                        $namedta = mysqli_fetch_array($namequery);
                        echo $namedta['name'];
                        ?>
                    </h2>
                </div>
                <div class="sub_head">
                    <p>welcome to Connect Verse...</p>
                </div>
                <div class="profile_image">
                    <a href="">
                        <img src="<?php echo $_SESSION['pimg']; ?>" alt="profile_image" class="dp_head">
                    </a>
                </div>
                <div class="lout">
                    <a class="logout" tooltip="logout" flow="down">
                        <i class="fa fa-sign-out"></i>
                    </a>
                </div>
                <div class="log_devices">
                    <a href="logout.php" class="primary_device ld">Logout for this device</a>
                    <a href="logoutall.php" class="all_devices ld">Logout for all device</a>
                </div>
            </div>

            <!-- delete popup -->

            <!-- profile actual       -->
            <div class="main_profile_div">
                <div class="all_content">
                    <div class="profile_image_content">
                        <a href="<?php echo $_SESSION['pimg']; ?>">
                            <img src="<?php echo $_SESSION['pimg']; ?>" alt="profile_img">
                        </a>
                        <a href="profileupdate.php">
                            <div class="pchange">
                                <i class="fa-solid fa-camera"></i>
                            </div>
                        </a>
                    </div>
                    <div class="profile_name">
                        <h2 class="up_name">
                            <?php
                            include 'connection.php';
                            $email = $_SESSION['pemail'];
                            $namequery = "select * from demodata where email='$email'";
                            $nameshow = mysqli_query($con, $namequery);
                            $res = mysqli_fetch_array($nameshow);
                            echo $res['name'];
                            ?>
                        </h2>
                        <div class="profile_edit">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </div>
                    </div>
                    <div class="profile_name_change">
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="POST">
                            <?php
                            include 'connection.php';
                            if (isset($_POST['pnsubmit'])) {
                                $db_email = $_SESSION['pemail'];
                                $changed_name = $_POST['pnames'];
                                $nameupdate = "update demodata set name='$changed_name' where email='$db_email'";
                                $updatequery = mysqli_query($con, $nameupdate);
                                $nameupdate1 = "update mailtable set name='$changed_name' where email='$db_email'";
                                $updatequery1 = mysqli_query($con, $nameupdate1);
                                $nameupdate2 = "update main_content set username='$changed_name' where email='$db_email'";
                                $updatequery2 = mysqli_query($con, $nameupdate2);
                                if ($updatequery && $updatequery1 && $updatequery2) {
                                    ?>
                                    <script>
                                        location.replace("profile.php");
                                    </script>
                                    <?php
                                } else {
                                    ?>
                                    <script>
                                        alert("not updated");
                                    </script>
                                    <?php
                                }
                            }
                            ?>
                            <div class='cdiv'>
                                <input type="text" name="pnames">

                                <input type="submit" value="change" name="pnsubmit">
                            </div>
                        </form>
                    </div>

                    <!-- profile description -->
                    <div class="profile_description">
                        <?php
                        include 'connection.php';
                        $user_email = $_SESSION['pemail'];
                        $des_q = "SELECT * FROM demodata WHERE email='$user_email'";
                        $query = mysqli_query($con, $des_q);
                        $res = mysqli_fetch_array($query);
                        $desp = $res['description'];
                        ?>
                        <p class="desp_pp"><?php echo $desp; ?></p>
                        <div class="des_edit">
                            <i class="fa-solid fa-pen-to-square d_pen"></i>
                        </div>
                    </div>
                    <!-- description edit section -->
                    <div class="des_editor">
                        <div class="des_editor_com">
                            <div class="text_area">
                                <textarea class="des_edit_main"></textarea>
                            </div>
                            <div class="remaing"><span class="remaining">101</span> words remainning</div>
                            <div class="editor_btns">
                                <div class="edit_cancel comb">cancel</div>
                                <div class="edit_save comb">save</div>
                            </div>
                        </div>
                    </div>


                    <!-- friend req btn -->
                    <div class="add_friend_div">

                        <!-- friends count -->
                        <?php
                        $receiverId = $_SESSION['user_id'];
                        // Query to count the number of friend requests
                        $query = "SELECT COUNT(*) AS friend_count FROM friend_req
                      WHERE ((receiver_id = '$receiverId') 
                      OR (sender_id = '$receiverId')) AND req_status = 'friend'";

                        // Execute the query
                        $result = mysqli_query($con, $query);

                        // Check if query execution was successful
                        if ($result) {
                            // Fetch the row
                            $row = mysqli_fetch_assoc($result);
                            // Get the friend count
                            $friendCount = $row['friend_count'];
                        } else {
                            // Error handling if query execution fails
                            $friendCount = 0; // Set default friend count to 0
                            echo "Error: " . mysqli_error($con);
                        }

                        // post count
                        $email_db = $_SESSION['pemail'];
                        $post_count_query = "SELECT COUNT(*) AS post_count FROM main_content
                      WHERE email='$email_db'";
                        $result1 = mysqli_query($con, $post_count_query);

                        // Check if query execution was successful
                        if ($result1) {
                            // Fetch the row
                            $row1 = mysqli_fetch_assoc($result1);
                            // Get the friend count
                            $postcount = $row1['post_count'];
                        } else {
                            // Error handling if query execution fails
                            $postcount = 0; // Set default friend count to 0
                            echo "Error: " . mysqli_error($con);
                        }

                        ?>

                        <!-- total no of post -->
                        <div class="sub_add_friend">
                            <div class="add_btn">
                                <i class="fa-brands fa-medium"></i>
                            </div>
                            <span class="c_con_text">
                                <?php echo $postcount; ?> <?php echo ($postcount < 2) ? "post" : "posts"; ?>
                            </span>
                        </div>
                        <!-- total no of friends -->
                        <div class="sub_add_friend">
                            <div class="add_btn">
                                <i class="fa-solid fa-user-group"></i>
                            </div>
                            <span class="c_con_text">
                                <?php echo $friendCount; ?> <?php echo ($friendCount < 2) ? "friend" : "friends"; ?>
                            </span>
                        </div>
                    </div>

                    <!-- video div starts  -->
                    <div class="profile_des">
                        <h3>your posts...</h3>
                    </div>
                    <div class="profile_videos_div">
                        <?php
                        include 'connection.php';
                        $email = $_SESSION['pemail'];
                        $videoselect = "select * from main_content where email='$email' ORDER BY id DESC";
                        $videoquery = mysqli_query($con, $videoselect);
                        while ($totalvideo = mysqli_fetch_array($videoquery)) {
                            ?>
                            <div class="videos">
                                <?php
                                $fileExtension = pathinfo($totalvideo['video'], PATHINFO_EXTENSION);
                                if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
                                    echo '<img src="' . $totalvideo['video'] . '" alt="Image">';
                                } elseif (in_array($fileExtension, ['mp4', 'mov', 'avi'])) {
                                    echo '<video controls>';
                                    echo '<source src="' . $totalvideo['video'] . '" type="video/mp4">';
                                    echo 'Your browser does not support the video tag.';
                                    echo '</video>';
                                }
                                ?>
                                <!-- <video src="<?php //echo $totalvideo['video']; ?>" controls controlslist="nodownload"></video> -->
                                <div class="deletevideo">
                                    <i class="fa-solid fa-trash"></i>
                                </div>
                            </div>

                            <div class="alert_box">
                                <div class="dltmain">
                                    <h2>Delete Video</h2>
                                </div>
                                <div class="msg_alt">
                                    <p>Are you sure you want to delete your video?</p>
                                </div>
                                <div class="dlt_btn">
                                    <a href="#" class='btn_class cl'>cancel</a>
                                    <a href="deletecontent.php?id=<?php echo $totalvideo['id']; ?>"
                                        class="btn_class active">
                                        confirm
                                    </a>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </form>

        <!-- show frinds  where status=friends-->
        <div class="friends_overlay">
            <div class="main_friends">
                <div class="friends_heading">
                    <h2 class="s_head">Connections</h2>
                </div>
                <div class="can_btn">
                    <i class="fa-regular fa-circle-xmark xcxc"></i>
                </div>
                <div class="main_friends_all">
                    <div class="all_friend">
                        <!-- all data will come from ajax -->
                    </div>
                </div>
            </div>
        </div>
           

        <!-- show public private and friends-->
        <div class="friends_overlay1">
            <div class="main_friends1">
                <div class="friends_heading1">
                    <h2 class="s_head">Post Visibility</h2>
                </div>
                <div class="can_btn1">
                    <i class="fa-regular fa-circle-xmark xcxc"></i>
                </div>
                <div class="main_friends_all1">
                    <div class="all_friend1">
                        <div class="pp_icon">
                            <i class="fa-solid fa-earth-americas comic"></i>
                        </div>
                        <div class="pp_text">
                            <p class="ss">Public</p>
                            <span class="sss">make your profile visible to all</span>
                        </div>
                        <div class="radio_btn">
                            <input type="radio" id="public" name="visibility" value="public">
                            <label for="public"></label>
                        </div>
                    </div>
                    <div class="all_friend1">
                        <div class="pp_icon">
                            <i class="fa-solid fa-lock comic"></i>
                        </div>
                        <div class="pp_text">
                            <p class="ss">Private</p>
                            <span class="sss">Hide your posts from others</span>
                        </div>
                        <div class="radio_btn">
                            <input type="radio" id="private" name="visibility" value="private">
                            <label for="private"></label>
                        </div>
                    </div>
                    <div class="all_friend1">
                        <div class="pp_icon">
                            <i class="fa-solid fa-user-group comic"></i>
                        </div>
                        <div class="pp_text">
                            <p class="ss">Friends</p>
                            <span class="sss">share your posts with friends</span>
                        </div>
                        <div class="radio_btn">
                            <input type="radio" id="friends" name="visibility" value="friends">
                            <label for="friends"></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- online offline -->
        <div class="internet_status">
            <div class="status"></div>
        </div>


    </div>




    <script src="darkmode1.js"></script>
    <script src="online.js"></script>
    <script src="toploader.js"></script>
    <script src="preloader.js"></script>
    <script src="profile_desp_edit.js"></script>
    <script src="displayfriend.js"></script>
    <script src="status_update_profile.js"></script>
    <script src="log_div.js"></script>
    <script>
        //profile div toggle
        const profilebtn = document.querySelector('.profile');
        const profilebox = document.querySelector('.box');

        profilebtn.onclick = () => {
            profilebox.classList.toggle('active');
        }


        const dp_head = document.querySelector('.dp_head');
        dp_head.onclick = () => {
            location.replace("profile.php");
        }

        ///profile name change 
        const cbtn = document.querySelector('.fa-pen-to-square');
        const profile_name_change = document.querySelector('.profile_name_change');
        cbtn.onclick = () => {
            if (navigator.vibrate) {
                navigator.vibrate(2);
            }
            profile_name_change.style.display = 'block';
        }

        //delete video
        let dltbtn = document.querySelectorAll('.fa-trash');
        let alert_box = document.querySelectorAll('.alert_box');
        const cancelbtn = document.querySelectorAll('.cl');

        for (let i = 0; i < dltbtn.length; i++) {
            dltbtn[i].onclick = () => {
                alert_box[i].style.display = 'block';
                if (navigator.vibrate) {
                    navigator.vibrate(3);
                }
            }
            cancelbtn[i].onclick = (e) => {
                alert_box[i].style.display = 'none';
            }
        }


        //show and hide description box
        const description_btn = document.querySelector('.des_edit');
        const description_box = document.querySelector('.des_editor');

        description_btn.addEventListener('click', () => {
            description_box.classList.add('active');
        });

    </script>
</body>

</html>