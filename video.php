<?php

	require_once "admin/function.php";
	//require_once "videodownload.php";
    global $db, $videos_rows,  $status, $v, $rows, $row;

    
  display_downloads_videos();
  video_downloads();


?>



<?php 
require_once "header.php";
?>


<div class="breadcrumb-area">
<div class="container">
<div class="row">
<div class="col-12">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Music Videos</li>
</ol>
</nav>
</div>
</div>
</div>
</div>


<div class="sermons-content-area section-padding-100-0">
<div class="container">
<div class="row">
<!-- <div class="col-12">
<div class="sermons-content-thumbnail">
</div>
<video width="100%" height="auto" controls disablePictureInPicture controlsList="nodownload">
  <source src"" type="video/mp4">
Your browser does not support the video tag.
</video>

<div class="sermons-text text-center">
<h2>Recent Video</h2>
<h2>Start a New Way of Living</h2>
<div class="sermons-meta-data d-flex flex-wrap justify-content-center">
<p><i class="fa fa-user" aria-hidden="true"></i> Sermon From: <span>Jorge Malone</span></p>
<p><i class="fa fa-tag" aria-hidden="true"></i> Categories: <span>God, Pray</span></p>
<p><i class="fa fa-clock-o" aria-hidden="true"></i> March 10 on <span>9:00 am - 11:00 am</span></p>
</div>
<div class="sermons-cata">
 <a href="#" data-toggle="tooltip" data-placement="top" title="Video"><i class="fa fa-video-camera" aria-hidden="true"></i></a>
<a href="#" data-toggle="tooltip" data-placement="top" title="Audio"><i class="fa fa-headphones" aria-hidden="true"></i></a>
<a href="#" data-toggle="tooltip" data-placement="top" title="Docs"><i class="fa fa-file" aria-hidden="true"></i></a>
<a href="#" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-cloud-download" aria-hidden="true"></i></a>
</div>

<div class="read-more-share d-flex flex-wrap justify-content-between">
<div class="read-more-btn">

</div> -->

<!-- <div class="share">
<span>Share:</span>
<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
<a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
<a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
<a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>
</div> -->
</div>
</div>
</div>
</div>
</div>
</div>


<section class="latest-sermons-area">
<div class="container">
<div class="row">

<div class="col-12">
<div class="section-heading">
<h2>Music Videos</h2>
<!-- <p>Loaded with fast-paced worship, activities, and video teachings to address real issues that students face each day</p> -->
</div>
</div>
</div>
<div class="row">
<?php if(is_array($videos_rows)){ ?>
<?php foreach($videos_rows as $row){ ?>

<div class="col-12 col-sm-6 col-lg-4">

<div class="single-latest-sermons mb-100">
<div class="sermons-thumbnail">

<!-- <video width="100%" height="auto" controls disablePictureInPicture controlsList="nodownload">
  <source src="admin/<?= $row['video'] ?>" type="video/mp4">
Your browser does not support the video tag.
</video> -->

<video
  class="lazy"
  controls
  width="100%"
  data-src="admin/<?= $row['video'] ?>"
  data-poster="admin/<?= $row['pic'] ?>">
  <source type="video/mp4"
      data-src="admin/<?= $row['video'] ?>" />
</video>


<!-- 
<div class="sermons-date">
<h6><span>10</span>MAR</h6>
</div> -->
</div>
<div class="sermons-content">
<div class="sermons-cata">
<a href="admin/<?= $row['video'] ?>" data-toggle="tooltip" data-placement="top" title="Video"><i class="fa fa-video-camera" aria-hidden="true"></i></a>
  <a href="video.php?file_id=<?= $row['id'] ?>" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-cloud-download" aria-hidden="true"></i></a>

</div>
<h4><?= $row['topic'] ?></h4>
 <div class="sermons-meta-data">
<p><i class="fa fa-user" aria-hidden="true"></i> Sermon From: <span><?= $row['speaker'] ?></span></p>
<p><i class="fa fa-tag" aria-hidden="true"></i> Categories: <span><?= $row['category'] ?></span></p>
<p><i class="fa fa-clock-o" aria-hidden="true"></i><?= $row['time'] ?></span></p>
</div>
</div>
</div>
</div>
  <?php } ?>
  <?php }else{ ?>
    <?php } ?>
</div>
</div>
</section>

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

<!-- Mirrored from preview.colorlib.com/theme/crose/sermons.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Mar 2021 15:56:55 GMT -->
</html>