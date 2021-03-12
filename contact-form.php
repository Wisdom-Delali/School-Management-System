

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Email template.</title>
  </head>
  <body>


<div class="card">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">
    <form method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Sender Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="senderemail" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail2" class="form-label">Reciever's Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail2" name="email" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Number</span>
            <input type="number" name="number" class="form-control" aria-label="Amount (emails to send)" required>
            <span class="input-group-text">emails</span>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form></p>

  </div>
</div>               
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>


<?php

$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST'){

$address = $_POST['email'];
$senderemail = $_POST['senderemail'];
$number =$_POST['number'];


$e_body = "$address, here’s a chance to learn when you need to move.";
$e_content = "Dear $address, Join a Career Certificate information session
Starting March 15, we'll be hosting live Google Career Certificate information sessions. You'll hear directly from course instructors, explore the differences between each of the career fields, learn tips to be successful in the program, and get the chance to have your questions answered live.";

$msg = wordwrap( $e_body . $e_content, 70 );



$headers = "From: $senderemail" . PHP_EOL;
$headers .= "Reply-To: $senderemail" . PHP_EOL;
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;


for ($x = 0; $x <= $number; $x++) {
	$random = mt_rand(1000, 999999999);
	$e_subject = "Grow with Google, $random.";
    mail($address, $e_subject, $msg, $headers);

        // Email has sent successfully, echo a success page.
        echo  $address;
        echo $e_subject ;
        echo '<br/>' ;
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Emails sent.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    

    

  }
 
 }


?>