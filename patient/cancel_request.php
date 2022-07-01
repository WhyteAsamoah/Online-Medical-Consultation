<?php 
session_start();
require('../config.php');

// recject patient
$get_doc = $_GET['cancel'];
$p = $_SESSION['pat_id'];


$delete_request = "DELETE FROM  request WHERE pat_id='$p' AND  doc_id='$get_doc' AND request_status='Pending' ";
                
$rundeletion=$conn->query($delete_request);

if($rundeletion){
?>
   <script>alert("Request cancelled"); window.location='request_doctor.php';  </script>		
  <?php

}else{
    ?>
    <script>alert("Error! couldn't  cancel request"); window.location='request_doctor.php';  </script>		    
  <?php
  
}

?>