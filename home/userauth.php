<?php
		include('dbconn.php');
		session_start();
		$username = $_POST['username'];
		$password = $_POST['password'];
		/* user */
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$result = mysql_query($query)or die(mysql_error());
			$row = mysql_fetch_array($result);
			$num_row = mysql_num_rows($result);

			$query_teacher = mysql_query("SELECT * FROM teacher WHERE username='$username' AND password='$password'")or die(mysql_error());
			$num_row_teacher = mysql_num_rows($query_teacher);
			$row_teahcer = mysql_fetch_array($query_teacher);

		if( $num_row > 0) { 
        $_SESSION['id']=$row['user_id'];
		$_SESSION['type']=$row['lastname'];
		$_SESSION['name']=$row['firstname'];

		$admin = $row['firstname'];
		$_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Welcome back <?php echo $admin; ?></strong> You have been logged in successfully.
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>';
        header('Location:index.php');
		
		 }else if ($num_row_teacher > 0){
			$_SESSION['id']=$row_teahcer['teacher_id'];
			$_SESSION['type']=$row_teahcer['teacher_status'];
			$_SESSION['name']=$row_teahcer['first_name'];
			header('Location:dashboard_teacher.php');
			 }else{ 
          $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		  <strong>Message</strong> Invalid credentials.
		  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>';
		  header('Location:../index.php');
		}	
				
?>