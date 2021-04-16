<?php
ob_start();
  include "header.php";
  include "sidebar.php";

 ?>
 
 
 <?php
 require_once "function.php";

    global $db, $email_error, $email, $password, $password_err, $confirmpassword_err, $fullname, $fullname_err, $success, $role, $role_err, $row, $rows, $role_;


   if(isset($_POST['add'])){
       if(CreateAdmin($_POST)){
        //header("location:index.php");
       }
   }

   if(isset($_POST['delete'])){
       if(deleteAdmin($_POST)){
        
       }
   }

         displayAdmin();

?>


    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-laptop"></i>Dashboard</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg">
              <div class="count"></div>
              <div class="title"><h3>Hello, <br><?php echo $_SESSION['fullname'] ?></h3></div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box brown-bg">
              <div class="count"></div>
              <div class="title"><h3><?php echo $_SESSION['email'] ?></h3></div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box dark-bg">
              <div class="count"></div>
              <div class="title"><h3><?php echo $_SESSION['role'] ?></h3></div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box green-bg">
              <i class="fa fa-cubes"></i>
              <div class="count"></div>
              <div class="title"></div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

        </div>
        <!--/.row-->



        <div class="row">
          <div class="col-md-6 portlets">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2><strong>Calendar</strong></h2>
                <div class="panel-actions">
                  <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                </div>

              </div><br><br><br>
              <div class="panel-body">
                <!-- Widget content -->

                <!-- Below line produces calendar. I am using FullCalendar plugin. -->
                <div id="calendar"></div>

              </div>
            </div>

          </div>
            <?php if($_SESSION['role'] === 'superadmin'){ ?>
          <div class="col-md-6 portlets">
            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="pull-left"><h1>Add an Admin</h1></div>
                
                <div class="widget-icons pull-right">
                  <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-body">
                <div class="padd">

                  <div class="form quick-post">
                    <!-- Edit profile form (not working)-->
                    <form class="form-horizontal" action="index.php" id="loginform" method="POST">
                      <!-- Title -->
                      <div class="form-group">
                        <h1 id="result" class="text-light bg-success"><?= $success ?></h1>
                        <label class="control-label col-lg-2" for="title">Full Name</label>
                        <div class="col-lg-10">
                          <input type="text" name="fullname" id="fullname" value="<?= $fullname; ?>" class="form-control">
                          <span class="text-danger"><?php echo $fullname_err; ?></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="title">Email</label>
                        <div class="col-lg-10">
                          <input type="text" value="<?= $email; ?>" name="email" class="form-control" id="email">
                          <span class="text-danger"><?php echo $email_error; ?></span>
                        </div>
                      </div>
                      <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Role</label>
                        <div class="col-lg-10">
                        <select name="role" id="role">
                            <option value="superadmin">SuperAdmin</option>
                              <option value="admin">Admin</option>
                           </select>
                           <span class="text-danger"><?php echo $role_err; ?></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="title">Password</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" name="password" id="password">
                          <span class="text-danger"><?php echo $password_err; ?></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="title">Confirm Password</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" name="confirm_password" id="confirm_password">
                          <span class="text-danger"><?php echo $confirmpassword_err; ?></span>
                        </div>
                      </div>
                      <!-- Buttons -->
                      <div class="form-group">
                        <!-- Buttons -->
                        <div class="col-lg-offset-2 col-lg-9">
                          <button type="submit" name="add" class="btn btn-primary">Add</button>
                        </div>
                      </div>
                    </form>
                  </div>
                 <?php } ?>

                </div>
                <div class="widget-foot">
                  <!-- Footer goes here -->
                </div>
              </div>
            </div>

          </div>

        </div>




        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
               <h3>  Registered Users</h3>
              </header>
              <div class="table-responsive">
                <table class="table table-dark">
                  <thead>
                  <tr>
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <?php if($_SESSION['role'] === 'superadmin'){ ?>
                      <th>Delete</th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <?php foreach($rows as $row){ ?>
                  <tbody>
                    <tr>
                      <td style="color: red;"><?= $row['full_name'] ?></td>
                      <td style="color: red;"><?= $row['email'] ?></td>
                      <td style="color: red;"><?= $row['role'] ?></td>
                      <?php if($_SESSION['role'] === 'superadmin'){ ?>
                      <td>
                        <form action="index.php?id=<?= $row['id'] ?>" method="POST">
                          <button name="delete" class="btn-danger">Delete</button>
                        </form>
                      </td>
                     <?php } ?>
                    </tr>
                  </tbody>
                  <?php } ?>
                </table>
              </div>

            </section>
          </div>
        </div>

          <!--/col-->
          <div class="col-md-3">

            <div class="social-box facebook">
              <i class="fa fa-facebook"></i>
              <ul>
                <li>
                  <strong>256k</strong>
                  <span>friends</span>
                </li>
                <li>
                  <strong>359</strong>
                  <span>feeds</span>
                </li>
              </ul>
            </div>
            <!--/social-box-->
          </div>
          <div class="col-md-3">

            <div class="social-box google-plus">
              <i class="fa fa-google-plus"></i>
              <ul>
                <li>
                  <strong>962</strong>
                  <span>followers</span>
                </li>
                <li>
                  <strong>256</strong>
                  <span>circles</span>
                </li>
              </ul>
            </div>
            <!--/social-box-->

          </div>
          <!--/col-->
          <div class="col-md-3">

            <div class="social-box twitter">
              <i class="fa fa-twitter"></i>
              <ul>
                <li>
                  <strong>1562k</strong>
                  <span>followers</span>
                </li>
                <li>
                  <strong>2562</strong>
                  <span>tweets</span>
                </li>
              </ul>
            </div>
            <!--/social-box-->

          </div>
          <!--/col-->

        </div>


          </div>
        </div><br><br>


        <!-- project team & activity end -->

      </section>
     
      <?php 
        include "footer.php";
      ?>

    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="js/owl.carousel.js"></script>
  <!-- jQuery full calendar -->
  <<script src="js/fullcalendar.min.js"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
    <script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js"></script>
    <script src="assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/xcharts.min.js"></script>
    <script src="js/jquery.autosize.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/gdp-data.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/sparklines.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>


</body>

</html>
