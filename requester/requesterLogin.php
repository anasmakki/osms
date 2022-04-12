<?php
// Including Database
include('../dbConnection.php');
// Session Starting
if(!(isset($_SESSION))){
    session_start();
}

// If Already Login Go to Profile Page
if(!(isset($_SESSION['is_login']))){

    if(isset($_REQUEST['rLogin'])){
        // Checking For Empty Fields
        if($_REQUEST['rEmail'] == "" || $_REQUEST['rPassword'] == ""){
            $msg = '<div class="alert alert-warning mt-3">Please Fill All Fields</div>';
        }
        else {
            // Trying to Login
            $rEmail = $_REQUEST['rEmail'];
            $rPassword = $_REQUEST['rPassword'];

            $sql = "SELECT r_email , r_password FROM requesterlogin_tb WHERE r_email = '$rEmail' AND r_password = '$rPassword'";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                // Login Successful
                $_SESSION['is_login'] = TRUE;
                $_SESSION['rEmail'] = $rEmail;
                echo '<script> window.location = "requesterProfile.php"; </script>';

            }
            else {
                // Not Login
                $msg = '<div class="alert alert-warning mt-3">Invalid Email or Password</div>';
            }
        }
    }

}

else {
    echo '<script>window.location = "requesterProfile.php";</script>';
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="../css/all.min.css">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet"> 

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">
    <title>Login</title>
</head>
<body>
    <div class="text-center mt-5">
        <h2><i class="fa fa-stethoscope"></i> Online Maintenance Management System</h2>
    </div>

    <div class="div text-center fs-5 mt-3">
        <p><i class="fas fa-user-lock me-1 text-danger fw-bold"></i> Requester Area(DEMO)</p>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 mx-auto mt-5">
                <form action="" method="post" class=" shadow-lg p-4">
                    <div class="form-group mb-3">
                        <i class="fa fa-user me-1"></i>
                        <label for="rEmail">Email</label>
                        <input type="text" class="form-control mt-2" name="rEmail" id="rEmail" placeholder="Email">
                    </div>
                    <div class="form-group mb-3">
                        <i class="fa fa-key me-1"></i>
                        <label for="rPassword">Password</label>
                        <input type="password" class="form-control mt-2" name="rPassword" id="rPassword" placeholder="Password">
                    </div>
                    <button type="submit" name="rLogin" class="btn btn-outline-danger w-100">Login</button>
                    <?php if(isset($msg)) {echo $msg;} ?>
                </form>
            </div>
        </div>
    </div>

    <div class="div text-center mt-4">
        <a href="../index.php" class="btn btn-info mx-auto text-white shadow-md">Back to Home</a>
    </div>


    <!-- Jquery , Popper and Bootstrap Javascript -->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>   

    <!-- Font Awesome Javascript -->
    <script type="text/javascript" src="../js/all.min.js"></script>
    
    <!-- Sweet Alert Javascript -->
    <script type="text/javascript" src="../js/sweetalerts.min.js"></script>
    
    <!-- Custom Javascript -->
    <script type="text/javascript" src="../js/custom.js"></script>    
</body>
</html>