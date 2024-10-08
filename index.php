<?php
session_start();
include 'connection.php';
// Check if the user is already logged in via cookies
if (isset($_COOKIE['user_id']) && isset($_COOKIE['email']) && isset($_COOKIE['name']) && isset($_COOKIE['pimg'])) {
    // Set session variables based on cookies
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['pemail'] = $_COOKIE['email'];
    $_SESSION['name'] = $_COOKIE['name'];
    $_SESSION['pimg'] = $_COOKIE['pimg'];

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
    <title>registration</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="icon" type="images/webp" href="p2.webp">
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
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
            <?php
            include 'connection.php';

            function generatePlaceholderImage($name) {
                $initial = strtoupper($name[0]);
                $colors = ['#e74c3c', '#3498db', '#f39c12', '#2ecc71'];
                $backgroundColor = $colors[array_rand($colors)];
                $textColor = '#ffffff'; // White text
            
                // SVG content
                $svg = <<<SVG
            <?xml version="1.0" encoding="UTF-8"?>
            <svg width="200" height="200" xmlns="http://www.w3.org/2000/svg">
                <rect width="100%" height="100%" fill="$backgroundColor"/>
                <text x="50%" y="50%" fill="$textColor" font-size="100" font-family="Arial" text-anchor="middle" alignment-baseline="middle">$initial</text>
            </svg>
            SVG;
            
                // Define the filename and save the SVG content
                $filename = 'pimg/' . uniqid() . '.svg';
                file_put_contents($filename, $svg);
            
                return $filename;
            }            
            
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
            
                // email validation
                $checkemail = "SELECT * FROM demodata WHERE email='$email'";
                $emailquery = mysqli_query($con, $checkemail);
                $emailcount = mysqli_num_rows($emailquery);
            
                if ($emailcount > 0) {
                    $_SESSION['main_alt'] = "Email already used";
                } else {
                    // password validation
                    if ($password === $cpassword) {
                        if ($fileerror == 0) {
                            $destpath = 'pimg/' . $filename;
                            move_uploaded_file($filepath, $destpath);
                        } else {
                            $destpath = generatePlaceholderImage($name);
                        }
                        $insertquery = "INSERT INTO demodata(name, email, phone, password, cpassword, image, status) 
                                        VALUES('$name','$email', '$phone', '$hasspass', '$conhasspass', '$destpath', 'public')";
                        $query = mysqli_query($con, $insertquery);
                        if ($query) {
                            ?>
                            <script>
                                alert("Registration Successful");
                                location.replace("login.php");
                            </script>
                            <?php
                        } else {
                            $_SESSION['main_alt'] = "Registration Failed";
                        }
                    } else {
                        $_SESSION['main_alt'] = "Passwords do not match";
                    }
                }
            }
            ?>
            <div class="box">
                <div class="heading">
                    <div class="c_logo">
                        <img src="logo2_prev_ui.svg" alt="logo" loading="lazy" width="40">
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
                        class="email_user mi" inputmode="email">
                </div>
                <div class="grp_div">
                    <input type="text" name="phone" placeholder="phone no." autocomplete="off" required class="mi" inputmode="numeric">
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

        <div class="internet_status">
            <div class="status"></div>
        </div>
    </div>


    <script src="form.js"></script>
    <script src="online.js"></script>
    <script src="toploader.js"></script>
    <script src="preloader.js"></script>

    <script>
        //disable context-menu
        // document.addEventListener('contextmenu', (e)=>{
        //     e.preventDefault();
        // })
        //disble copy
        // document.addEventListener('selectstart', (e)=>{
        //     e.preventDefault();
        // })

        //online and offline status check
        



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
    </script>
</body>

</html>