
<?php
session_start();
require("config.php");
require_once './sendEmails.php';

$errors =  [];

if(isset($_POST['register'])){

    $firstname = $_POST['firstname'] ;
    $lastname = $_POST['lastname'] ;
    $email = $_POST['email'] ;
    $phonenum = $_POST['phonenum'] ;
    $gender = $_POST['gender'] ;
    $birthday = $_POST['birthday'] ;
    $password = $_POST['password'] ;
    $token = bin2hex(random_bytes(50));//generate unique token 

    $select = "SELECT * FROM patient WHERE email='$email' ";
    $run_selection=$conn->query($select);

    if($run_selection->num_rows>0 ){

        $errors['email'] =  "Email already exists";

    }else{

        $insert ="INSERT INTO patient(firstname, lastname, email, phonenum, gender, birthday, password, token) VALUES('$firstname', '$lastname', '$email', '$phonenum', '$gender', '$birthday', '$password', '$token')";

        $run_insertion =$conn->query($insert);
    
        if($run_insertion){


            //Send verification email to user
            sendVerificationEmail($email, $token);

            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['email'] = $email;
            $_SESSION['verified'] = false;
            $errors['message'] =  "You registered successfully, Login here";
            $_SESSION['type'] = 'alert-success';
            //redirect to sign page 
            header("location: signIn.php "); 
             
        }else{

            $_SESSION['error_msg'] = "Registration not successfully";
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
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:650px">
            <div class="w3-center"><br>
                <span class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×
                </span>
            </div>
            <form action="" method="POST" class="w3-container">
                <div class="w3-section">
                    <h1>Patient's Registration</h1>
                    <hr>
                    <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $error ): ?>
                        
                        <?php echo $error; ?>
                        
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                    <p><span class="error">* required field</span></p>
                    <br>
                    <span class="error">*</span>

                    <i class="fa fa-user icon"></i>
                    <label for="firstname"><b>First Name</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter first name" name="firstname" id="firstname" required>
                    <span class="error">*</span>

                    <i class="fa fa-user icon"></i>
                    <label for="lastname"><b> Last Name</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter last name" name="lastname" id="lastname" required>
                    <span class="error">*</span>

                    <i class="fa fa-envelope icon"></i>
                    <label for="email"><b>Email</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Email" name="email" id="email" required>
                    <span class="error">*</span>

                    <i class="fa fa-phone"></i>
                    <label for="phonenum"><b>Phone Number</label> 
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter phone number" name="phonenum"  minlength="10" maxlength="12" id="phonenum" required> 
                    <span class="error">*</span>
                    

                    <i class="fa fa-envelope icon"></i>
                    <label for="gender"><b>Gender</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Gender" name="gender" id="gender" required>
                    <span class="error">*</span>

                    <i class="fa fa-envelope icon"></i>
                    <label for="birthday"><b>Birthday</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="date" name="birthday" id="birthday" required>
                    <span class="error">*</span>

                    <i class="fa fa-key icon"></i>
                    <label for="password"><b>Password</b></label>
                    <input class="w3-input w3-border" type="password" placeholder="Enter Password *******" name="password" id="password" required>
                    <hr>

                    <p>By creating an account you agree to our <a href="#" class="terms">Terms & Privacy</a>.</p>

                    <button class="w3-button w3-block w3-blue w3-section w3-padding" type="submit" name="register" id="register">Register</button>
                    <div class="container signin">
                        <p>Already have an account? <a href="signIn.php">Sign in</a>.</p>
                    </div>
            </form>
        </div>
    </div>
</body>

</html>