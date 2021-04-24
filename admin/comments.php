<?php

require_once 'function.php';

global $db, $rows, $row, $status, $id;

display_comment_admin();

if(isset($_POST['delete_comments'])){
    if(delete_comments($_POST)){

    }
}


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
              <li><i class="fa fa-square-o"></i>Comments</li>
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
                <h3>Comments from Blog Page</h3>
              </header>
              <div class="table-responsive">
                <table class="table table-dark">
                  <thead>
                  <tr>
                 <th scope="col">SN</th>
                 <th>Full name</th>
                   <th>Comments</th>
                   <th>Image</th>
                   <th scope="col">Created_at</th>
                   <th scope="col">Delete</th>
               </tr>
                  </thead>
                  <tbody>
         <?php if(is_array($rows)){ ?>         
    <?php foreach($rows as $row){ ?>
    <tr>
      <th scope="row"><?= $row['id'] ?></th>
      <td style="color: red;" ><?= $row['full_name'] ?></td>
      <td style="color: red;" ><?= $row['body'] ?></td>
      <td><img src="../<?= $row['pic'] ?>" alt="" height="90px" width="90px"></td>
      <td style="color: red;" ><?= $row['created_at'] ?></td>
      <td>
        <form action="comments.php?id=<?= $row['id'] ?>" method="post">
        <button class="text-danger" name="delete_comments">Delete</button>
        </form>
      </td>
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
