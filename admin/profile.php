<?php 
  include "header.php";
  include "sidebar.php";
?>

<?php









?>




    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-user-md"></i> Profile</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
              <li><i class="icon_documents_alt"></i>Pages</li>
              <li><i class="fa fa-user-md"></i>Profile</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <!-- profile-widget -->
          <div class="col-lg-12">
            <div class="profile-widget profile-widget-info">
              <div class="panel-body">
                <div class="col-lg-2 col-sm-2">
                  <h4>  <?php echo $_SESSION['fullname']; ?></h4>
                  <div class="follow-ava">
                    <img src="img/vital_icon.png" alt="">
                  </div>
                  <h4>  <?php echo $_SESSION['role']; ?></h4>
                </div>
                <div class="col-lg-4 col-sm-4 follow-info">
                  <h4>  <?php echo $_SESSION['email']; ?></h4>
                  <h3>
                                    <span><i class="icon_clock_alt"></i> <?php echo $_SESSION['time']; ?></span>
                                </h3>
                </div>
                <div class="col-lg-2 col-sm-6 follow-info weather-category">
                  <ul>
                    <li class="active">

                      <i> </i><br>
                     <h1>
                     <form action="login.php" method="POST">
                        <button class="btn btn-danger" name="logout">Logout</button>
                      </form>
                     </h1> 
                    </li>

                  </ul>
                </div>
                <div class="col-lg-2 col-sm-6 follow-info weather-category">
                  <ul>
                    <li class="active">

                      <i class="fa fa-bell fa-2x"> </i><br>
                    </li>

                  </ul>
                </div>
                <div class="col-lg-2 col-sm-6 follow-info weather-category">
                  <ul>
                    <li class="active">

                      <i class="fa fa-tachometer fa-2x"> </i><br> </li>

                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>   
                  </div>
                </div>
              </div>
            </section>
           
          </div>
        </div>

        <!-- page end-->
      </section>
    </section>
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


</body>

</html>
