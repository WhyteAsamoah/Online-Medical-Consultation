<?php 
session_start();
require("../config.php");

if(empty($_SESSION['admin_id'])){
  header("location: ../signIn.php");
}

?>
<?php

//show admin info
$patient = mysqli_query($conn, "SELECT * FROM patient ");

if(mysqli_num_rows($patient) > 0 ){
    while($pat_row=mysqli_fetch_array($patient)){
        
        //show the name in the update form
           $pat_fname =  $pat_row['firstname'] ;
           $pat_lname =  $pat_row['lastname'] ;
           $pat_id =     $pat_row['pat_id'] ;
            
}

}

if(isset($_POST['update'])){

    $pat_id = $_GET['pat_id'];
    $email = $_POST['email'] ;
    $password = $_POST['password'] ;

    $select = "SELECT * FROM patient WHERE email='$email' ";
    $run_selection=$conn->query($select);

    if($run_selection->num_rows == 1 ){

        echo  "<p style='color:red; text-align:center;'>Email already exist!</p>";

    }else{

        $upate = "UPDATE patient set email='$email' OR password='$password' WHERE pat_id='$pat_id' ";

        $run_update =$conn->query($upate);
    
        if($run_update){

                ?>
                <script type="text/javascript">alert("Updated successfully"); window.location="manage_patient.php"; </script>
                <?php 
        }else{
            ?>
            <script>alert('Update not successfully'); window.location="update_patient.ph";  </script>
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
                    <h1>Update Patient Info</h1>
                    <hr>
                
                    <i class="fa fa-user icon"></i>
                    <label for="firstname"><b>Name</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text"   value="<?php echo $pat_fname;  ?> <?php  echo $pat_lname;  ?> " readonly required>
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
                       <a class="text-right" href="manage_patient.php">Back to dashboard </a>
            </form>
        </div>
    </div>
</body>

</html>