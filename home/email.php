
<?php include 'header.php'?>





<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Mailing Page</h1>




  <form method="POST">

  <div class="form-group">
    <label for="exampleFormControlSelect2">Select Receipient</label>
    <select multiple class="form-control" id="exampleFormControlSelect2" name="receipient[]">
    <?php
            $member_query = mysql_query("select * from members order by last_name DESC")or die(mysql_error());
            while($row = mysql_fetch_array($member_query)){
                
                ?>


      <option value="<?php echo $row['email_address']; ?>"><?php echo $row['last_name']; ?> <?php echo $row['first_name']; ?></option>

      <?php }

?>
    
    </select>
  </div>
  <div class="form-group col-md-4">
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
  


<?php

$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST'){

  $recipients = $_POST['receipient'];
  $email_array = explode(",",$recipients);
  foreach($email_array as $email)
  {
      $to      =  $email;
      $subject = $_POST['subject'];
      $message = $_POST['message'];
     $headers = 'From: Fullness Centre Chapel' . "\r\n" .
      'X-Mailer: PHP/' . phpversion();
      mail($to, $subject, $message, $headers);

  }
  if(mail($to, $subject, $message, $headers)) {

    // Email has sent successfully, echo a success page.
    header('Location: email.php');
    echo "<fieldset>";
    echo "<div id='success_page'>";
    echo "<h1>Sent</h1>";
    echo "</div>";
    echo "</fieldset>";
  
  } else {
  
    echo 'ERROR!';
  
  }

}


?>





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
