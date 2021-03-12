
<?php include 'header.php'?>

<!-- Begin Page Content -->
<div class="container-fluid">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Class</th>
      <th scope="col">Termly fees</th>
      <th scope="col">Annual textbooks</th>
      <th scope="col">Annual exercise books</th>
      <th scope="col">Annual stationary</th>
    </tr>
  </thead>
  <tbody>
<?php 
$structure = mysql_query("SELECT * FROM fee_structure RIGHT JOIN class ON fee_structure.class_id=class.class_id")or die(mysql_error());
while($row=mysql_fetch_array($structure)){
?>

<tr>
      <th scope="row"><?php echo $row['class_id'] ?></th>
      <td><?php echo $row['class_name'];?></td>
      <td><?php echo $row['termly_fee'];?></td>
      <td><?php echo $row['textbooks'];?></td>
      <td><?php echo $row['exercisebooks'];?></td>
      <td><?php echo $row['stationary'];?></td>
      <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $row['class_id'] ?>">
Update
</button></td>
     
<!-- Modal -->
<div class="modal fade" id="staticBackdrop<?php echo $row['class_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><?php echo $row['class_name'] ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="update_payment_structure.php">
     
            <div class="input-group mb-3">
            
                <span class="input-group-text" id="basic-addon1">Termly fee</span>
                <input type="hidden" class="form-control" value="<?php echo $row['class_id'];?>" name="class_id">
                <input type="text" class="form-control" placeholder="<?php echo $row['termly_fee'];?>" value="<?php echo $row['termly_fee'];?>" name="termlyfee" aria-label="Class" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="<?php echo $row['textbooks'];?>" value="<?php echo $row['textbooks'];?>" name="textbooks" aria-label="Textbook" aria-describedby="basic-addon2">
                <span class="input-group-text" id="basic-addon2">Annual textbooks</span>
                </div>

                <div class="input-group mb-3">
                <span class="input-group-text">Annual exercie books</span>
                <input type="text" class="form-control" placeholder="<?php echo $row['exercisebooks'];?>" value="<?php echo $row['exercisebooks'];?>" aria-label="Exercise book" name="exercisebooks">
                <span class="input-group-text">Stationary</span>
                <input type="text" class="form-control" placeholder="<?php echo $row['stationary'];?>" value="<?php echo $row['stationary'];?>" aria-label="Stationary" name="stationary">
                </div>

                <div class="col-12">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>
    </tr>

    
<?php }
?>

    
  </tbody>
</table>




</div>




<?php include 'add_payment_structure.php'?>

<?php include 'footer.php'?>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>