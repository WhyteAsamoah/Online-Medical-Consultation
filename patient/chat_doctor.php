<?php
session_start();
// Initialize the session
// Include config file
require('../config.php');
if (empty($_SESSION['pat_id'])) {
    header("location: ../signIn.php");
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
    <link rel="stylesheet" type="text/css" href="../css/redoc.css" />
    <link rel="stylesheet" type="text/css" href="./css/view.css" />
    <link rel="shortcut icon" href="../images/logo.png">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../js/redoc.js"></script>

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
            <a href="#" class="w3-bar-item w3-button w3-border-bottom w3-hover-light-blue" style="text-decoration:none"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
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
                        <a class="navbar-brand" href="chat_doctor.php">Chat dashboard</a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><img src="<?php echo '../images/' . $_SESSION['image']  ?> " width="20" height="20" alt="Profile" style="border-radius:50%;"> Patient <span class="caret"></span></a>
                                <ul id="g-account-menu" class="dropdown-menu" role="menu">
                                    <li><a href="profile.php"><i class="fa fa-user-secret"></i> My Profile</a></li>
                                    <li><a href="change_password.php"><i class="fa fa-lock"></i> Change Password</a></li>
                                </ul>
                            </li>
                            <li><a href="../logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-10 col-sm-9 col-xs-12">
                <h4>Chat Doctor</h4>
                <hr>
                <div class="wrapper">
                    <section class="users">
                        <h5>Select doctor to start chat</h5>
                        <header>
                            <div class="content">
                        </header>
                        <div class="users-list">
                            <?php include "chat-them.php"; ?>
                        </div>
                    </section>
                </div>


            </div>
        </div>
    </div>
</body>

</body>

</html>