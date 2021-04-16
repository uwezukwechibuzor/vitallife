<?php
 require_once "admin/function.php";

     global $db, $row, $rows, $gallery_rows, $row, $status, $id;
	global  $events_rows, $status;

 global $db, $download_rows,  $status, $v, $videos_rows;

global $db, $livestreaming_rows,  $status;

    
  display_downloads_index();
  display_downloads_videos_index();

 displayBible();
 display_galleries_index();



display_events_index();

display_liveStreaming_index();

?>

<?php require_once "header.php"; ?>




<section class="hero-area hero-post-slides owl-carousel">

<div class="single-hero-slide bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/vitalife2.jpg); width: 100%; object-fit:cover">

<div class="container">
<div class="row">
<div class="col-12">
<div class="hero-slides-content">
<h2 data-animation="fadeInUp" data-delay="100ms">Building The Hope</h2>
<p data-animation="fadeInUp" data-delay="300ms">Learn about our mission, our beliefs, and the hope we have in Jesus.</p>
<a href="about.php" class="btn crose-btn" data-animation="fadeInUp" data-delay="500ms">About Us</a>
</div>
</div>
</div>
</div>
</div>

<div class="single-hero-slide bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/vitalife1.jpg); width: 100%; object-fit:cover">

<div class="container">
<div class="row">
<div class="col-12">
<div class="hero-slides-content">
<h2 data-animation="fadeInUp" data-delay="100ms">Making Jesus Known</h2>
<p data-animation="fadeInUp" data-delay="300ms">Learn about our mission, our beliefs, and the hope we have in Jesus.</p>
<a href="contact.php" class="btn crose-btn" data-animation="fadeInUp" data-delay="500ms">Contact Us</a>
</div>
</div>
</div>
</div>
</div>

<div class="single-hero-slide bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/vitalife.png); width: 100% object-fit:cover">

<div class="container">
<div class="row">
<div class="col-12">
<div class="hero-slides-content">
<h2 data-animation="fadeInUp" data-delay="100ms">Making Jesus Known</h2>
<p data-animation="fadeInUp" data-delay="300ms">Learn about our mission, our beliefs, and the hope we have in Jesus.</p>
<a href="member.php" class="btn crose-btn" data-animation="fadeInUp" data-delay="500ms">Become A Member</a>
</div>
</div>
</div>
</div>
</div>
</section>


<section class="about-area section-padding-100-0">
<div class="container">
<div class="row">

<div class="col-12">
<div class="section-heading">
<h2>Welcome to Vital Life foundation</h2>
<p>A team of 'Talent-Evangelists' across the world, responding genuinely to the perfect love of God through the 'Art' of worship with their God-given talents & gifts, with a deliberate commitment to 'Soul Winning' for Christ and the advancement of God's Kingdom</p>
<p>Our Vision is Birthing, Building and Reviving Talents and Gifts for the Gospel of Jesus</p>
</div>
</div>
</div>
<div class="row about-content justify-content-center">
<div class="col-12 col-md-6 col-lg-4">
<div class="about-us-content mb-100">
<img src="img/bg-img/3.jpg" alt="" style=" width: 100%; height: 200px; object-fit:cover" >
<div class="about-text">
<!-- <h4>Our Church</h4>
<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
<a href="#">Read More <i class="fa fa-angle-double-right"></i></a> -->
</div>
</div>
</div>

<div class="col-12 col-md-6 col-lg-4">
<div class="about-us-content mb-100">
<img src="img/bg-img/4.jpg" alt="" style=" width: 100%; height: 200px; object-fit:cover" >
<div class="about-text">
<!-- <h4>Our History</h4>
<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
<a href="#">Read More <i class="fa fa-angle-double-right"></i></a> -->
</div>
</div>
</div>

<div class="col-12 col-md-6 col-lg-4">
<div class="about-us-content mb-100">
<img src="img/bg-img/5.jpg" alt="" style=" width: 100%; height: 200px; object-fit:cover" >
<div class="about-text">
<!-- <h4>Our Sermons</h4>
<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
<a href="#">Read More <i class="fa fa-angle-double-right"></i></a> -->
</div>
</div>
</div>
</div>
</div>
</section>


<section class="call-to-action-area section-padding-100 bg-img bg-overlay" style="background-image: url(img/bg-img/6.jpg)">
<div class="container">
<div class="row">
<div class="col-12">
<div class="call-to-action-content text-center">
<h2>What We Do</h2>
<h2>Preaching The Gospel Of Jesus Christ With Our Gifts And Talents <br> We are One Family in Christ</h2>
<a href="member.php" class="btn crose-btn btn-2">Become A Member</a>
</div>
</div>
</div>
</div>
</section>


<section class="latest-sermons-area section-padding-100-0">
<div class="container">
<div class="row">

<div class="col-12">
<div class="section-heading">
<h2>Latest Sermons</h2>
<p>Loaded with fast-paced worship, activities and video teachings</p>
</div>
</div>
</div>
<div class="row justify-content-center">
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


<div class="row justify-content-center">
<?php foreach($videos_rows as $row){ ?>
  <div class="col-12 col-sm-6 col-lg-4">

<div class="single-latest-sermons mb-100">
<div class="sermons-thumbnail">

<video width="100%" height="auto" controls disablePictureInPicture controlsList="nodownload">
  <source src="admin/<?= $row['video'] ?>" type="video/mp4">
Your browser does not support the video tag.
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


</div>

<div class="row justify-content-center">
<?php foreach($livestreaming_rows as $row){ ?>
  <div class="col-12 col-sm-6 col-lg-4">

<div class="single-latest-sermons mb-100">
<div class="sermons-thumbnail">

<iframe width="100%" height="auto"
src="<?= $row['url'] ?>">
</iframe>


<!-- 
<div class="sermons-date">
<h6><span>10</span>MAR</h6>
</div> -->
</div>
<div class="sermons-content">
<!-- <div class="sermons-cata">
<a href="admin/<?= $row['video'] ?>" data-toggle="tooltip" data-placement="top" title="Video"><i class="fa fa-video-camera" aria-hidden="true"></i></a>
  <a href="video.php?file_id=<?= $row['id'] ?>" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-cloud-download" aria-hidden="true"></i></a>

</div> -->
<a href="livestreaming_single.php?id=<?= $row['id'] ?>"><h4><?= $row['topic'] ?></h4></a>
 <div class="sermons-meta-data">
<p><i class="fa fa-user" aria-hidden="true"></i> Sermon From: <span><?= $row['speaker'] ?></span></p>
<!-- <p><i class="fa fa-tag" aria-hidden="true"></i> Categories: <span><?= $row['category'] ?></span></p> -->
<p><i class="fa fa-clock-o" aria-hidden="true"></i><?= $row['time'] ?></span></p>
</div>
</div>
</div>
</div>
<?php } ?>


</div>
</div>
</section>


<section class="about-area section-padding-100-0">
<div class="container">
<div class="row">

<div class="col-12">
<div class="section-heading">
<h2>Bible Reading Strategy</h2>
</div>
</div>
</div>
<div class="row about-content justify-content-center">
<?php foreach($rows as $row){ ?>
<div class="col-12 col-md-6 col-lg-4">
<div class="about-us-content mb-100">
<img src="admin/<?= $row['pic'] ?>" alt="" style="" >
<div class="about-text">
<!-- <h4>Our Church</h4>
<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
<a href="#">Read More <i class="fa fa-angle-double-right"></i></a> -->
</div>
</div>
</div>
<?php } ?>

</div>
</div>
</section>










<section class="upcoming-events-area section-padding-0-100">

<div class="upcoming-events-heading bg-img bg-overlay bg-fixed" style="background-image: url(img/bg-img/1.jpg);">
<div class="container">
<div class="row">

<div class="col-12">
<div class="section-heading text-left white">
<h2>Upcoming Events</h2>
<p>Be sure to visit our Upcoming Events page regularly to get infomartion</p>
</div>
</div>
</div>
</div>
</div>

<div class="upcoming-events-slides-area">
<div class="container">
<div class="row">
<div class="col-12">
<?php foreach($events_rows as $row){ ?>
<div class="single-upcoming-events-area d-flex flex-wrap align-items-center">

<div class="upcoming-events-thumbnail">
<img style=" width: 100%; height: 200px; object-fit:cover" src="admin/<?= $row['pic'] ?>" alt="">
</div>

<div class="upcoming-events-content d-flex flex-wrap align-items-center">
<div class="events-text">
<h4><?= $row['topic'] ?></h4>
<div class="events-meta">
<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i><?= $row['date'] ?></a> <br> <br>
<a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i><?= $row['timing'] ?></a>
<a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><?= $row['address'] ?></a>
</div>
<p><?= $row['details'] ?>.</p>

</div>

<div class="find-out-more-btn">
</div>
</div>

</div>
<?php } ?>



</div>

</div>
</div>
</div>
</div>
</div>
</section>

<section class="blog-area section-padding-100-0">
<div class="container">
<div class="row">

<div class="col-12">
<div class="section-heading">
<h2>Latest News</h2>
<p>Latest information on religion, church, politics revolves around us</p>
</div>
</div>
</div>
<div class="row justify-content-center">

<div class="col-12 col-md-6 col-lg-4">
<div class="single-blog-post mb-100">
<div class="post-thumbnail">
<a href="single-post.html"><img src="img/bg-img/10.jpg" alt=""></a>
</div>
<div class="post-content">
<a href="single-post.html" class="post-title">
<h4>Mexican priest murdered in his church</h4>
</a>
<div class="post-meta d-flex">
<a href="#"><i class="fa fa-user" aria-hidden="true"></i> Luke Coppen</a>
<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> April 23, 2018</a>
</div>
<p class="post-excerpt">The priest, who was also the diocesan judicial vicar, was accosted by the assailant and was involved in a discussion.</p>
</div>
</div>
</div>

<div class="col-12 col-md-6 col-lg-4">
<div class="single-blog-post mb-100">
<div class="post-thumbnail">
<a href="single-post.html"><img src="img/bg-img/11.jpg" alt=""></a>
</div>
<div class="post-content">
<a href="single-post.html" class="post-title">
<h4>A daily guide to what's open in the Catholic Church</h4>
</a>
<div class="post-meta d-flex">
<a href="#"><i class="fa fa-user" aria-hidden="true"></i> Staff Reporter</a>
<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> April 03, 2018</a>
</div>
<p class="post-excerpt">The Liturgy helps us to “rediscover our identity as disciples of the Risen Lord”, Pope Francis said at the Regina Caeli.</p>
</div>
</div>
</div>

<div class="col-12 col-md-6 col-lg-4">
<div class="single-blog-post mb-100">
<div class="post-thumbnail">
<a href="single-post.html"><img src="img/bg-img/12.jpg" alt=""></a>
</div>
<div class="post-content">
<a href="single-post.html" class="post-title">
<h4>The Bishop of Dromore was right to resign.</h4>
</a>
<div class="post-meta d-flex">
<a href="#"><i class="fa fa-user" aria-hidden="true"></i> Lucie Smith</a>
<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> April 15, 2018</a>
</div>
<p class="post-excerpt">God comes to us in free and undeserved favor in the person of Jesus Christ who lived, died, and rose for us that we might belong to God.</p>
</div>
</div>
</div>
</div>
</div>
</section>


<div class="gallery-area d-flex flex-wrap">
<?php foreach($gallery_rows as $row){ ?>
<div class="single-gallery-area">
<a href="admin/<?= $row['pic'] ?>" class="gallery-img" title="<?= $row['pic'] ?>">
<img src="admin/<?= $row['pic'] ?>" alt="" style=" width: 100%; height: 200px; object-fit:cover" >
</a>
</div>
<?php } ?>
</div>

<!-- <section class="subscribe-area">
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
<script defer src="../../../static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"si":10,"rayId":"63385ea32c023e9f","version":"2021.2.0"}'></script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/crose/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Mar 2021 15:56:43 GMT -->
</html>