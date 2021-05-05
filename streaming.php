<?php 
 require_once "admin/function.php";

 global $db, $livestreaming, $livestreaming_error, $success, $facebook_rows, $id;
   
display_livestreaming_facebook();


?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preview.colorlib.com/theme/crose/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Mar 2021 15:56:20 GMT -->
<head>
<meta charset="UTF-8">
<meta name="description" content="">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<title>Vital Life Foundation | Home</title>

<link rel="icon" href="img/core-img/vitallife_logo.jpeg">

<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="preloader d-flex align-items-center justify-content-center">

<div class="line-preloader"></div>
</div>

<header class="header-area">

<div class="top-header">
<div class="container">
<div class="row">
<div class="col-12">
<div class="top-header-content d-flex flex-wrap align-items-center justify-content-between">

<div class="top-header-meta d-flex flex-wrap">
 <a href="#" class="open" data-toggle="tooltip" data-placement="bottom" title="8 Am to 6 PM"><i class="fa fa-clock-o" aria-hidden="true"></i> <span>Opening Hours - 8 Am to 6 PM</span></a>

<div class="top-social-info">
<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
<a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
</div>
</div>

<div class="top-header-meta">
<a href="https://preview.colorlib.com/cdn-cgi/l/email-protection#452c2b232a6b2120203726372024312c3320052228242c296b262a28" class="email-address"><i class="fa fa-envelope" aria-hidden="true"></i> <span><span class="__cf_email__" data-cfemail="41282f272e6f25242433223324203528372401262c20282d6f222e2c">Vitalifefoundation@yahoo.com</span></span></a>
<a href="#" class="phone"><i class="fa fa-phone" aria-hidden="true"></i> <span>+2349040236583</span></a>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="crose-main-menu">
<div class="classy-nav-container breakpoint-off">
<div class="container">

<nav class="classy-navbar justify-content-between" id="croseNav">

<a href="index.php" class="nav-brand"><img src="img/core-img/vitallife_logo.jpeg" height="" width="130px" alt=""></a>

<div class="classy-navbar-toggler">
<span class="navbarToggler"><span></span><span></span><span></span></span>
</div>

<div class="classy-menu">

<div class="classycloseIcon">
<div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
</div>

<div class="classynav">
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="about.php">About</a></li>
<li><a href="#">Downloads</a>
<ul class="dropdown">
<li><a href="#">Music</a>
<ul class="dropdown">
<li><a href="sermons.php">Audios</a></li>
<li><a href="video.php">Videos</a></li>
<li><a href="livestreaming.php">YouTube Videos</a></li>
</ul>
</li>

<li><a href="#">General Messages</a>
<ul class="dropdown">
<li><a href="sermons.php">Audios</a></li>
<li><a href="video.php">Videos</a></li>
</ul>
</li>

<li><a href="#">VLF Messages</a>
<ul class="dropdown">
<li><a href="sermons.php">Audios</a></li>
<li><a href="video.php">Videos</a></li>
<li><a href="livestreaming.php">YouTube Videos</a></li>
</ul>
</li>

<li><a href="livestreaming.php">TalkShow</a></li>

<li><a href="#">Movies</a>
<ul class="dropdown">
<li><a href="sermons.php">Videos</a></li>
<li><a href="video.php">YouTube Videos</a></li>
</ul>
</li>

<li><a href="#">Uploads</a>
<ul class="dropdown">
<li><a href="sermons.php">Blogs</a></li>
<li><a href="video.php">Audios</a></li>
<li><a href="video.php">Videos</a></li>
</ul>
</li>
</ul>
</li>

<li><a href="events.php">Events</a></li>
<li><a href="blog.php">Blog</a></li>
<li><a href="blog.php">Upload</a></li>
<li><a href="contact.php">Contact</a></li>
</ul>

<div id="header-search"><i class="fa fa-search" aria-hidden="true"></i></div>

<a href="payform.php" class="btn crose-btn header-btn">Partner With Us</a>
</div>

</div>
</nav>
</div>
</div>
 
<div class="search-form-area">
<div class="container">
<div class="row align-items-center">
<div class="col-12">
<div class="searchForm">
<form action="#" method="post">
<input type="search" name="search" id="search" placeholder="Enter keywords &amp; hit enter...">
<button type="submit" class="d-none"></button>
</form>
<div class="close-icon" id="searchCloseIcon"><i class="fa fa-close" aria-hidden="true"></i></div>
</div>
</div>
</div>
</div>
</div>
</div>
</header>


<div class="breadcrumb-area">
<div class="container">
<div class="row">
<div class="col-12">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php">Home</a></li>
<li class="breadcrumb-item"><a href="livestreaming.php">LiveStreaming</a></li>
<?php if(is_array($facebook_rows)){ ?>
<?php foreach($facebook_rows as $row){ ?>
<iframe src="<?= $row['url'] ?>" width="100%" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
<?php } ?>
<?php }else{ ?>
<?php } ?>
</ol>
</nav>
</div>
</div>
</div>
</div>

<div>
</div>
<br>
<br>
<?php 
require_once "footer.php";
?>


<script src="js/jquery/jquery-2.2.4.min.js"></script>

<script src="js/bootstrap/popper.min.js"></script>

<script src="js/bootstrap/bootstrap.min.js"></script>

<script src="js/plugins/plugins.js"></script>

<script src="js/active.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/crose/sermons-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Mar 2021 15:56:57 GMT -->
</html>