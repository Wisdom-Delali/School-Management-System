<?php include 'header.php'?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
          <?php
              $total = mysql_query("SELECT SUM(amount) as total FROM fee_payment WHERE month(date)=month(CURRENT_DATE())");
              $row = mysql_fetch_array($total);
              $sum = $row['total'];
?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Income for <?php echo date('F Y'); ?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><span>&#8373;</span><?php echo $sum; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-money-bill-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
            ?>

<?php
              $total = mysql_query("SELECT SUM(amount) as total FROM fee_payment WHERE year(date)=year(CURRENT_DATE())");
              $row = mysql_fetch_array($total);
              $sum = $row['total'];
?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Income for <?php echo date('Y'); ?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><span>&#8373;</span><?php echo $sum; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-money-bill-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
            ?>

            
<?php
$total_members = mysql_query("select * from student where stu_status=1")or die(mysql_error());
$count = mysql_num_rows($total_members);
?>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total students</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $count; ?></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-male fa-2x text-gray-300"></i>
                      <i class="fas fa-female fa-2x text-gray-300"></i>                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
            ?>
            <?php
              $incomemonth = mysql_query("SELECT SUM(balance) as total FROM student WHERE stu_status='1' ");
              $row = mysql_fetch_array($incomemonth);
              $income = $row['total'];

         
?>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Debtors</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><span>&#8373;</span><?php echo $income; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-money-bill-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
            ?>



          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Current Class Size</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    





                  <?php
								
                $year1 = mysql_query("SELECT * FROM student WHERE class_id=1 AND stu_status=1");
                $Year1 = mysql_num_rows($year1);

                $year2 = mysql_query("SELECT *  FROM student WHERE class_id=2 AND stu_status=1");
                $Year2 = mysql_num_rows($year2);

                $year3 = mysql_query("SELECT *  FROM student WHERE class_id=3 AND stu_status=1");
                $Year3 = mysql_num_rows($year3);

                $year4 = mysql_query("SELECT *  FROM student WHERE class_id=4 AND stu_status=1");
                $Year4 = mysql_num_rows($year4);

                $year5 = mysql_query("SELECT *  FROM student WHERE class_id=5 AND stu_status=1");
                $Year5 = mysql_num_rows($year5);

                $year6 = mysql_query("SELECT *  FROM student WHERE class_id=6 AND stu_status=1");
                $Year6 = mysql_num_rows($year6);

                $year7 = mysql_query("SELECT *  FROM student WHERE class_id=7 AND stu_status=1");
                $Year7 = mysql_num_rows($year7);

                $year8 = mysql_query("SELECT *  FROM student WHERE class_id=8 AND stu_status=1");
                $Year8 = mysql_num_rows($year8);

                $year9 = mysql_query("SELECT *  FROM student WHERE class_id=9 AND stu_status=1");
                $Year9 = mysql_num_rows($year9);

                $year10 = mysql_query("SELECT *  FROM student WHERE class_id=10 AND stu_status=1");
                $Year10 = mysql_num_rows($year10);

                $year11 = mysql_query("SELECT *  FROM student WHERE class_id=11 AND stu_status=1");
                $Year11 = mysql_num_rows($year11);

                $year12 = mysql_query("SELECT *  FROM student WHERE class_id=12 AND stu_status=1");
                $Year12 = mysql_num_rows($year12);

                $year13 = mysql_query("SELECT *  FROM student WHERE class_id=13 AND stu_status=1");
                $Year13 = mysql_num_rows($year13);
                
                $year14 = mysql_query("SELECT *  FROM student WHERE class_id=14 AND stu_status=1");
                $Year14 = mysql_num_rows($year14);
                ?> 
                
                
                <canvas id="attendancechart"></canvas> <?php ?>                   
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Revenue Sources for <?php echo date('Y'); ?></h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                  <?php 
                   $tithe = mysql_query("SELECT SUM(amount) as total FROM finance WHERE status='Income' AND trn_type='Tithe' AND year(trn_date)=year(CURRENT_DATE())");
                   $row = mysql_fetch_array($tithe);
                   $Tithe = $row['total'];

                   $offering = mysql_query("SELECT SUM(amount) as total FROM finance WHERE status='Income' AND trn_type='Offering' AND year(trn_date)=year(CURRENT_DATE())");
                   $row = mysql_fetch_array($offering);
                   $Offering = $row['total'];

                   $seed = mysql_query("SELECT SUM(amount) as total FROM finance WHERE status='Income' AND trn_type='Seed' AND year(trn_date)=year(CURRENT_DATE())");
                   $row = mysql_fetch_array($seed);
                   $Seed = $row['total'];

                   $pledge = mysql_query("SELECT SUM(amount) as total FROM finance WHERE status='Income' AND trn_type='Pledge' AND year(trn_date)=year(CURRENT_DATE())");
                   $row = mysql_fetch_array($pledge);
                   $Pledge = $row['total'];

                   $other = mysql_query("SELECT SUM(amount) as total FROM finance WHERE status='Income' AND trn_type='Other' AND year(trn_date)=year(CURRENT_DATE())");
                   $row = mysql_fetch_array($other);
                   $Other = $row['total'];
                  ?>
                   <canvas id="revenuesources"></canvas>
                  <?php
                  ?>
                    
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Tithe
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Seed
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Offering
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-warning"></i> Pledge
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-danger"></i> Other
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Income Source for <?php echo date('F Y'); ?></h6>
                </div>
                <div class="card-body">
                  <div class="chart-bar">

                  <?php 
                   $tithemonth = mysql_query("SELECT SUM(amount) as total FROM finance WHERE status='Income' AND trn_type='Tithe' AND year(trn_date)=year(CURRENT_DATE()) AND month(trn_date)=month(CURRENT_DATE())");
                   $row = mysql_fetch_array($tithemonth);
                   $Tithemonth = $row['total'];

                   $offeringmonth = mysql_query("SELECT SUM(amount) as total FROM finance WHERE status='Income' AND trn_type='Offering' AND year(trn_date)=year(CURRENT_DATE()) AND month(trn_date)=month(CURRENT_DATE())");
                   $row = mysql_fetch_array($offeringmonth);
                   $Offeringmonth = $row['total'];

                   $seedmonth = mysql_query("SELECT SUM(amount) as total FROM finance WHERE status='Income' AND trn_type='Seed' AND year(trn_date)=year(CURRENT_DATE()) AND month(trn_date)=month(CURRENT_DATE())");
                   $row = mysql_fetch_array($seedmonth);
                   $Seedmonth = $row['total'];

                   $pledgemonth = mysql_query("SELECT SUM(amount) as total FROM finance WHERE status='Income' AND trn_type='Pledge' AND year(trn_date)=year(CURRENT_DATE()) AND month(trn_date)=month(CURRENT_DATE())");
                   $row = mysql_fetch_array($pledgemonth);
                   $Pledgemonth = $row['total'];

                   $othermonth = mysql_query("SELECT SUM(amount) as total FROM finance WHERE status='Income' AND trn_type='Other' AND year(trn_date)=year(CURRENT_DATE()) AND month(trn_date)=month(CURRENT_DATE())");
                   $row = mysql_fetch_array($othermonth);
                   $Othermonth = $row['total'];
                  ?>
                    <canvas id="revenuebarmonth"></canvas>
                    
                 <?php
                 ?>
                 
                  </div>
                  <hr>
                </div>
              </div>



          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                </div>
                <div class="card-body">
                  <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>

              <!-- Color System -->
              <div class="row">
                <div class="col-lg-6 mb-4">
                  <div class="card bg-primary text-white shadow">
                    <div class="card-body">
                      Primary
                      <div class="text-white-50 small">#4e73df</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-success text-white shadow">
                    <div class="card-body">
                      Success
                      <div class="text-white-50 small">#1cc88a</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-info text-white shadow">
                    <div class="card-body">
                      Info
                      <div class="text-white-50 small">#36b9cc</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-warning text-white shadow">
                    <div class="card-body">
                      Warning
                      <div class="text-white-50 small">#f6c23e</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-danger text-white shadow">
                    <div class="card-body">
                      Danger
                      <div class="text-white-50 small">#e74a3b</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-secondary text-white shadow">
                    <div class="card-body">
                      Secondary
                      <div class="text-white-50 small">#858796</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-light text-black shadow">
                    <div class="card-body">
                      Light
                      <div class="text-black-50 small">#f8f9fc</div>
                    </div>
                  </div>
              </div>
              <div class="col-lg-6 mb-4">
                <div class="card bg-dark text-white shadow">
                  <div class="card-body">
                      Dark
                      <div class="text-white-50 small">#5a5c69</div>
                  </div>
                </div>
              </div>
            </div>

            </div>

            <div class="col-lg-6 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">
                  </div>
                  <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a constantly updated collection of beautiful svg images that you can use completely free and without attribution!</p>
                  <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on unDraw &rarr;</a>
                </div>
              </div>

              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                </div>
                <div class="card-body">
                  <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>
                  <p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>
                </div>
              </div>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

 <?php include "footer.php"?>
 <script type="text/javascript">
 var Year1 = "<?= $Year1 ?>";
 var Year2 = "<?= $Year2 ?>";
 var Year3 = "<?= $Year3 ?>";
 var Year4 = "<?= $Year4 ?>";
 var Year5 = "<?= $Year5 ?>";
 var Year6 = "<?= $Year6 ?>";
 var Year7 = "<?= $Year7 ?>";
 var Year8 = "<?= $Year8 ?>";
 var Year9 = "<?= $Year9 ?>";
 var Year10 = "<?= $Year10 ?>";
 var Year11 = "<?= $Year11 ?>";
 var Year12 = "<?= $Year12 ?>";
 var Year13 = "<?= $Year13 ?>";
 var Year14 = "<?= $Year14 ?>";


 
 var Tithe = "<?= $Tithe ?>";
 var Tithemonth = "<?= $Tithemonth ?>";
 var Offering = "<?= $Offering ?>";
 var Offeringmonth = "<?= $Offeringmonth ?>";
 var Seedmonth = "<?= $Seedmonth ?>";
 var Seed = "<?= $Seed ?>";
 var Pledge = "<?= $Pledge ?>";
 var Pledgemonth = "<?= $Pledgemonth ?>";
 var Other = "<?= $Other ?>";
 var Othermonth = "<?= $Othermonth ?>";

 </script>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-area-demo-attendancechart.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/demo/chart-pie-demo-revenuesource.js"></script>
  <script src="js/demo/chart-pie-demo-revenuesourcemonth.js"></script>
  <script src="js/demo/chart-bar-demo.js"></script>
  <script src="js/demo/chart-bar-demo-revenuemonth.js"></script>

</body>

</html>
