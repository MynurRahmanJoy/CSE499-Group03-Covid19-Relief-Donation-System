<?php

//db connection
include('config/db_connect.php');

//form validation
$User_Name=$fullname='';
$stype='';
$family_member='';
$errors = array('username'=>'','fullname'=>'','stype'=>'','family_member'=>'');

if(isset($_POST['seek'])){
    $User_Name = mysqli_real_escape_string($conn,$_POST['User_Name']);
    $fullname = mysqli_real_escape_string($conn,$_POST['fullname']);
    $stype = mysqli_real_escape_string($conn,$_POST['stype']);
    $family_member = mysqli_real_escape_string($conn,$_POST['family_member']);
 
    //create sql
    $sql="INSERT INTO seek (User_Name,fullname,stype,family_member) VALUES ('$User_Name','$fullname','$stype','$family_member')";


    

    //save to db to check
    if(mysqli_query($conn,$sql)){
        //success
        
        header('Location:thank_you_seeker.php');
    } else{
        //error
        echo 'query error: '.mysqli_error($conn);
    }

}



?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Seek Donation</title>
    <link rel="stylesheet" href="seek_donation.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Amaranth&display=swap" rel="stylesheet">
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
 <div class="container" style="max-width: 650px;padding-bottom:4px">
    <div class="title">Seek Donation</div>
    <div class="content">
      <form action="seek_donation.php" method="POST" style="1086px;">
        <div class="user-details">
          <div class="input-box" >
            <span class="details">User Name</span>
            <input style="width=156%;" type="text" name="User_Name" placeholder="Enter your user name as per registration" required>
          </div>
          <div class="input-box" >
            <span class="details">Full Name</span>
            <input style="width=156%;" type="text" name="fullname" placeholder="Enter your full name" required>
          </div>
        </div>
        <div class="stype-details">
          <input type="radio" name="stype" id="dot-1" value="Money">
          <input type="radio" name="stype" id="dot-2" value="Cloth">
          <input type="radio" name="stype" id="dot-3" value="Dry Food">
          <span class="stype-title">Choose what you seek :</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="stype">Money</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="stype">Cloth</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="stype">Dry Food</span>
            </label>
          </div>
        </div>
        <div class="family_member-details">
          <input type="radio" name="family_member" id="dot-4" value="1-2">
          <input type="radio" name="family_member" id="dot-5" value="3-4">
          <input type="radio" name="family_member" id="dot-6" value="5-6">
          <span class="family_member-title">Number of family members you have :</span>
          <div class="category">
            <label for="dot-4">
            <span class="dot four"></span>
            <span class="family_member">1-2</span>
          </label>
          <label for="dot-5">
            <span class="dot five"></span>
            <span class="family_member">3-4</span>
          </label>
          <label for="dot-6">
            <span class="dot six"></span>
            <span class="family_member">5-6</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="seek" value="Confirm">
        </div>
      </form>
    </div>
  </div>
</section>

     </div>
    </div>
    
</body>
</html>