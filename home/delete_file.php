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
$id =$_POST['id'];



     mysql_query("DELETE from files WHERE file_id='$id' ")or die(mysql_error());           
		
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
File successfully deleted.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
                        ?>

                     <script>
window.location = 'files.php';
					</script>
                        <?php 

                   

				?>