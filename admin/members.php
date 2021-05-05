<?php

require_once 'function.php';

global $db, $rows, $row, $status;

display_member();




?>


<?php 
      include "header.php";
      include "sidebar.php";
    ?>  


 <!--main content start-->
 <div class="container">
 <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i> Pages</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
              <li><i class="fa fa-bars"></i>Pages</li>
              <li><i class=""></i>Section</li>
              <li><i class="fa fa-square-o"></i>Members</li>
            </ol>
          </div>
        </div>
        <!-- page start-->
   
        <!-- page end-->
      </section>
    </section>


  <div class="container">
  
    <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                <h3>Members</h3>
              </header>
              <div class="table-responsive">
                <table class="table table-dark">
                  <thead>
                  <tr>
                 <th scope="col">SN</th>
                 <th>Full name</th>
                   <th>Email</th>
                   <th>Country</th>
                   <th>State</th>
                   <th>City</th>
                   <th>Talents</th>
                   <th scope="col">Phone No.</th>
                   <th scope="col">Created_at</th>
               </tr>
                  </thead>
                  <tbody>
     <?php if(is_array($rows)){ ?>             
    <?php foreach($rows as $row){ ?>
    <tr>
      <th scope="row"><?= $row['id'] ?></th>
      <td style="color: red;" ><?= $row['full_name'] ?></td>
      <td style="color: red;" ><?= $row['email'] ?></td>
      <td style="color: red;" ><?= $row['country'] ?></td>
      <td style="color: red;" ><?= $row['state'] ?></td>
      <td style="color: red;" ><?= $row['city'] ?></td>
      <td style="color: red;" ><?= $row['talents'] ?></td>
      <td style="color: red;" ><?= $row['phone_no'] ?></td>
      <td style="color: red;" ><?= $row['created_at'] ?></td>
    </tr>
    <?php } ?>
    <?php }else{ ?>
    <?php } ?>
  </tbody>
                </table>
              </div>

            </section>
          </div>
        </div>
</div>

 </div>
    <!--main content end-->
  




 <?php 
      include "footer.php";
    ?>  

</section>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- jquery knob -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>

  <script>
    //knob
    $(".knob").knob();
  </script>
