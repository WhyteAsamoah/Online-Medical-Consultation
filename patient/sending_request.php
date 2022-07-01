<?php

session_start();
require('../config.php');

//sending request
$get_doctor = $_GET['send'];
$patient = $_SESSION['pat_id'];

$message = '';


$select = "SELECT * FROM request WHERE pat_id='$patient' AND doc_id='$get_doctor' AND request_status='Pending' OR request_status='Confirm'";

$run_select = $conn->query($select);

if ($run_select->num_rows > 0) {

?> <script type="text/javascript">
        alert("Already added!");
        window.location = 'request_doctor.php';
    </script>
    <?php

} else {

    $select2 = "SELECT * FROM request WHERE pat_id='$patient' AND doc_id='$get_doctor' AND request_status='Confirm' ";

    $run_select2 = $conn->query($select);

    if ($run_select2->num_rows > 0) {

    ?> <script type="text/javascript">
            alert("Already friends!");
            window.location = 'request_doctor.php';
        </script>
        <?php

    } else {

        $insert2 = "INSERT INTO request(pat_id, doc_id, request_status) VALUES('$patient', '$get_doctor', 'Pending')";

        $run_insert = $conn->query($insert2);

        if ($run_insert) {

        ?> <script type="text/javascript">
                alert("Friend request sent");
                window.location = 'request_doctor.php';
            </script>
<?php
        }
    }
}

?>