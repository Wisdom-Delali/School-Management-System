<?php include "header.php"?>
<?php 
$teacher_id = $_SESSION['id'];
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Students table</h1>
          <p class="mb-4">Click on view to view a student's attendance data</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTable</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>First name</th>
                      <th>Last name</th>
                      <th>Class</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>First name</th>
                      <th>Last name</th>
                      <th>Class</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
                  if($user_type=='admin'){
                    $attendance_query=mysql_query("SELECT * FROM student LEFT JOIN class ON student.class_id=class.class_id WHERE stu_status='1'")or die(mysql_error());

                  }elseif($user_type=='teacher'){
                    $attendance_query=mysql_query("SELECT * FROM student LEFT JOIN class ON student.class_id=class.class_id LEFT JOIN teacher ON class.teacher_id=teacher.teacher_id WHERE teacher.teacher_id='$teacher_id' AND student.stu_status='1'")or die(mysql_error());

                  }else{
                    echo 'invalid user';
                  }?> 
                  <?php
                  while($row = mysql_fetch_array($attendance_query)){
                    $id=$row['student_id'];
                    ?>
                      <tr>
                      <td><?php echo $row['firstname'];?></td>
                      <td><?php echo $row['lastname'];?></td>
                      <td><?php echo $row['class_name'];?></td>
                      <td><a class="btn btn-primary" href="student_attendance_data.php<?php echo '?id='.$id; ?>" role="button">View</a></td>
                    </tr>
                    <?php 
                  }
                  
                  ?>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

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
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
