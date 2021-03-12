<?php include 'header.php'?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Students</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
<?php
$total_members = mysql_query("select * from student")or die(mysql_error());
$count = mysql_num_rows($total_members);
?>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total students</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-male fa-2x text-gray-300"></i>
                      <i class="fas fa-female fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<?php
            ?>
            

<?php
$males = mysql_query("select * from student where gender='Male'")or die(mysql_error());
$count = mysql_num_rows($males);
?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Males</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-male fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php
            ?>

<?php
$females = mysql_query("select * from student where gender='Female'")or die(mysql_error());
$count = mysql_num_rows($females);
?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Females</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-female fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <?php
            ?>

<?php
$registered_members = mysql_query("select * from student where stu_status=1 ")or die(mysql_error());
$count = mysql_num_rows($registered_members);
?>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Active students</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-child fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</div>
<?php
            ?>

<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Students</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Last Name</th>
                      <th>First Name</th>

                     
                      <th>Action</th>
                 
                    
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Last Name</th>
                      <th>First Name</th>

                      
                      <th>Action</th>
                     
               
                    </tr>
                  </tfoot>
                  <tbody>

        <?php
            $member_query = mysql_query("SELECT * FROM teacher")or die(mysql_error());
            while($row = mysql_fetch_array($member_query)){
                
                ?>
                
                    <tr>
                      <td><?php echo $row['last_name']; ?> </td>
                      <td><?php echo $row['first_name']; ?> </td>

                    
                      <td>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#example<?php echo $row['teacher_id']; ?>">
 Info
</button>


<!-- Modal -->
<div class="modal fade" id="example<?php echo $row['teacher_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['last_name']; ?> <?php echo $row['first_name']; ?>'s profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      First name: <?php echo $row['first_name']; ?>
      <hr/>
      Last name: <?php echo $row['last_name']; ?>
      <hr/>
      <?php 
      $teacher_id = $row['teacher_id'];
      $class_query = mysql_query("SELECT * FROM teacher LEFT JOIN class ON teacher.teacher_id=class.teacher_id WHERE teacher.teacher_id='$teacher_id' ")or die(mysql_error());
      while($row2 = mysql_fetch_array($class_query)){
        ?>
        Class teacher for: <?php echo $row2['class_name']; ?> 
        <hr/>
        <?php
      }
      
      ?>

      Username: <?php echo $row['username']; ?>
      <hr/>
      <form action="reset_portal_password.php" method="POST" >
      Password: <?php echo $row['password']; ?>
      <input type="hidden" class="form-control" id="teacher_id"  name="teacher_id" value="<?php echo $row['teacher_id']; ?>">
      <button type="submit" class="btn btn-primary">Reset password</button>
      </form>
      <hr/>
      <form action="toggleportal.php" method="POST" >
      Status: <?php echo $row['teacher_stat']; ?> for portal 
      <input type="hidden" class="form-control" id="status"  name="status" value="<?php echo $row['teacher_stat']; ?>">
      <input type="hidden" class="form-control" id="teacher_id"  name="teacher_id" value="<?php echo $row['teacher_id']; ?>">
      <button type="submit" class="btn btn-primary">Toggle</button>
      </form>
      <hr/>
      

      
                 
      </div>
      

    
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
  
        <form method="POST" action="delete_student.php">
        

        <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>







 </td>
                      
                   
                    </tr>
                    <?php }

?>
                   
                  </tbody>
 
                </table>
              </div>
            </div>
          </div>        
      </div>








      <!-- End of Main Content -->

 <?php include "footer.php"?>

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
  <script src="js/demo/chart-area-demo2.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>