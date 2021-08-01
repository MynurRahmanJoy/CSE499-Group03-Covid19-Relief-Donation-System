<?php 
//session start
session_start();

//db connection
include('config/db_connect.php');
//echo("Hello Joy");

//echo $_SESSION["userName"];
//echo $_SESSION["pass"];


?>
<!--<a href="logout.php">Logout</a>-->

<?php
$userName=$_SESSION["userName"];
//echo $userName;
$query="select * from create_seeker_account where User_Name='".$userName."'limit 1";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
//print_r($row);
//echo $row["Current_Address"];

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Profile</title>
    <link rel="stylesheet" href="seeker_profile.css">
    <link rel='stylesheet' type='text/css' href='css/loginstyle.php' />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Amaranth&display=swap" rel="stylesheet">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TITLE</title>
    <meta name="description" content="DESCRIPTION">
    <link rel="stylesheet" href="style.css">
    <!--Font Awesome-->
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet"> 
    <!--Bootstrap 3-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"> 
    <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>


<body>
 <section>
    <div id="loginnav">
     <nav class="navbar navbar-expand-lg px4">
        <a href="#"class="navbar-brand">
            <span class="font-weight-bold text-uppercase logo">
                Life Shield
            </span>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navBar">
            <span class="toggler-icon">
                <i class="fas fa-bars"></i>
            </span>
        </button>
        <div id="n" class="collapse navbar-collapse" id="navBar">
            <ul class="navbar-nav text-capitalize mx-auto">
                <li class="nav-item">
                    <a href="home.html" class="nav-link">home</a>
                </li>
               <li class="nav-item">
                   <a href="index.html" class="nav-link">Resources</a>
               </li>
               <li class="nav-item">
                   <a href="#" class="nav-link">Services</a>
               </li>
               
            </ul>
        </div>
        <div class="nav-info-items d-none d-lg-flex">
          <!-- single info -->
          <div class="nav-info align-items-center d-flex justify-content-between mx-lg-5">
            <span class="info-icon mx-lg-3">
              <i class="fab fa-whatsapp-square fa-2x app"></i>
            </span>
            <p class="mb-0">+8801*******68 </p>
          </div>
          <!-- single info -->
          </div>
    </nav>
 </div>
</section>

		<div id="container">
            
            <div id="space"></div>
            <div class="info" style="padding-bottom:166px;">
				<p id="profile">SEEKER PROFILE</p>
                <p id="name">Name : <?php echo $_SESSION["userName"]; ?></p>
                <p id="add">Current Address : <?php echo $row["Current_Address"]; ?></p>
				<p id="email">Email : <?php echo $row["Email_ID"]; ?></p>
				<p id="mob">Mobile Number : <?php echo $row["Mobile_Number"]; ?></p>
                <p id="create">Account Created At : <?php echo $row["Created_At"]; ?></p>
            </div>
            <div id="middle" style="margin-top:0px; margin-bottom:0px; margin-left:122px; margin-right:122px">
                <button type="button" class="block">
				<a class="blctxt" href="seek_donation.php" style="text-decoration:none; color:white;font-size:17px;">Seek Donation</a>
				</button>
            </div>

            <hr>
            
            <div id="bodyText">
            
			 	<div id="soc">  
				   <ul class="social-list">
                    <li><a href="#" class="social-icon icon-whitegit">
                      <i class="fab fa-github"></i></a></li>
                     <li><a href="#" class="social-icon icon-whitefb">
                       <i class="fa fa-facebook"></i></a></li>
                       
                      <li><a href="#" class="social-icon icon-whitetw">
                        <i class="fa fa-twitter"></i></a></li>
                     
                       
                	 </ul>
				</div>
				<div>
				</div>
				<button type="button" class="block">
				<a class="blctxt" href="logout.php" style="text-decoration:none; color:white;">Logout</a>
				</button>
            </div>

			<div>
			

		</div>
            
        </div><!--end container-->

    
</body>
</html>
