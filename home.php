<?php
session_start();

if (!isset($_SESSION['user_id']) && !isset($_COOKIE['user_id'])) {
    ?>
    <script>
        location.replace("login.php");
    </script>
    <?php
}

// If cookies are set, but session is not, set the session from cookies
if (!isset($_SESSION['user_id']) && isset($_COOKIE['user_id'])) {
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['name'] = $_COOKIE['name'];
    $_SESSION['pimg'] = $_COOKIE['pimg'];
    $_SESSION['pemail'] = $_COOKIE['email'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo "home/" . $_SESSION['name'] ?>
    </title>
    <link rel="stylesheet" href="01.css?v=<?php echo time(); ?>">
    <link rel="icon" type="images/webp" href="p5.webp">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body id="top">
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
        <form action="" method="POST" enctype="multipart/form-data" id="myForm">
            <?php
            include 'connection.php';
            if (isset($_POST['submit'])) {
                $username = $_SESSION['name'];
                $profile_img = $_SESSION['pimg'];
                $v_des_c = nl2br($_POST['ccdes']);
                $vid_desp = mysqli_real_escape_string($con, $v_des_c);
                $file = $_FILES['media'];
                $p_email = $_SESSION['pemail'];
                // print_r($file);
                $filename = $file['name'];
                $filepath = $file['tmp_name'];
                $fileerror = $file['error'];

                if ($fileerror == 0) {
                    $destpath = 'mainmedia/' . $filename;
                    move_uploaded_file($filepath, $destpath);
                    // username	profileimg	video	desp
                    $fileinsert = "insert into main_content(username,profileimg,video,desp,email) 
                    values('$username','$profile_img','$destpath','$vid_desp','$p_email')";
                    $iquery = mysqli_query($con, $fileinsert);
                    if ($iquery) {
                        ?>
                        <script>
                            window.location = "home.php";
                        </script>
                        <?php
                    } else {
                        ?>
                        <script>
                            alert("not uploaded");
                        </script>
                        <?php
                    }
                } else {
                    ?>
                    <script>
                        alert("file error");
                    </script>
                    <?php
                }
            }

            ?>
            <!-- header -->
            <div class="nav_div">
                <div class="c_logo">
                    <a href="home.php">
                        <img src="logo2_prev_ui.svg" alt="logo" loading="lazy">
                    </a>
                </div>

                <!-- search  -->
                <div class="search_box">
                    <div class="grp_search">
                        <input type="text" name="search" placeholder="Search" id="searchinput" autocomplete="off"
                            class="search">
                        <div class="serach_btn">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                    </div>
                </div>

                <!-- lists options -->
                <div class="menu">
                    <ul>
                        <li class="comments m_view_none"><a href="#" class="dtext">feeds</a></li>
                        <li class="comments m_view_none"><a href="community.php" class="dtext">community</a></li>
                        <li class="m_view_none"><a href="activeuse.php" class="dtext">Connections</a></li>
                        <li class="faq m_view_none"><a href="#" class="dtext">faq</a></li>
                        <li>
                            <a href="#" class="dtext">
                                <i class="fa-solid fa-circle-half-stroke darkm"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="profile">
                                    <img src="<?php echo $_SESSION['pimg']; ?>" alt="profile_img">
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div> <!-- nav div ends -->


            <!-- search results div -->
            <div class="search_res_box">
                <?php
                include 'connection.php';
                $all_u = "select * from demodata";
                $userq = mysqli_query($con, $all_u);
                while ($alluserdata = mysqli_fetch_array($userq)) {
                    ?>
                    <a href="checkprofile.php?useremail=<?php echo $alluserdata['email'] ?>">
                        <div class="users_res">
                            <div class="user_img">
                                <img src="<?php echo $alluserdata['image']; ?>" alt="search_user">
                            </div>
                            <div class="username">
                                <p class="searchname"><?php echo $alluserdata['name']; ?></p>
                            </div>
                        </div>
                    </a>
                    <?php
                }
                ?>

                <div class="no_user">
                    <p class="n_u">No user found!</p>
                </div>
            </div>




            <!-- scroll options -->
            <div class="scroll_option">
                <ul>
                    <div class="op active"><a href="#top" class="dt active">new post</a></div>
                    <div class="op comments"><a href="#" class="dt">comments</a></div>
                    <div class="op"><a href="#" class="dt">Signals</a></div>
                    <div class="op"><a href="community.php" class="dt">community</a></div>
                    <div class="op"><a href="activeuse.php" class="dt">active-user</a></div>
                    <div class="op"><a href="#" class="dt" id="faq">faq</a></div>
                    <!-- Add some extra dummy items to create extra space for scrolling -->
                    <div class="op dummy"></div>
                    <div class="op dummy"></div>
                </ul>
            </div>

            <!-- side bar -->
            <div class="sidebar">
                <div class="logo">
                    <a href="home.php">
                        <h2>Connect Verse</h2>
                    </a>
                    <img src="icon.svg" alt="" class="logo_rotate">
                </div>
                <div class="items">
                    <ul>
                        <li><a href="#"><i class="fa-solid fa-house dicon"></i><span class="iname">home</span></a></li>
                        <li class="add_media"><a id="upload"><i class="fa-sharp fa-solid fa-circle-plus dicon"></i><span
                                    class="iname">upload</span></a></li>
                        <li class="bell_noti"><a><i class="fa-solid fa-bell dicon"></i><span class="iname">Signals</span><span class="unread"></span></a>
                        </li>
                        <li><a href="tel: +917319256047"><i class="fa-solid fa-phone-volume dicon"></i><span
                                    class="iname">call
                                    us</span></a></li>
                        <li class="mail_me"><a href="#"><i class="fa-brands fa-square-twitter dicon"></i><span
                                    class="iname">tweet</span></a>
                        </li>
                    </ul>
                </div>
                <!-- <div class="trademark">
                    <i class="fa-regular fa-copyright"></i>
                    <a href="https://www.instagram.com/radhedebu_321/" target="_blank">
                        debabrata_santra
                        <?php
                        //$year = date("Y");
                        //echo $year;
                        ?>
                    </a>
                </div> -->
            </div>

            <!-- side menu for notificattion -->
            <div class="main_notification">
                <div class="noti_head">
                    <h2>Signals</h2>
                </div>
                <!-- users notification -->
                <div class="notification_div">
                    <div class="main_noti_user">
                        <!-- all user details will come from ajax -->
                    </div>

                </div>
            </div>

            <!-- profile box -->
            <div class="box active">
                <div class="heading" tooltip="profile name" flow="down">
                    <h2 class="p_name">Hi,
                        <?php
                        $cemail = $_SESSION['pemail'];
                        $nameshow = "select * from demodata where email='$cemail'";
                        $namequery = mysqli_query($con, $nameshow);
                        $namedta = mysqli_fetch_array($namequery);
                        echo $namedta['name'];
                        ?>
                    </h2>
                </div>
                <div class="sub_head">
                    <p>Welcome to Connect Verse...</p>
                </div>
                <div class="profile_image">
                    <img src="<?php echo $_SESSION['pimg']; ?>" alt="profile_image" class="dp_head">
                </div>
                <div class="lout">
                    <a href="logout.php" class="logout" tooltip="logout" flow="down">
                        <i class="fa fa-sign-out"></i>
                    </a>
                </div>
            </div>

            <!-- upload dialogue box -->
            <div class="backupload_upload_div">
                <div class="upload_div">
                    <div class="cancel_btn">
                        <i class="fa-solid fa-circle-xmark cancel_btn" id="ic"></i>
                    </div>
                    <div class="dia_head">create a new post</div>
                    <div class="video_div">
                        <img class="img_area"></img>
                        <video class="img_area1" autoplay></video>
                    </div>
                    <div class="icon_div">
                        <img src="md.png" alt="">
                    </div>
                    <div class="upload_btn">
                        <label for="fileinput">select from computer</label>
                    </div>
                    <input type="file" name="media" id="fileinput">
                    <input type="text" name="ccdes" placeholder="description" class="vid_des">
                    <input type="submit" name="submit" value="upload" class="vid_upload">
                </div>
            </div>

            <!-- main content -->
            <div class="main_content">
                <div class="copy_r"></div>
                <?php
                include 'connection.php';
                $showdata = "select * from main_content";
                $showquery = mysqli_query($con, $showdata);
                while ($arraydata = mysqli_fetch_array($showquery)) {
                    $postId = $arraydata['id'];
                    $userId = $_SESSION['user_id']; // Assuming you have the user ID in the session
                
                    $checkLikeQuery = "SELECT * FROM likes WHERE post_id = $postId AND user_id = $userId";
                    $checkLikeResult = mysqli_query($con, $checkLikeQuery);

                    // Determine the initial like state
                    $initialLikeState = 0; // Default to 0 (post not liked)
                
                    // Check if there is a like record for the user and post
                    if ($checkLikeResult && mysqli_num_rows($checkLikeResult) > 0) {
                        // Fetch the like record
                        $likeData = mysqli_fetch_assoc($checkLikeResult);

                        // Check if the like is active
                        if ($likeData['active_status'] == 1) {
                            $initialLikeState = 1; // Set to 1 if the post is liked
                        }
                    }

                    ?>
                    <div class="main_vids">
                        <div class="video_d">
                            <a href="checkprofile.php?useremail=<?php echo $arraydata['email'] ?>">
                                <div class="user_img">
                                    <img src="<?php echo $arraydata['profileimg']; ?>" alt="">
                                </div>
                                <div class="username">
                                   <?php echo $arraydata['username']; ?>
                                </div>
                            </a>
                        </div>
                        <div class="content_video">
                            <?php
                            $fileExtension = pathinfo($arraydata['video'], PATHINFO_EXTENSION);
                            if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
                                echo '<img data-lazy="' . $arraydata['video'] . '" alt="Image" class="media">';
                            } elseif (in_array($fileExtension, ['mp4', 'mov', 'avi'])) {
                                echo '<video controls loop>';
                                echo '<source src="' . $arraydata['video'] . '" type="video/mp4" class="media">';
                                echo 'Your browser does not support the video tag.';
                                echo '</video>';
                            }
                            ?>
                        </div>
                        <div class="l_c_s">
                            <!-- Add a data-post-id attribute to your like button to store the post ID -->
                            <div class="like" data-post-id="<?php echo $arraydata['id']; ?>"
                                data-initial-like-state="<?php echo $initialLikeState; ?>">
                                <i class="fa-regular fa-heart"></i>
                            </div>

                            <div class="comment">
                                <i class="fa-regular fa-comment"></i>
                            </div>
                            <div class="share">
                                <i class="fa-regular fa-share-from-square"></i>
                            </div>
                        </div>
                        <div class="like_count">
                            <?php
                            $postid = $arraydata['id'];
                            $countLikesQuery = "SELECT COUNT(*) AS likeCount FROM likes WHERE post_id = $postid  AND active_status = 1";
                            $result = mysqli_query($con, $countLikesQuery);
                            $row = mysqli_fetch_assoc($result);
                            $likeCount = $row['likeCount'];
                            ?>
                            <span class="like-count"><?php echo ($likeCount < 1) ? 'no' : $likeCount; ?></span> likes
                        </div>
                        <div class="des">
                            <span>
                                <?php echo $arraydata['username']; ?>
                            </span>
                            <p class="v_desp">
                                <?php echo $arraydata['desp']; ?>
                            </p>
                        </div>
                        <div class="show_more">
                            <a href="#" class="sbtn">see more</a>
                        </div>
                        <!-- line commments -->
                        <div class="line_div">
                            <div class="line"></div>
                        </div>
                        <div class="view_commets_btn">
                            View all comments
                        </div>
                        <!-- display  post comments -->
                        <div class="show_cmnt">
                            <?php
                            include 'connection.php';
                            $pid = $arraydata['id'];
                            $all_user_comment = "select * from comments where post_id=$pid ORDER BY id DESC";
                            $comment_q = mysqli_query($con, $all_user_comment);
                            while ($c_data = mysqli_fetch_array($comment_q)) {
                                ?>
                                <div class="comment_users">
                                    <div class="c_user_img">
                                        <img src="<?php echo $c_data['user_img']; ?>" alt="">
                                    </div>
                                    <div class="c_comment">
                                        <div class="user_name"><?php echo $c_data['user_name']; ?></div>
                                        <div class="main_comment"><?php echo $c_data['comment']; ?></div>
                                    </div>
                                    <div class="c_three_dot">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </div>
                                </div>
                                <div class="dialauge">
                                    <a href="commentupdate.php?id=<?php echo $c_data['id']; ?>">
                                        <div class="edit_comment">edit</div>
                                    </a>
                                    <a
                                        href="deletemsg.php?id=<?php echo $c_data['id']; ?>&postuseremail=<?php echo urlencode($c_data['p_u_email']); ?>">
                                        <div class="delete_comment">delete</div>
                                    </a>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <!-- make a comment by user -->
                        <div class="c_comment_box">
                            <div class="profile_user_img">
                                <img src="<?php echo $_SESSION['pimg']; ?>" alt="user_img">
                            </div>
                            <div class="input_box_main">
                                <div class="input_box">
                                    <textarea name="com" class="comment_area_main"
                                        placeholder="Comment as <?php echo $namedta['name']; ?>"></textarea>
                                </div>
                                <div class="send_btn_comment" data-post-id="<?php echo $arraydata['id']; ?>"
                                    data-user-name="<?php echo $namedta['name']; ?>"
                                    data-user-img="<?php echo $_SESSION['pimg']; ?>"
                                    data-user-email="<?php echo $_SESSION['pemail']; ?>"
                                    data-postuser-email="<?php echo $arraydata['email']; ?>">
                                    <input type="button" value="send" class="s_b">
                                </div>
                            </div>
                        </div>

                    </div>
                    <hr class="vidline">
                    <?php
                }
                ?>
            </div>
        </form>

        <!-- maildiv -->
        <form action="" method="POST" enctype="multipart/form-data">
            <?php
            include 'connection.php';
            if (isset($_POST['mailsubmit'])) {
                $cname = $_SESSION['name'];
                $cimg = $_SESSION['pimg'];
                $cemail = $_SESSION['pemail'];
                $c_cc_m = nl2br($_POST['umsg']);
                $cmsg = mysqli_real_escape_string($con, $c_cc_m);
                $cmsgdate = date("d-m-y");

                $cmsginsert = "insert into mailtable(name,image,msg,email,msgdate) values('$cname','$cimg','$cmsg','$cemail','$cmsgdate')";
                $cinsertquery = mysqli_query($con, $cmsginsert);
                if ($cinsertquery) {
                    ?>
                    <script>
                        window.location = "home.php";
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        alert("msg not sent");
                    </script>
                    <?php
                }
            }
            ?>

            <div class="mail_div">
                <div class="head_part">Tweet across the whole world</div>
                <div class="form_div">
                    <div class="grp_div">
                        <textarea name="umsg" rows="8" placeholder="comment us" autocomplete="off" required></textarea>
                    </div>
                    <input type="submit" value="send" name="mailsubmit">
                </div>
            </div>

            <!-- show comment -->
            <div class="main_show_div1">
                <div class="heading_show1">FeedHub</div>
                <hr>
                <div class="scroll_div_comment">
                    <?php
                    include 'connection.php';
                    $mailshow = "select * from mailtable order by id desc";
                    $mailshowquery = mysqli_query($con, $mailshow);
                    while ($maildata = mysqli_fetch_array($mailshowquery)) {
                        ?>
                        <div class="show_content1">
                            <div class="subcon1">
                                <div class="profile_img1">
                                    <img src="<?php echo $maildata['image']; ?>" alt="demo img">
                                </div>
                                <div class="userdiv1">
                                    <?php echo $maildata['name']; ?>
                                </div>
                            </div>
                            <div class="msg1">
                                <?php echo $maildata['msg']; ?>
                                <span class="msgdate">
                                    <?php echo $maildata['msgdate']; ?>
                                </span>
                                <div class="icon_div">
                                    <a href="update.php?id=<?php echo $maildata['id']; ?>"><i
                                            class="fa-regular fa-pen-to-square mic"></i></a>
                                    <a href="delete.php?id=<?php echo $maildata['id']; ?>"><i
                                            class="fa-solid fa-trash mic"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
        </form>
    </div>

    <!-- FAQ--section -->
    <div class="faq_box">
        <div class="head">
            <h2>faq</h2>
        </div>
        <div class="sections">
            <details>
                <summary>Connect Verse</summary>
                <p>ConnectVerse is a vibrant open social platform designed to foster meaningful connections and
                    conversations. With its inclusive and user-friendly interface, ConnectVerse invites individuals from
                    diverse backgrounds to engage in discussions,
                    share ideas, and discover like-minded peers.</p>
            </details>
            <details>
                <summary>tweet section</summary>
                <p>In this section anyone can chat globally. that will reflect in comment section</p>
            </details>
            <details>
                <summary>dark mode</summary>
                <p>In ConnectVerse, Dark Mode isn't just a feature; it's a unique experience. Once activated, Dark Mode
                    stays persistent even after refreshing the page, ensuring a consistent and comfortable browsing
                    experience.</p>
            </details>
            <details>
                <summary>community forum</summary>
                <p>In ConnectVerse, commounity forum is a feature where people can ask any question and respectivly
                    other people can answer to it.</p>
            </details>
        </div>
    </div>

    <!-- check user's div -->

    <!-- online offline -->
    <div class="internet_status">
        <div class="status"></div>
    </div>

    </div>


    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script src="darkmode.js"></script>
    <script src="ph_dark.js"></script>
    <script src="online.js"></script>
    <script src="toploader.js"></script>
    <script src="homepreload.js"></script>
    <script src="search.js"></script>
    <script src="like.js"></script>
    <script src="share.js"></script>
    <script src="comments.js"></script>
    <script src="edit_dlt.js"></script>
    <script src="lazy_img.js"></script>
    <script src="notification.js"></script>
    <script src="noti_count.js"></script>
    <script src="show_req.js"></script>
    <script src="accept.js"></script>
    <script>

        // //disable context-menu
        // document.addEventListener('contextmenu', (e)=>{
        //     e.preventDefault();
        // })


        //profile div toggle
        const profilebtn = document.querySelector('.profile');
        const profilebox = document.querySelector('.box');

        profilebtn.onclick = () => {
            profilebox.classList.toggle('active');
        }
        // image file choose
        let imgfile = document.getElementById('fileinput');
        let imgarea = document.querySelector('.img_area');
        let imgarea1 = document.querySelector('.img_area1');
        let uploadbtn = document.querySelector('.upload_btn');
        let icon_div = document.querySelector('.icon_div');
        let dia_head = document.querySelector('.dia_head');
        const video_div = document.querySelector('.video_div');
        const vid_upload = document.querySelector('.vid_upload');
        const vid_des = document.querySelector('.vid_des');
        const backupload_upload = document.querySelector('.backupload_upload_div');

        console.log(imgarea);

        imgfile.addEventListener('change', (e) => {
            uploadbtn.style.display = 'none';
            icon_div.style.display = 'none';
            video_div.style.display = 'block';
            vid_upload.style.display = 'block';
            vid_des.style.display = 'block';

            if (e.target.files.length == 0) {
                return 0;
            }

            // Get the selected file
            const selectedFile = e.target.files[0];
            let tempurl = URL.createObjectURL(selectedFile);

            // Check if a file is selected
            if (selectedFile) {
                // Get the file name
                const fileName = selectedFile.name;

                // Get the file extension
                const fileExtension = fileName.split('.').pop().toLowerCase();

                // Define arrays of image and video file extensions
                const imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp']; // Add more image extensions if needed
                const videoExtensions = ['mp4', 'avi', 'mov', 'mkv', 'wmv']; // Add more video extensions if needed

                // Check if the file extension is in the list of image extensions
                if (imageExtensions.includes(fileExtension)) {
                    // If the file extension is in the list of image extensions, treat it as an image
                    imgarea.setAttribute("src", tempurl);
                    imgarea1.style.display = 'none';
                }
                // Check if the file extension is in the list of video extensions
                else if (videoExtensions.includes(fileExtension)) {
                    imgarea.style.display = 'none';
                    imgarea1.setAttribute("src", tempurl);
                    console.log("Selected file is a video.");
                }
                else {
                    // If the file extension is neither in the list of image extensions nor in the list of video extensions, handle the error
                    console.error('Unsupported file type. Only images and videos are allowed.');
                }
            }
            else {
                // Handle the case where no file is selected
                console.error('No file selected.');
            }

        });

        //----toggle to upload media box---//
        const add_media = document.querySelector('.add_media');
        const mediauploadbox = document.querySelector('.upload_div');
        const maindiv = document.querySelector('.main_div');
        add_media.onclick = () => {
            mediauploadbox.style.display = 'block';
            maindiv.classList.add('main_active');
            backupload_upload.style.display = 'block';
            backupload_upload.classList.add('main_active');
        }

        const cancel_btn = document.querySelector('.cancel_btn');
        cancel_btn.onclick = () => {
            mediauploadbox.style.display = 'none';
            maindiv.classList.remove('main_active');
            backupload_upload.style.display = 'none';
            backupload_upload.classList.remove('main_active');
            // location.reload();
            imgarea.setAttribute("src", '');
            uploadbtn.style.display = 'block';
            vid_upload.style.display = 'none';
            vid_des.style.display = 'none';
            icon_div.style.display = 'block';
            video_div.style.display = 'none';
            imgfile.value = null;
            imgarea.src = null;
            imgarea1.src = null;
            imgarea.style.display = 'block';
            imgarea1.style.display = 'block';
            vid_des.value = null;
        }

        // mail script
        const mail_me = document.querySelector('.mail_me');
        const mail_div = document.querySelector('.mail_div');

        mail_me.onclick = () => {
            mail_div.classList.toggle('mailactive');
        }

        const dp_head = document.querySelector('.dp_head');
        dp_head.onclick = () => {
            location.replace("profile.php");

        }

        //-----------------comments-----------------//
        let commentbtn = document.querySelectorAll('.comments');
        let commentbox = document.querySelector('.main_show_div1');

        // Function to toggle showactive class
        const toggleShowActive = (event) => {
            commentbox.classList.toggle('showactive');
            event.stopPropagation(); // Stop event from propagating to document
        };

        // Function to remove showactive class
        const removeShowActive = () => {
            commentbox.classList.remove('showactive');
        };

        // Add click event listeners to specific comment buttons
        commentbtn[0].addEventListener('click', toggleShowActive);
        commentbtn[2].addEventListener('click', toggleShowActive);

        // Add click event listener to the document
        document.addEventListener('click', removeShowActive);

        // Prevent the comment box from being deactivated when it's clicked
        commentbox.addEventListener('click', (event) => {
            event.stopPropagation();
        });



        //for stroing date ipn comment
        let datedisplay = document.getElementById("ldate");
        let date = new Date().getDate();
        let month = new Date().getMonth();
        let year = new Date().getFullYear();

        console.log(date + "." + month + "." + year);


        //prevent default beheviour of enter btn
        document.getElementById('myForm').addEventListener('keydown', function (event) {
            if (event.key === 'Enter') {
                event.preventDefault();
            }
        });


        //show more in desp
        const desp_chars = document.querySelectorAll('.v_desp');
        const showmore_btns = document.querySelectorAll('.show_more');

        desp_chars.forEach(function (desp_char, index) {
            if (desp_char.textContent.length - 61 > 40) {
                showmore_btns[index].style.display = 'block';
                console.log('big' + desp_char.textContent + 'dd');
                console.log(desp_char.textContent.length);
            } else {
                showmore_btns[index].style.display = 'none';
                console.log('small' + desp_char.textContent + 'dd');
            }

            // Add click event listener to showmore button
            showmore_btns[index].addEventListener('click', function () {
                // Toggle 'active' class on the associated desp_char element
                desp_char.classList.add('active');
                // Hide the clicked showmore button
                this.style.display = 'none';
            });
        });

        //faq
        const faq_btn = document.querySelector('#faq');
        const faq_box = document.querySelector('.faq_box');

        faq_btn.addEventListener('click', () => {
            faq_box.classList.toggle('active');
        })

    </script>
</body>

</html>