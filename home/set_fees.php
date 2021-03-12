<?php

include('header.php');
?> 
<div class="text-center">
 <div class="spinner-border text-success" style="width: 3rem; height: 3rem;" role="status">
   <span class="visually-hidden">Loading...</span>
 </div>
</div>
<?php
//Include database connection details

$term = $_POST['term'];

mysql_query("UPDATE student SET balance='$term'")or die(mysql_error());
                        ?>

                     <script>
window.location = 'transactions.php';
					</script>
                        <?php 

                   

				?>