<?php
include('session.php');
include('../admin/dbcon.php');

mysql_query("update user_log set logout_Date = NOW() where user_id = '$session_id' ")or die(mysql_error());
session_start();
session_destroy();
header('location:quiz/teacher.php');
?>