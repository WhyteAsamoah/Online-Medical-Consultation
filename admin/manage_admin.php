<?php 
session_start();
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
            <a href="admin_logout.php" class="w3-bar-item w3-button w3-border-bottom w3-hover-blue" style="text-decoration:none"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
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
                        <a class="navbar-brand" href="manage_admin.php">Manage Admins</a>
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
                            <li><a href="admin_logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
            <a href="manage_admin.php"><strong><span class="fa fa-dashboard"></span> Available Admin</strong></a>
            <hr>
            <div class="text-right">  <a href="register_admin.php" class="btn btn-primary text-right">Add admin </a> </div> <br/>
          
           
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                        <div class="stat-panel text-center">
                            <div class="stat-panel-number h1 "></div>
                            <div class="stat-panel-title text-uppercase">Available Admin </div>

                            <table id="userList" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Registration date</th>
                        <th colspan="2"> Action </th>
                
                    </tr>
                    </thead>
                 <?php 
                    require('../config.php ');
                //show all admin 
                $admin = mysqli_query($conn, "SELECT * FROM admin ");

                    if(mysqli_num_rows($admin) > 0 ){
                        while($admin_row=mysqli_fetch_array($admin)){
                                echo "<tr>" ;
                                echo "<td>" . $admin_row['admin_id']. "</td>";
                                echo "<td>" . $admin_row['name']. "</td>";
                                echo "<td>" . $admin_row['email']. "</td>";
                                echo "<td>" . $admin_row['password']. "</td>";
                                echo "<td>" . $admin_row['registration_date']. "</td>";
                                echo '<td>	<a   class="btn btn-primary"  href="update_admin.php?admin_id=' .$admin_row['admin_id']. '" onclick="return confirm(\'Are You sure you want to update?\');">Update </a> || 
                                <a  class="btn btn-danger"   href="manage_admin.php?admin_id=' .$admin_row['admin_id']. '" onclick="return confirm(\'Are You sure you want to delete ?\');" >Delete </a> </td>';
                    
                                echo "</tr>" ;
                                
                    }
    
                    }
                    else {

                    $msg =  "<p style='color:red; text-align:center'>No available admin</p>";

                    }


            //delete admin by getting the ID
            if(isset($_GET['admin_id'])){
                
                $admin_id = $_GET['admin_id'];
                
                $querydelete = "DELETE from admin WHERE admin_id='$admin_id' ";
                
                $rundeletion=$conn->query($querydelete);
                
                if($rundeletion){
                ?>
				   <script>alert("Admin deleted!"); window.location="manage_admin.php"; </script>		
	              <?php
                }
                else{
                ?>
				    <script>alert("Admin doesn't exist!");  window.location="manage_admin.php";  </script>		
	            <?php 	
                 }
            }

            //update admin information BY THE ID
         
            if(isset($_POST['admin_id'])){
                
                $id = $_POST['admin_id'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                
                $query_update ="UPDATE admin set email='$email', password='$password' where admin_id='$id' ";
                
                $run_update=$conn->query($query_update);
                
                if($run_update){
                    ?>
                    <script>alert("Admin deleted!"); window.location="manage_admin.php"; </script>		
                   <?php
                }

                else{
                ?>
                <script>alert("Admin doesn't exist!"); window.location="manage_admin.php"; </script>
                <?php 
                }
            }
		
		
	    ?>
        
         </table>
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