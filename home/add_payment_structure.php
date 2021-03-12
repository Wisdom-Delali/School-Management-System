<div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Add structure</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">
                  </div>
                  <form method="POST">
<div class="form-row">
<div class="form-group col-md-4">
<label for="date">Termly fee</label>
<input type="number" class="form-control" name="termly_fee" id="termly_fee" required>
</div>
<div class="form-group col-md-4">
<label for="amount">Annual textbooks</label>
<input type="number" class="form-control" id="textbooks" name="textbooks" required>
</div>
</div>
<select id="type" name="class_id" class="form-control">
<option selected>Choose...</option>
        <?php
        $member_query = mysql_query("SELECT * FROM class")or die(mysql_error());
        while($row = mysql_fetch_array($member_query)){  

          
?>

<option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>

<?php }?>
</select>

</div>
<div class="form-group col-md-4">
<label for="remark">Annual exercise books</label>
<input type="text" class="form-control" name="exercisebooks" id="exercisebooks" required>
</div>
<div class="form-group col-md-4">
<label for="remark">Stationary</label>
<input type="text" class="form-control" name="stationary" id="Stationary" required>
</div>
<button type="submit" class="btn btn-primary">Add strucuture</button>
</form>
                </div>
              </div>

 



<?php

$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST'){

  ?> 
  <div class="text-center">
   <div class="spinner-border text-success" style="width: 3rem; height: 3rem;" role="status">
     <span class="visually-hidden">Loading...</span>
   </div>
 </div>
<?php

// This function will run within each post array including multi-dimensional arrays
function ExtendedAddslash(&$params)
{
foreach ($params as &$var) {
    // check if $var is an array. If yes, it will start another ExtendedAddslash() function to loop to each key inside.
    is_array($var) ? ExtendedAddslash($var) : $var=addslashes($var);
    unset($var);
}
}

// Initialize ExtendedAddslash() function for every $_POST variable
ExtendedAddslash($_POST);     

$class = $_POST['class_id'];
$termly_fee =$_POST['termly_fee'];
$textbooks =$_POST['textbooks'];
$exercisebooks =$_POST['exercisebooks'];
$stationary =$_POST['stationary'];



mysql_query("INSERT INTO `fee_structure` (class_id, termly_fee, exercisebooks, textbooks, stationary)
                       VALUES ('$class', '$termly_fee', '$exercisebooks', '$textbooks', '$stationary') ")
or die(mysql_error()); 
?>
<script>
    window.location = 'edit_payment_structure.php';
              </script>

<?php
}


?>

