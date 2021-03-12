
		
<div class="motto">
<img class="index_logo" src="admin/images/Logo.svg">
<h2>

Transforming Hearts, Preparing Minds</h2>
<h2> and Empowering Hands.</h2>
</div>	
			
			
			
			
			
			<form id="login_form1" class="form-signin" method="post">
						<h1 class="form-signin-heading"><i class="icon-lock"></i> Log in</h1>
						<input type="text" class="input-block-level" id="username" name="username" placeholder="Username" required>
						<input type="password" class="input-block-level" id="password" name="password" placeholder="Password" required>
						<button data-placement="right" title="Click Here to Sign In" id="signin" name="login" class="submit_button" type="submit"> Login</button>
		<!--/* 				<a href="mailto:thebannerschool@yahoo.com?subject=Upload your talent as an attachment" class="buttons" title="Submit talent"  >Talent Show</a>
						<a href="https://www.classmarker.com" class="buttons" title="Start online exams"
 							 target="popup" 
  								onclick="window.open('https://www.classmarker.com','popup','width=600,height=600'); return false;">Exams</a> */-->
						
														<script type="text/javascript">
														$(document).ready(function(){
															$('#signin').tooltip('show');
															$('#signin').tooltip('hide');
														});
														</script>		
			</form>
			
						<script>
						jQuery(document).ready(function(){
						jQuery("#login_form1").submit(function(e){
								e.preventDefault();
								var formData = jQuery(this).serialize();
								$.ajax({
									type: "POST",
									url: "login.php",
									data: formData,
									success: function(html){
									if(html=='true')
									{
									$.jGrowl("Loading File Please Wait......", { sticky: true });
									$.jGrowl("Welcome to The Banner School E-learning System", { header: 'Access Granted' });
									var delay = 1000;
										setTimeout(function(){ window.location = 'home/dasboard_teacher.php'  }, delay);  
									}else if (html == 'true_student'){
										$.jGrowl("Loading File Please Wait......", { sticky: true });
										$.jGrowl("Welcome to The Banner School E-learning System", { header: 'Access Granted' });
									var delay = 1000;
										setTimeout(function(){ window.location = 'home/student_notification.php'  }, delay);  
									}else
									{
									$.jGrowl("Please Check your username and Password", { header: 'Login Failed' });
									}
									}
								});
								return false;
							});
						});
						</script>
			
														<script type="text/javascript">
														$(document).ready(function(){
															$('#signin_student').tooltip('show'); $('#signin_student').tooltip('hide');
														});
														</script>	
														<script type="text/javascript">
														$(document).ready(function(){
															$('#signin_teacher').tooltip('show'); $('#signin_teacher').tooltip('hide');
														});
														</script>	