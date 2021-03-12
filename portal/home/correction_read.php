<?php
include('session.php');
include('dbcon.php');
if (isset($_POST['read'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	mysql_query("update notification set notification_status = 'read' where notification_id=('$id[$i]')");
}
header("location: student_correction.php");
?>
<script>
window.location = 'student_correction.php';
</script>
<?php
}
?>