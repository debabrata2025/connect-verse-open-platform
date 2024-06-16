<?php
session_start();
if (!isset($_SESSION['name'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        include 'connection.php';
        $useremail = $_GET['useremail'];
        $selectemail = "select * from demodata where email='$useremail'";
        $selectemailquery = mysqli_query($con, $selectemail);
        $useremaildata = mysqli_fetch_array($selectemailquery);
        $username = $useremaildata['name'];
        echo $username;
        ?>
    </title>
    <link rel="stylesheet" href="01.css?v=<?php echo time(); ?>">
    <link rel="icon" type="images" href="<?php echo $useremaildata['image']; ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="loading-bar"></div>
    <div class="main_div">
        <form action="" method="POST" enctype="multipart/form-data">
            <!-- header -->
            <div class="nav_div">
                <div class="c_logo">
                    <a href="home.php">
                        <img src="logo2_prev_ui.png" alt="logo" loading="lazy">
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
                        <?php echo $_SESSION['name']; ?>
                    </h2>
                </div>
                <div class="sub_head">
                    <p>welcome to ds-world...</p>
                </div>
                <div class="profile_image">
                    <a href="profile.php">
                        <img src="<?php echo $_SESSION['pimg']; ?>" alt="profile_image" class="dp_head">
                    </a>
                </div>
                <div class="lout">
                    <a href="logout.php" class="logout" tooltip="logout" flow="down">
                        <i class="fa fa-sign-out"></i>
                    </a>
                </div>
            </div>
            <!-- profile actual -->
            <?php
            include 'connection.php';
            $useremail = $_GET['useremail'];
            $selectemail = "select * from demodata where email='$useremail'";
            $selectemailquery = mysqli_query($con, $selectemail);
            $useremaildata = mysqli_fetch_array($selectemailquery);
            $username = $useremaildata['name'];
            $userimg = $useremaildata['image'];
            $receiver_id = $useremaildata['id'];
            ?>
            <div class="main_profile_div">
                <div class="all_content">
                    <div class="profile_image_content">
                        <a href="#">
                            <img src="<?php echo $userimg; ?>" alt="profile_img">
                        </a>
                    </div>
                    <div class="profile_name">
                        <h2 class="up_name">
                            <?php echo $username; ?>
                        </h2>
                    </div>
                    <!-- profile description -->
                    <div class="profile_description">
                        <?php 
                           include 'connection.php';
                           $des_q = "SELECT * FROM demodata WHERE email='$useremail'";
                           $query = mysqli_query($con,$des_q);
                           $res = mysqli_fetch_array($query);
                           $desp = $res['description'];
                        ?>
                        <p class="desp_pp dddd"><?php echo $desp; ?></p>
                    </div>

                    <!-- friend req btn -->
                    <div class="add_friend_div">

                     <!-- friends count -->
                <?php
                    $receiverId = $receiver_id;
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
                    $post_count_query = "SELECT COUNT(*) AS post_count FROM main_content
                      WHERE email='$useremail'";
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
                        <div class="sub_add_friend" >
                            <div class="add_btn">
                                <i class="fa-brands fa-medium"></i>
                            </div>
                            <span class="c_con_text">
                                 <?php echo $postcount; ?> <?php echo ($postcount < 2) ? "post" : "posts"; ?>
                            </span>
                        </div>
                    <!-- total no of friends -->
                        <div class="sub_add_friend" data-user-id="<?php echo $receiver_id ?>">
                            <div class="add_btn">
                                <i class="fa-solid fa-user-group"></i>
                            </div>
                            <span class="c_con_text">
                                <?php echo $friendCount; ?> <?php echo ($friendCount < 2) ? "friend" : "friends"; ?>
                            </span>
                        </div>
                <!-- for sending friend request-->
                        <?php if ($useremail != $_SESSION['pemail']) { ?>
                        <div class="sub_add_friend" 
                        data-sender-id="<?php echo $_SESSION['user_id']; ?>"
                        data-receiver-id="<?php echo $receiver_id; ?>" >
                            <div class="add_btn">
                                <i class="fa-solid fa-link"></i>
                            </div>
                            <span class="c_con_text">
                                Connect
                            </span>
                        </div>
                        <?php } ?>


                    </div>

                    <!-- post heading -->
                    <div class="profile_des">
                        <h3>Posts...</h3>
                    </div>
                    <div class="profile_videos_div">
                        <?php

                        include 'connection.php';
                        $email = $_GET['useremail'];
                        $videoselect = "SELECT main_content.username, main_content.email, main_content.video 
                        FROM main_content JOIN demodata ON main_content.email = demodata.email
                        WHERE demodata.status = 'public' AND main_content.email = '$email'
                        ORDER BY main_content.id DESC";
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
                            </div>
                            <?php
                        }

                        ?>
                        <div class="alert_box1">
                                <div class="dltmain">
                                    <h2>Unfriend</h2>
                                </div>
                                <div class="msg_alt">
                                    <p>Are you sure to Unfriend ?</p>
                                </div>
                                <div class="dlt_btn">
                                    <a href="#" class='btn_class cl' id="cancel-btn">cancel</a>
                                    <a href="#"  class="btn_class active" id="confirm-btn">
                                        confirm
                                    </a>
                                </div>
                            </div>
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

        <div class="internet_status">
            <div class="status"></div>
        </div>

    </div>

    <script src="checkprofile.js"></script>
    <script src="online.js"></script>
    <script src="toploader.js"></script>
    <script src="friend_req.js"></script>
    <script src="displayfriend1.js"></script>
    <script src="des_toggle.js"></script>

    <script>
        //profile div toggle
        const profilebtn = document.querySelector('.profile');
        const profilebox = document.querySelector('.box');

        profilebtn.onclick = () => {
            profilebox.classList.toggle('active');
        }
        // image file choose
        // let imgfile = document.getElementById('fileinput');
        // let imgarea = document.getElementById('img_area');
        // let uploadbtn = document.querySelector('.upload_btn');
        // let icon_div = document.querySelector('.icon_div');
        // let dia_head = document.querySelector('.dia_head');
        // const video_div = document.querySelector('.video_div');
        // const vid_upload = document.querySelector('.vid_upload');
        // const vid_des = document.querySelector('.vid_des');

        // imgfile.addEventListener('change', (e) => {
        //     uploadbtn.style.display = 'none';
        //     icon_div.style.display = 'none';
        //     video_div.style.display = 'block';
        //     vid_upload.style.display = 'block';
        //     vid_des.style.display = 'block';

        //     if (e.target.files.length == 0) {
        //         return 0;
        //     }
        //     let tempurl = URL.createObjectURL(e.target.files[0]);
        //     imgarea.setAttribute("src", tempurl);
        // });

        //----toggle to upload media box---//
        // const add_media = document.querySelector('.add_media');
        // const mediauploadbox = document.querySelector('.upload_div');
        // const maindiv = document.querySelector('.main_div');
        // add_media.onclick = () => {
        //     mediauploadbox.style.display = 'block';
        //     maindiv.classList.add('main_active');
        // }

        // const cancel_btn = document.querySelector('.cancel_btn');
        // cancel_btn.onclick = () => {
        //     mediauploadbox.style.display = 'none';
        //     maindiv.classList.remove('main_active');
        //     location.reload();
        // }

        // mail script
        // const mail_me = document.querySelector('.mail_me');
        // const mail_div = document.querySelector('.mail_div');

        // mail_me.onclick = () => {
        //     mail_div.classList.toggle('mailactive');
        // }

        // const dp_head = document.querySelector('.dp_head');
        // dp_head.onclick = () => {
        //     location.replace("profile.php");
        // }

    </script>
</body>

</html>