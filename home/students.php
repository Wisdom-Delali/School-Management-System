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
                      <th>Class</th>
                     
                      <th>Action</th>
                 
                    
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Last Name</th>
                      <th>First Name</th>
                      <th>Class</th>
                      
                      <th>Action</th>
                     
               
                    </tr>
                  </tfoot>
                  <tbody>

        <?php
            $member_query = mysql_query("SELECT * FROM student t1 INNER JOIN class t2 WHERE t1.class_id=t2.class_id order by lastname DESC")or die(mysql_error());
            while($row = mysql_fetch_array($member_query)){
                $activelastname = $row['lastname'];
                $student_id = $row['student_id'];
                ?>
                
                    <tr>
                      <td><?php echo $row['lastname']; ?> </td>
                      <td><?php echo $row['firstname']; ?> </td>
                      <td><?php echo $row['class_name']; ?> </td>
                    
                      <td>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#example<?php echo $row['student_id']; ?>">
 Info
</button>


<!-- Modal -->
<div class="modal fade" id="example<?php echo $row['student_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['lastname']; ?> <?php echo $row['firstname']; ?>'s profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <img src="<?php echo $row['location']; ?>" class="card-img-top" alt="<?php echo $row['lastname']; ?> <?php echo $row['firstname']; ?>">

            <table class="table">
        <thead>
          <tr>
            <th colspan="3">Details</th>
          </tr>
        </thead>
        <tbody>
        <form action="update_student_info.php" method="POST" >
      <input type="hidden" class="form-control" id="student_id"  name="student_id" value="<?php echo $row['student_id']; ?>">
      
          <tr>
            <td>First name: <input type="text" class="form-control" id="firstname"  name="firstname" placeholder="<?php echo $row['firstname'] ;?>" value="<?php echo $row['firstname'] ;?>"></td>
            <td>Last name: <input type="text" class="form-control" id="lastname"  name="lastname" placeholder="<?php echo $row['lastname'] ;?>" value="<?php echo $row['lastname'] ;?>"></td>
            <td>Username <input type="text" class="form-control" id="username"  name="username" placeholder="<?php echo $row['username'] ;?>" value="<?php echo $row['username'] ;?>"></td>

            
          </tr>
          <tr>
            <td colspan="3"></td>
          </tr>
        <tr>
        <td>Date of birth: <input type="date" class="form-control" id="dob"  name="dob" placeholder="<?php echo $row['dob'] ;?>" value="<?php echo $row['dob'] ;?>"></td>
        <td>Gender <select id="gender" name="gender" class="form-control">
                      <option selected value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
                    
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    
                      
                    </select></td>

<td>Class: <select id="class" name="class" class="form-control">
                      <option selected value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
                      <?php 
                      $classquery=mysql_query("SELECT * FROM class") or die(mysql_error());
                      while($row=mysql_fetch_array($classquery)){
                        ?>
                        <option value="<?php echo $row['class_id']; ?>"><?php echo $row ['class_name']; ?></option>
                      <?php
                      }
                      ?>
                      
                    </select></td>
                    </tr>
                    <tr>
                    
       <td colspan="3"> <button type="submit" class="btn btn-outline-success">Update details.</button></td>
          </tr>
          
      </form>
        </tbody>
      </table>


      <hr/>
      <form action="reset_portal_password.php" method="POST" >
      Password: <?php echo $row['password']; ?>
      <input type="hidden" class="form-control" id="student_id"  name="student_id" value="<?php echo $row['student_id']; ?>">
      <button type="submit" class="btn btn-outline-success">Reset password</button>
      </form>
      <hr/>
      <form action="toggleportal.php" method="POST" >
      Status: <?php echo $row['status']; ?> for portal 
      <input type="hidden" class="form-control" id="status"  name="status" value="<?php echo $row['status']; ?>">
      <input type="hidden" class="form-control" id="student_id"  name="student_id" value="<?php echo $row['student_id']; ?>">
      <button type="submit" class="btn btn-primary">Toggle</button>
      </form>
      <hr/>
      

      <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCard<?php echo $row['student_id']; ?>" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCard<?php echo $row['student_id']; ?>">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $row['firstname']; ?>'s Siblings</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCard<?php echo $row['student_id']; ?>">
                  <div class="card-body">

                    <form action="send_email_member.php" method="POST" >
                    <ul class="list-group">
                    <?php
                 $family_query = mysql_query("SELECT * FROM student t3 INNER JOIN class t4 WHERE NOT student_id='$student_id' AND t3.class_id=t4.class_id AND lastname='$activelastname'")or die(mysql_error());
                 while($familyrow = mysql_fetch_array($family_query)){
                ?>
                      <li class="list-group-item"><?php echo $familyrow['firstname']; ?> in <?php echo $familyrow['class_name']; ?></li>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-dismiss="modal" data-target="#example<?php echo $familyrow['student_id']; ?>">
 Info
</button>
                  <?php } ?> 
                    </ul>
                  <!--  <button type="submit" class="btn btn-primary">Send</button> -->

                </form>
                  </div>
                </div>
              </div>
              <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCard<?php echo $row['username']; ?>" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCard<?php echo $row['username']; ?>">
                  <h6 class="m-0 font-weight-bold text-primary">Promote <?php echo $row['firstname']; ?></h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCard<?php echo $row['username']; ?>">
                  <div class="card-body">

                    <form action="promote.php" method="POST" >
                    <input type="hidden" class="form-control" id="user" name="user" value="<?php echo $row['student_id'];?>">
                    <label for="class">Promoted to...</label>
                    <select id="class" name="class" class="form-control">
                      <option selected>Choose...</option>
                      <?php 
                      $classquery=mysql_query("SELECT * FROM class") or die(mysql_error());
                      while($row=mysql_fetch_array($classquery)){
                        ?>
                        <option value="<?php echo $row['class_id']; ?>"><?php echo $row ['class_name']; ?></option>
                      <?php
                      }
                      ?>
                      
                    </select>
                  <!--  <button type="submit" class="btn btn-primary">Send</button> -->
                  <button type="submit" class="btn btn-primary">Promote</button>
                </form>
                  </div>
                </div>
              </div>
      </div>
      

    
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
  
        <form method="POST" action="delete_student.php">
        
        <input type="hidden" class="form-control" id="student_id"  name="student_id" value="<?php echo $row['student_id']; ?>">
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