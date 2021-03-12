<div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Income</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">
                  </div>
                  <form method="POST">
<div class="form-row">

<div class="input-group">
<span class="input-group-text">Select</span>
<select id="type" name="student_id" class="form-control"  oninput="myFunction()" required>
<option selected>Choose...</option>
        <?php
        $member_query = mysql_query("SELECT * FROM student t1 INNER JOIN class t2 WHERE t1.class_id=t2.class_id order by lastname DESC")or die(mysql_error());
        while($row = mysql_fetch_array($member_query)){  
          $username = $row['firstname'];
          $balance = $row['balance'];
          
?>

<option value="<?php echo $row['student_id']; ?>|<?php echo $row['balance']; ?>"><?php echo $row['lastname']; ?> <?php echo $row['firstname']; ?> in <?php echo $row['class_name']; ?> (Balance=<?php echo $balance;?>) </option>

<?php }?>
</select>

</div>
</div>
<div class="form-row">
<div class="form-group col-md-4">
<label for="date">Date</label>
<input type="date" class="form-control" name="date" id="date" required>
</div>
<div class="form-group col-md-4">
<label for="amount">Amount</label>
<input type="number" class="form-control" id="amount" name="amount" required> 
</div>
</div>




<label for="remark">Particulars</label>

<input type="text" class="form-control" name="remark" id="remark" required>
</div>
<button type="submit" class="btn btn-primary">Add payment</button>
</form>
                </div>
              </div>

<?php

$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST'){

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
?>
<div class="text-center">
  <div class="spinner-border text-success" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
</div>
 <?php
$date = $_POST['date'];
$amount =$_POST['amount'];
$student =$_POST['student_id'];
$student_explode = explode('|', $student);
$student_id = $student_explode[0];
$balance =$student_explode[1];
$remark =$_POST['remark'];
$newbalance = $balance-$amount;


mysql_query("INSERT INTO `fee_payment` (student_id, amount, date, particulars)
                       VALUES ('$student_id', '$amount', '$date', '$remark') ")
or die(mysql_error()); 

mysql_query("UPDATE student SET balance='$newbalance' WHERE `student_id` = '$student'")
    or die(mysql_error()); 



$_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
Payment successfully added.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  ?>
    <script>
    window.location = 'transactions.php';
              </script>
<?php }


?>


