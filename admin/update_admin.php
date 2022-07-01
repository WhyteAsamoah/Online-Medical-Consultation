<?php 
session_start();
if(empty($_SESSION['admin_id'])){
  header("location: ../signIn.php");
}

?>

<?php
require("../config.php");

//show admin info
$admin = mysqli_query($conn, "SELECT * FROM admin ");

if(mysqli_num_rows($admin) > 0 ){
    while($admin_row=mysqli_fetch_array($admin)){
        
        //show the name in the update form
           $admin_name =  $admin_row['name'] ;
           $admin_id =  $admin_row['admin_id'] ;
            
}

}

if(isset($_POST['update'])){

    $admin_id = $_GET['admin_id'];
    $email = $_POST['email'] ;
    $password = $_POST['password'] ;

    $select = "SELECT * FROM admin WHERE email='$email' ";
    $run_selection=$conn->query($select);

    if($run_selection->num_rows == 1 ){

        echo  "<p style='color:red; text-align:center;'>Email already exist!</p>";

    }else{

        $upate ="UPDATE admin set email='$email' AND password='$password' WHERE admin_id='$ad_id' ";

        $run_update =$conn->query($upate);
    
        if($run_update){

                ?>
                <script type="text/javascript">alert("Updated successfully"); window.location="manage_admin.php"; </script>
                <?php 
        }else{
            ?>
            <script>alert('Update not successfully'); window.location="register_admin.php";  </script>
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
                    <h1>Admin's info update</h1>
                    <hr>
                
                    <i class="fa fa-user icon"></i>
                    <label for="firstname"><b>Name</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text"   value="<?php echo  $admin_name ; ?> " readonly required>
                    <span class="error">*</span>

                    <i class="fa fa-envelope icon"></i>
                    <label for="email"><b>Email</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="update Email" autocomplete="off" name="email" id="email" required>
                    <span class="error">*</span>

                    <i class="fa fa-key icon"></i>
                    <label for="password"><b>Password</b></label>
                    <input class="w3-input w3-border" type="password" placeholder="upate Password *******"  autocomplete="off" name="password" id="password" required>
                    <hr>
                    <button class="w3-button w3-block w3-blue w3-section w3-padding" type="update" name="update" id="udate">Update</button> 
                       <a class="text-right" href="manage_admin.php">Back to dashboard </a>
            </form>
        </div>
    </div>
</body>

</html>