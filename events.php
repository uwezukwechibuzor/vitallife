<?php
    
	require_once "admin/function.php";

	global $db, $rows, $status, $events_rows;


display_events();

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
<li class="breadcrumb-item active" aria-current="page">Event</li>
</ol>
</nav>
</div>
</div>
</div>
</div>


<div class="events-area section-padding-100">
<div class="container">
<div class="row">

<div class="col-12">
<div class="event-search-form mb-50">

</div>
</div>

<div class="col-12">
<div class="events-title">
<h2>Events</h2>
</div>
</div>
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

<div class="col-12">
<div class="pagination-area mt-70">
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

<!-- Mirrored from preview.colorlib.com/theme/crose/events.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Mar 2021 15:56:57 GMT -->
</html>