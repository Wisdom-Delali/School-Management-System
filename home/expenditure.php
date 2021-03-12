<div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Expenses</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">
                  </div>
                  <form method="POST">
<div class="form-row">
<div class="form-group col-md-4">
<label for="date">Date</label>
<input type="date" class="form-control" name="date" id="date">
</div>
<div class="form-group col-md-4">
<label for="amount">Amount</label>
<input type="number" class="form-control" id="amount" name="amount">
</div>
</div>
<div class="form-group col-md-4">
<label for="type">Type</label>
<select id="type" name="type" class="form-control">
<option selected>Choose...</option>
<option>Projects</option>
<option>Seed</option>
<option>Tithe</option>
<option>Other</option>
</select>
</div>
<div class="form-group col-md-4">
<label for="remark">Remark</label>
<input type="text" class="form-control" name="remark" id="remark">
</div>
<button type="submit" class="btn btn-primary">Add Expense</button>
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

$date = $_POST['date'];
$amount =$_POST['amount'];
$type =$_POST['type'];
$remark =$_POST['remark'];


mysql_query("INSERT INTO `finance` (trn_date, amount, trn_type, status, remark)
                       VALUES ('$date', '$amount', '$type', 'Expense', '$remark') ")
or die(mysql_error()); 




}


?>

