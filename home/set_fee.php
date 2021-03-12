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


                  
                               <!-- Modal -->
            <div class="modal fade" id="examplefees" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">profile</h5>
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
                                  <th>Name</th>
                                  <th>Class</th>
                                  <th>Termly fees</th>
                                  <th>Annual textbooks</th>
                                  <th>Annual exercise books</th>
                                  <th>Annual stationary</th>
                                  <th>Previous Balance</th>
                                </tr>
                              </thead>
                              <tfoot>
                                <tr>
                                <th>Name</th>
                                  <th>Class</th>
                                  <th>Termly fees</th>
                                  <th>Annual textbooks</th>
                                  <th>Annual exercise books</th>
                                  <th>Annual stationary</th>
                                  <th> Previous Balance</th>
                                </tr>
                              </tfoot>
                              <tbody>
                              <?php
                                
                                $termlyquery = mysql_query("SELECT * FROM student RIGHT JOIN class ON student.class_id=class.class_id RIGHT JOIN fee_structure ON class.class_id=fee_structure.class_id")or die(mysql_error()); 
                                while($termlyrow = mysql_fetch_array($termlyquery)){
                                  $balance = $termlyrow['balance'];
                                  $termlyfeecalc = $termlyrow['termly_fee'];
                                  $textbook = $termlyrow['textbooks'];
                                  $exercisebook = $termlyrow['exercisebooks'];
                                  $stationary = $termlyrow['stationary'];
                                  ?>
                                  <tr>
                                  <td><?php echo $termlyrow['firstname'];?></td>
                                  <td><?php echo $termlyrow['class_name'];?></td>
                                  <td><?php echo $termlyrow['termly_fee'];?></td>
                                  <td><?php echo $termlyrow['textbooks'];?></td>
                                  <td><?php echo $termlyrow['exercisebooks'];?></td>
                                  <td><?php echo $termlyrow['stationary'];?></td>
                                  <td><?php echo $termlyrow['balance'];?></td>
                                </tr>
                              <?php  }
                                  ?>

                          
                              </tbody>
                              <?php
                              $academicquery = mysql_query("SELECT * FROM academic_terms WHERE month(CURRENT_DATE()) BETWEEN month(starting_date) AND month(ending_date)" )or die(mysql_error()); 
                              while($academicrow = mysql_fetch_array($academicquery)){
                                if ($academicrow['term_id'] =='1'){
                                  $term = $balance+$termlyfeecalc+$textbook+$exercisebook+$stationary;
                                }
                                elseif($academicrow['term_id'] =='2'){
                                  $term = $balance+$termlyfeecalc;        
                              
                                }
                                elseif($academicrow['term_id'] =='3'){
                                  $term = $balance+$termlyfeecalc;   
                                }
                                else{
                                  echo 'none';
                                }
                              }
                              ?>
                            </table>
                          </div>
                        </div>
                        </div>
                        <form action="set_fees.php" method="POST" >
                      
                          <input type="hidden" class="form-control" id="term"  name="term" value="<?php echo $term; ?>">
                          <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-secondary">Set fees</button>
                        </div>
                          </form>

                      </div>
                    </div>
                  </div> 
        </div>
 


</div>
        
      </div>
      </div>
      <!-- End of Main Content -->

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
