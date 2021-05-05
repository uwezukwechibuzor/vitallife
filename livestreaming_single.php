<?php

	require_once "admin/function.php";
	//require_once "videodownload.php";
  global $db, $livestreaming_row, $livestreaming_rows,  $status, $id;
    

    display_liveStreaming_single();
    
    display_liveStreaming_single_loops();


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
<li class="breadcrumb-item"><a href="">YouTube Details</a></li>
</ol>
</nav>
</div>
</div>
</div>
</div>


<div class="sermons-details-area section-padding-100">
<div class="container">
<div class="row justify-content-between">

<div class="col-12 col-lg-8">
<div class="sermons-details-area">

<div class="single-post-details-area">

<div class="post-content">
<h2 class="post-title mb-30"><?= $livestreaming_row['topic'] ?></h2>

<div class="wrapper">
	<div class="youtube" data-embed="<?= $livestreaming_row['url'] ?>">
		<div class="play-button"></div>
	</div>
</div>

<div class="catagory-share-meta d-flex flex-wrap justify-content-between align-items-center">

</div>

</div>

</div>

<div class="comment_area clearfix">
<ol>

<li class="single_comment_area">
<div class="comment-wrapper d-flex">

<div class="comment-content">

</div>
</div>
</li>
</ol>
</div>

<div class="leave-comment-area mt-50 clearfix">
<div class="comment-form">


<div class="contact-form-area">

</div>
</div>
 </div>
</div>
</div>

<div class="col-12 col-sm-9 col-md-6 col-lg-3">
<div class="post-sidebar-area">

<div class="single-widget-area">
<div class="search-form">

</div>
</div>

<div class="single-widget-area">

<div class="widget-title">
<h6 class="text-primary">Latest Videos</h6>
</div>

<div class="single-latest-post">
<hr>
<?php if(is_array($livestreaming_rows)){ ?>
<?php foreach($livestreaming_rows as $row){ ?>
<a href="livestreaming_single.php?id=<?= $row['id'] ?>"><h6><?= $row['topic'] ?></h6></a>
<hr>
<?php } ?>
<?php }else{ ?>
    <?php } ?>
</div>


</div>
</div>
</div>
</div>
</div>
</div>




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