<?php
include "dbconn.php";
include "session.php";

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
$status_id =$_POST['status'];
if ($status_id == 'Registered'){
    mysql_query("UPDATE `student` set status='Unregistered' WHERE `student_id` = '$member_id'")
    or die(mysql_error()); 
}else{
    mysql_query("UPDATE `student` set status='Registered' WHERE `student_id` = '$member_id'")
    or die(mysql_error()); 
}



    header('Location: students.php');

}


?>