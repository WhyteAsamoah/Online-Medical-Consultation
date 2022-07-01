<?php 
session_start();
if(empty($_SESSION['admin_id'])){
  header("location: ../signIn.php");
}

?>

<?php
require("../config.php");

if(isset($_POST['register'])){

    $name = $_POST['name'] ;
    $email = $_POST['email'] ;
    $password = $_POST['password'] ;

    $select = "SELECT * FROM admin WHERE email='$email' ";
    $run_selection=$conn->query($select);

    if($run_selection->num_rows>0 ){

        echo  "<p style='color:red; text-align:center;'>Email already exist!</p>";

    }else{

        $insert ="Insert INTO admin(name, email, password) VALUES('$name', '$email', '$password')";

        $run_insertion =$conn->query($insert);
    
        if($run_insertion){

                ?>
                <script type="text/javascript">alert("Add successfully"); window.location="manage_admin.php"; </script>
                <?php 
        }else{
            ?>
            <script>alert('Registration not successfully'); window.location="register_admin.php";  </script>
            <?php 
        }
    
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

    <link rel="shortcut icon" href="images/logo.png">

    <title>Justha Care</title>

</head>

<body>
    <div id="id01" class="w3-container">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:650px">
            <div class="w3-center"><br>
                <span  class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×
                </span>
            </div>
            <form action="" method="POST" class="w3-container">
                <div class="w3-section">
                    <h1>Admin's Registration</h1>
                    <hr>
                
                    <i class="fa fa-user icon"></i>
                    <label for="firstname"><b>Name</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter  name" name="name" required>
                    <span class="error">*</span>

                    <i class="fa fa-envelope icon"></i>
                    <label for="email"><b>Email</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Email" name="email" id="email" required>
                    <span class="error">*</span>

                    <i class="fa fa-key icon"></i>
                    <label for="password"><b>Password</b></label>
                    <input class="w3-input w3-border" type="password" placeholder="Enter Password *******" name="password" id="password" required>
                    <hr>
                    <button class="w3-button w3-block w3-blue w3-section w3-padding" type="submit" name="register" id="register">Register</button> 
                       <a class="text-right" href="manage_admin.php">Back to dashboard </a>
            </form>
        </div>
    </div>
</body>

</html>