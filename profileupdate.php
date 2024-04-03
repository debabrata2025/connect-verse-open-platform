<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change profile</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="icon" type="images/png" href="profile.png">
</head>
<body>
<div class="main_div">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>"  method="POST" enctype="multipart/form-data">
<?php
  include 'connection.php';
  if(isset($_POST['submit'])){
    $email = $_SESSION['pemail'];
    $file = $_FILES['pimage'];
    $filename = $file['name'];
    $filepath = $file['tmp_name'];
    $fileerror = $file['error']; 
    if($fileerror == 0){
        $despath = 'pimg/'.$filename;
        move_uploaded_file($filepath,$despath);
        $imgupdate = "update demodata set image='$despath' where email='$email'";
        $imgupdatequery = mysqli_query($con,$imgupdate);
        if($imgupdatequery){
        $imgupdate1 = "update mailtable set image='$despath' where email='$email'";
        $imgupdatequery1 = mysqli_query($con,$imgupdate1);
          if($imgupdatequery1){
            $imgupdate2 = "update main_content set profileimg='$despath' where email='$email'";
            $imgupdatequery2 = mysqli_query($con,$imgupdate2);
          if($imgupdatequery1){
            $_SESSION['pimg'] = $despath;
                ?>
                  <script>
                     alert("profile image updated");
                     location.replace("home.php");
                  </script>
                <?php
             }
          }
        }else{
            ?>
            <script>
              alert("profile img not updated");
            </script>
          <?php 
        }
    }else{
        ?>
        <script>
          alert("error in file");
        </script>
      <?php 
    }
  }
?>
            <div class="box">
                <div class="heading">
                <div class="c_logo">
                        <img src="logo2_prev_ui.png" alt="logo" loading="lazy" width="40">
                    </div>
                    <h2 class="mh">Connect Verse</h2>
                </div>
                <div class="sub_head">
                    <p class="sh">change your profile image</p>
                </div> 
                <div class="profile_image">
                    <img src="<?php echo $_SESSION['pimg']; ?>" alt="profile_image" id="img_area">
                    <input type="file" name="pimage" id="pfile" accept="image/*">
                    <label for="pfile">profile image</label>
                </div>
                <input type="submit" value="change" name="submit">
            </div>
        </form>

        <div class="internet_status">
            <div class="status"></div>
        </div>


    </div>
    <script src="online.js"></script>
<script src="p_change.js"></script>
<script>
    let inputbtn = document.getElementById("pfile");
    let imagearea =document.getElementById("img_area");

    inputbtn.addEventListener('change', (event)=> {
        if(event.target.files.length == 0){
            return 0;
        }
        let tempurl =URL.createObjectURL(event.target.files[0]);
        imagearea.setAttribute("src", tempurl);
    })

    // //disable context-menu
        // document.addEventListener('contextmenu', (e)=>{
        //     e.preventDefault();
        // })
</script>
    
</body>
</html>