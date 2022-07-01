<?php
session_start();
if (isset($_SESSION['doc_id'])) {
    include_once "../config.php";
    $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
    if (isset($logout_id)) {
        $sql = mysqli_query($conn, "UPDATE doctor SET status ='Offline Now' WHERE doc_id={$_SESSION['doc_id']}");
        if ($sql) {
            session_unset();
            session_destroy();
            header("location: ../doctor_login.php");
        }
    } else {
        header("location: /doctor.php");
    }
} else {
    header("location: ../doctor_login.php");
}
