<?php
include "dbconn.php";
include "header.php";

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

$member_id =$_POST['student_id'];
$firstname =$_POST['firstname'];
$lastname =$_POST['lastname'];
$class =$_POST['class'];
$dob =$_POST['dob'];
$gender =$_POST['gender'];
$username =$_POST['username'];

    mysql_query("UPDATE `student` set firstname='$firstname', lastname='$lastname', class_id='$class', gender='$gender', username='$username', dob='$dob' WHERE `student_id` = '$member_id'")
    or die(mysql_error()); 



    $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show" autohide:true role="alert">
    Student details successfully updated.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
      ?>
        <script>
        window.location = 'students.php';
                  </script>
    <?php }


?>