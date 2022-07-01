<?php
session_start();
require('../config.php'); 
if(empty($_SESSION['admin_id'])){
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
    <link rel="shortcut icon" href="images/logo.png">
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
                <a href="#" class="navbar-brand w3-xlarge">Online Medical Consultation and Subcription</a>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
    <!-- Sidebar -->
    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
        <nav class="w3-sidebar w3-border w3-bar-block w3-card w3-top w3-light-grey" style="width:24%">
            <h3 class="w3-bar-item w3-button">Main Menu</h3>
            <a href="admin.php" class="w3-bar-item w3-button w3-border-bottom w3-hover-blue" style="text-decoration:none"><i class="fa fa-home"></i> Admin Panel</a>
            <a href="manage_admin.php" class="w3-bar-item w3-button w3-border-bottom w3-hover-blue" style="text-decoration:none"><i class="fa fa-user"></i> Admins </a>
            <div class="w3-dropdown-hover">
                <a href="#" class="w3-bar-item w3-button w3-border-bottom w3-hover-blue" style="text-decoration:none"><i class="fa fa-user-md"></i> Doctors</a>
                <div class="w3-dropdown-content w3-bar-block">
                    <a href="view_doctor.php" class="w3-bar-item w3-button w3-border-bottom w3-hover-blue" style="text-decoration:none">View Doctors</a>
                    <a href="manage_doctor.php" class="w3-bar-item w3-button w3-border-bottom w3-hover-blue" style="text-decoration:none">Manage Doctors</a>
                </div>
            </div>
            <div class="w3-dropdown-hover">
                <a href="#" class="w3-bar-item w3-button w3-border-bottom w3-hover-blue" style="text-decoration:none"><i class="fa fa-users"></i> Patients</a>
                <div class="w3-dropdown-content w3-bar-block">
                    <a href="view_patient.php" class="w3-bar-item w3-button w3-border-bottom w3-hover-blue" style="text-decoration:none">View Patients</a>
                    <a href="manage_patient.php" class="w3-bar-item w3-button w3-border-bottom w3-hover-blue" style="text-decoration:none">Manage Patients</a>
                    <a href="view_request.php" class="w3-bar-item w3-button w3-border-bottom w3-hover-blue" style="text-decoration:none">View Requests</a>
                </div>
            </div>
            <a href="#" class="w3-bar-item w3-button w3-border-bottom w3-hover-blue" style="text-decoration:none"><i class="fa fa-feed"></i> Feedback</a>
            <a href="../admin_logout.php" class="w3-bar-item w3-button w3-border-bottom w3-hover-blue" style="text-decoration:none"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
        </nav>
    </div>
    <!-- Page Content -->
    <div class="container contact" style="margin-left:24%">
        
            <h2 class="w3-center">A D M I N | P A N E L</h2>

            <div id="top-nav" class="navbar navbar-static-top" style="margin-right:10px">
                <div class="container-fluid w3-light-grey">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="admin.php">Dashboard</a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="fa fa-user-circle"></i> Admin <span class="caret"></span></a>
                                <ul id="g-account-menu" class="dropdown-menu" role="menu">
                                    <li><a href="#"><i class="fa fa-user-secret"></i> My Profile</a></li>
                                    <li><a href="#"><i class="fa fa-lock"></i> Change Password</a></li>
                                </ul>
                            </li>
                            <li><a href="../admin_logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
            <a href="admin.php"><strong><span class="fa fa-dashboard"></span> My Dashboard</strong></a><br><br>
            <p>Welcome <?php echo $_SESSION['name']; ?> </p>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="panel panel-default">
                                <div class="panel-body bk-primary text-light">
                                    <div class="stat-panel text-center">
                                    <div class="stat-panel-number h1 "><?php ?></div>
                                    <div class="stat-panel-title text-uppercase">Total Patients</div>
                                    <?php 
                                //count all users 
                                    $count  = mysqli_query($conn, "SELECT COUNT(*) FROM  patient ");
                                    if(mysqli_num_rows($count) == 1){

                                        while($row=mysqli_fetch_array($count)){
                                            
                                            $total = $row[0];

                                            echo "<h2> $total </h2>";
                                        }
                                    
                                    }else{
                                        echo "<h2> 0  </h2>";
                                    }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="panel panel-default">
                                <div class="panel-body bk-gray text-light">
                                    <div class="stat-panel text-center">
                                    <div class="stat-panel-number h1 "><?php ?></div>
                                    <div class="stat-panel-title text-uppercase">Total Active Patients</div>
                                    <?php 
                                //count all active patient users 
                                $count_active = mysqli_query($conn, "SELECT COUNT(*) FROM patient WHERE status='Active now' ");

                                if (mysqli_num_rows($count_active) > 0) {

                                    while ($row_active = mysqli_fetch_array($count_active)) {
                                        $total_active = $row_active[0];
                                        echo "<h2> $total_active </h2>";
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
                                        <div class="stat-panel-title text-uppercase">Total Pending Users</div>
                                        <?php 
                                //count all pending request from patients to doctor 
                                    $count_pending  = mysqli_query($conn, "SELECT COUNT(*) FROM  request WHERE request_status='Pending' ");

                                    if(mysqli_num_rows($count_pending) > 0){

                                        while($rowpending=mysqli_fetch_array($count_pending)){
                                            
                                            $totalp = $rowpending[0];

                                            echo "<h2> $totalp </h2>";
                                        }
                                    
                                    }else{
                                        echo "<h2> 0  </h2>";
                                    }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="panel panel-default">
                                <div class="panel-body bk-danger text-light">
                                    <div class="stat-panel text-center">
                                        <div class="stat-panel-number h1 "><?php ?></div>
                                        <div class="stat-panel-title text-uppercase">Total Doctors </div>
                                    <?php 
                                        //count all doctors  
                                    $doc  = mysqli_query($conn, "SELECT COUNT(*) FROM  doctor ");

                                    if(mysqli_num_rows($doc) > 0){

                                        while($d=mysqli_fetch_array($doc)){
                                            
                                            $total_d = $d[0];

                                            echo "<h2> $total_d </h2>";
                                        }
                                    
                                    }else{
                                        echo "<h2> 0  </h2>";
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