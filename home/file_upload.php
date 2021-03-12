<?php

include('header.php');
?>
<div class="text-center">
  <div class="spinner-border text-success" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
</div>
 <?php
//Include database connection details
$class =$_POST['class'];
$last_name = $_POST['last_name'];
$first_name =$_POST['first_name'];
$username =$_POST['username'];
$gender =$_POST['gender'];
$dob =$_POST['dob'];
$student_balance = mysql_query("SELECT * FROM fee_structure WHERE class_id='$class' ")or die(mysql_error());
while($row=mysql_fetch_array($student_balance)){
    $exercisebook=$row['exercisebooks'];
    $textbook=$row['textbooks'];
    $stationary=$row['stationary'];
    $termlyfee=$row['termly_fee'];
    $balance=$exercisebook+$textbook+$termlyfee+$stationary;
}


$input_name = basename($_FILES['uploaded_file']['name']);
echo $input_name ;
 

//upload random name/number
	$rd2 = mt_rand(1000, 9999) . "_File";
    $filename = basename($_FILES['uploaded_file']['name']);
    $ext = substr($filename, strrpos($filename, '.') + 1);
   
    $newname = "uploads/" . $rd2 . "_" . $filename;
    (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $newname));   
     mysql_query("INSERT INTO student (balance, lastname, firstname, username, password, gender, class_id, dob, status, stu_status, location)
                VALUES ('$balance', '$last_name', '$first_name', '$username', 'thebannerschool' ,'$gender', '$class', '$dob', 'Unregistered', '1', '$newname') ")or die(mysql_error());           
		
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
Student successfully added.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
                        ?>

                     <script>
window.location = 'students.php';
					</script>
                        <?php 

                   

				?>