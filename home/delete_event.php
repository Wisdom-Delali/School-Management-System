<?php
include "dbconn.php";
include "session.php";

$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST'){

    ?> 
    <div class="text-center">
     <div class="spinner-border text-success" style="width: 3rem; height: 3rem;" role="status">
       <span class="visually-hidden">Loading...</span>
     </div>
   </div>
 <?php

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

$event_id =$_POST['event_id'];

mysql_query("DELETE FROM `tbl_events` WHERE `id` = '$event_id'")
    or die(mysql_error()); 


    header('Location: add_events.php');

}


?>