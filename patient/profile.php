
<?php 
session_start();
require('../config.php');
if(empty($_SESSION['pat_id'])){
  header("location: ../signIn.php");
}

?>
<?php
$message = '';

if(isset($_POST['save_profile'])){
    
    $profileImageName = time(). '-' .$_FILES['profileImage']['name'];
    //for image upload
    $target_dir = "../images/";
    $target_file = $target_dir . basename($profileImageName);
    //validate image size. size is calculated in bytes
    if($_FILES['profileImage']['size'] > 3000000 ){
        $message = "Image size should not be greated than 3MB";
        $_SESSION['type'] = 'alert-danger';

    }
    //check if file already exists

    if(file_exists($target_file)){
        $message = "File already exists";
        $_SESSION['type'] = 'alert-danger';
    }

    //upload image only if no errors 
    if(empty($error)){
        if(move_uploaded_file($_FILES['profileImage']['tmp_name'], $target_file)){
            $patientpro = $_SESSION['pat_id'] ;
            $sql = "UPDATE patient SET image='$profileImageName' WHERE pat_id='$patientpro' ";
            if(mysqli_query($conn, $sql)){
                $message = 'Image uploaded successfully';
                $_SESSION['type'] = 'alert-success';
            }else{
                $message = 'There was an error in the database';
                $_SESSION['type'] = 'alert-danger';
            }
        }else{
            $message = 'There was an error uploading the file';
        }
    }
}

?>
<?php
//profile view
$pat = $_SESSION['pat_id'];
$pro = mysqli_query($conn,"SELECT * FROM patient WHERE pat_id='$pat' ");
if(mysqli_num_rows($pro) > 0){
    $user = $pro->fetch_assoc();
}
?>
<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Justha Care</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="shortcut icon" href="../images/logo.png">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">
#profileDisplay{
    display: block; height: 100px; width: 50%; margin: 0ox auto; border-radius:100% ;
}
.img-placeholder{
    width: 60%;
    color: white; height: 100%; background-color: black; opacity: .7; border-radius: 50%; z-index: 2; position: absolute;
    left: 50%;
    transform: translate(-50%);
    display: none;
}
.img-placeholder h5{
    margin-top: 40%;
    color: white;
}
.img-div:hover .img-placeholder{
    display: block; 
    cursor: pointer;
}
</style>
</head>

<body>
<div class="">
    <!-- Navbar static top -->
    <div role="navigation" class="navbar navbar-default navbar-static-top" style="margin-left:25%">

        <div class="container">
            <div class="navbar-header">
                <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="" class="navbar-brand w3-xlarge">Online Medical Consultation and Subcription</a>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>

    <!-- Sidebar -->
    <nav class="w3-sidebar w3-border w3-bar-block w3-card w3-top w3-light-grey" style="width:24%">
        <h3 class="w3-bar-item w3-button">Main Menu</h3>
        <a href="patient.php" class="w3-bar-item w3-button w3-border-bottom w3-hover-light-blue" style="text-decoration:none"><i class="fa fa-home"></i> Patient Panel</a>
        <a href="profile.php" class="w3-bar-item w3-button w3-border-bottom w3-hover-light-blue" style="text-decoration:none"><i class="fa fa-user"></i> Profile</a>
        <a href="chat_doctor.php" class="w3-bar-item w3-button w3-border-bottom w3-hover-light-blue" style="text-decoration:none"><i class="fa fa-user-md"></i> Chat Doctor</a>
        <a href="request_doctor.php" class="w3-bar-item w3-button w3-border-bottom w3-hover-light-blue" style="text-decoration:none"><i class="material-icons" style="font-size:14px">chat</i> Request Chat</a>
        <a href="medical_record.php" class="w3-bar-item w3-button w3-border-bottom w3-hover-light-blue" style="text-decoration:none"><i class="fa fa-address-book-o"></i> Medical Records</a>
        <a href="patient_feedback.php" class="w3-bar-item w3-button w3-border-bottom w3-hover-light-blue" style="text-decoration:none"><i class="fa fa-feed"></i> Give Feedback</a>
        <a href="../logout.php" class="w3-bar-item w3-button w3-border-bottom w3-hover-light-blue" style="text-decoration:none"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
    </nav>

    <!-- Page Content -->
    <div class="container" style="margin-left:24%">
        <div class="w3-right">
            <form action="get" class="search">
                <input type="text" placeholder=" search..." id="textfield">
                <button type="submit">
                    <i class="fa fa-search"></i></button>
            </form>
        </div>
        <h3 class="w3-center">P A T I E N T | P A N E L</h3>
        <div id="top-nav" class="navbar navbar-default navbar-static-top" style="margin-right:10px">
            <div class="container-fluid w3-light-grey">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="patient.php">Dashboard</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"> <img src="<?php echo '../images/' .$user['image']  ?> " width="20" height="20" alt="Profile" style="border-radius:50%;"> Patient <span class="caret"></span></a>
                            <ul id="g-account-menu" class="dropdown-menu" role="menu">
                                <li><a href="profile.php"><i class="fa fa-user-circle"></i> My Profile</a></li>
                                <li><a href="change_password.php"><i class="fa fa-lock"></i> Change Password</a></li>
                            </ul>
                        </li>
                        <li><a href="../logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
            <a href="profile.php"><strong><span class="fa fa-user"></span> My Profile</strong></a><br><br>
            <br>
                
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-body w3-light-grey text-light">
                                    <div class="stat-panel ">
                            
                                <div class="stat-panel-title ">
                                <form action="profile.php" method="POST" enctype="multipart/form-data">
                                  <h5 class="text-center mb-3 mt-3">Update profile </h5>
                                    <?php if(!empty($message)): ?>
                                        <div class="alert <?php echo $_SESSION['type'] ?>" role="alert">
                                    <?php echo $message; ?>
                                         </div>
                                    <?php endif; ?>
                                    <div class="form-group text-center" style="position:relative;">
                                    <span class="img-div">
                                    <div class="text-center img-placeholder" onclick="triggerClick()">
                                    <h5>Update image </h5>
                                    </div>
                                    <img src="../images/avatar.png" onclick="triggerClick()" id="profileDisplay">
                                    </span>
                                    <input type="file" name="profileImage" onchange="displayImage(this)" id="profileImage" class="form-control" style="display:none;" >
                                    <label>Profile Image </label>
                                    <div class="form-group">
                                        <button type="submit" name="save_profile" class="btn btn-primary btn-block">Save</button>
                                    </div>
                                    </form>
                                    
                                     </div>
                                  </div>
                                    </div>
                                </div>
                            </div>

                            
                        </div>
                        <div class="col-md-8">
                            <div class="panel panel-default">
                                <div class="panel-body text-light w3-light-grey">
                                    <div class="stat-panel">
                                        <div class="stat-panel-number h1 "><?php ?></div>
                                        <div class="stat-panel-title text-">
                                
                                           <p> <img src="<?php echo '../images/' .$user['image']  ?> " width="120" height="120" alt="Profile" style="border-radius:50%;"> </p>
    
                                            <P><b>Name: </b><?php echo $_SESSION['firstname']; echo " "; echo $_SESSION['lastname']; ?></P>
                                            <p><b>Email: </b> <?php echo $_SESSION['email']; ?></P>
                                            <p><b>DOB: </b><?php echo $user['birthday']; ?> </p>
                                            
                                        </div>
                                    </div>
                                    <a href="#" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-md">Update info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <script type="text/javascript">
    function triggerClick(e) {
        document.querySelector('#profileImage').click();

    }
    function displayImage(e) {
        if (e.files[0]){
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
    </script>
</body>

</html>