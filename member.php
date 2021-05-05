
<?php 
 require_once "admin/function.php";

global $db, $email_error, $email, $phone_err, $fullname, $fullname_err, $success,  $phone, $err, $country, $country_err, $city, $state_err, $state;

if(isset($_POST['submit'])){
    if(member($_POST)){
     
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
<li class="breadcrumb-item active" aria-current="page">Member</li>
</ol>
</nav>
</div>
</div>
</div>
</div>




<div class="contact-form section-padding-0-100">
<div class="container">
<div class="row">

<div class="col-12">
<div class="section-heading">
<h2>Become A Member</h2>
<p>Register Here to be part of vital life foundation membership</p>
</div>
</div>
 </div>
<div class="row">
<div class="col-12">
<h4 style="background-color: white; color:red"><?php echo $success ?></h4>
<h5 style="background-color: white; color:red"><?php echo $err ?></h5>
 
<div class="contact-form-area">
<form action="member.php" method="post">
<div class="row">
<div class="col-12 col-lg-4">
<div class="form-group">
<label for="contact-name">Full Name:</label>
<input name="full_name" type="text" class="form-control" id="contact-name" placeholder="Full Name">
<span style="background-color: white; color:red"><?php echo $fullname_err ?></span>

</div>
</div>
<div class="col-12 col-lg-4">
<div class="form-group">
<label for="contact-email">Email:</label>
<input name="email" type="email" class="form-control" id="contact-email" placeholder="Email">
<span style="background-color: white; color:red"><?php echo $email_error ?></span>
</div>
</div>
<div class="col-12 col-lg-4">
<div class="form-group">
<label for="contact-email">Country:</label>
<input name="country" type="text" class="form-control" id="contact-email" placeholder="Country">
<span style="background-color: white; color:red"><?= $country_err  ?></span>
</div>
</div>
<div class="col-12 col-lg-4">
<div class="form-group">
<label for="contact-email">State:</label>
<input name="state" type="text" class="form-control" id="contact-email" placeholder="State">
<span style="background-color: white; color:red"><?= $state_err ?></span>
</div>
</div>
<div class="col-12 col-lg-4">
<div class="form-group">
<label for="contact-email">City:</label>
<input name="city" type="text" class="form-control" id="contact-email" placeholder="City">
<span style="background-color: white; color:red"><?= $city ?></span>
</div>
</div>

<div class="col-12 col-lg-4">
<div class="form-group">
<label for="contact-number">Phone No:</label>
<input name="phone_no" type="text" class="form-control" id="contact-number" placeholder="Phone number">
<span style="background-color: white; color:red"><?php echo $phone_err ?></span>
</div>
</div>

<div class="col-12 col-lg-4">
<div class="form-group">
<label for="contact-email">List Your Talents:</label>
<input name="talents" type="text" class="form-control" id="contact-email" placeholder="List Your Talents">
<span style="background-color: white; color:red"><? ?></span>
</div>
</div>

<div class="col-12">
<!-- <div class="form-group">
<label for="message">Message*:</label>
<textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
<span style="background-color: white; color:red"></span>
</div> -->
</div>
<div class="col-12 text-center">
<button type="submit" name="submit" class="btn crose-btn mt-15">Submit</button>
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