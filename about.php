<?php 
 require_once "admin/function.php";
global $db, $row, $rows,$gallery_rows, $row, $status;

displayteams();
display_galleries();
  

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
<li class="breadcrumb-item active" aria-current="page">About</li>
</ol>
</nav>
</div>
</div>
</div>
</div>


<div class="about-us-area about-page section-padding-100">
<div class="container">
<div class="row align-items-center justify-content-between">
<div class="col-12 col-lg-5">
<div class="about-content">
<h2>Welcome to Vital Life foundation</h2>
<p>A team of 'Talent-Evangelists' across the world, responding genuinely to the perfect love of God through the 'Art' of worship with their God-given talents & gifts, with a deliberate commitment to 'Soul Winning' for Christ and the advancement of God's Kingdom</p>
<p>Our Vision is Birthing, Building and Reviving Talents and Gifts for the Gospel of Jesus</p>
<div class="opening-hours-location mt-30 d-flex align-items-center">

<div class="opening-hours">
<h6><i class="fa fa-clock-o"></i> Services</h6>
<p>Mon - Fri at 08:00 - 21:00 <br>Sunday at 09:00 - 18:00</p>
</div>

<div class="location">
<h6><i class="fa fa-map-marker"></i> Location</h6>
<p>12 Uhumwangho Street, Off Okhoro Rd, Benin City, Edo State, Nigeria</p>
</div>
</div>
</div>
</div>
<div class="col-12 col-lg-6">
<div class="about-thumbnail">
<img src="img/bg-img/26.jpg" alt="">
</div>
</div>
</div>
</div>
</div>


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


<div class="why-choose-us bg-gray section-padding-100-0">
<div class="container">
<div class="row">

<div class="col-12">
<div class="section-heading">
<h2>Our Vision Scriptures</h2>
<!-- <p>Loaded with fast-paced worship, activities, and video teachings to address real issues that students face each day</p> -->
</div>
</div>
</div>
<div class="row justify-content-center">

<div class="col-12 col-sm-6 col-lg-4">
<div class="single-why-choose-us mb-100">
<img src="img/core-img/why3.png" alt="">
<h4>John 4:23-24</h4>
<p>23 But the hour cometh, and now is when the true worshippers shall worship the father in spirit and in truth: for the father seeketh such to worship him</p>
</div>
</div>

<div class="col-12 col-sm-6 col-lg-4">
<div class="single-why-choose-us mb-100">
<img src="img/core-img/why3.png" alt="">
<h4>John 4:23-24</h4>
<p>24 God is a spirit: and they that worship him must worship him in spirit and in truth</p>

</div>
</div>

<div class="col-12 col-sm-6 col-lg-4">
<div class="single-why-choose-us mb-100">
<img src="img/core-img/why3.png" alt="">
<h4>Matthew 6:33</h4>
<p>33 But seek ye first the kingdom of God, and his righteousness; and all these things shall be added unto you.</p>
</div>
</div>
</div>
</div>
</div>


<div class="team-members-area section-padding-100-0">
<div class="container">
<div class="row">

<div class="col-12">
<div class="section-heading">
<h2>Meet Our Team</h2>
<!-- <p>A brief overview of what you can expect at our worship experiences.</p> -->
</div>
</div>
</div>
<div class="row">
<?php foreach($rows as $row){ ?>

<div class="col-12 col-sm-6 col-lg-3">
<div class="single-team-members text-center mb-100">
<div class="team-thumb" style="background-image: url(admin/<?=$row['pic'] ?>);">
<!-- <div class="team-social-info">
<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
<a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
</div> -->
</div>
<h6><?= $row['full_name'] ?></h6>
<span><?= $row['position'] ?></span>
</div>
</div>
<?php } ?>

</div>
</div>
</div>



<div  class="col-12">
<div class="section-heading">
<h2>Galleries</h2>
<!-- <p>A brief overview of what you can expect at our worship experiences.</p> -->
</div>
</div>

<div class="gallery-area d-flex flex-wrap">
<?php foreach($gallery_rows as $gallery_row){ ?>
<div  class="single-gallery-area thumbnail">
<a href="admin/<?php echo $gallery_row['pic'] ?>" class="gallery-img" title="admin/<?php echo $gallery_row['pic'] ?>">
<div class="thumbnail">
<img style=" width: 100%; height: 200px; object-fit:cover" src="admin/<?php echo $gallery_row['pic'] ?>" alt="Lights"  >
</div>
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

<!-- Mirrored from preview.colorlib.com/theme/crose/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Mar 2021 15:56:55 GMT -->
</html>