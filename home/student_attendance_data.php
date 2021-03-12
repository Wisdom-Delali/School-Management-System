<?php include 'header.php'?>
<?php $get_id = $_GET['id']; ?>
<?php $student_query = mysql_query("SELECT *
FROM attendance_data
LEFT JOIN attendance ON attendance_data.attendance_id = attendance.ID
RIGHT JOIN student ON attendance_data.student_id = student.student_id
WHERE student.student_id ='$get_id'
LIMIT 0 , 1  ")or die(mysql_error());
			  while($student_row = mysql_fetch_array($student_query)){
          $first_name=$student_row['firstname'];
          $last_name=$student_row['lastname'];
        }
		?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?php echo $first_name.' '.$last_name ?>'s attendance report</h1>
          <div id='calendar'></div>		
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php include 'footer.php'?>
      <?php include('script.php'); ?>
	<?php include('admin_calendar_script.php'); ?>
      <!-- Bootstrap core JavaScript-->

<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>