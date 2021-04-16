<?php
    
	require_once "function.php";
  global $db,  $file, $fileName, $fileTmpName, $fileSize, $fileError, $fileType, $fileExt, $fileActualExt, $allowed, $error, $image,  $fileNameNew, $fileDestination, $position, $success, $topic, $time, $speaker, $category, $file_err, $topic_error,  $category_error, $speaker_error,
  $file1, $fileName1, $fileTmpName1, $fileSize1, $fileError1, $fileType1, $fileExt1, $fileActualExt1, $allowed1, $error1, $image1,  $fileNameNew1, $fileDestination1, $detail_error, $detail
  , $file2, $fileName2, $fileTmpName2, $fileSize2, $fileError2, $fileType2, $fileExt2, $fileActualExt2, $allowed2, $error2, $image2,  $fileNameNew2, $fileDestination2;



  global $downloads_rows,  $status, $videos_rows, $id, $rows, $row;
  
   
if(isset($_POST['audio'])){
    if(downloads($_POST)){
        
    }
}
if(isset($_POST['audio'])){
  if(delete_audio($_POST)){
      
  }
}


if(isset($_POST['video'])){
    if(downloads_video($_POST)){
        
    }
}

if(isset($_POST['video'])){
    if(delete_video($_POST)){
        
    }
}

display_downloads();
display_downloads_videos();

//echo ini_get('post_max_size');
//echo $fileNameNew2;

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
              <li><i class="fa fa-square-o"></i>Downloads</li>
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
            <span class="text-primary"><?php  ?></span>
            <span class="text-danger"><?php echo $file_err ?></span>
            <form action="downloads.php" method="POST" role="form" class="contactForm" enctype="multipart/form-data">
              <div class="form-group">
                <input type="text" name="topic" class="form-control" placeholder="Topic"/>
              </div>
              <span class="text-danger"><?php echo $topic_error ?></span>
              <div class="form-group">
                <input type="text" class="form-control" name="speaker" placeholder="Speaker" />
                <div class="validation"></div>
              <span class="text-danger"><?php echo $speaker_error ?></span>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="category" placeholder="Category" />
                <div class="validation"></div>
              <span class="text-danger"><?php echo $category_error ?></span>
              </div>
              <!-- <div class="form-group">
                <input type="text" class="form-control" name="detail" placeholder="Details" />
                <div class="validation"></div>
              <span class="text-danger"></span>
              </div> -->
              <span class="text-danger">* upload files in MP4, MP3, WAV, WMA, AAC, M4A, jpg, jpeg, png</span>
              <div class="form-group"><label for="">Upload An Image</label>
                <input type="file" name="file">
              </div>
              <span class="text-danger"><?php echo $file_err ?></span>

              <div class="form-group"><label for="">Upload An Audio/Video</label>
                <input type="file" name="file1">
              </div>
              <span class="text-danger"><?php  echo $file_err?></span>

              <div class="text-center"><button type="submit" name="audio" class="btn btn-primary btn-lg">Add Audio</button></div>
                <hr>
              <div class="text-center"><button type="submit" name="video" class="btn btn-primary btn-lg">Add Video</button></div>
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
                <h3>Downloads - Audios</h3>
              </header>
              <div class="table-responsive">
                <table class="table table-dark">
                  <thead>
                  <tr>
                 <th scope="col">SN</th>
                 <th>Name</th>
                 <th>Topic</th>
                   <th>Speaker</th>
                   <th>Category</th>
                   <th>Time</th>
                   <th scope="col">Pic</th>
                   <th scope="col">Audios</th>
                   <th>Delete</th>
               </tr>
                  </thead>
                  <tbody>
           <?php foreach($downloads_rows as $row){ ?>       
    <tr>
      <th scope="row"><?= $row['id'] ?></th>
      <td style="color: red;" ><?=  $row['audio'] ?></td>
      <td style="color: red;" ><?= $row['topic'] ?></td>
      <td style="color: red;" ><?= $row['speaker'] ?></td>
      <td style="color: red;" ><?= $row['category'] ?></td>
      <td style="color: red;" ><?= $row['time'] ?></td>
      <td><img src="<?= $row['pic'] ?>" alt="" height="50px" width="80px"></td>
      <td>
      <a href="<?= $row['audio'] ?>">
      <audio controls style="width: 150px;">
  <source src="horse.ogg" type="audio/ogg">
  <source src="<?= $row['audio'] ?>" type="audio/mpeg">
Your browser does not support the audio element.
</audio>
</a>
      </td>
       <td>
          <form action="downloads.php?id=<?= $row['id'] ?>" method="POST">
              <button class="btn-danger" name="audio">Delete</button>
          </form>
      </td>
    </tr>
  <?php } ?>
  </tbody>
                </table>
              </div>

            </section>


            <section class="panel">
              <header class="panel-heading">
                <h3>Downloads - Videos</h3>
              </header>
              <div class="table-responsive">
                <table class="table table-dark">
                  <thead>
                  <tr>
                 <th scope="col">SN</th>
                 <th>Name</th>
                 <th>Topic</th>
                   <th>Speaker</th>
                   <th>Category</th>
                   <th>Time</th>
                   <th scope="col">Videos</th>
                   <th>Delete</th>
               </tr>
                  </thead>
                  <tbody>
           <?php foreach($videos_rows as $row){ ?>       
    <tr>
      <th scope="row"><?= $row['id'] ?></th>
      <td style="color: red;" ><?= $row['video'] ?></td>
      <td style="color: red;" ><?= $row['topic'] ?></td>
      <td style="color: red;" ><?= $row['speaker'] ?></td>
      <td style="color: red;" ><?= $row['category'] ?></td>
      <td style="color: red;" ><?= $row['time'] ?></td>
      <td>
      <a href="<?= $row['video'] ?>">
      <video width="210" height="180" controls>
  <source src="<?= $row['video'] ?>" type="video/mp4">
  <source src="movie.ogg" type="video/ogg">
Your browser does not support the video tag.
</video>
</a>

      </td>
       <td>
          <form action="downloads.php?id=<?= $row['id'] ?>" method="POST">
              <button class="btn-danger" name="video">Delete</button>
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

