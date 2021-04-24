
<?php
    
    require_once "admin/function.php";
  
      global $db, $blog_rows,  $status, $id, $blog_row, $blog_rows_col;

  display_blogs();
  display_blogs_col();
  
     
  
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
<li class="breadcrumb-item active" aria-current="page">Blog</li>
</ol>
</nav>
</div>
</div>
</div>
</div>


<div class="blog-area section-padding-100">
<div class="container">
<div class="row justify-content-between">

<div class="col-12 col-lg-8">
<div class="row">
<?php if(is_array($blog_rows)){ ?>
 <?php foreach($blog_rows as $row){?>
<div class="col-12 col-md-6">
<div class="single-blog-post mb-50">
<div class="post-thumbnail">
<a href="single-post.php?id=<?= $row['id'] ?>"><img src="admin/<?= $row['pic'] ?>" alt="" style=" width: 100%; height: 200px; object-fit:cover"></a>
</div>
<div class="post-content">
<a href="single-post.php?id=<?= $row['id'] ?>" class="post-title">
<h4><?= $row['title'] ?></h4>
</a>
<div class="post-meta d-flex">
<a href="#"><i class="fa fa-user" aria-hidden="true"></i><?= $row['author'] ?></a>
<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i><?= $row['created_at'] ?></a>
</div>
<p class="post-excerpt"><?= substr($row['body'], 0, 150).'.......' ?></p>
 <a href="single-post.php?id=<?= $row['id'] ?>">Read More</a>
</div>
</div>
</div>
<?php } ?>
<?php }else{ ?>
    <?php } ?>


</div>
<div class="pagination-area">
<nav aria-label="Page navigation example">
<ul class="pagination">
<!-- <li class="page-item active"><a class="page-link" href="#">1</a></li>
<li class="page-item"><a class="page-link" href="#">2</a></li>
<li class="page-item"><a class="page-link" href="#">3</a></li>
<li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li> -->
</ul>
</nav>
</div>
</div>

<div class="col-12 col-lg-3">
<div class="post-sidebar-area">

<div class="single-widget-area">
<div class="search-form">
<form action="#" method="get">
<input type="search" name="search" placeholder="Search Here">
<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>
</div>
</div>

<div class="single-widget-area">

<div class="widget-title">

</div>

</div>

<div class="single-widget-area">

<div class="widget-title">
<h6>Recent News</h6>
</div>
<?php if(is_array($blog_rows)){ ?>
<?php foreach($blog_rows_col as $row){?>
<div class="single-latest-post">
<a href="single-post.php?id=<?= $row['id'] ?>" class="post-title">
<h6><?= $row['title'] ?></h6>
</a>
<p class="post-date"><?= $row['created_at'] ?></p>
</div>
<?php } ?>
<?php }else{ ?>
    <?php } ?>
</div>

<div class="single-widget-area">

<div class="widget-title">

</div>

</div>

<div class="single-widget-area">

<div class="widget-title">
<h6>popular tags</h6>
 </div>

<ol class="popular-tags d-flex flex-wrap">
<li><a href="sermons.php">Sermons</a></li>
<li><a href="videos.php">Videos</a></li>
<li><a href="livestreaming.php">LiveStreaming</a></li>
</ol>
</div>
</div>
</div>
</div>
</div>
</div>

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

<!-- Mirrored from preview.colorlib.com/theme/crose/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Mar 2021 15:56:57 GMT -->
</html>