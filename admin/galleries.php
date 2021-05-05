

<?php
 require_once "function.php";

 
 global $db,  $file, $fileName, $fileTmpName, $fileSize, $fileError, $fileType, $fileExt, $fileActualExt, $allowed, $error, $image,  $fileNameNew, $fileDestination, $fullname, $position, $success;
  
    global $db, $row, $rows, $gallery_rows,  $status, $id;

 display_galleries();

   if(isset($_POST['gallery'])){
       if(galleries($_POST)){
        
       }
   }
   if(isset($_POST['delete'])){
       if(delete_gallery($_POST)){
        
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
              <li><i class="fa fa-square-o"></i>Galleries</li>
            </ol>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-9">
            <div class="recent">
              <h3>Home Page Settings</h3>
              <h5>Upload Images Here, multiple Images can Be added at once</h5>
              <p class="text-danger">Image format 'jpg', 'jpeg', 'png'</p>
            </div>
            <span class="text-primary"><?php echo $success ?></span>
            <span class="text-danger"><?php echo $error ?></span>
            <form action="galleries.php" method="post" role="form" class="contactForm" enctype="multipart/form-data">
              <div class="form-group">
                <input type="file" name="file[]" multiple>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="links" placeholder="Enter Image Description" />
                <div class="validation"></div>
              </div>
              <div class="text-center"><button type="submit" name="gallery" class="btn btn-primary btn-lg">Add</button></div>
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



    <div class="row">
    <div class='container'>
    
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                <h3>Galleries</h3>
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
                  <?php if(is_array($gallery_rows)){ ?>
                  <?php foreach($gallery_rows as $gallery_row){ ?>
    <tr>
      <th scope="row"><?= $gallery_row['id'] ?></th>
      <td><img src="<?= $gallery_row['pic'] ?>" alt="" height="100px" width="150px"></td>
      <td>
          <form action="galleries.php?id=<?php echo $gallery_row['id'] ?>" method="POST">
              <button class="btn-danger" name="delete">Delete</button>
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
