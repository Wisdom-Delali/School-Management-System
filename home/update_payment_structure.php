<?php
include('header.php');
?>
<div class="text-center">
  <div class="spinner-border text-success" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
</div>
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

$class = $_POST['class_id'];
$termlyfee =$_POST['termlyfee'];
$exercisebooks =$_POST['exercisebooks'];
$textbooks =$_POST['textbooks'];
$stationary =$_POST['stationary'];



mysql_query("UPDATE `fee_structure` SET termly_fee='$termlyfee', textbooks='$textbooks', exercisebooks='$exercisebooks', stationary='$stationary' WHERE class_id='$class'")
or die(mysql_error()); 



$_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
		  Structure update Successful!
		  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>';
  ?>
    <script>
    window.location = 'edit_payment_structure.php';
              </script>
<?php }


?>