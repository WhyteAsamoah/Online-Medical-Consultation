<?php
session_start();
if (isset($_SESSION['pat_id'])) {
    include_once "../config.php";
    $outgoing_id = $_SESSION['pat_id'];
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $output = "";
    $sql = "SELECT * FROM messages LEFT JOIN patient ON patient.pat_id = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY message_id";
    $query = mysqli_query($conn, $sql);
    $doc = mysqli_query($conn, "SELECT * FROM doctor WHERE doc_id = {$incoming_id}");
    $row_doc = mysqli_fetch_assoc($doc);

    if (mysqli_num_rows($query) > 0) {


        while ($row = mysqli_fetch_assoc($query)) {
            if ($row['outgoing_msg_id'] === $outgoing_id) {
                $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>' . $row['msg'] . '</p>
                                </div>
                                </div>';
            } else {
                $output .= '<div class="chat incoming">
                                <img src="../images/' . $row_doc['image'] . '" alt="image">
                                <div class="details">
                                    <p>' . $row['msg'] . '</p>
                                </div>
                                </div>';
            }
        }
    } else {
        $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
    }
    echo $output;
} else {
    header("location: ../patient_login.php");
}
