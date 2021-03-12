<?php

include('header.php');
//Include database connection details

$class = $_POST['class'];
$user =$_POST['user'];

 mysql_query("UPDATE student SET class_id='$class' WHERE student_id='$user'")or die(mysql_error());           
		
                        ?>

                     <script>
window.location = 'students.php';
					</script>
                        <?php 

                   

				?>