<?php
session_start();

session_destroy();
session_start();
if(isset($_SESSION['pat_id'])){
    include_once "config.php";
    $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
    if(isset($logout_id)){
        $status = "Offline Now";
        $sql = mysqli_query($conn, "UPDATE patient SET status = '{$status}' WHERE pat_id={$_SESSION['pat_id']}");
        if($sql){
            session_unset();
            session_destroy();
            header("location: ../patient_login.php");
        }
    }else{
        header("location: /patient.php");
    }
}else{  
    header("location: ../patient_login.php");
}
