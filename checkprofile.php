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
            <!-- profile actual       -->
            <?php
            include 'connection.php';
            $useremail = $_GET['useremail'];
            $selectemail = "select * from demodata where email='$useremail'";
            $selectemailquery = mysqli_query($con, $selectemail);
            $useremaildata = mysqli_fetch_array($selectemailquery);
            $username = $useremaildata['name'];
            $userimg = $useremaildata['image'];
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
                    <div class="profile_des">
                        <h3>Posts...</h3>
                    </div>
                    <div class="profile_videos_div">
                        <?php
                        include 'connection.php';
                        $email = $_GET['useremail'];
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
                            </div>
                            <?php
                        }

                        ?>
                    </div>
                </div>
            </div>
        </form>

        <div class="internet_status">
            <div class="status"></div>
        </div>

    </div>

    <script src="checkprofile.js"></script>
    <script src="online.js"></script>
    <script src="toploader.js"></script>
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