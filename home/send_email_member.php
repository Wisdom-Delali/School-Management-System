<?php
if ($method == 'POST'){
$to = $_POST['receipient'];
$subject = $_POST['subject'];
$txt = $_POST['message'];;
$headers = "From: Fullness Center Chapel" . "\r\n" .
"CC: wisdom_delali@yahoo.com";

mail($to,$subject,$txt,$headers);
}

if(mail($to,$subject,$txt,$headers)) {

    // Email has sent successfully, echo a success page.
    header('Location: members.php');
    echo "<fieldset>";
    echo "<div id='success_page'>";
    echo "<h1>Sent</h1>";
    echo "</div>";
    echo "</fieldset>";
  
  } else {
  
    echo 'ERROR!';
  
  }

?>