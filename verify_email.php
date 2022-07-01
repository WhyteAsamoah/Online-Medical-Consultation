<?php
session_start();
require './config.php';

if(isset($_GET['token'])){
    $token = $_GET['token'];

    $sql = "SELECT * FROM patient WHERE token='$token' LIMIT 1  ";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_array($result);
        $query = "UPDATE patient SET verified=1 WHERE token='$token' ";
        if(mysqli_query($conn, $query)){
            $_SESSION['pat_id'] = $user['pat_id'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['lastname'] = $user['lastname'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['verified'] = true;
            $_SESSION['message'] = "Your email address has been verified successfully";
            $_SESSION['type'] = "alert-success";
            header("Location: patient/patient.php ");
            exit(0);
        }
    }else{
         echo "User not found!";
     }
}else{
     echo "No token provided!";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Verify your email</title>
</head>
<body>
    
</body>
</html>