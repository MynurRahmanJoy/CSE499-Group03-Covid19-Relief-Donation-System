<?php 

    //login.php
    
    //Include Configuration File
    include('config.php');
    
    $login_button = '';
    
    
    if(isset($_GET["code"]))
    {
    
     $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
    
    
     if(!isset($token['error']))
     {
     
      $google_client->setAccessToken($token['access_token']);
    
     
      $_SESSION['access_token'] = $token['access_token'];
    
    
    
      $google_service = new Google_Service_Oauth2($google_client);
    
     
      $data = $google_service->userinfo->get();
    
     
      if(!empty($data['given_name']))
      {
       $_SESSION['user_first_name'] = $data['given_name'];
      }
    
      if(!empty($data['family_name']))
      {
       $_SESSION['user_last_name'] = $data['family_name'];
      }
    
      if(!empty($data['email']))
      {
       $_SESSION['user_email_address'] = $data['email'];
      }
    
      if(!empty($data['gender']))
      {
       $_SESSION['user_gender'] = $data['gender'];
      }
    
      if(!empty($data['picture']))
      {
       $_SESSION['user_image'] = $data['picture'];
      }
     }
    }
    
    
    if(!isset($_SESSION['access_token']))
    {
     $login_button = '<a href="'.$google_client->createAuthUrl().'">Login With Google</a>';
    }


    //db connection
    include('config/db_connect.php');


    //form validation
    $userName=$mob=$addres=$email=$pass=$created_at='';
    $errors = array('userName'=>'','mob'=>'','addres'=>'','email'=>'','pass'=>'','created_at'=>'');

    if(isset($_POST['create'])){

    //check username
      if(empty($_POST['userName'])){
        $errors['userName'] = "Warning : User name is required ";
    }
    else{
        $userName = $_POST['userName'];
        if(!preg_match('/^[a-zA-Z0-9_]*$/', $userName)){  
            $errors['userName'] = 'Warning : User name must be alphanumeric only';
        }
        //echo htmlspecialchars($_POST['email']); //htmlspecialchars is used for security so that others can not do anything to our website's form fields
        
    }

    // check password
    if(empty($_POST['pass'])){
    $errors['pass'] = 'Warning : Password is required';
    } 
    else{
    $pass = $_POST['pass'];
    if(!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $pass)) {
        // tell the user something went wrong
        $errors['pass'] = 'Warning : Password must be a minimum of 8 characters,at least 1 number,at least 1 uppercase and lowercase character';
      }

    }
    //check email
    if(empty($_POST['email'])){
        $errors['email'] = 'Warning : Email is required';
    }
    else{
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Warning : Email must be a valid email address';
        }
        //echo htmlspecialchars($_POST['email']); //htmlspecialchars is used for security so that others can not do anything to our website's form fields
        
    }

    //check address
    if(empty($_POST['addres'])){
        $errors['addres'] = "Warning : Address is required ";
    }
    else{
        $addres = $_POST['addres'];
        if(!preg_match('/^[A-Za-z0-9\.\-\s\,]+$/', $addres)){
            $errors['addres'] = 'Warning : Address must contain letters and numbers only';
        }
        //echo htmlspecialchars($_POST['email']); //htmlspecialchars is used for security so that others can not do anything to our website's form fields
        
    }


    //check mobile
    if(empty($_POST['mob'])){
        $errors['mob'] = 'Warning : Mobile number is required';
    }
    else{
        $mob = $_POST['mob'];
        if(!preg_match('/^[0-9]+$/', $mob)){
            $errors['mob'] = 'Warning : Must be 11 digit mobile number';
        }
        //echo htmlspecialchars($_POST['email']); //htmlspecialchars is used for security so that others can not do anything to our website's form fields
        
    }
    


    if(array_filter($errors)){
        //echo 'Errors in form';
    } else {
        $userName = mysqli_real_escape_string($conn,$_POST['userName']);
        $mob = mysqli_real_escape_string($conn,$_POST['mob']);
        $addres = mysqli_real_escape_string($conn,$_POST['addres']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $pass = mysqli_real_escape_string($conn,$_POST['pass']);
     
        //create sql
        $sql="INSERT INTO create_account (User_Name,Mobile_Number,Current_Address,Email_ID,Password) VALUES ('$userName','$mob','$addres','$email','$pass')";
        

        //save to db to check
        if(mysqli_query($conn,$sql)){
            //success
            header('Location: login.php');
        } else{
            //error
            echo 'query error: '.mysqli_error($conn);
        }

    }







    }

  


    
?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Signup</title>
    <link rel="stylesheet" href="signup.css">
    <link rel='stylesheet' type='text/css' href='css/loginstyle.php' />
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
</section>
    <div class="login-page">
     <div class="form">
        <form action="signup.php" class="register-form" method="POST">
            <!--User name-->
            <input type="text" name="userName"  placeholder="User Name" value="<?php echo htmlspecialchars ($userName) ?>">
            <div class="error_text"><?php echo $errors['userName']; ?></div>
            
            <!--Mobile Number-->
            <input type="text" name="mob"  placeholder="Mobile Number" value="<?php echo htmlspecialchars ($mob) ?>">
            <div class="error_text"><?php echo $errors['mob']; ?></div>
           
            <!--ressress-->
            <input type="text" name="addres"  placeholder="Current Address" value="<?php echo htmlspecialchars ($addres) ?>">
            <div class="error_text"><?php echo $errors['addres']; ?></div>
            
            <!--Email ID-->
            <input type="text" name="email"  placeholder="Email ID" value="<?php echo htmlspecialchars ($email) ?>">
            <div class="error_text"><?php echo $errors['email']; ?></div>
            
            <!--Password-->
            <input type="password" name="pass"  placeholder="Password" value="<?php echo htmlspecialchars ($pass) ?>">
            <div class="error_text"><?php echo $errors['pass']; ?></div>

            
            <div class="center">
            <button type="submit" name="create" value="create">Create</button>
            </div>
            <!--<button>Create</button>-->
            <p class="message"> <b> Already Registered?</b> <a href="login.php">Login</a>
            </p>
            
        </form>

        <!--<form class="login-form">
            <input type="text" placeholder="User Name"/>
            <input type="text" placeholder="Password"/>
            <button>login</button>
            <div id=lgb> 
             <?php
             if(!isset($_SESSION['access_token']))
             {
             $login_button = '<a href="'.$google_client->createAuthUrl().'">Login With Google';
             }
             ?>
             <br>
             <div class="container">
              <div class="panel panel-default">
              <?php 
                if($login_button == '')
                {
                 echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
                 echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
                 echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
                 echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
                 echo '<h3><a href="logout.php">Logout</h3></div>';
                }
               else
                {
                 echo '<div align="center">'.$login_button . '</div>';
                }
               ?>
              </div> 
             </div>
            </div>
            <p class="message"> <b>Not Registered?</b> <a href="signup.php">Register</a></p>
        </form>-->
        
        

     </div>
    </div>
    

   <!-- <script src='https://code.jquery.com/jquery-3.5.1.min.js'>
    </script>
    <script>
        $('.message a').click(function(){
        $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
        });
    </script>-->
    
</body>
</html>