<?php
session_start();
require('../config.php');
if (empty($_SESSION['doc_id'])) {
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
    <link rel="shortcut icon" href="../images/logo.png">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>

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
    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
        <nav class="w3-sidebar w3-border w3-bar-block w3-card w3-top w3-light-grey" style="width:24%">
            <h3 class="w3-bar-item w3-button">Main Menu</h3>
            <a href="doctor.php" class="w3-bar-item w3-button w3-border-bottom w3-hover-blue" style="text-decoration:none"><i class="fa fa-home"></i> Doctor Panel</a>
            <a href="doctor_profile.php" class="w3-bar-item w3-button w3-border-bottom w3-hover-blue" style="text-decoration:none"><i class="fa fa-user"></i> Profile</a>
            <div class="w3-dropdown-hover">
                <a href="#" class="w3-bar-item w3-button w3-border-bottom w3-hover-blue" style="text-decoration:none"><i class="fa fa-user-md"></i> Patients</a>
                <div class="w3-dropdown-content w3-bar-block">
                    <a href="chat_patient.php" class="w3-bar-item w3-button w3-border-bottom w3-hover-blue" style="text-decoration:none">Chat Patients</a>
                    <a href="acceptPatient.php" class="w3-bar-item w3-button w3-border-bottom w3-hover-blue" style="text-decoration:none">View Requests</a>
                </div>
            </div>
            <a href="doctor_feedback.php" class="w3-bar-item w3-button w3-border-bottom w3-hover-blue" style="text-decoration:none"><i class="fa fa-feed"></i> Give Feedback</a>
            <a name="logout_id" href="logout.php" class="w3-bar-item w3-button w3-border-bottom w3-hover-blue" style="text-decoration:none"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
        </nav>
    </div>

    <!-- Page Content -->
    <div class="container contact" style="margin-left:24%">

        <h2 class="w3-center">D O C T O R | P A N E L</h2>

        <div id="top-nav" class="navbar navbar-static-top" style="margin-right:10px">
            <div class="container-fluid w3-light-grey">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="doctor.php">Dashboard</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><img src="<?php echo '../images/' . $_SESSION['image']  ?> " width="20" height="20" alt="Profile" style="border-radius:50%;"> Doctor <span class="caret"></span></a>
                            <ul id="g-account-menu" class="dropdown-menu" role="menu">
                                <li><a href="doctor.php"><i class="fa fa-user-secret"></i> My Profile</a></li>
                                <li><a href="#"><i class="fa fa-lock"></i> Change Password</a></li>
                            </ul>
                        </li>
                        <li name="logout_id"><a name="logout_id" href="../logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
            <a href="doctor.php"><strong><span class="fa fa-dashboard"></span> My Dashboard</strong></a>
            <hr>
            <?php if (isset($_SESSION['message'])) : ?>
                <div class="alert <?php echo $_SESSION['type'] ?>">
                    <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    unset($_SESSION['type']);
                    ?>
                </div>
            <?php endif; ?>
            <h4>Welcome, <?php echo $_SESSION['firstname'];
                            echo " ";
                            echo $_SESSION['lastname']; ?> </h4>
            <br>
            <?php if (!$_SESSION['verified']) : ?>
                <div class="alert alert-warning alert-dismissible" role="alert">
                    You need to verify your email address! Sign into your email account and click on the verification link we just emailed you
                    at <strong><?php echo $_SESSION['email']; ?></strong>
                </div>
            <?php else : ?>
                <button class="btn btn-lg btn-primary btn-block">I'm verified!!</button>
            <?php endif; ?>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="panel panel-default">
                                <div class="panel-body bk-primary text-light">
                                    <div class="stat-panel text-center">
                                        <div class="stat-panel-number h1 "><?php ?></div>
                                        <a href="acceptPatient.php" class="w3-button" style="border: 0; text-decoration:none">View Requests</a>
                                        <?php
                                        //count all friends 
                                        $count  = mysqli_query($conn, "SELECT COUNT(*) FROM  request WHERE request_status='Pending' ");
                                        if (mysqli_num_rows($count) == 1) {

                                            while ($row = mysqli_fetch_array($count)) {

                                                $total = $row[0];

                                                echo "<h2 class='text-danger'> $total </h2>";
                                            }
                                        } else {
                                            echo "<h2> 0 </h2>";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="panel panel-default">
                                <div class="panel-body bk-success text-light">
                                    <div class="stat-panel text-center">
                                        <div class="stat-panel-number h1 "><?php ?></div>
                                        <a href="#" class="w3-button" style="border: 0; text-decoration:none">Patients</a>
                                        <?php
                                        //count all patients 
                                        $count_p  = mysqli_query($conn, "SELECT COUNT(*) FROM  patient ");
                                        if (mysqli_num_rows($count_p) == 1) {

                                            while ($row_p = mysqli_fetch_array($count_p)) {

                                                $total_pat = $row_p[0];

                                                echo "<h2 class='text-danger'> $total_pat </h2>";
                                            }
                                        } else {
                                            echo "<h2> 0 </h2>";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>