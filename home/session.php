<?php
//Start session

//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || ($_SESSION['id'] == '')) {
    session_start();
    session_destroy();
    $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Logged out.</strong> You have been logged out successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
?>
    <script>
    window.location = '../index.php';
              </script>
<?php
    exit();
}

$session_id=$_SESSION['id'];
?>