<?php 
session_start();
require('../config.php');

// recject patient
$get_pat = $_GET['reject'];
$doct = $_SESSION['doc_id'];


$delete_request = "DELETE FROM  request WHERE pat_id='$get_pat' AND  doc_id='$doct' AND request_status='Pending' ";
                
$rundeletion=$conn->query($delete_request);

if($rundeletion){
?>
   <script>alert("Request rejected"); window.location='acceptPatient.php';  </script>		
  <?php

}else{
    ?>
    <script>alert("Error! couldn't  reject request"); window.location='acceptPatient.php';  </script>		    
  <?php
  
}

?>