<?php 
session_start();
require('config.php');
require_once './sendEmails.php';
            
$errors = [];

if(isset($_POST['login'])){
//check if user name is empty
$email = $_POST['email'];
$password = $_POST['password'];
$results = mysqli_query($conn, "SELECT * FROM patient WHERE email='$email' and password='$password'");

if(mysqli_num_rows($results) == 1){

//$status = mysqli_query($conn, "UPDATE patient SET status='Active now' WHERE email='$email' and password='$password'");

    $patient = $results->fetch_assoc();
    $_SESSION['pat_id'] = $patient['pat_id'];
    $_SESSION['firstname'] =  $patient['firstname'];
    $_SESSION['lastname'] =  $patient['lastname'];
    $_SESSION['verified'] =  $patient['verified'];
    $_SESSION['email'] = $patient['email'];
    $_SESSION['message'] = 'You are logged in!';
    $_SESSION['type'] =  'alert-success';
    $_SESSION['verified'] =  $patient['verified'];
    $_SESSION['image'] = $patient['image'];
    header("Location: patient/patient.php ");
    exit(0);
}
else {
    $errors['login_fail'] = "<p style='color:red; text-align:center'>Wrong email or password</p>";
     $_SESSION['type'] = 'alert-danger';

}

}

?>
<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="css/patlogin.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="shortcut icon" href="images/logo.png">

    <title>Justha Care</title>

</head>

<body>
    <div id="id01" class="w3-container">
        <div class="w3-modal-content w3-card-4" style="max-width:600px">
            <div class="w3-center"><br>
                <span  class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Login">×
                </span>
            </div>
            <form  method="POST" class="w3-container">
                <h1 class="text-center">Patient's Login </h1>
                    <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $error ): ?>
                       
                        <?php echo $error; ?>
                    
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                <i class="fa fa-envelope icon"></i>
                <label for="name"><b>Email</b></label>
                <input class="w3-input w3-border w3-margin-bottom" type="email" placeholder="Enter email" name="email"  required>
                <br>

                <i class="fa fa-key icon"></i>
                <label for="psw"><b>Password</b></label>
                <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="password"  required>
                <button class="w3-button w3-block w3-blue w3-section w3-padding" type="submit" name="login"  class="btn">Login</button>
                <br /><br />
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                    <span class="w3-right w3-padding w3-hide-small">Forgot <a href="#">password?</a></span>
                </label>
            
                <div class="contain">
                    <p>Don't have an account? <a href="Register.php">Sign up</a>.</p>

                </div>
            </form>
        </div>
    </div>

</body>

</html>