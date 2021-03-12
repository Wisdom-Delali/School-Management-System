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
										$query = mysql_query("select * FROM correction where student_id = '$session_id'  order by fdatein DESC")or die(mysql_error());
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