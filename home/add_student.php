
<?php include 'header.php'?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Add student Page</h1>


          <form method="POST" action="file_upload.php" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="last_name">Last Name</label>
      <input type="text" class="form-control" name="last_name" id="last_name" required>
    </div>
    <div class="form-group col-md-4">
      <label for="first_name">First Name</label>
      <input type="text" class="form-control" id="first_name" name="first_name" required>
    </div>
    <div class="form-group col-md-4">
      <label for="username">Username</label>
      <input type="text" class="form-control" id="username" name="username" required>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-4">
    <label for="gender">Gender</label>
    <select id="gender" name="gender" class="form-control" required>
        <option selected>Choose...</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>
  </div>
  
</div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="dob">Date of birth</label>
      <input type="date" class="form-control" id="dob" name="dob" required>
    </div>
    <div class="form-group col-md-4">
      <label for="class">Class</label>
      <select id="class" name="class" class="form-control" required>
        <option selected>Choose...</option>
        <option value="1">Roses</option>
        <option value="2">Lilies</option>
        <option value="3">Tulip</option>
        <option value="4">Daisy</option>
        <option value="5">Eagles</option>
        <option value="6">Year 1</option>
        <option value="7">Year 2</option>
        <option value="8">Year 3</option>
        <option value="9">Year 4</option>
        <option value="10">Year 5</option>
        <option value="11">Year 6</option>
        <option value="12">JHS 1</option>
        <option value="13">JHS 2</option>
        <option value="14">JHS 3</option>
      </select>
    </div>
  </div>
  <div class="form-row">
  <div class="mb-4">
  <label for="formFileSm" class="form-label">Image</label>
<input name="uploaded_file"  class="input-file uniform_on" id="fileInput" type="file" required>
</div>
  </div>

  <button type="submit" class="btn btn-primary">Add Student</button>
</form>



        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

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