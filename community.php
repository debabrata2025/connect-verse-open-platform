<?php
session_start();
if (!isset ($_SESSION['name'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>community</title>
    <link rel="stylesheet" href="quora.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/png" href="com.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<body>
    <div class="loading-bar"></div>
    <div class="main_div">

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
                    <li class="comments"><a href="#" class="dtext">comments</a></li>
                    <li><a href="activeuse.php" class="dtext">active-user</a></li>
                    <li>
                        <a href="#" class="dtext">
                            <i class="fa-solid fa-circle-half-stroke darkm"></i>
                        </a>
                    </li>
                    <li>
                        <a href="profile.php">
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



        <div class="main_cc">
            <!-- ask question section -->
            <form action="" method="post">
                <?php
                include 'connection.php';
                if (isset ($_POST['q_submit'])) {
                    $qa_a = nl2br($_POST['question_ask']);
                    $question_a = mysqli_real_escape_string($con, $qa_a);
                    $user_nam = $_SESSION['name'];
                    $user_i = $_SESSION['pimg'];
                    $ques_t = $_POST['ques_t'];
                    $q_insert_query = "insert into question(ques,u_nam,u_im,post_a_time) values('$question_a','$user_nam','$user_i','$ques_t')";
                    $iq = mysqli_query($con, $q_insert_query);
                    if ($iq) {
                        ?>
                        <script>
                            console.log("sent");
                            window.location = "community.php";
                        </script>
                        <?php
                    } else {
                        ?>
                        <script>
                            alert("not sent");
                        </script>
                        <?php
                    }
                }


                ?>
                <div class="ask_ques">
                    <div class="user_img">
                        <img src="<?php echo $_SESSION['pimg']; ?>" alt="">
                    </div>
                    <div class="input_grp1">
                        <input type="hidden" name="ques_t" id="q_t_id">
                        <div class="q_area">
                            <textarea name="question_ask"
                                placeholder="What's on your mind, <?php echo $_SESSION['name']; ?>" autofocus
                                autocomplete="off" id="main_textarea" required class="t_a"></textarea>
                        </div>
                        <div class="q_send">
                            <input type="submit" value="post" name="q_submit" class="a_btn">
                        </div>
                    </div>
                </div>
            </form>
            <!-- display qna-->
            <div class="main_con">

                <?php
                include 'connection.php';
                $showques = "select * from question order by qid desc";
                $quesquery = mysqli_query($con, $showques);
                while ($arraydata = mysqli_fetch_array($quesquery)) {
                    ?>
                    <!-- main loops -->
                    <div class="ac_sec">
                        <!-- question div -->
                        <div class="main_sc">

                            <div class="ques_div">
                                <div class="user_det">
                                    <div class="user_ph">
                                        <img src="<?php echo $arraydata['u_im']; ?>" alt="" width="100">
                                    </div>
                                    <div class="u_nam">
                                        <span>
                                            <?php echo $arraydata['u_nam']; ?>
                                        </span>
                                        <input type="hidden" class="ques_time_server"
                                            value="<?php echo $arraydata['post_a_time']; ?>">
                                        <span class="ques_time"></span>
                                    </div>
                                </div>
                                <div class="question">
                                    <h3>
                                        <?php echo $arraydata['ques']; ?>
                                    </h3>
                                </div>
                                <div class="ans_btn">
                                    <span class="material-symbols-outlined">
                                        edit_square
                                    </span>
                                    Answer
                                </div>
                                <form action="" method="post">
                                    <?php
                                    if (isset ($_POST['a_send']) && $_POST['qid'] == $arraydata['qid']) {
                                        $qid = $arraydata['qid'];
                                        $userimg = $_SESSION['pimg'];
                                        $p_time = $_POST['q_post'];
                                        $ans_a = nl2br($_POST['a_area']);
                                        $ans = mysqli_real_escape_string($con, $ans_a);
                                        $username = $_SESSION['name'];
                                        $ans_in = "insert into answer(qid,ans,user_img,u_name, posttime) values('$qid','$ans','$userimg','$username','$p_time')";
                                        $ans_q = mysqli_query($con, $ans_in);
                                        if ($ans_q) {
                                            ?>
                                            <script>
                                                console.log("ans sent");
                                                window.location = "community.php";
                                            </script>
                                            <?php
                                        } else {
                                            ?>
                                            <script>
                                                alert("ans not sent");
                                            </script>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <input type="hidden" name="qid" value="<?php echo $arraydata['qid']; ?>">
                                    <input type="hidden" name="q_post" class="time_inputs">
                                    <div class="ans_area">
                                        <div class="input_section">
                                            <textarea placeholder="write your answer..." class="textarea_a"
                                                name="a_area"></textarea>
                                        </div>
                                        <div class="send_btn">
                                            <input type="submit" value="send" name="a_send" class="s_btn">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- ans div -->
                        <div class="ans_div">
                            <?php
                            $qid = $arraydata['qid'];
                            $answers_query = "select * from answer where qid='$qid'";
                            $answers_result = mysqli_query($con, $answers_query);
                            while ($answer_data = mysqli_fetch_array($answers_result)) {
                                ?>
                                <div class="main_section"><!--loopdiv -->
                                    <div class="user_details">
                                        <div class="user_img">
                                            <img src="<?php echo $answer_data['user_img']; ?>" alt="user_img">
                                        </div>
                                        <div class="user_name">
                                            <?php echo $answer_data['u_name']; ?>
                                        </div>
                                    </div>
                                    <div class="user_ans">
                                        <p>
                                            <?php echo $answer_data['ans']; ?>
                                        </p>
                                        <div class="time_sec">
                                            <input type="hidden" class="get_time_server"
                                                value="<?php echo $answer_data['posttime']; ?>">
                                            <span class="cal_time"></span>
                                        </div>
                                    </div>
                                </div> <!--loopdiv ends-->
                                <?php
                            }
                            ?>

                        </div>
                    </div>
                    <!-- main loop end -->
                    <?php
                }
                ?>

            </div>


        </div>

        <div class="display_popup">
            <span class="alert">sent</span>
        </div>

        <div class="internet_status">
            <div class="status"></div>
        </div>

    </div>


    <script src="online.js"></script>
    <script src="comdark.js"></script>
    <script src="postduration.js"></script>
    <script src="toploader.js"></script>
    <!-- <script src="ph_dark.js"></script> -->
    <script>
        //main ask question height maintain
        //text area height maintain
        const main_textarea = document.getElementById('main_textarea');
        main_textarea.addEventListener('input', function () {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });

        //text area height maintain
        const textareas = document.querySelectorAll('.textarea_a');
        textareas.forEach((ta) => {
            ta.addEventListener('input', function () {
                this.style.height = 'auto';
                this.style.height = this.scrollHeight + 'px';
            });
        })







        //ans write section display

        const ans_btn = document.querySelectorAll('.ans_btn');
        const write_area = document.querySelectorAll('.ans_area');

        ans_btn.forEach((item, index) => {
            item.addEventListener('click', () => {
                write_area[index].classList.toggle('active');
            })
        })

    </script>


</body>

</html>