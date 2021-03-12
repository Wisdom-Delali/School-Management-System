<div class="span3" id="">
	<div class="row-fluid">
				      <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"><h4><i class="icon-plus-sign"></i> Add Feedback</h4></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form class="" id="add_feedback" action="feedback_save.php<?php echo '?id='.$get_id; ?>" method="post" enctype="multipart/form-data" name="upload" >
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">File</label>
                            <div class="controls">
				
									
								<input name="uploaded_file"  class="input-file uniform_on" id="fileInput" type="file" >
                         
                                <div class="control-group">
											<label>To:</label>
                                          <div class="controls">
                                            <select name="id_class"  class="chzn-select" required>
                                             	<option></option>
											<?php
											$query = mysql_query("select * from teacher_class_student
																  LEFT JOIN student ON student.student_id = teacher_class_student.student_id
											 group by teacher_class_student.student_id order by firstname ASC");
											while($row = mysql_fetch_array($query)){
											
											?>
											<option name="id_class" value="<?php echo $row['student_id']; ?>"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?> </option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>

                                <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                                <input type="hidden" name="id" value="<?php echo $session_id ?>"/>

                            </div>
                        </div>
                        <div class="control-group">
                      
                            <div class="controls">
                                <input type="text" name="name" Placeholder="Worksheet Number"  class="input">
                            </div>
                        </div>
                        <div class="control-group">
                          
                            <div class="controls">
							<input type="text" placeholder="Subject" name="desc" Placeholder="Subject" class="input">
                             <!--   <input type="text" name="desc" Placeholder="Description"  class="input" required> -->
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">

                                <button name="Upload" type="submit" value="Upload" class="buttons" /><i class="icon-upload-alt"></i>&nbsp;Upload</button>
                            </div>
                        </div>
                    </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
						

	</div>
</div>

<script>
			jQuery(document).ready(function($){
				$("#add_feedback").submit(function(e){
					$.jGrowl("Uploading Feedback Please Wait......", { sticky: true });
					e.preventDefault();
					var _this = $(e.target);
					var formData = new FormData($(this)[0]);
					$.ajax({
						type: "POST",
						url: "feedback_save.php<?php echo '?id='.$get_id; ?>",
						data: formData,
						success: function(html){
							$.jGrowl("Feedback successfully uploaded", { header: 'Feedback sent' });
							window.location = 'assignment.php<?php echo '?id='.$get_id;  ?>';
						},
						cache: false,
						contentType: false,
						processData: false
					});
				});
			});
			</script>	