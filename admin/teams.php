<?php
 require_once "function.php";

 
 global $db,  $file, $fileName, $fileTmpName, $fileSize, $fileError, $fileType, $fileExt, $fileActualExt, $allowed, $error, $image,  $fileNameNew, $fileDestination, $fullname, $position, $success;
  
 global $db, $row, $rows, $row, $status, $id;

   displayteams();
  

   if(isset($_POST['add'])){
       if(meet_our_team($_POST)){
        
       }
   }

   if(isset($_POST['delete_team'])){
       if(deleteTeam($_POST)){
        
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
              <li><i class="fa fa-square-o"></i>Meet Our Team</li>
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
            <form action="teams.php" method="post" role="form" class="contactForm" enctype="multipart/form-data">
              <div class="form-group">
                <input type="text" name="fullname" class="form-control" placeholder="Your Full Name"/>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="position" placeholder="Position" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="facebook" placeholder="Enter Your facebook URL" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="twitter" placeholder="Department" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="file" name="file">
              </div>
              <div class="text-center"><button type="submit" name="add" class="btn btn-primary btn-lg">Add</button></div>
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
                <h3>Teams</h3>
              </header>
              <div class="table-responsive">
                <table class="table table-dark">
                  <thead>
                  <tr>
                 <th scope="col">SN</th>
                 <th>Full name</th>
                   <th>Position</th>
                   <th>Department</th>
                   <th scope="col">Image</th>
                   <th>Delete</th>
               </tr>
                  </thead>
                  <tbody>
        <?php if(is_array($rows)){ ?>          
      <?php foreach($rows as $row){ ?>
    <tr>
      <th scope="row"><?php echo $row['id'] ?></th>
      <td style="color: red;" ><?php echo $row['full_name'] ?></td>
      <td style="color: red;" ><?php echo $row['position'] ?></td>
      <td style="color: red;" ><?php echo $row['department'] ?></td>
      <td><img src="<?php echo $row['pic'] ?>" alt="" height="50px" width="80px"></td>
      <td>
          <form action="teams.php?id=<?= $row['id'] ?>" method="POST">
              <button class="btn-danger" name="delete_team">Delete</button>
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
