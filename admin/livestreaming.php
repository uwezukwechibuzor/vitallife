<?php
    
	require_once "function.php";

  global $db,  $file, $fileName, $fileTmpName, $fileSize, $fileError, $fileType, $fileExt, $fileActualExt, $allowed, $error, $image,  $fileNameNew, $fileDestination, $position, $success, $topic, $time, $speaker, $category, $file_err, $topic_error,  $category_error, $speaker_error, $file1, $fileName1, $fileTmpName1, $fileSize1, $fileError1, $fileType1, $fileExt1, $fileActualExt1, $allowed1, $error1, $image1,  $fileNameNew1, $fileDestination1, $url, $url_error;

  global $db, $livestreaming_rows,  $status, $id;



    if(isset($_POST['url_links'])){
       if(liveStreaming($_POST)){
        
       }
   }
    if(isset($_POST['delete_livestreaming'])){
       if(delete_livestreaming($_POST)){
        
       }
   }

    display_liveStreaming();
    

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
              <li><i class="fa fa-square-o"></i>LiveStreaming</li>
            </ol>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-9">
            <div class="recent">
              <h3>Home Page Settings</h3>
            </div>
            <span class="text-primary"><?= $success  ?></span>
            <span class="text-primary"><?  ?></span>
            <form action="livestreaming.php" method="POST" role="form" class="contactForm" enctype="multipart/form-data">
              <div class="form-group">
                <input type="text" name="topic" class="form-control" placeholder="Topic"/>
              </div>
               <span class="text-danger"><?= $topic_error ?></span>
              <div class="form-group">
                <input type="text" class="form-control" name="speaker" placeholder="Speaker" />
                <div class="validation"></div>
               <span class="text-danger"><?= $speaker_error ?></span> 
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="url" placeholder="URL" />
                <div class="validation"></div>
              <span class="text-danger"><?= $url_error ?></span>
              </div>

              <div class="text-center"><button type="submit" name="url_links" class="btn btn-primary btn-lg">Add URL</button></div>
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
    <div class="container">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                <h3>LiveStreaming Url</h3>
              </header>
              <div class="table-responsive">
                <table class="table table-dark">
                  <thead>
                  <tr>
                 <th scope="col">SN</th>
                 <th>Url</th>
                 <th>Topic</th>
                   <th>Speaker</th>
                   <th>Delete</th>
               </tr>
                  </thead>
                  <tbody>
            <?php foreach($livestreaming_rows as $row){ ?>       
    <tr>
      <th scope="row"><?= $row['id'] ?></th>
      <td style="color: red;" ><?= $row['url'] ?></td>
      <td style="color: red;" ><?= $row['topic'] ?></td>
      <td style="color: red;" ><?= $row['speaker'] ?></td>
       <td>
          <form action="livestreaming.php?id=<?= $row['id'] ?>" method="POST">
              <button class="btn-danger" name="delete_livestreaming">Delete</button>
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

