<?php 
require("../config.php");
session_start();
if(empty($_SESSION['admin_id'])){
  header("location: ../signIn.php");
}

?>
<?php

//show doctor info
$doctor = mysqli_query($conn, "SELECT * FROM doctor ");

if(mysqli_num_rows($doctor) > 0 ){
    while($doc_row=mysqli_fetch_array($doctor)){
        
        //show the name in the update form
           $doc_fname =  $doc_row['firstname'] ;
           $doc_lname =  $doc_row['lastname'] ;
           $doc_id =     $doc_row['doc_id'] ;
            
}

}

if(isset($_POST['update'])){

    $doc_id = $_POST['doc_id'];
    $email = $_POST['email'] ;
    $password = $_POST['password'] ;

    $select = "SELECT * FROM doctor WHERE email='$email' ";
    $run_selection=$conn->query($select);

    if($run_selection->num_rows == 1 ){

        echo  "<p style='color:red; text-align:center;'>Email already exist!</p>";

    }else{

        $upate ="UPDATE doctor SET email ='$email' AND password ='$password' WHERE doc_id='$doc_id' ";

        $run_update =$conn->query($upate);
    
        if($run_update){

                ?>
                <script type="text/javascript">alert("Updated successfully"); window.location="manage_doctor.php"; </script>
                <?php 
        }else{
            ?>
            <script>alert('Update not successfully'); window.location="update_doctor.php";  </script>
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
                    <h1>Update Doctor Info</h1>
                    <hr>
                
                    <i class="fa fa-user icon"></i>
                    <label for="firstname"><b>Name</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text"   value="<?php echo $doc_fname;  ?> <?php  echo $doc_lname;  ?> " readonly required>
                    <span class="error">*</span>

                    <i class="fa fa-envelope icon"></i>
                    <label for="email"><b>Email</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="email" placeholder="update Email" autocomplete="off" name="email" id="email" required>
                    <span class="error">*</span>

                    <i class="fa fa-key icon"></i>
                    <label for="password"><b>Password</b></label>
                    <input class="w3-input w3-border" type="password" placeholder="upate Password *******"  autocomplete="off" name="password" id="password" required>
                    <hr>
                    <button class="w3-button w3-block w3-blue w3-section w3-padding" type="update" name="update" id="udate">Update</button> 
                       <a class="text-right" href="manage_doctor.php">Back to dashboard </a>
            </form>
        </div>
    </div>
</body>

</html>
