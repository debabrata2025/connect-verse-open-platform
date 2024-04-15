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
                    <a href="logout.php" class="logout" tooltip="logout" flow="down">
                        <i class="fa fa-sign-out"></i>
                    </a>
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

        <!-- online offline -->
        <div class="internet_status">
            <div class="status"></div>
        </div>


    </div>




    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script src="darkmode1.js"></script>
    <script src="online.js"></script>
    <script src="toploader.js"></script>
    <script src="preloader.js"></script>
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
            profile_name_change.style.display = 'block';
        }

        //delete video
        let dltbtn = document.querySelectorAll('.fa-trash');
        let alert_box = document.querySelectorAll('.alert_box');
        const cancelbtn = document.querySelectorAll('.cl');

        for (let i = 0; i < dltbtn.length; i++) {
            dltbtn[i].onclick = () => {
                alert_box[i].style.display = 'block';
            }
            cancelbtn[i].onclick = (e) => {
                alert_box[i].style.display = 'none';
            }
        }

    </script>
</body>

</html>