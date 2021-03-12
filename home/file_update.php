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
$id =$_POST['fileid'];
$filename2 = $_POST['filename'];
$fdesc =$_POST['filedescription'];

$date = date("Y/m/d");

$input_name = basename($_FILES['uploaded_file']['name']);
echo $input_name ;
 

//upload random name/number
	$rd2 = mt_rand(1000, 9999) . "_File";
    $filename = basename($_FILES['uploaded_file']['name']);
    $ext = substr($filename, strrpos($filename, '.') + 1);
   
    $newname = "uploads/files/" . $rd2 . "_" . $filename;
    (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $newname));   
     mysql_query("UPDATE files SET fdatein='$date' fname='$filename2', fdesc='$fdesc', floc='$newname' WHERE file_id='$id' ")or die(mysql_error());           
		
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