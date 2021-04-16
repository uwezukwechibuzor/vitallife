<?php 
  require_once "function.php";
global $db, $id, $emaill, $email_errr, $check, $code, $code_, $code_err, $rows, $row, $resultcheck, $email, $time, $created_at, $mailsent, $passcode, $updatefailed, $failed, $email,  $update, $newPassword,  $newPassword_error, $coding, $emailing, $link;


  if(isset($_POST['resetpassword'])){
     if(resetPassword($_POST)){
       
     }
  }


      if (isset($_POST['setpassword'])) {
          if (setPassword($_POST)) {
          }
      }
                      
      if (isset($_POST['newpass'])) {
          if (newPassword($_POST)) {
          }
      }
                      
        if(isset($_GET['mailsent'])){
          $mailsent = $_GET['mailsent'];
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

  <title>Forgot Password || VitalLifeFoundation</title>

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
  <?php if($check === true || isset($_GET['check'])){ ?>
     <!-- for displaying form to confirm code sent to the user email -->
        <form class="login-form" action="forgotpassword.php?check=<?php echo $_GET['check'] ?>"  method="POST">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <span class="text-danger">Code Expires After 5mins <br></span>
        <span class="text-danger"><?php echo $code_err ?></span>
        <span class="text-primary"><?php echo $mailsent ?></span>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control"  name="code" placeholder="Input Code">
        </div>
        <button class="btn btn-primary btn-lg btn-block" name="setpassword" type="submit">Submit</button>
        <a href="forgotpassword.php">click here if pass code was not sent</a>
      </div>
    </form>

        <?php }elseif($passcode === true || isset($_GET['passcode']) || isset($_GET['email'])) { ?>
            <form class="login-form" action="forgotpassword.php?passcode=<?php echo $_GET['passcode'] ?>&email=<?php echo $_GET['email'] ?>"  method="POST">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <span class="text-danger"><?php echo $newPassword_error ?></span>
        <span class="text-primary"><?php echo $update ?></span>
        <span class="text-primary"><?php echo $link ?></span>
        <span class="text-danger"><?php echo $updatefailed ?></span>
        <span class="text-danger"><?php echo $code_err ?></span>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control"  name="newpassword" placeholder="New Password">
        </div>
        <button class="btn btn-primary btn-lg btn-block" name="newpass" type="submit">Submit</button>
      </div>
    </form>

            <?php }else { ?>
    <form class="login-form" action="forgotpassword.php" method="POST">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <span class="text-danger"><?php echo $email_errr ?></span>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control"  name="email" placeholder="Email">
        </div>
        <span class="text-danger"> </span>
      
  
        <button class="btn btn-primary btn-lg btn-block" name="resetpassword" type="submit">Submit</button>
      </div>
    </form>
  <?php } ?>
       </div>
  
     <?php
       include "footer.php";
     ?>

</body>

</html>