<?php 
session_start();

require_once('config.php');

?>
<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="css/patlogin.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="shortcut icon" href="./images/logo.png" type="text/image">

    <title>Justha Care</title>

</head>

<body>
    <div id="id01" class="w3-container">
        <div class="w3-modal-content w3-card-4" style="max-width:600px; margin-top:80px">
            
            <form  method="POST" class="w3-container">
                <h1 class="text-center p-3">Admin Login</h1>

                <i class="fa fa-envelope icon"></i>
                <label for="name"><b>Email</b></label>
                <input class="w3-input w3-border w3-margin-bottom" type="email" placeholder="Enter email" name="email"  required>
                <br>

                <i class="fa fa-key icon"></i>
                <label for="psw"><b>Password</b></label>
                <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="password"  required> <br>
                <?php 
                  
                  if(isset($_POST['adminLogin'])){

                    //check if user name is empty
                    $email = $_POST['email'];
                    $password = $_POST['password'];


                    $select = mysqli_query($conn, "SELECT * FROM admin  WHERE email='$email' and password='$password'");

                    if(mysqli_num_rows($select) == 1){

                        $admin = $select->fetch_assoc();
                        $_SESSION['admin_id'] = $admin['admin_id'];
                        $_SESSION['name'] = $admin['name'];

                        header("Location: admin/admin.php ");
                    }
                    else {

                    echo "<p style='color:red; text-align:center'>Wrong email or password</p>";

                    }

                    }

                    ?>
                <button class="w3-button w3-block w3-blue w3-section w3-padding" type="submit" name="adminLogin"  class="btn">Login</button>
                <br /><br />
            </form>
        </div>
    </div>

</body>

</html>