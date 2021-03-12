<?php include('../admin/dbcon.php'); ?>
<?php
$id = $_POST['id'];
mysql_query("delete from teacher_shared where teacher_shared_id = '$id'")or die(mysql_error());
?>
