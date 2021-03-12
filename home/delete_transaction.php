<?php
include "dbconn.php";
include "session.php";

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

$transaction_id =$_POST['id'];
$balance =$_POST['balance'];
$student_id =$_POST['student_id'];
$amount =$_POST['amount'];
$newbalance = $balance+$amount;

mysql_query("DELETE FROM `fee_payment` WHERE `id` = '$transaction_id'")
    or die(mysql_error());
    
mysql_query("UPDATE student SET balance='$newbalance' WHERE `student_id` = '$student_id'")
    or die(mysql_error()); 

    
$_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
Payment successfully deleted.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    ?>
    <script>
    window.location = 'transactions.php';
                        </script>
<?php
}


?>