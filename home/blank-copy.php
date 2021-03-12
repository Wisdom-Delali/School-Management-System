<!DOCTYPE html>
<html lang="en">
<?php 
include "dbconn.php";
include "session.php";


$user_type=$_SESSION['type'];

?>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>FCC Admin - Dashboard</title>

			<!-- <link href="images/logo.png" rel="icon" type="image"> -->
			<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
			<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
			<link href="bootstrap/css/font-awesome.css" rel="stylesheet" media="screen">
			<link href="bootstrap/css/my_style.css" rel="stylesheet" media="screen">
			<link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
			<link href="assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
		<!-- calendar css -->
		<link href="vendors/fullcalendar/fullcalendar.css" rel="stylesheet" media="screen">
		<script src="vendors/jquery-1.9.1.min.js"></script>
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<!-- data table -->
		<link href="assets/DT_bootstrap.css" rel="stylesheet" media="screen">
		<!-- notification  -->
		<link href="vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen">
		<!-- wysiwug  -->
		<link rel="stylesheet" type="text/css" href="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link>
	
		<script src="vendors/jGrowl/jquery.jgrowl.js"></script>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">


        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>
          <div id='calendar'></div>		
        </div>
        <!-- /.container-fluid -->

      </div>

      <?php include('script.php'); ?>
	<?php include('admin_calendar_script.php'); ?>


</body>

</html>