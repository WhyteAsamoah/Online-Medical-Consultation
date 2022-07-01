<?php
session_start();
require('../config.php');
if(empty($_SESSION['doc_id'])){
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
    <link rel="shortcut icon" href="../images/logo.png">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../js/redoc.js"></script>

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
            <a href="../logout.php" class="w3-bar-item w3-button w3-border-bottom w3-hover-blue" style="text-decoration:none"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
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
                            <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><img src="<?php echo '../images/' .$_SESSION['image']  ?> " width="20" height="20" alt="Profile" style="border-radius:50%;"> Doctor <span class="caret"></span></a>
                            <ul id="g-account-menu" class="dropdown-menu" role="menu">
                                <li><a href="doctor.php"><i class="fa fa-user-secret"></i> My Profile</a></li>
                                <li><a href="#"><i class="fa fa-lock"></i> Change Password</a></li>
                            </ul>
                        </li>
                        <li><a href="../logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-10 col-sm-9 col-xs-12">
            <h3>Patient Requests</h3>
            <hr>
            <div class="w3-container">
               
        <?php
        //show all friends  
        $msg = '' ;
        $doctor = $_SESSION['doc_id'];
        
        $request = mysqli_query($conn, "SELECT * FROM request WHERE request_status='Pending' AND doc_id='$doctor' ");

            if(mysqli_num_rows($request) > 0 ){
                while($row=mysqli_fetch_array($request)){
                    
                    $pat_id = $row['pat_id'];

                    $select_all = mysqli_query($conn, "SELECT * FROM patient WHERE pat_id='$pat_id' ");
                    if(mysqli_num_rows($select_all) > 0 ){

                        $pat_row=mysqli_fetch_array($select_all);
                        $firstname = $pat_row['firstname'];
                         $lastname = $pat_row['lastname'];

                    echo "<div class='urow'>";
                    echo "<div class='uname'><a href='#'> $firstname  $lastname</a></div>";
                    echo '<a  class="btn btn-primary" href="accept_request.php?accept='.$pat_row['pat_id'].'">Accept </a> ||  '; 
                    echo '<a  class="btn btn-danger" href="reject_request.php?reject='.$pat_row['pat_id'].'" onclick="return confirm(\'Are You sure to Reject?\');" >Reject</a>';
                    echo "</div>";

                    }
                } 
            
            }
            else {

            echo "<p style='color:red; text-align:center'>No Pending request</p>";

            }

          ?>      

            </div>

        </div>
    </div>



</body>

</html>