<?php
include "header.php";

?> 
<div class="text-center">
 <div class="spinner-border text-success" style="width: 3rem; height: 3rem;" role="status">
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

$member_id =$_POST['student_id'];

mysql_query("DELETE FROM `student` WHERE `student_id` = '$member_id'")
    or die(mysql_error()); 

    mysql_query("DELETE FROM `attendance_data` WHERE `student_id` = '$member_id'")
    or die(mysql_error()); 

    mysql_query("DELETE FROM `correction` WHERE `student_id` = '$member_id'")
    or die(mysql_error()); 

mysql_query("DELETE FROM `fee_payment` WHERE `student_id` = '$member_id'")
    or die(mysql_error()); 

    mysql_query("DELETE FROM `student_assignment` WHERE `student_id` = '$member_id'")
    or die(mysql_error()); 

    mysql_query("DELETE FROM `student_backpack` WHERE `student_id` = '$member_id'")
    or die(mysql_error()); 

    mysql_query("DELETE FROM `student_class_quiz` WHERE `student_id` = '$member_id'")
    or die(mysql_error()); 

    mysql_query("DELETE FROM `teacher_class_student` WHERE `student_id` = '$member_id'")
    or die(mysql_error()); 

    mysql_query("DELETE FROM `user_log` WHERE `user_id` = '$member_id'")
    or die(mysql_error()); 

    $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
All student details successfully deleted.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  
    header('Location: students.php');

}


?>