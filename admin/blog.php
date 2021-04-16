


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
              <li><i class="fa fa-square-o"></i>Events</li>
            </ol>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-9">
            <div class="recent">
              <h3>Home Page Settings</h3>
            </div>
            <span class="text-primary"><?php  ?></span>
            <span class="text-primary"><?php  ?></span>
            <span class="text-danger"><?php  ?></span>
            <form action="events.php" method="POST" role="form" class="contactForm" enctype="multipart/form-data">
              <div class="form-group">
                <input type="text" name="topic" class="form-control" placeholder="Topic"/>
              </div>
              <span class="text-danger"><?php ?></span>
              <div class="form-group">
                <input type="text" class="form-control" name="timing" placeholder="Time" />
                <div class="validation"></div>
              <span class="text-danger"><?php ?></span>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="address" placeholder="Address" />
                <div class="validation"></div>
              <span class="text-danger"><?php ?></span>

              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="details" placeholder="Details" />
                <div class="validation"></div>
              </div>
              <span class="text-danger"><?php  ?></span>

              <div class="form-group">
                <input type="file" name="file">
              </div>
              <span class="text-danger"><?php ?></span>

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
                 <th>Topic</th>
                   <th>Time</th>
                   <th>Address</th>
                   <th>Details</th>
                   <th scope="col">Image</th>
                   <th>Delete</th>
               </tr>
                  </thead>
                  <tbody>
                  
    <tr>
      <th scope="row"></th>
      <td style="color: red;" ></td>
      <td style="color: red;" ></td>
      <td style="color: red;" ></td>
      <td style="color: red;" ></td>
      <td><img src="" alt="" height="50px" width="80px"></td>
      <td>
          <form action="events.php" method="POST">
              <button class="btn-danger" name="events">Delete</button>
          </form>
      </td>
    </tr>

  </tbody>
                </table>
              </div>

            </section>
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
