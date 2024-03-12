<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>user-account</title>
	<link rel="stylesheet" type="text/css" href="02.css?v=<?php echo time();?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="icon" type="images/png" href="active.png">
</head>
<body>
    <div class="main1" id="loader">
        <h1>CONNECT</h1>
        <h2 id="titleid"></h2>
        <div class="dot_div">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>
	<div class="main">
        <div class="head">
            <h2>Active Users</h2>
        </div>
        <div class="btn_div">
        <?php
   include 'connection.php';
   $selectuser = "select * from demodata";
   $userquery = mysqli_query($con, $selectuser);
   while($userdata = mysqli_fetch_array($userquery)){
    ?>
     <a href="checkprofile.php?useremail=<?php echo $userdata['email']?>">
      <div class="btn">
          <img src="<?php echo $userdata['image']; ?>" alt="" loading="lazy">
          <span><?php echo $userdata['name']; ?></span> 
        </div>
     </a>
    <?php
   }
?>
        </div>

	</div>
<script>
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