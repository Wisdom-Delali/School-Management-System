<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar_student.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('correction_link_student.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
					   
					   <!-- breadcrumb -->
				
				
					     <ul class="breadcrumb">
							
							<li><a href="#"><b>Feedback</b></a></li>
						</ul>
						 <!-- end breadcrumb -->
						
						
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
								<?php $query = mysql_query("select * FROM correction where student_id = '$session_id'  order by fdatein DESC")or die(mysql_error()); 
									  $count  = mysql_num_rows($query);
								?>
                                <div id="" class="muted pull-right"><span class="badge badge-info"><?php echo $count; ?></span></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<?php
									$query = mysql_query("select * FROM correction where student_id = '$session_id'  order by fdatein DESC")or die(mysql_error());
									$count = mysql_num_rows($query);
									if ($count == '0'){?>
									<div class="alert-header">You have no feedback</div>
									<?php
									}else{
								?>
  											<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
						
				



									
											  <ul class="breadcrumb">
						<?php
						$school_year_query = mysql_query("select * from school_year order by school_year DESC")or die(mysql_error());
						$school_year_query_row = mysql_fetch_array($school_year_query);
						$school_year = $school_year_query_row['school_year'];
						?>
							<li><a href="#"><b>My Class</b></a><span class="divider">/</span></li>
							<li><a href="#">School Year: <?php echo $school_year_query_row['school_year']; ?></a></li>
						</ul>




											  <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-right">
									<?php $query = mysql_query("select * from teacher_class_student
														LEFT JOIN teacher_class ON teacher_class.teacher_class_id = teacher_class_student.teacher_class_id 
														LEFT JOIN class ON class.class_id = teacher_class.class_id 
														LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
														LEFT JOIN teacher ON teacher.teacher_id = teacher_class.teacher_id
														where student_id = '$session_id' and school_year = '$school_year'
														")or die(mysql_error());
														$count = mysql_num_rows($query);
									?>
												<span class="badge badge-info"><?php echo $count; ?></span>
								</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
  										<ul	 id="da-thumbs" class="da-thumbs">
													<?php
														if ($count != '0'){
														while($row = mysql_fetch_array($query)){
														$id = $row['teacher_class_id'];	
													?>
											<li>
												<a href="subject_correction_student.php<?php echo '?id='.$id; ?>">
														<img src ="<?php echo $row['thumbnails'] ?>" width="124" height="140" class="img-polaroid">
													<div>
													<span>
													<p><?php echo $row['class_name']; ?></p>
													
													</span>
													</div>
												</a>
												<p class="class"></p>
												<p class="subject"><?php echo $row['subject_code']; ?></p>
												<p class="subject"></p>
													
											
											</li>
								
			
									<?php }}else{ ?>
									<div class="alert-header"><i class="icon-info-sign"></i> You are currently not enrolled to your class</div>
									<?php } ?>	
									</ul>
						
                                </div>
                            </div>
                        </div>














										<thead>
										        <tr>
												<th>Date Uploaded</th>
												<th>Subject</th>
												<th>Worksheet Number</th>
												<th>Download</th>
												</tr>
												 
										</thead>
										<tbody>
											
                              		<?php
										$query = mysql_query("select * FROM correction where student_id = '$session_id' and subject_id='$get_id' order by fdatein DESC")or die(mysql_error());
										while($row = mysql_fetch_array($query)){
										$id  = $row['correction_id'];
										$floc = $row['floc'];
									?>                              
										<tr>
										 <td><?php echo $row['fdatein']; ?></td>
                                         <td><?php echo $row['fdesc']; ?></td>  
										 <td><?php  echo $row['fname']; ?></td>                                    
                                         <td width="220">
										 <form id="assign" method="post" action="submit_assignment.php<?php echo '?id='.$get_id ?>&<?php echo 'post_id='.$id ?>">
										 <input type="hidden" name="id" value="<?php echo $id; ?>">
										 <?php
											if ($floc == ""){
											}else{
										 ?>
										  <a data-placement="bottom" title="Download" id="<?php echo $id; ?>download"  class="buttons" href="<?php echo $row['floc']; ?>"><i class="icon-download icon-large"></i>    Download</a>
										<?php } ?>
										 
										 </form>
										 </td>                                      
														<script type="text/javascript">
														$(document).ready(function(){
															$('#<?php echo $id; ?>submit').tooltip('show');
															$('#<?php echo $id; ?>submit').tooltip('hide');
														});
														</script>
                             							<script type="text/javascript">
														$(document).ready(function(){
															$('#<?php echo $id; ?>download').tooltip('show');
															$('#<?php echo $id; ?>download').tooltip('hide');
														});
														</script>

                               
                                </tr>
                         
						 <?php } ?>
						   
                              
										</tbody>
									</table>
						 <?php } ?>
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