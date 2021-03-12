<?php include 'header.php'?>

        <!-- Begin Page Content -->
        <div class="container-fluid">


<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Add Attendance Page</h1>


<form method="POST">
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Students</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Check All <input type="checkbox"  name="selectAll" id="checkAll" />
								<script>
								$("#checkAll").click(function () {
									$('input:checkbox').not(this).prop('checked', this.checked);
								});
								</script></th>
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
          $teacher_student=mysql_query("SELECT * FROM student LEFT JOIN class ON student.class_id=class.class_id ");
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
mysql_query("insert into attendance (date,teacher_id) values('$date','admin')")or die(mysql_error());

}


?>





      </div>
      <!-- End of Main Content -->

      <?php include 'footer.php'?>
      
      <!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>