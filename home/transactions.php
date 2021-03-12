<?php include 'header.php'?>

        <!-- Begin Page Content -->
        <div class="container-fluid">



        
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Fianaces</h1>
          </div>

         

          <!-- Content Row -->
          <div class="row">
          <?php
              $total = mysql_query("SELECT SUM(amount) as total FROM finance WHERE status='Income' AND year(trn_date)=year(CURRENT_DATE())");
              $row = mysql_fetch_array($total);
              $sum = $row['total'];
?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Income for <?php echo date('Y')?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><span>&#8373;</span><?php echo $sum; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-money-bill-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php
            ?>

<?php
              $total = mysql_query("SELECT SUM(amount) as total FROM finance WHERE status='Expense' AND year(trn_date)=year(CURRENT_DATE())");
              $row = mysql_fetch_array($total);
              $sum = $row['total'];
?>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Expenses for <?php echo date('Y')?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><span>&#8373;</span><?php echo $sum; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-money-bill-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
            ?>

<?php
              $total = mysql_query("SELECT SUM(amount) as total FROM finance WHERE status='Income' AND month(trn_date)= MONTH (CURRENT_DATE())");
              $row = mysql_fetch_array($total);
              $sum = $row['total'];
?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Income for <?php echo date('F Y'); ?> </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><span>&#8373;</span><?php echo $sum; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-money-bill-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
            ?>

<?php
              $incomemonth = mysql_query("SELECT SUM(amount) as total FROM finance WHERE status='Income' AND year(trn_date)= YEAR (CURRENT_DATE())");
              $row = mysql_fetch_array($incomemonth);
              $income = $row['total'];

              $expensemonth = mysql_query("SELECT SUM(amount) as total FROM finance WHERE status='Expense' AND year(trn_date)= YEAR (CURRENT_DATE())");
              $row = mysql_fetch_array($expensemonth);
              $expense = $row['total'];

              $sum = $income - $expense;
?>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#examplefees">
                  Set fees
                  </button></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sum; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-money-bill-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</div>
<?php
            ?>
<!-- Modal -->


                  
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Financial details</h6>
            </div>

            <div class="card-body">
              <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>

                      <th>Student</th>
                      <th></th>      
                      <th>action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>

                      <th>Student</th>
                      <th></th>
                      <th>action</th>
                    </tr>
                  </tfoot>
                  <tbody>

                    <?php
          $studentquery = mysql_query("SELECT * FROM student WHERE stu_status='1'")or die(mysql_error()); 
          while($row = mysql_fetch_array($studentquery)){
            $activeid=$row['student_id'];
            $classid = $row['class_id'];
            
            ?>
            <tr>

            <td><?php echo $row['firstname']; ?> </td>
            <td><?php echo $row['lastname']; ?> </td>
          
          
            <td><!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#example<?php echo $row['student_id']; ?>">
Info
</button>


<!-- Modal -->
<div class="modal fade" id="example<?php echo $row['student_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-xl">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?>'s payments</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">

<div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th>Class</th>
            <th>Termly fees</th>
            <th>Annual Textbooks</th>
            <th>Annual Exercise books and stationary</th>
            <th>Balance</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $structurequery = mysql_query("SELECT * FROM fee_structure INNER JOIN class class WHERE class.class_id='$classid' AND fee_structure.class_id='$classid'")or die(mysql_error()); 
          while($row3 = mysql_fetch_array($structurequery)){
            $termlyfee = $row3['termly_fee'];
            $textbooks = $row3['textbooks'];
            $stationary = $row3['stationary'];
           ?>
            <tr>
            <td><?php echo $row3['class_name'];?></td>
            <td><?php echo $row3['termly_fee'];?></td>
            <td><?php echo $row3['textbooks'];?></td>
            <td><?php echo $row3['stationary'];?></td>
            <td><?php echo $row['balance']; ?></td>
          </tr>
          <?php }
            ?>

        </tbody>
      </table>
    </div>
  </div>
  
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Date</th>
            <th>Amount</th>
            <th>Remarks</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
          <th>Date</th>
            <th>Amount</th>
            <th>Remarks</th>
            <th>Delete</th>
          </tr>
        </tfoot>
        <tbody>
        <?php
          $paymentquery = mysql_query("SELECT * FROM fee_payment WHERE student_id='$activeid'")or die(mysql_error()); 
          while($row2 = mysql_fetch_array($paymentquery)){
           ?>
            <tr>
            <td><?php echo $row2['date'];?></td>
            <td><?php echo $row2['amount'];?></td>
            <td><?php echo $row2['particulars'];?></td>
            <td><form method="POST" action="delete_transaction.php">

            <input type="hidden" class="form-control" id="student_id"  name="student_id" value="<?php echo $row2['student_id']; ?>">
            <input type="hidden" class="form-control" id="balance"  name="balance" value="<?php echo $row['balance']; ?>">
            <input type="hidden" class="form-control" id="amount"  name="amount" value="<?php echo $row2['amount']; ?>">
            <input type="hidden" class="form-control" id="id"  name="id" value="<?php echo $row2['id']; ?>">
            <button type="submit" class="btn btn-danger">Delete</button>
            </form></td>
          </tr>
          <?php }
            ?>

        </tbody>
      </table>
    </div>
  </div>

<div class="modal-footer">
<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
</form>
</div>
</div>
</div>
</div>
</td>
          </tr>
          <?php }
            ?>

                
                    
                    

                   
                  </tbody>
 
                </table>
              </div>
            </div>

      <!-- End of Main Content -->
      </div>

 <?php include "footer.php"?>

 <script>
function monthfunction() {
  var month = new Array();
  month[0] = "January";
  month[1] = "February";
  month[2] = "March";
  month[3] = "April";
  month[4] = "May";
  month[5] = "June";
  month[6] = "July";
  month[7] = "August";
  month[8] = "September";
  month[9] = "October";
  month[10] = "November";
  month[11] = "December";

  var d = new Date();
  var n = month[d.getMonth()];
  document.getElementById("currentmonth").innerHTML = n;
}
</script>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-area-demo.js2"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
