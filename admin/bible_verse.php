<?php
 require_once "function.php";

 
 global $db,  $file, $fileName, $fileTmpName, $fileSize, $fileError, $fileType, $fileExt, $fileActualExt, $allowed, $error, $image,  $fileNameNew, $fileDestination, $fullname, $position, $success;
  
    global $db, $row, $rows, $row, $status, $id;

 displayBible();

   if(isset($_POST['bible'])){
       if(bible_reading($_POST)){
        
       }
   }
   if(isset($_POST['delete'])){
       if(delete_verse($_POST)){
        
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
              <li><i class="fa fa-square-o"></i>Bible Reading Strategy</li>
            </ol>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-9">
            <div class="recent">
              <h3>Home Page Settings</h3>
            </div>
            <span class="text-primary"><?php echo $success ?></span>
            <span class="text-danger"><?php echo $error ?></span>
            <form action="bible_verse.php" method="post" role="form" class="contactForm" enctype="multipart/form-data">
              <div class="form-group">
                <input type="file" name="file">
              </div>
              <div class="text-center"><button type="submit" name="bible" class="btn btn-primary btn-lg">Add</button></div>
            </form>
          </div>

          <div class="col-lg-3">
            <div class="recent">
              <h3></h3>
            </div>
            <div class="">
     
            </div>
          </div>
        </div>
        <!-- page end-->
      </section>
    </section>


<div class="container">
    <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                <h3>Bible Reading Strategy</h3>
              </header>
              <div class="table-responsive">
                <table class="table table-dark">
                  <thead>
                  <tr>
                 <th scope="col">SN</th>
                   <th scope="col">Image</th>
                   <th>Delete</th>
               </tr>
                  </thead>
                  <tbody>
                  <?php foreach($rows as $row){ ?>
    <tr>
      <th scope="row"><?= $row['id'] ?></th>
      <td><img src="<?= $row['pic'] ?>" alt="" height="100px" width="150px"></td>
      <td>
          <form action="bible_verse.php?id=<?php echo $row['id'] ?>" method="POST">
              <button class="btn-danger" name="delete">Delete</button>
          </form>
      </td>
    </tr>
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
