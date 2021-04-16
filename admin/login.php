<?php
ob_start();
 require_once "function.php";

 global $db, $email, $email_error, $password_hashed, $password, $password_err, $success, $pass, $result, $row, $id, $passcode, $updatefailed, $failed, $email,  $update, $newPassword,  $newPassword_error;


   if(isset($_POST['login'])){
       if(admin_Login($_POST)){
        //header("location:index.php");
       }
   }
   
   if(isset($_POST['logout'])){
    if(logOut($_POST)){
     
    }
  }
   if(isset($_GET['resetpassword'])){
     $update = $_GET['resetpassword'];
   }
 

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/vitallife_logo.jpeg">

  <title>Login Page || VitalLifeFoundation</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body style="background-color: white;">

  <div class="container">
    <form class="login-form" action="login.php" method="POST">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
      <span class="text-success"><?php echo $update; ?></span>

        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control"  name="email" placeholder="Email">
        </div>
        <span class="text-danger"><?php echo $email_error; ?></span>

        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <span class="text-danger"><?php echo $password_err; ?></span>
        <label class="checkbox">
                <span class="pull-right"> <a href="forgotpassword.php"> Forgot Password?</a></span>
            </label>
  
        <button class="btn btn-primary btn-lg btn-block" name="login" type="submit">Login</button>
      </div>
    </form>
       </div>
  
     <?php
       include "footer.php";
     ?>

</body>

</html>


