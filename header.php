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
<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid blue;
  border-right: 16px solid green;
  border-bottom: 16px solid red;
  border-left: 16px solid pink;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<style>
html {
	background-color: #f3f3f3;
}
.wrapper {
	max-width: 680px;
	margin: 60px auto;
	padding: 0 20px;
}

.youtube {
	background-color: #000;
	margin-bottom: 30px;
	position: relative;
	padding-top: 56.25%;
	overflow: hidden;
	cursor: pointer;
}
.youtube img {
	width: 100%;
	top: -16.82%;
	left: 0;
	opacity: 0.7;
}
.youtube .play-button {
	width: 90px;
	height: 60px;
	background-color: #333;
	box-shadow: 0 0 30px rgba( 0,0,0,0.6 );
	z-index: 1;
	opacity: 0.8;
	border-radius: 6px;
}
.youtube .play-button:before {
	content: "";
	border-style: solid;
	border-width: 15px 0 15px 26.0px;
	border-color: transparent transparent transparent #fff;
}
.youtube img,
.youtube .play-button {
	cursor: pointer;
}
.youtube img,
.youtube iframe,
.youtube .play-button,
.youtube .play-button:before {
	position: absolute;
}
.youtube .play-button,
.youtube .play-button:before {
	top: 50%;
	left: 50%;
	transform: translate3d( -50%, -50%, 0 );
}
.youtube iframe {
	height: 100%;
	width: 100%;
	top: 0;
	left: 0;
}
</style>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script src="https://cdn.tiny.cloud/1/rjz4rocolby78w83ha1pgjx5dyietldhjkc553dsspsrjeub/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

</head>

<body>

<div class="preloader d-flex align-items-center justify-content-center">

<!-- <div class="line-preloader"></div> -->
<!-- <div class="loader"></div> -->
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
<a href="https://web.facebook.com/vitalifefoundation"><i class="fa fa-facebook" aria-hidden="true"></i></a>
<a href="https://twitter.com/VitalLifeFound1"><i class="fa fa-twitter" aria-hidden="true"></i></a>
<a href="https://www.instagram.com/vitalifefoundation/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
<a href="https://www.youtube.com/channel/UCiN7xI7XFlTRStcA4-6elmA"><i class="fa fa-youtube" aria-hidden="true"></i></a>
<a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
</div>
</div>

<div class="top-header-meta">
<a href="mailto:Vitalifefoundation@yahoo.com" class="email-address"><i class="fa fa-envelope" aria-hidden="true"></i> <span><span class="__cf_email__" data-cfemail="41282f272e6f25242433223324203528372401262c20282d6f222e2c">info@vitalifefoundation.ng</span></span></a>
<a href="callto:+2349040236583" class="phone"><i class="fa fa-phone" aria-hidden="true"></i> <span>+2349040236583</span></a>
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

<a href="index" class="nav-brand"><img src="img/core-img/vitallife_logo.jpeg" height="" width="130px" alt=""></a>

<div class="classy-navbar-toggler">
<span class="navbarToggler"><span></span><span></span><span></span></span>
</div>

<div class="classy-menu">

<div class="classycloseIcon">
<div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
</div>

<div class="classynav">
<ul>
<li><a href="index">Home</a></li>
<li><a href="about">About</a></li>
<li><a href="#">Downloads</a>
<ul class="dropdown">
<li><a href="#">Music</a>
<ul class="dropdown">
<li><a href="music_audios">Audios</a></li>
<li><a href="video">Videos</a></li>
<li><a href="youtubemusic">YouTube Videos</a></li>
</ul>
</li>

<li><a href="#">General Messages</a>
<ul class="dropdown">
<li><a href="music_general_audios">Audios</a></li>
<li><a href="videos_general">Videos</a></li>
</ul>
</li>

<li><a href="#">VLF Messages</a>
<ul class="dropdown">
<li><a href="music_vlf_audios">Audios</a></li>
<li><a href="videos_vlf">Videos</a></li>
<li><a href="youtubevlf">YouTube Videos</a></li>
</ul>
</li>

<li><a href="youtubetalkshow">TalkShow</a></li>

<li><a href="#">Movies</a>
<ul class="dropdown">
<li><a href="videosmovies">Videos</a></li>
<li><a href="youtubemovie">YouTube Videos</a></li>
</ul>
</li>

<li><a href="#">Uploads</a>
<ul class="dropdown">
<li><a href="#">Blogs</a></li>
<li><a href="#">Audios/Videos</a></li>
</ul>
</li>
</ul>
</li>

<li><a href="events">Events</a></li>
<li><a href="blog">Blog</a></li>
<li><a href="uploads">Upload</a></li>
<li><a href="contact">Contact</a></li>
</ul>

<div id="header-search"><i class="fa fa-search" aria-hidden="true"></i></div>

<a href="" class="btn crose-btn header-btn" data-toggle="modal" data-target="#myModal1">Partner With Us</a>
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
<form action="search" method="post">
<input type="search" name="search" id="search" placeholder="Enter keywords &amp; hit enter...">
<button type="submit" name="searching" class="d-none"></button>
</form>
<div class="close-icon" id="searchCloseIcon"><i class="fa fa-close" aria-hidden="true"></i></div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php if(is_array($facebook_rows)){ ?>
<marquee behavior="scroll" direction="right"><h6><img src="img/live2.jpg" width="50px" height="50px" alt=""> <a class="text-primary" href="streaming.php">LIVE STREAMING, WATCH HERE</a></h6></marquee>
<?php } ?>
</header>

<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <div class="jumbotron" style="background:green">
     <h5 style="text-transform:uppercase; color:white;">Use the Account Details Below To Partner With US</h5>
          </div>
      </div>
      <div class="modal-body">
        

<p align="justify">Account Name: <b> Vital Life Foundation.</b> </p>
<p align="justify">Account Number: <b>1018183994.</b></p>

<p align="justify">Zenith bank</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>