
<?php include 'header.php'?>




<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Files Page</h1>





  <div class="card shadow mb-4">

            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Files</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Download</th>
                      <th>Change</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Date</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Download</th>
                      <th>Change</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
                  $file_query=mysql_query("SELECT * FROM files WHERE admin_id='1'") or die(mysql_error());
                  while($row=mysql_fetch_array($file_query)){ 
                      ?>
                     <tr>
                      <td><?php echo $row['fdatein']; ?> </td>
                   
                      <td><?php echo $row['fname']; ?> </td>
                      <td><?php echo $row['fdesc']; ?> </td>
                   

                      <td><a href="<?php echo $row['floc']; ?>" target="_blank" role="button" class="btn btn-success">View</a></td> 
                      <td><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $row['file_id']; ?>">Modal</button></td> 
                    <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop<?php echo $row['file_id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel"><?php echo $row['fname'];?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form method="POST" action="file_update.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">File name</label>
                                <input type="text" class="form-control" value="<?php echo $row['fname'];?>" name="filename" id="filename" aria-describedby="emailHelp">
                                <input type="hidden" class="form-control" value="<?php echo $row['file_id'];?>" name="fileid" required>
                                <div id="emailHelp" class="form-text">Choose a name for your file.</div>
                            </div>
                            <div class="mb-3">
                            <label for="formFile" class="form-label">Select a file</label>
                            <input class="form-control" type="file"  name="uploaded_file" id="fileInput" required>
                            </div>
                            <div class="input-group">
                            <span class="input-group-text">Description</span>
                            <textarea class="form-control" aria-label="With textarea" name="filedescription" placeholder="<?php echo $row['fdesc'];?>" value="<?php echo $row['fdesc'];?>"></textarea>
                            </div>
                            <br/>
                            <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form method="POST" action="delete_file.php">
                                <input type="hidden" name="id" value=<?php echo $row['file_id'] ?>>
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                                </form>
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
                  <form method="POST" action="add_file.php" enctype="multipart/form-data">
<div class="form-row">
<div class="form-group col-md-4">
<label for="title">Name</label>
<input type="text" class="form-control" id="filename" name="filename" required>
</div>
<div class="mb-3">
<label for="formFile" class="form-label">Select a file</label>
<input class="form-control" type="file"  name="uploaded_file" id="fileInput" required>
</div>
<div class="input-group">
<span class="input-group-text">Description</span>
<textarea class="form-control" aria-label="With textarea" name="filedescription" placeholder="Description" required></textarea>
</div>
<button type="submit" class="btn btn-outline-primary">Add file</button>
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

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

</body>

</html>
