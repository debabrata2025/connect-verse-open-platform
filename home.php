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
        <?php echo "home/" . $_SESSION['name'] ?>
    </title>
    <link rel="stylesheet" href="01.css?v=<?php echo time(); ?>">
    <link rel="icon" type="images/webp" href="p5.webp">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
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
                $vid_desp = mysqli_real_escape_string($con, $_POST['ccdes']);
                $file = $_FILES['media'];
                $p_email = $_SESSION['pemail'];
                // print_r($file);
                $filename = $file['name'];
                $filepath = $file['tmp_name'];
                $fileerror = $file['error'];

                if ($fileerror == 0) {
                    $destpath = 'mainmedia/' . $filename;
                    move_uploaded_file($filepath, $destpath);
                    //same file present or not 
                    $checkname = "select * from main_content where video='$destpath'";
                    $checkquery = mysqli_query($con, $checkname);
                    $videocount = mysqli_num_rows($checkquery);

                    if ($videocount > 0) {
                        ?>
                        <script>
                            alert("post done");
                        </script>
                        <?php
                    } else {
                        // username	profileimg	video	desp
                        $fileinsert = "insert into main_content(username,profileimg,video,desp,email) 
                        values('$username','$profile_img','$destpath','$vid_desp','$p_email')";
                        $iquery = mysqli_query($con, $fileinsert);
                        if ($iquery) {
                            ?>
                            <script>
                                alert("uploaded");
                            </script>
                            <?php
                        } else {
                            ?>
                            <script>
                                alert("not uploaded");
                            </script>
                            <?php
                        }
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
                        <img src="logo2_prev_ui.png" alt="logo" loading="lazy">
                    </a>
                </div>
                <div class="menu">
                    <ul>
                        <li><a href="#top" class="dtext">new-post</a></li>
                        <li class="comments"><a href="#" class="dtext">comments</a></li>
                        <li><a href="activeuse.php" class="dtext">active-user</a></li>
                        <li class="faq"><a href="#" class="dtext" id="faq">faq</a></li>
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
            <div class="main_content" id="top">
                <div class="copy_r"></div>
                <?php
                include 'connection.php';
                $showdata = "select * from main_content";
                $showquery = mysqli_query($con, $showdata);
                while ($arraydata = mysqli_fetch_array($showquery)) {
                    ?>
                    <div class="main_vids">
                        <div class="video_d">
                            <a href="checkprofile.php?useremail=<?php echo $arraydata['email'] ?>">
                                <div class="user_img">
                                    <img src="<?php echo $arraydata['profileimg']; ?>" alt="">
                                </div>
                            </a>
                            <div class="username">
                                <?php echo $arraydata['username']; ?>
                            </div>
                        </div>
                        <div class="content_video">
                            <?php
                            $fileExtension = pathinfo($arraydata['video'], PATHINFO_EXTENSION);
                            if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
                                echo '<img src="' . $arraydata['video'] . '" alt="Image" loading="lazy">';
                            } elseif (in_array($fileExtension, ['mp4', 'mov', 'avi'])) {
                                echo '<video controls>';
                                echo '<source src="' . $arraydata['video'] . '" type="video/mp4">';
                                echo 'Your browser does not support the video tag.';
                                echo '</video>';
                            }
                            ?>
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
                $cmsg = mysqli_real_escape_string($con, $_POST['umsg']);
                $cmsgdate = date("d-m-y");

                $cmsginsert = "insert into mailtable(name,image,msg,email,msgdate) values('$cname','$cimg','$cmsg','$cemail','$cmsgdate')";
                $cinsertquery = mysqli_query($con, $cmsginsert);
                if ($cinsertquery) {
                    ?>
                    <script>
                        alert("msg sent");
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
                <div class="heading_show1">users feddbacks</div>
                <hr>
                <?php
                include 'connection.php';
                $mailshow = "select * from mailtable";
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
                    <p>ConnectVerse is a vibrant open social platform designed to foster meaningful connections and conversations. With its inclusive and user-friendly interface, ConnectVerse invites individuals from diverse backgrounds to engage in discussions,
                         share ideas, and discover like-minded peers.</p>
                </details>
                <details>
                    <summary>what is global chat?</summary>
                    <p>"ConnectVerse Global Chat" is a feature within the ConnectVerse platform that allows users to engage in real-time conversations with people from all over the world. It serves as a virtual meeting place where users can connect
                         with others regardless of geographical boundaries. </p>
                </details>
                <details>
                    <summary>tweet section</summary>
                    <p>In this section anyone can chat globally. that will reflect in comment section</p>
                </details>
                <details>
                    <summary>dark mode</summary>
                    <p>In ConnectVerse, Dark Mode isn't just a feature; it's a unique experience. Once activated, Dark Mode stays persistent even after refreshing the page, ensuring a consistent and comfortable browsing experience.</p>
                </details>
            </div>
        </div>

        <!-- check user's div -->

</div>


    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script src="darkmode.js"></script>
    <script src="ph_dark.js"></script>
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
        let commentbtn = document.querySelector('.comments');
        let commentbox = document.querySelector('.main_show_div1');

        commentbtn.onclick = () => {
            commentbox.classList.toggle('showactive');
        }
        //for stroing date ipn comment
        let datedisplay = document.getElementById("ldate");
        let date = new Date().getDate();
        let month = new Date().getMonth();
        let year = new Date().getFullYear();

        console.log(date + "." + month + "." + year);

        //preloader
        const preloader = document.querySelector('#loader');
        const change_name = document.querySelector('#titleid');
        const arr = ['verse', 'you'];
        let currentIndex = 0;

        change_name.innerHTML = arr[currentIndex];

        const myinterval = setInterval(() => {
            currentIndex = (currentIndex + 1) % arr.length;
            change_name.innerHTML = arr[currentIndex];
            console.log('running');
        }, 1500);

        setTimeout(() => {
            preloader.style.display = 'none';
            clearInterval(myinterval);
        }, 2000);


        //prevent default beheviour of enter btn
        document.getElementById('myForm').addEventListener('keydown', function(event) {
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