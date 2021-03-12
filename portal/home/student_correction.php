<?php include('session.php'); ?>
<?php include('header_dashboard.php'); ?>

    <body>
		<?php include('navbar_student.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('student_correction_sidebar.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->
				
									
					     <ul class="breadcrumb">
						<?php
						$school_year_query = mysql_query("select * from school_year order by school_year DESC")or die(mysql_error());
						$school_year_query_row = mysql_fetch_array($school_year_query);
						$school_year = $school_year_query_row['school_year'];
						?>
							<li><a href="#"><b>My Class</b></a><span class="divider">/</span></li>
							<li><a href="#">School Year: <?php echo $school_year_query_row['school_year']; ?></a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
				
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
							
						
  					<form action="correction_read.php" method="post">
					  
											<button class="buttons" name="read"><i class="icon-check"></i> Read</button>
											<div class="pull-right">		
							Check All <input type="checkbox"  name="selectAll" id="checkAll" />
								<script>
								$("#checkAll").click(function () {
									$('input:checkbox').not(this).prop('checked', this.checked);
								});
								</script>							
							</div>
	
								
			





					<?php $query = mysql_query("select * from notification where teacher_class_id ='$session_id'  order by notification.date_of_notification DESC
					")or die(mysql_error());
					$count = mysql_num_rows($query);
					if ($count !='0'){
					while($row = mysql_fetch_array($query)){
					$id = $row['notification_id'];
					$status = $row['notification_status'];

					
					$query_yes_read = mysql_query("select * from notification_read where notification_id = '$id' and student_id = '$session_id'")or die(mysql_error());
					$read_row = mysql_fetch_array($query_yes_read);
					
					$yes = $read_row['student_read'];
				
					?>
									<div class="post"  id="del<?php echo $id; ?>">
										<?php if ($status == 'read'){
										}else{
										?>
										<input id="" class="" name="selector[]" type="checkbox" value="<?php echo $id; ?>">	
										<?php } ?>	
											<strong></strong>
											<?php echo $row['notification']; ?> under 
											<a href="<?php echo $row['link']; ?>" class="buttons2"> 
											<?php echo $row['correction_desc']; ?>
											</a>
										<hr/>
										<div class="pull-right">
										<i class="icon-calendar"></i>&nbsp;<?php echo $row['date_of_notification']; ?> 
										</div>
											
									
											
											</div>
					<?php
					} }else{
					?>
					<div class="alert-header"><strong><i class="icon-info-sign"></i> You have no corrections</strong></div>
					<?php
					}
					?>
					
					</form>
						
                                </div>
                            </div>
                        </div>

                        <!-- /block -->
                    </div>

                </div>
			
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>































                      

