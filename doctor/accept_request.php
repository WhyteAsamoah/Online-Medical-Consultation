<?php 
session_start();
require('../config.php');

// recject patient
$get_pat = $_GET['accept'];
$doct = $_SESSION['doc_id'];

$update_request = "UPDATE request SET request_status='Confirm' WHERE pat_id='$get_pat' AND  doc_id='$doct'";
                
$update_request=$conn->query($update_request);

if($update_request){
?>
   <script>alert("Request accepted"); window.location='acceptPatient.php';  </script>		
  <?php

}else{
    ?>
    <script>alert("Error! couldn't  reject request"); window.location='acceptPatient.php';  </script>		    
  <?php
  
}

?>