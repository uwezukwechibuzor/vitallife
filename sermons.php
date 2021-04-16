<?php

	require_once "admin/function.php";
    global $db, $downloads_rows,  $status, $rows, $row;

    
  display_downloads();
  audio_downloads();
   



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
<li class="breadcrumb-item active" aria-current="page">Audios</li>
</ol>
</nav>
</div>
</div>
</div>
</div>


<div class="sermons-content-area section-padding-100-0">
<div class="container">
<div class="row">
<div class="col-12">



<section class="latest-sermons-area">
<div class="container">
<div class="row">

<div class="col-12">
<div class="section-heading">
<h2>Sermons</h2>
<!-- <p>Loaded with fast-paced worship, activities, and video teachings to address real issues that students face each day</p> -->
</div>
</div>
</div>
<div class="row">
<?php foreach($downloads_rows as $row){ ?>
<div class="col-12 col-sm-6 col-lg-4">
<div class="single-latest-sermons mb-100">
<div class="sermons-thumbnail">
<img  src="admin/<?= $row['pic'] ?>" alt="" style=" width: 100%; height: 200px; object-fit:cover">

<!-- <div class="sermons-date">
<h6><span></h6> 
</div> -->
</div>
<div class="sermons-content">
<div class="sermons-cata">

<a href="admin/<?= $row['audio'] ?>" data-toggle="tooltip" data-placement="top" title="Audio"><i class="fa fa-headphones" aria-hidden="true"></i></a>
<a href="sermons.php?file_id=<?= $row['id'] ?>" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-cloud-download" aria-hidden="true"></i></a>
</div>
<h4><?= $row['topic'] ?></h4>
 <div class="sermons-meta-data">
<p><i class="fa fa-user" aria-hidden="true"></i> Sermon From: <span><?= $row['speaker'] ?></span></p>
<p><i class="fa fa-tag" aria-hidden="true"></i> Categories: <span><?= $row['category'] ?></span></p>
<p><i class="fa fa-clock-o" aria-hidden="true"></i><span><?= $row['time'] ?></span></p>
</div>
</div>
</div>
</div>
<?php } ?>

</div>
</div>
</section>

<!-- 
<section class="subscribe-area">
<div class="container">
<div class="row align-items-center">

<div class="col-12 col-lg-6">
<div class="subscribe-text">
<h3>Subscribe To Our Newsletter</h3>
<h6>Subcribe Us And Tell Us About Your Story</h6>
</div>
</div>

<div class="col-12 col-lg-6">
<div class="subscribe-form text-right">
<form action="#">
<input type="email" name="subscribe-email" id="subscribeEmail" placeholder="Your Email">
<button type="submit" class="btn crose-btn">subscribe</button>
</form>
</div>
</div>
</div>
</div>
</section> -->

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