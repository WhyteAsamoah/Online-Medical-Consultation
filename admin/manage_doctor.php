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
        <nav class="w3-sidebar w3-border w3-bar-block w3-card w3-top" style="width:24%">
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
                    <a href="view_patient.php" class="w3-bar-item w3-button w3-border-bottom w3-hover-blue" style="text-decoration:none">View Requests</a>
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
                        <li><a href="admin_logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
            <a href="doclist.php"><strong><span class="fa fa-dashboard"></span> Manage Doctors</strong></a>
            <hr>
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-10">
                        <h3 class="panel-title"></h3>
                    </div>
                    <div class="col-md-2" >
                    <div class="text-right">  <a href="register_doctor.php" class="btn btn-primary text-right">Add Doctor </a> </div> <br/>
                        <div class="w3-right">
                            <form action="get" class="search">
                                <input type="text" placeholder=" search..." id="textfield">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <table  class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Email</th>
                        <th>Healthcare title</th>
                        <!--<th>Description</th> -->
                        <th>Phone Number</th>
                        <th>Password</th>
                        <th>Date</th>
                        <th colspan="2">Action</th>
                
                    </tr>
                </thead>
        <?php 
        require('../config.php ');
        
        //show all doctors 
        $doctors = mysqli_query($conn, "SELECT * FROM doctor ");

            if(mysqli_num_rows($doctors) > 0 ){
                while($doc_row=mysqli_fetch_array($doctors)){
                        echo "<tr>" ;
                        echo "<td>" . $doc_row['doc_id']. "</td>";
                        echo "<td>" . $doc_row['firstname']. "</td>";
                        echo "<td>" . $doc_row['lastname']. "</td>";
                        echo "<td>" . $doc_row['email']. "</td>";
                        echo "<td>" . $doc_row['healthcare_title']. "</td>";
                        echo "<td>" . $doc_row['phone_num']. "</td>";
                        echo "<td>" . $doc_row['password']. "</td>";
                        echo "<td>" . $doc_row['creation_date']. "</td>";
                        echo '<td>	<a   class="btn btn-primary"  href="update_doctor.php?doc_id=' .$doc_row['doc_id']. '" onclick="return confirm(\'Are You sure you want to update?\');">Update </a> || 
                            <a  class="btn btn-danger"   href="manage_doctor.php?doc_id=' .$doc_row['doc_id']. '" onclick="return confirm(\'Are You sure you want to delete ?\');" >Delete </a> </td>';
                            
                        echo "</tr>" ;
                        
                    }
            }
            else {

                echo "<tr>" ;
                echo "<td class='text-center text-danger' colspan='9'> No available Doctors  </td>";
                echo "</tr>" ;

            }

            //delete doctor
            if(isset($_GET['doc_id'])){
                
                $doc_id = $_GET['doc_id'];
                
                $querydelete = "DELETE from doctor WHERE doc_id='$doc_id' ";
                
                $rundeletion=$conn->query($querydelete);
                
                if($rundeletion){
                ?>
				   <script>alert("Doctor deleted!"); window.location='manage_doctor.php'; </script>		
	              <?php
                }
                else{
                ?>
				    <script>alert("Doctor doesn't exist!"); window.location='manage_doctor.php';</script>		
	            <?php 	
                 }
            }

            //update doctor information
         
            if(isset($_POST['doc_id'])){
                
                $id = $_POST['doc_id'];
                $email = $_POST['email'];
                $fname = $_POST['phone_num'];
                $fname = $_POST['password'];
                
                $query_update ="UPDATE doctor set email='$t_password', healthcare_title='', phone_num='', password='' where doc_id='$id' ";
                
                $run_update=$conn->query($query_update);
                
                if($run_update){

                }

                else{
                ?>
                <script>alert("Doctor doesn't exist!");</script>
                <?php 
                }
            }
		
		
	    ?>

        </table>
        </div>
        <div id="userModal" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="userForm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Edit User</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="firstname" class="control-label">First Name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" required>
                            </div>
                            <div class="form-group">
                                <label for="lastname" class="control-label">Last Name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <label for="gender" class="control-label">Gender</label>
                                <label class="radio-inline">
                                    <input type="radio" name="gender" id="male" value="male" required>Male
                                </label>;
                                <label class="radio-inline">
                                    <input type="radio" name="gender" id="female" value="female" required>Female
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="healthtitle" class="control-label">Healthcare Title</label>
                                <input type="text" class="form-control" id="healthtitle" name="healthtitle" placeholder="Healthcare title" required>
                            </div>
                            <div class="form-group">
                                <label for="desc" class="control-label">Description</label>
                                <input type="text" class="form-control" id="desc" name="desc" placeholder="Description" required>
                            </div>
                            <div class="form-group">
                                <label for="phonenum" class="control-label">Phone number</label>
                                <input type="text" class="form-control" id="phonenum" name="phonenum" placeholder="Phone number" required>
                            </div>
                            <div class="form-group" id="passwordSection">
                                <label for="lastname" class="control-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="userid" id="userid" />
                            <input type="hidden" name="action" id="action" value="updateUser" />
                            <input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>