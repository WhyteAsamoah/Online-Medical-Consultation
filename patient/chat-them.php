<?php
$outgoing_id = $_SESSION['pat_id'];
$request = mysqli_query($conn, "SELECT * FROM request WHERE request_status='Confirm' AND pat_id='$outgoing_id' ");
if (mysqli_num_rows($request) > 0) {
    while ($row = mysqli_fetch_array($request)) {

        $doc_id = $row['doc_id'];

        $select_d = mysqli_query($conn, "SELECT * FROM doctor WHERE doc_id='$doc_id' ");

        $output = "";
        if (mysqli_num_rows($select_d) == 0) {
            $output .= "No doctors are available to chat";
        } elseif (mysqli_num_rows($select_d) > 0) {

            error_reporting(-1);
            while ($row = mysqli_fetch_assoc($select_d)) {

                $sql2  = mysqli_query($conn, "SELECT * FROM messages WHERE (incoming_msg_id = {$row['doc_id']}
                    OR outgoing_msg_id = {$row['doc_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                    OR incoming_msg_id = {$outgoing_id}) ORDER BY message_id DESC LIMIT 1");

                //printing error messages
                if (false ===  $sql2) {
                    echo mysqli_error($conn);
                }

                $row2 = mysqli_fetch_assoc($sql2);

                if (mysqli_num_rows($sql2) > 0) {

                    $result = $row2['msg'];
                } else {
                    $result = "No message available";
                }

                (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
                ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
                ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
                ($outgoing_id == $row['doc_id']) ? $hid_me = "hide" : $hid_me = "";

                $output .= '<a style="text-decoration:none; cursor:pointer;" href="chat.php?user_id=' . $row['doc_id'] . '">
                <div class="content">
                <img src="../images/' . $row['image'] . '" alt="">
                <div class="details">
                    <span>' . $row['firstname'] . " " . $row['lastname'] . '</span>
                    <p>' . $you . $msg . '</p>
                </div>
                </div>
                <div class="status-dot ' . $offline . '"><i class="fa fa-circle"></i></div>
            </a>';
            }
        }
        echo $output;
    }
}
