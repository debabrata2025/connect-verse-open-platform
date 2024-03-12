<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="icon" type="images/webp" href="p2.webp">
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
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
            <?php
            include 'connection.php';
            if (isset($_POST['submit'])) {
                $name = mysqli_real_escape_string($con, $_POST['name']);
                $email = mysqli_real_escape_string($con, $_POST['email']);
                $phone = mysqli_real_escape_string($con, $_POST['phone']);
                $password = mysqli_real_escape_string($con, $_POST['password']);
                $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

                // for profile image
                $file = $_FILES['pimage'];
                $filename = $file['name'];
                $filepath = $file['tmp_name'];
                $fileerror = $file['error'];

                // password hashing
                $hasspass = password_hash($password, PASSWORD_BCRYPT);
                $conhasspass = password_hash($cpassword, PASSWORD_BCRYPT);
                $token = bin2hex(random_bytes(15));

                //email validation
                $checkemail = "select * from demodata where email='$email'";
                $emailquery = mysqli_query($con, $checkemail);
                $emailcount = mysqli_num_rows($emailquery);

                if ($emailcount > 0) {
                    $_SESSION['main_alt'] = "email alreay used";
                } else {
                    //password validation
                    if ($password === $cpassword) {
                        if ($fileerror == 0) {
                            $destpath = 'pimg/' . $filename;
                            move_uploaded_file($filepath, $destpath);
                            $insertquery = "insert into demodata(name,email,phone,password,cpassword,image) 
                 values('$name','$email', '$phone', '$hasspass', '$conhasspass', '$destpath')";
                            $query = mysqli_query($con, $insertquery);
                            if ($query) {
                                ?>
                                <script>
                                    alert("sent");
                                    location.replace("login.php");
                                </script>
                                <?php
                            } else {
                                $_SESSION['main_alt'] = "not sent";
                            }
                        } else {
                            $_SESSION['main_alt'] = "upload profile image**";
                        }
                    } else {
                        $_SESSION['main_alt'] = "password not matched";
                    }
                }
            }
            ?>
            <div class="box">
                <div class="heading">
                    <div class="c_logo">
                        <img src="logo2_prev_ui.png" alt="logo" loading="lazy" width="40">
                    </div>
                    <h2 class="mh">connect verse</h2>
                </div>
                <div class="sub_head">
                    <p class="sh">create your free account</p>
                    <p class="main_alt">
                        <?php
                        if (isset($_SESSION['main_alt'])) {
                            echo $_SESSION['main_alt'];
                        } else {
                            echo $_SESSION['main_alt'] = "";
                        }
                        ?>
                    </p>
                </div>
                <div class="profile_image">
                    <img src="p5.webp" alt="profile_image" id="img_area">
                    <input type="file" name="pimage" id="pfile" accept="image/*">
                    <label for="pfile">profile image</label>
                </div>
                <div class="grp_div">
                    <input type="text" name="name" placeholder="name" autocomplete="off" required class="mi">
                </div>
                <div class="grp_div">
                    <input type="text" name="email" placeholder="email" autocomplete="off" required
                        class="email_user mi">
                </div>
                <div class="grp_div">
                    <input type="text" name="phone" placeholder="phone no." autocomplete="off" required class="mi">
                </div>
                <div class="grp_div">
                    <input type="password" name="password" placeholder="password" autocomplete="off" required
                        class="pp mi">
                    <div class="show_pass">
                        <i class="fa-regular fa-eye"></i>
                    </div>
                </div>
                <div class="grp_div">
                    <input type="password" name="cpassword" placeholder="confirm password" autocomplete="off" required
                        class="pip mi">
                    <div class="show_pass">
                        <i class="fa-regular fa-eye sactive"></i>
                    </div>
                </div>
                <input type="submit" value="submit" name="submit">
                <p class="lh">already have an account?<a href="login.php">sign-in</a></p>
            </div>
        </form>
    </div>


    <script src="form.js"></script>
    <script>

        //disable context-menu
        // document.addEventListener('contextmenu', (e)=>{
        //     e.preventDefault();
        // })
        //disble copy
        // document.addEventListener('selectstart', (e)=>{
        //     e.preventDefault();
        // })

        let imgfile = document.getElementById('pfile');
        let imgarea = document.getElementById('img_area');
        imgfile.addEventListener('change', (e) => {
            if (e.target.files.length == 0) {
                return 0;
            }
            let tempurl = URL.createObjectURL(e.target.files[0]);
            imgarea.setAttribute("src", tempurl);
        });
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

        const sactive = document.querySelector('.sactive');
        const inputpip = document.querySelector('.pip');
        inputpip.addEventListener('focus', () => {
            sactive.style.display = "block"
            sactive.addEventListener('click', () => {
                if (inputpip.type == "password") {
                    inputpip.type = 'text';
                } else {
                    inputpip.type = 'password';
                }
            })
        });

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

    </script>
</body>

</html>