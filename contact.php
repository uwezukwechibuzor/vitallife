<?php 
 require_once "admin/function.php";
   
global $db, $id, $email, $check, $code, $mailsent, $subject, $message, $err, $fullname, $email_err, $subject_err, $message_err;


if(isset($_POST['contact'])){
    if(contact_us($_POST)){
     
    }
}




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
<li class="breadcrumb-item active" aria-current="page">Contact</li>
</ol>
</nav>
</div>
</div>
</div>
</div>


<div class="map-area mt-30">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22236.40558254599!2d-118.25292394686001!3d34.057682914027104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2z4Kay4Ka4IOCmj-CmnuCnjeCmnOCnh-CmsuCnh-CmuCwg4KaV4KeN4Kav4Ka-4Kay4Ka_4Kar4KeL4Kaw4KeN4Kao4Ka_4Kav4Ka84Ka-LCDgpq7gpr7gprDgp43gppXgpr_gpqgg4Kav4KeB4KaV4KeN4Kak4Kaw4Ka-4Ka34KeN4Kaf4KeN4Kaw!5e0!3m2!1sbn!2sbd!4v1532328708137" allowfullscreen></iframe>
</div>


<section class="contact-area">
<div class="container">
<div class="row">
<div class="col-12">
<div class="contact-content-area">
<div class="row">
<div class="col-12 col-md-4">
<div class="contact-content contact-information">
<h4>Contact</h4>
<p><a href="https://preview.colorlib.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="acc5c2cac382c8c9c9decfdec9cdd8c5dac9eccbc1cdc5c082cfc3c1">Vitalifefoundation&@yahoo.com</a></p>
<p>+2349040236583</p>
</div>
</div>
<div class="col-12 col-md-4">
<div class="contact-content contact-information">
<h4>Address</h4>
<p>12 Uhumwangho Street, Off Okhoro Rd, <br> Benin City, Edo State, Nigeria</p>
</div>
</div>
<div class="col-12 col-md-4">
<div class="contact-content contact-information">
<h4>Opening Hours</h4>
<p>Mon-Sun: 8 Am to 6 Pm</p>
<p></p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


<div class="contact-form section-padding-0-100">
<div class="container">
<div class="row">

<div class="col-12">
<div class="section-heading">
<h2>Leave A Message</h2>
<p>Your email address will not be published. Required fields are marked.</p>
</div>
</div>
 </div>
<div class="row">
<div class="col-12">
<span style="background-color: blue; color:white"><?php echo $mailsent ?></span>
 
<div class="contact-form-area">
<form action="#" method="post">
<div class="row">
<div class="col-12 col-lg-4">
<div class="form-group">
<label for="contact-name">Full Name*:</label>
<input name="full_name" type="text" class="form-control" id="contact-name" placeholder="Full Name">
<span style="background-color: white; color:red"><?php echo $err; ?></span>
</div>
</div>
<div class="col-12 col-lg-4">
<div class="form-group">
<label for="contact-email">Email*:</label>
<input name="email" type="email" class="form-control" id="contact-email" placeholder="Email">
<span style="background-color: white; color:red"><?php echo $email_err; ?></span>
</div>
</div>
<div class="col-12 col-lg-4">
<div class="form-group">
<label for="contact-number">Subject*:</label>
<input name="subject" type="text" class="form-control" id="contact-number" placeholder="Subject">
<span style="background-color: white; color:red"><?php echo $subject_err; ?></span>
</div>
</div>
<div class="col-12">
<div class="form-group">
<label for="message">Message*:</label>
<textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
<span style="background-color: white; color:red"><?php echo $message_err; ?></span>
</div>
</div>
<div class="col-12 text-center">
<button type="submit" name="contact" class="btn crose-btn mt-15">Send Message</button>
</div>
</div>
</form>
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

<!-- Mirrored from preview.colorlib.com/theme/crose/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Mar 2021 15:56:59 GMT -->
</html>