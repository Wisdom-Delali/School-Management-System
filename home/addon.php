// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: login.php');
}

// logout
if(isset($_POST['logout'])){
    session_destroy();
    header('Location: login.php');
}




<?php
		include('admin/dbcon.php');
		session_start();
		$username = $_POST['username'];
		$password = $_POST['password'];
		/* student */
			$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
			$result = mysql_query($query)or die(mysql_error());
			$row = mysql_fetch_array($result);
			$num_row = mysql_num_rows($result);
			$status = $row['status'];

		if( $num_row > 0) { 
		$_SESSION['id']=$row['ID'];
		
		 }else{ 
				echo 'false';
		}	
				
		?>
<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar_student.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('student_notification_sidebar.php'); ?>
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
							
						
  					<form action="read.php" method="post">
						<?php if($not_read == '0'){
								}else{ ?>
							<button id="delete"  class="buttons" name="read"><i class="icon-check"></i> Read</button>
													<div class="pull-right">
							Check All <input type="checkbox"  name="selectAll" id="checkAll" />
								<script>
								$("#checkAll").click(function () {
									$('input:checkbox').not(this).prop('checked', this.checked);
								});
								</script>					
							</div>
	
								<?php } ?>
				
					<?php $query = mysql_query("select * from teacher_class_student
					LEFT JOIN teacher_class ON teacher_class.teacher_class_id = teacher_class_student.teacher_class_id 
					LEFT JOIN class ON class.class_id = teacher_class.class_id 
					LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
					LEFT JOIN teacher ON teacher.teacher_id = teacher_class_student.teacher_id 
					JOIN notification ON notification.teacher_class_id = teacher_class.teacher_class_id
					where teacher_class_student.student_id = '$session_id' and school_year = '$school_year'  order by notification.date_of_notification DESC
					")or die(mysql_error());
					$count = mysql_num_rows($query);
					if ($count  > 0){
					while($row = mysql_fetch_array($query)){
					$get_id = $row['teacher_class_id'];
					$id = $row['notification_id'];

					
					$query_yes_read = mysql_query("select * from notification_read where notification_id = '$id' and student_id = '$session_id'")or die(mysql_error());
					$read_row = mysql_fetch_array($query_yes_read);
					
					$yes = $read_row['student_read'];
				
					?>
									<div class="post"  id="del<?php echo $id; ?>">
										<?php if ($yes == 'yes'){
										}else{
										?>
										<input id="" class="" name="selector[]" type="checkbox" value="<?php echo $id; ?>">	
										<?php } ?>	
											<strong><?php echo $row['firstname']." ".$row['lastname'];  ?></strong>
											<?php echo $row['notification']; ?>     In       
											<a href="<?php echo $row['link']; ?><?php echo '?id='.$get_id; ?>" class="buttons2">
											<?php echo $row['class_name']; ?> 
											<?php echo $row['subject_code']; ?> 
									 
											</a>
								<hr/>
										<div class="pull-right">
										<i class="icon-calendar"></i>&nbsp;<?php echo $row['date_of_notification']; ?> 
										</div>
											
									
											
											</div>
					<?php
					} }else{
					?>
					<div class="alert-header"><strong><i class="icon-info-sign"></i> No Notifications Found</strong></div>
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






























<?php
include("php/dbconnect.php");

if(isset($_POST['req']) && $_POST['req']=='1') 
{

$sid = (isset($_POST['student']))?mysqli_real_escape_string($conn,$_POST['student']):'';

 $sql = "select s.id,s.sname,s.balance,s.fees,s.contact,b.branch,s.joindate from student as s,branch as b where b.id=s.branch and  s.delete_status='0' and s.id='".$sid."'";
$q = $conn->query($sql);
if($q->num_rows>0)
{

$res = $q->fetch_assoc();
echo '  <form class="form-horizontal" id ="signupForm1" action="fees.php" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" disabled  value="'.$res['sname'].'" >
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Class:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" disabled  value="'.$res['contact'].'" />
    </div>
  </div>
  
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Total Fee:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="totalfee" id="totalfee"   value="'.$res['fees'].'" disabled />
    </div>
  </div>
  
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Balance:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="balance"  id="balance" value="'.$res['balance'].'" disabled />
	  <input type="hidden" value="'.$res['id'].'" name="sid">
    </div>
  </div>
  
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Amount:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="paid"  id="paid"  />
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Date:</label>
    <div class="col-sm-10">
	
      <input type="date" class="form-control" name="submitdate"  id="s" />
    </div>
  </div>
  
    <div class="form-group">
    <label class="control-label col-sm-2" for="email">Particulars:</label>
    <div class="col-sm-10">
      <textarea class="form-control" name="particulars" id="particulars"></textarea>
    </div>
  </div>

   <div class="form-group">
    <label class="control-label col-sm-2" for="email">Remark:</label>
    <div class="col-sm-10">
      <textarea class="form-control" name="transcation_remark" id="transcation_remark"></textarea>
    </div>
  </div>
 
 
 
 
 
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary" name="save">Save</button>
    </div>
  </div>
</form>

<script type="text/javascript">
$(document).ready( function() {
$("#submitdate").datepicker( {
        changeMonth: true,
        changeYear: true,
       
        dateFormat: "yy-mm-dd",
      
    });
	
	
///////////////////////////

$( "#signupForm1" ).validate( {
				rules: {
					submitdate: "required",
					
					paid: {
						required: true,
						digits: true,
						max:'.$res['balance'].'
					}	
					
					
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					// Add `has-feedback` class to the parent div.form-group
					// in order to add icons to inputs
					element.parents( ".col-sm-10" ).addClass( "has-feedback" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}

					
					if ( !element.next( "span" )[ 0 ] ) {
						$( "<span class=\'glyphicon glyphicon-remove form-control-feedback\'></span>" ).insertAfter( element );
					}
				},
				success: function ( label, element ) {
					if ( !$( element ).next( "span" )[ 0 ] ) {
						$( "<span class=\'glyphicon glyphicon-ok form-control-feedback\'></span>" ).insertAfter( $( element ) );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-10" ).addClass( "has-error" ).removeClass( "has-success" );
					$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
				},
				unhighlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-10" ).addClass( "has-success" ).removeClass( "has-error" );
					$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
				}
			} );


//////////////////////////	
	
	
	
});

</script>
';

}else
{
echo "Something Goes Wrong! Try After sometime.";
}


}

if(isset($_POST['req']) && $_POST['req']=='2') 
{

$sid = (isset($_POST['student']))?mysqli_real_escape_string($conn,$_POST['student']):'';
$sql = "select paid,submitdate,transcation_remark,particulars from fees_transaction  where stdid='".$sid."'";
$sql2 = "select paid,submitdate,transcation_remark,particulars from fees_transaction  where not particulars='Owings' and stdid='".$sid."'";
$fq = $conn->query($sql);
$fq2 = $conn->query($sql2);

if($fq->num_rows>0)
{


 $sql = "select s.id,s.sname,s.balance,s.fees,s.contact,b.branch,s.joindate from student as s,branch as b where b.id=s.branch  and s.id='".$sid."'";
$sq = $conn->query($sql);
$sr = $sq->fetch_assoc();

echo '
<h4>Student Info</h4>
<div class="table-responsive">
<table class="table table-bordered">
<tr>
<th>Name</th>
<td>'.$sr['sname'].'</td>
<th>Date of issuance</th>
<td>'. date("Y/m/d") .'</td>
</tr>
<tr>
<th>Class</th>
<td>'.$sr['contact'].'</td>

</tr>


</table>
</div>
';


echo '
<h4>Fee Info</h4>
<div class="table-responsive">
<table class="table table-bordered">
    <thead>
      <tr>
        <th>Date</th>
        <th>Particulars</th>
        <th>Amount</th>
        
        <th>Remark</th>
      </tr>
    </thead>
    <tbody>';
	$totapaid = 0;
while($res = $fq->fetch_assoc())
{
$res2 = $fq2->fetch_assoc();
$totapaid+=$res2['paid'];
        echo '<tr>
        <td>'.$res['submitdate'].'</td>
        <td>'.$res['particulars'].'</td>
        <td>'.$res['paid'].'</td>

        <td>'.$res['transcation_remark'].'</td>
      </tr>' ;
}
      

echo '	  
    </tbody>
  </table>
 </div> 
 
<table style="width:150px;" >
<tr>
<th>Total Fees: 
</th>
<td>'.$sr['fees'].'
</td>
</tr>

<tr>
<th>Total Paid: 
</th>
<td>'.$totapaid.'
</td>
</tr>

<tr>
<th>Balance: 
</th>
<td>'.$sr['balance'].'
</td>
</tr>
</table>
 ';


 }
else
{
echo 'No fees submitted.';
}
 
}
?>