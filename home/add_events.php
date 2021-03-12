
<?php include 'header.php'?>


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

$start = $_POST['start'];
$end =$_POST['end'];
$title =$_POST['title'];
$note =$_POST['note'];


mysql_query("INSERT INTO `tbl_events` (title, start, end, note)
                       VALUES ('$title', '$start', '$end', '$note') ")
or die(mysql_error()); 




}


?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Events Page</h1>





  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Events</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Title</th>
                   
                      
                      <th>Detail</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Title</th>
                     
                      
                      <th>Details</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>

        <?php
            $events_query = mysql_query("select * from tbl_events order by end DESC")or die(mysql_error());
            while($row = mysql_fetch_array($events_query)){
                if($row['end'] < date("Y-m-d") ) {
                    $status = "<button type='button' class='btn btn-success' >Complete</button>";}
                    elseif($row['start'] <= date("Y-m-d") ){
                      $status = "<button type='button' class='btn btn-warning'>In Session</button>
                      ";}
                      elseif($row['end'] > date("Y-m-d") ){
                          $status = "<button type='button' class='btn btn-danger'>Upcoming</button>
                          ";
                      }
                    
                
                ?>
                
                    <tr>
                      <td><?php echo $row['title']; ?> </td>
                   
                      <td><?php echo $row['note']; ?> </td>
                   

                      <td><!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#example<?php echo $row['ID']; ?>">
Info
</button>


<!-- Modal -->
<div class="modal fade" id="example<?php echo $row['ID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['title']; ?> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  
      Starting date: <?php echo $row['start']; ?>
      <hr/>
      Ending date: <?php echo $row['end']; ?>
      <hr/>
      Details: <?php echo $row['note']; ?>
      <hr/>
      Status: <?php echo $status; ?>
      <hr/>
      

      
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
  
        <form method="POST" action="delete_event.php">
        
        <input type="hidden" class="form-control" id="event_id"  name="event_id" value="<?php echo $row['id']; ?>">
        <button type="submit" class="btn btn-danger">Delete</button>
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
          </div>




          
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Birthday(s) for <?php echo date('F Y'); ?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Full Name</th>
                   
                     
                      <th>Role</th>
                      <th>Email</th>
                    
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Full Name</th>
                   
                     
                      <th>Role</th>
                      <th>Email</th>
                    </tr>
                  </tfoot>
                  <tbody>

        <?php
            $birthday_query = mysql_query("SELECT * FROM members WHERE month(`dob`)=month(CURRENT_DATE())")or die(mysql_error());
            while($row = mysql_fetch_array($birthday_query)){
               
                
                ?>
                
                    <tr>
                      <td><?php echo $row['first_name']; ?>  <?php echo $row['last_name']; ?> </td>
                     
                      <td><?php echo $row['member_role']; ?> </td>
                   
                      <td>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#example<?php echo $row['ID']; ?>">
<?php echo $row['email_address']; ?>
</button>

<!-- Modal -->
<div class="modal fade" id="example<?php echo $row['ID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['last_name']; ?> <?php echo $row['first_name']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['last_name']; ?> <?php echo $row['first_name']; ?>">
      <hr/>
      Date of birth: <?php echo $row['dob']; ?>
      <hr/>
      Mobile: <?php echo $row['age']; ?>
      <hr/>
      Location: <?php echo $row['location']; ?>
      <hr/>
      Role: <?php echo $row['member_role']; ?>
      <hr/>
      Gender: <?php echo $row['gender']; ?>
      <hr/>
      

      <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCard<?php echo $row['ID']; ?>" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCard<?php echo $row['ID']; ?>">
                  <h6 class="m-0 font-weight-bold text-primary">Email address: <?php echo $row['email_address']; ?></h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCard<?php echo $row['ID']; ?>">
                  <div class="card-body">
                    <form action="send_email_member.php" method="POST" >
                    <div class="form-group col-md-6">
                     <label for="receipient">Receipient</label>
                         <input type="text" class="form-control" id="receipient" placeholder="<?php echo $row['email_address']; ?>" name="receipient" value="<?php echo $row['email_address']; ?>" disabled>
                    </div>
                <div class="form-group col-md-6">
                     <label for="member_role">Subject</label>
                         <input type="text" class="form-control" id="subject" placeholder="Subject" name="subject">
                    </div>
                <div class="form-group">
                       <label for="exampleFormControlTextarea1">Email body</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3"></textarea>
                     </div>
                   <button type="submit" class="btn btn-primary">Send</button>
                </form>
                  </div>
                </div>
              </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      
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
          </div>











<div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Add Event</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">
                  </div>
                  <form method="POST">
<div class="form-row">
<div class="form-group col-md-4">
<label for="title">Title</label>
<input type="text" class="form-control" id="title" name="title">
</div>
</div>
<div class="form-group col-md-4">
<label for="start">Starting Date</label>
<input type="date" class="form-control" name="start" id="strat">
</div>
<div class="form-group col-md-4">
<label for="end">Ending Date</label>
<input type="date" class="form-control" name="end" id="end">
</div>
<div class="form-group col-md-4">
<label for="note">Notes</label>
<input type="text" class="form-control" id="note" name="note">
</div>
<button type="submit" class="btn btn-primary">Add Event</button>
</form>
                </div>
              </div>
  






<?php include "footer.php"?>

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
<script src="js/demo/chart-area-demo2.js"></script>
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

</body>

</html>
