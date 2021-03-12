<?php
		include('admin/dbcon.php');
		session_start();
		$username = $_POST['username'];
		$password = $_POST['password'];
		/* student */
			$query = "SELECT * FROM student WHERE username='$username' AND password='$password'";
			$result = mysql_query($query)or die(mysql_error());
			$row = mysql_fetch_array($result);
			$num_row = mysql_num_rows($result);
			$status = $row['status'];
		/* teacher */
		$query_teacher = mysql_query("SELECT * FROM teacher WHERE username='$username' AND password='$password'")or die(mysql_error());
		$num_row_teacher = mysql_num_rows($query_teacher);
		$row_teahcer = mysql_fetch_array($query_teacher);
		if( $num_row > 0 and $status == 'Registered') { 
		$_SESSION['id']=$row['student_id'];
		echo 'true_student';	
		mysql_query("insert into user_log (username,login_date,user_id)values('$username',NOW(),".$row['student_id'].")")or die(mysql_error());
		}else if ($num_row_teacher > 0){
		$_SESSION['id']=$row_teahcer['teacher_id'];
		echo 'true';
		
		 }else{ 
				echo 'false';
		}	
				
		?>