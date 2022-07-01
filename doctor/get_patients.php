<?php
session_start();
include_once "../config.php";
$outgoing_id = $_SESSION['doc_id'];
$request = mysqli_query($conn, "SELECT * FROM request WHERE request_status='Confirm' AND doc_id='$outgoing_id' ");
if (mysqli_num_rows($request) > 0) {
    while ($row = mysqli_fetch_array($request)) {

        $pat_id = $row['pat_id'];

        $select_pat = mysqli_query($conn, "SELECT * FROM patient WHERE pat_id='$pat_id' ");

        $output = "";
        if (mysqli_num_rows($select_pat) == 0) {
            $output .= "No patients are available to chat";
        } elseif (mysqli_num_rows($select_pat) > 0) {
            include_once "data.php";
        }
        echo $output;
    }
}
