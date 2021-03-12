<?php

include('header.php');
?> 
<div class="text-center">
 <div class="spinner-border text-success" style="width: 3rem; height: 3rem;" role="status">
   <span class="visually-hidden">Loading...</span>
 </div>
</div>
<?php
//Include database connection details
$filename2 = $_POST['filename'];
$fdesc =$_POST['filedescription'];
?>
<div class="text-center">
  <div class="spinner-border text-success" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
</div>
 <?php
$date = date("Y/m/d");

$input_name = basename($_FILES['uploaded_file']['name']);
?>
<div class="text-center">
  <div class="spinner-border text-success" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
</div>
 <?php

//upload random name/number
	$rd2 = mt_rand(1000, 9999) . "_File";
    $filename = basename($_FILES['uploaded_file']['name']);
    $ext = substr($filename, strrpos($filename, '.') + 1);
   
    $newname = "uploads/files/" . $rd2 . "_" . $filename;
    (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $newname));   
     mysql_query("INSERT into files (fdatein,fname,fdesc,floc,admin_id) values ('$date', '$filename2', '$fdesc', '$newname','1')")or die(mysql_error());           
		
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
File successfully added.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
                        ?>

                     <script>
window.location = 'files.php';
					</script>
                        <?php 

                   

				?>