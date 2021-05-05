<?php
 require_once "admin/function.php";

global $db, $blog_rows;


display_blogs_index();


?>








<footer class="footer-area">

<div class="main-footer-area">
<div class="container">
<div class="row">

<div class="col-12 col-sm-6 col-lg-3">
<div class="single-footer-widget mb-70">
<a href="index.php" class="footer-logo"><p>Vital Life Foundation </p>
<p>Building and Reviving Talents and Gifts for the Gospel of Jesus</p></a>
</div>
</div>

<div class="col-12 col-sm-6 col-lg-3">
<div class="single-footer-widget mb-70">
<h5 class="widget-title">Quick Link</h5>
<nav class="footer-menu">
<ul>
<li><a href="index"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Home</a></li>
<li><a href="events"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Event</a></li>
<li><a href="about"><i class="fa fa-angle-double-right" aria-hidden="true"></i> About Us</a></li>
<li><a href="sermons"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Sermons</a></li>
<li><a href="contact"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Contact</a></li>
<li><a href="blog"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Blogs</a></li>
<li><a href="payform"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Donate</a></li>
</ul>
</nav>
</div>
</div>

<div class="col-12 col-sm-6 col-lg-3">
<div class="single-footer-widget mb-70">
<h5 class="widget-title">News Latest</h5>
<?php if(is_array($blog_rows)){ ?>
<?php foreach($blog_rows as $row){ ?>
<div class="single-latest-news">
<a href="single-post.php?id=<?= $row['id'] ?>"><?= $row['title'] ?></a>
<p><i class="fa fa-calendar" aria-hidden="true"></i> <?= $row['created_at'] ?></p>
</div>
<?php } ?>
<?php }else{ ?>
    <?php } ?>
</div>
</div>

<div class="col-12 col-sm-6 col-lg-3">
<div class="single-footer-widget mb-70">
<h5 class="widget-title">Contact Us</h5>
<div class="contact-information">
<p><i class="fa fa-map-marker" aria-hidden="true"></i>12 Uhumwangho Street, Off Okhoro Rd, Benin City, Edo State, Nigeria</p>
<a href="callto:+2349040236583"><i class="fa fa-phone" aria-hidden="true"></i>+2349040236583</a>
<a href="mailto:Vitalifefoundation @yahoo.com"><i class="fa fa-envelope" aria-hidden="true"></i> <span class="__cf_email__" data-cfemail="a9c0c7cfc687cdccccdbcadbccc8ddc0dfcce9cec4c8c0c587cac6c4">info@vitalifefoundation.ng</span></a>
<p><i class="fa fa-clock-o" aria-hidden="true"></i> Mon - sun: 08.00am - 18.00pm</p>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="copywrite-area">
<div class="container h-100">
<div class="row h-100 align-items-center flex-wrap">

<div class="col-12 col-md-6">
<div class="copywrite-text">
<p>
Copyright &copy;<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved |Powered by <a href="https://danielportfolio.com.ng/" target="_blank">ChiTech Solutions</a>

</p>
</div>
</div>

<div class="col-12 col-md-6">
<div class="footer-social-icon">
<a href="https://web.facebook.com/vitalifefoundation"><i class="fa fa-facebook" aria-hidden="true"></i></a>
<a href="https://twitter.com/VitalLifeFound1"><i class="fa fa-twitter" aria-hidden="true"></i></a>
<a href="https://www.instagram.com/vitalifefoundation/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
<a href="https://www.youtube.com/channel/UCiN7xI7XFlTRStcA4-6elmA"><i class="fa fa-youtube" aria-hidden="true"></i></a>
<a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
</div>
</div>
</div>
</div>
</div>
</footer>
<script>
( function() {

var youtube = document.querySelectorAll( ".youtube" );

for (var i = 0; i < youtube.length; i++) {
    
    var source = "https://img.youtube.com/vi/"+ youtube[i].dataset.embed +"/sddefault.jpg";
    
    var image = new Image();
            image.src = source;
            image.addEventListener( "load", function() {
                youtube[ i ].appendChild( image );
            }( i ) );
    
            youtube[i].addEventListener( "click", function() {

                var iframe = document.createElement( "iframe" );

                        iframe.setAttribute( "frameborder", "0" );
                        iframe.setAttribute( "allowfullscreen", "" );
                        iframe.setAttribute( "src", "https://www.youtube.com/embed/"+ this.dataset.embed +"?rel=0&showinfo=0&autoplay=1" );

                        this.innerHTML = "";
                        this.appendChild( iframe );
            } );	
};

} )();
</script>


<script>
  window.lazyLoadOptions = {
    elements_selector: ".lazy"
  };
</script>
<script
  async
  src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@16.1.0/dist/lazyload.min.js">
</script>