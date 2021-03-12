<?php include 'header.php'?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Income for <?php echo date('F Y'); ?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><span>&#8373;</span>something</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-money-bill-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Income for <?php echo date('Y'); ?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><span>&#8373;</span>something</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-money-bill-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total students</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">something</div>
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


            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Debtors</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><span>&#8373;</span>something</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-money-bill-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>






  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Add Attendance Page</h1>

<?php 
$teacher_id = $_SESSION['id'];
?>
  <form method="POST">
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Class students</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th></th>
                      <th>First name</th>
                      <th>Last name</th>
                      <th>Class</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $autoin=mysql_query("SHOW TABLE STATUS LIKE 'attendance'");
                  while($row2=mysql_fetch_array($autoin)){
                      $echo = $row2['Auto_increment'];
                  }
                  $teacher_student=mysql_query("SELECT * FROM student LEFT JOIN class ON student.class_id=class.class_id LEFT JOIN teacher ON class.teacher_id=teacher.teacher_id WHERE teacher.teacher_id='$teacher_id' ");
                  while($row=mysql_fetch_array($teacher_student)){
                   ?>
                    <tr>
                    <td>
                    <input class="" type="checkbox"  name="selector[]" type="checkbox" value="<?php echo $row['student_id']; ?>" aria-label="...">
                    </td>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['class_name']; ?></td>
                  
                  </tr>
                  <?php }
                  ?>
                    
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
<div class="form-row">
<div class="form-group col-md-4">
<label for="date">Date</label>
<input type="date" class="form-control" name="date" id="date">
</div>
<div class="form-group col-md-4">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="0">
  <label class="form-check-label" for="flexRadioDefault1">
    Absent
  </label>
</div>
<div class="form-group col-md-4">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="1" checked>
  <label class="form-check-label" for="flexRadioDefault2">
   Present
  </label>
</div>
</div>
<button type="submit" class="btn btn-primary">Add Attendance</button>
</div>
</form>




<?php

$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST'){

// This function will run within each post array including multi-dimensional arrays
function ExtendedAddslash(&$params)
{
foreach ($params as &$var) {
    // check if $var is an array. If yes, it will start another ExtendedAddslash() function to loop to each key inside.
    is_array($var) ? ExtendedAddslash($var) : $var=addslashes($var);
    unset($var);
}
}

// Initialize ExtendedAddslash() function for every $_POST variable
ExtendedAddslash($_POST);     

$date = $_POST['date'];
$status = $_POST['flexRadioDefault'];

$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	mysql_query("insert into attendance_data (attendance_id,attendance_status,student_id) values('$echo','$status','$id[$i]')")or die(mysql_error());	
}
mysql_query("insert into attendance (date,teacher_id) values('$date','$teacher_id')")or die(mysql_error());

}


?>


</div>
<!-- /.container-fluid -->

</div>
</div>
<!-- End of Main Content -->

<?php include 'footer.php'?>


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
