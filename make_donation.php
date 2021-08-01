<?php

//db connection
include('config/db_connect.php');

//form validation
$User_Name=$fullname=$dtype=$details='';
$errors = array('username'=>'','fullname'=>'','dtype'=>'','details'=>'');

if(isset($_POST['donate'])){
    $User_Name = mysqli_real_escape_string($conn,$_POST['User_Name']);
    $fullname = mysqli_real_escape_string($conn,$_POST['fullname']);
    $dtype = mysqli_real_escape_string($conn,$_POST['dtype']);
    $details = mysqli_real_escape_string($conn,$_POST['details']);
 
    //create sql
    $sql="INSERT INTO donation (User_Name,fullname,dtype,details) VALUES ('$User_Name','$fullname','$dtype','$details')";


    

    //save to db to check
    if(mysqli_query($conn,$sql)){
        //success
        
        header('Location:thank_you.php');
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
    <title>Make Donation</title>
    <link rel="stylesheet" href="make_donation.css">
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
    <div class="title">Make Donation</div>
    <div class="content">
      <form action="make_donation.php" method="POST" style="1086px;">
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
        <div class="dtype-details">
          <input type="radio" name="dtype" id="dot-1" value="Money">
          <input type="radio" name="dtype" id="dot-2" value="Cloth">
          <input type="radio" name="dtype" id="dot-3" value="Dry Food">
          <span class="dtype-title">Choose your donation :</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="dtype">Money</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="dtype">Cloth</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="dtype">Dry Food</span>
            </label>
          </div>
        </div>
        <div class="user-details">
          <div class="input-box">
            <span class="detailss">Donation Details</span>
            <input class="largebox" type="text" name="details" placeholder="Ex: Amount of donation and other details" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="donate" value="Confirm Donation">
        </div>
      </form>
    </div>
  </div>
</section>

     </div>
    </div>
    
</body>
</html>