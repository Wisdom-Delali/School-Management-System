<?php include('session.php'); ?>
<?php include('header_dashboard.php'); ?>

<body>
		<?php include('navbar_teacher.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('share_sidebar_teacher.php'); ?>
                <div class="span6" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->	
									<ul class="breadcrumb">
										<?php
										$school_year_query = mysql_query("select * from school_year order by school_year DESC")or die(mysql_error());
										$school_year_query_row = mysql_fetch_array($school_year_query);
										$school_year = $school_year_query_row['school_year'];
										?>
											<li><a href="#"><b>My Class</b></a><span class="divider">/</span></li>
										<li><a href="#">School Year: <?php echo $school_year_query_row['school_year']; ?></a><span class="divider">/</span></li>
										<li><a href="#"><b>Shared Files</b></a></li>
									</ul>
						 <!-- end breadcrumb -->
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-right"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<div class="pull-right">
												Check All <input type="checkbox"  name="selectAll" id="checkAll" />
												<script>
												$("#checkAll").click(function () {
													$('input:checkbox').not(this).prop('checked', this.checked);
												});
												</script>					
									</div>
									<form action="delete_shared.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
								<a data-toggle="modal" href="#backup_delete" id="delete"  class="buttons" name=""><i class="icon-move icon-large"></i> Move</a>
									<?php include('modal_share_delete.php');  ?>
										<thead>
										        <tr>
												<th></th>
												<th>Date Upload</th>
												<th>File Name</th>
												<th>Description</th>
												<th></th>
												</tr>
										</thead>
										<tbody>
                              		<?php
										$query = mysql_query("select * FROM teacher_shared where teacher_id = '$session_id' order by fdatein DESC")or die(mysql_error());
										while($row = mysql_fetch_array($query)){
										$id  = $row['teacher_shared_id'];
									?>                              
										<tr id="del<?php echo $id; ?>">
										<td width="30">
											<input id="" class="" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
										</td>
										 <td><?php echo $row['fdatein']; ?></td>
                                         <td><?php  echo $row['fname']; ?></td>
                                         <td><?php echo $row['fdesc']; ?></td>                                                                        
                                         <td width="30"><a href="<?php echo $row['floc']; ?>"><i class="icon-download icon-large"></i></a><a class="buttons"  href="#<?php echo $id; ?>" data-toggle="modal" ><i class="icon-remove"></i></a>
													<?php include("remove_file_modal.php"); ?></td>                                      
										</tr>
									<?php } ?>
										</tbody>
									</table>
									</form>
						
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php include('shared_file_upload.php'); ?>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>

		<script type="text/javascript">
	$(document).ready( function() {
		$('.remove').click( function() {
		var id = $(this).attr("id");
			$.ajax({
			type: "POST",
			url: "remove_file.php",
			data: ({id: id}),
			cache: false,
			success: function(html){
			$("#del"+id).fadeOut('slow', function(){ $(this).remove();}); 
			$('#'+id).modal('hide');
			$.jGrowl("Your File is Successfully Deleted", { header: 'Data Delete' });	
			}
			}); 		
			return false;
		});				
	});
</script>
    </body>
</html>