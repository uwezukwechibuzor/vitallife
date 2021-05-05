
<?php 
require_once "admin/function.php";

global $db, $blog_rows,  $status, $id, $blog_row, $blog_rows_col;
global $db,$id,  $file, $fileName, $fileTmpName, $fileSize, $fileError, $fileType, $fileExt, $fileActualExt, $allowed, $error, $image,  $fileNameNew, $fileDestination, $success, $name, $body, $file_err, $name_error, $body_error, $comments;

global  $search_rows, $row, $search;


display_blog_edit();
display_blogs_col();

if(isset($_POST['comment'])){
  if(comment($_POST)){
   
  }
}

if(isset($_POST['search_blog'])){
  if(blog_search($_POST)){

  }
}
   

display_comments();


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
<li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
<li class="breadcrumb-item"><a href="blog.php">Blog</a></li>
<li class="breadcrumb-item active" aria-current="page">Blog Details</li>
</ol>
</nav>
</div>
</div>
</div>
</div>


<section class="blog-content-area section-padding-100">
<div class="container">
<div class="row justify-content-between">

<div class="col-12 col-lg-8">
<div class="blog-posts-area">

<div class="single-post-details-area">
<div class="post-thumbnail mb-30">
<img src="admin/<?= $blog_row['pic'] ?>" alt="">
</div>
<div class="post-content">
<h2 class="post-title"><?= $blog_row['title'] ?></h2>
<p><?= $blog_row['body'] ?></p>
<blockquote>
<div class="blockquote-text">
<h6> </h6>
<h6><?= $blog_row['author'] ?> - <span><?= $blog_row['created_at'] ?></span></h6>
</div>
</blockquote>
<p></p>
</div>
</div>

<div class="post-tags-share d-flex justify-content-between align-items-center">

<ol class="popular-tags d-flex flex-wrap">
<!-- <li>Tags:</li>
<li><a href="#">Pray,</a></li>
<li><a href="#">Hope,</a></li>
<li><a href="#">Church</a></li> -->
</ol>

<div class="post-share">
<!-- <span>Share:</span>
<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
<a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
<a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
<a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a> -->
</div>
</div>

<div class="comment_area clearfix">

<ol>

<li class="single_comment_area">
<?php if(is_array($comments)){?>
<?php foreach($comments as $row){ ?>

<div class="comment-wrapper d-flex">

<div class="comment-author">
<img src="<?= $row['pic'] ?>" alt="">
</div>

<div class="comment-content">
<span class="comment-date"><?= $row['created_at'] ?></span>
<h5><?= $row['full_name'] ?></h5>
<p><?= $row['body'] ?></p>
<!-- <a href="#">Like</a>
<a href="#">Reply</a> -->
</div>
</div>
<?php } ?>
<?php }else { ?>
<?php } ?>
<ol class="children">
<li class="single_comment_area">

</li>
</ol>
</li>
<li class="single_comment_area">
<div class="comment-wrapper d-flex">


</div>
</li>
</ol>
</div>

<div class="leave-comment-area mt-50 clearfix">
<div class="comment-form">
<h4 class="headline">Leave A Comment</h4>

<div class="contact-form-area">
<form action="single-post.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
<div class="row">
<div class="col-12">
<div class="form-group">
<input type="text" name="full_name" class="form-control" id="contact-name" placeholder="Full Name">
<span class="text-danger"><?= $name_error ?></span>
</div>
</div>
<div class="col-12">
<div class="form-group">
<input type="file" name="file">
</div>
</div>

<div class="col-12">
<div class="form-group">
<textarea class="form-control" name="body" id="message" cols="30" rows="10" placeholder="Comment Here............"></textarea>
<span class="text-danger"><?= $body_error ?></span>
</div>
</div>
<div class="col-12">
<button type="submit" class="btn crose-btn mt-15" name="comment">Post Comment</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>

<div class="col-12 col-sm-9 col-md-6 col-lg-3">
<div class="post-sidebar-area">

<div class="single-widget-area">
<div class="search-form">
<form action="single-post.php?id=<?=$blog_row['id'] ?>" method="post">
<input type="search" name="search" placeholder="Search Here">
<button name="search_blog" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>
</div>
</div>

<div class="single-widget-area">
<div class="widget-title">
<?php if(isset($_POST['search_blog'])){ ?>
<?php if(is_array($search_rows)) { ?>
<p>Searched Results</p>
<?php foreach($search_rows as $row){ ?>
<a href="single-post.php?id=<?=$row['id'] ?>"><?= $row['title'] ?></a> <hr>
<?php } ?>
<?php }else{ ?>
  <h6>No Result Found</h6>
<?php } ?>
<?php } ?>
</div>

</div>

<div class="single-widget-area">

<div class="widget-title">
<h6>Recent News</h6>
</div>

<div class="single-latest-post">
<?php foreach($blog_rows_col as $row){?>
<div class="single-latest-post">
<a href="single-post.php?id=<?= $row['id'] ?>" class="post-title">
<h6><?= $row['title'] ?></h6>
</a>
<p class="post-date"><?= $row['created_at'] ?></p>
</div>
<?php } ?>

</div>

<div class="single-widget-area">

<div class="widget-title">

</div>
<ol class="crose-archives">

</ol>
</div>

<div class="single-widget-area">

<div class="widget-title">
<h6>popular tags</h6>
</div>

<ol class="popular-tags d-flex flex-wrap">
<li><a href="sermons.php">Sermons</a></li>
<li><a href="videos.php">videos</a></li>
<li><a href="livestraming.php">LiveStreaming</a></li>
</ol>
</div>
</div>
</div>
</div>
</div>
</section>


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

<!-- Mirrored from preview.colorlib.com/theme/crose/single-post.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Mar 2021 15:56:59 GMT -->
</html>