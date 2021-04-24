<?php
 require_once "admin/function.php";

     global $db, $row, $rows, $gallery_rows, $row, $status, $id;
	global  $events_rows, $status;

 global $db, $download_rows,  $status, $v, $videos_rows;

global $db, $livestreaming_rows,  $status, $blog_rows;


    
  display_downloads_index();
  display_downloads_videos_index();

 displayBible();
 display_galleries_index();



display_events_index();

display_liveStreaming_index();

display_blogs_index();


?>

<?php require_once "header.php"; ?>


<div class="fb-post" data-href="https://www.facebook.com/20531316728/posts/10154009990506729/" data-width="500"></div>
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
<img src="img/bg-img/ba.jpg" alt="" style=" width: 100%; height: 200px; object-fit:cover" >
<div class="about-text">
<!-- <h4>Our Church</h4>
<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
<a href="#">Read More <i class="fa fa-angle-double-right"></i></a> -->
</div>
</div>
</div>

<div class="col-12 col-md-6 col-lg-4">
<div class="about-us-content mb-100">
<img src="img/bg-img/ba1.jpg" alt="" style=" width: 100%; height: 200px; object-fit:cover" >
<div class="about-text">
<!-- <h4>Our History</h4>
<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
<a href="#">Read More <i class="fa fa-angle-double-right"></i></a> -->
</div>
</div>
</div>

<div class="col-12 col-md-6 col-lg-4">
<div class="about-us-content mb-100">
<img src="img/bg-img/ba2.jpg" alt="" style=" width: 100%; height: 200px; object-fit:cover" >
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


<section class="call-to-action-area section-padding-100 bg-img bg-overlay" style="background-image: url(img/bg-img/ba1.jpg)">
<div class="container">
<div class="row">
<div class="col-12">
<div class="call-to-action-content text-center">
<h2 class="text-primary">What We Do</h2>
<h4 class="text-light">Preaching The Gospel Of Jesus Christ With Our Gifts And Talents <br> We are One Family in Christ</h4>
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
<h2>Latest VLF Uploads</h2>
<p>Loaded with fast-paced worship, activities and video teachings</p>
</div>
</div>
</div>
<div class="row justify-content-center">
<?php if(is_array($download_rows)){ ?>
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
<?php }else{ ?>
    <?php } ?>
</div>


<div class="row justify-content-center">
<?php if(is_array($videos_rows)){ ?>
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
<?php }else{ ?>
    <?php } ?>

</div>

<div class="row justify-content-center">
<?php if(is_array($livestreaming_rows)){ ?>
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
<?php }else{ ?>
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
<?php if(is_array($events_rows)){ ?>
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
<?php }else{ ?>
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
<p>Latest information on religion, church, and your talents</p>
</div>
</div>
</div>
<div class="row justify-content-center">
<?php if(is_array($blog_rows)){ ?>
 <?php foreach($blog_rows as $row){ ?>
<div class="col-12 col-md-6 col-lg-4">
<div class="single-blog-post mb-100">
<div class="post-thumbnail">
<a href="single-post.php?id=<?= $row['id'] ?>"><img src="admin/<?= $row['pic'] ?>" alt=""></a>
</div>
<div class="post-content">
<a href="single-post.php?id=<?= $row['id'] ?>" class="post-title">
<h4><?= $row['title'] ?></h4>
</a>
<div class="post-meta d-flex">
<a href="#"><i class="fa fa-user" aria-hidden="true"></i><?= $row['author'] ?></a>
<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i><?= $row['created_at'] ?></a>
</div>
<p class="post-excerpt"><?= substr($row['body'], 0, 150).'.....' ?></p>
<a href="single-post.php?id=<?= $row['id'] ?>">Read More</a>
</div>
</div>
</div>
<?php } ?>
<?php }else{ ?>
    <?php } ?>

</div>
</div>
</section>


<div class="gallery-area d-flex flex-wrap">
<?php if(is_array($gallery_rows)){ ?>
<?php foreach($gallery_rows as $row){ ?>
<div class="single-gallery-area">
<a href="admin/<?= $row['pic'] ?>" class="gallery-img" title="<?= $row['pic'] ?>">
<img src="admin/<?= $row['pic'] ?>" alt="" style=" width: 100%; height: 200px; object-fit:cover" >
</a>
</div>
<?php } ?>
<?php }else{ ?>
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