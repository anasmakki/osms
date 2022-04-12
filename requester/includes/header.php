<?php
// Including Database
include('../dbConnection.php');
// Session Starting
if(!(isset($_SESSION))){
    session_start();
}

// Redirect to Login Page if not login 
if(isset($_SESSION['is_login'])){
    $rEmail = $_SESSION['rEmail'];
} else{
    echo '<script> location.href = "requesterLogin.php"; </script>';
}

// Selecting Data from Database
$sql = "SELECT r_email, r_name FROM requesterlogin_tb WHERE r_email='$rEmail'";
$result = $conn->query($sql);
if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $rName = $row['r_name'];
} 

// Updating User Name PHP Code
if(isset($_REQUEST['nameupdate'])){
    $rName = $_REQUEST['rName']; 
    // Checking Empty Field
    if($rName == ""){
        $msg = '<div class="alert alert-danger text-center mt-3" role="alert">Not Updated! Please Enter Proper Name</div>'; 
    } else {
        $sql = "UPDATE requesterlogin_tb SET r_name = '$rName' WHERE r_email = '$rEmail'";
        if($conn->query($sql)){
            $msg = '<div class="alert alert-success text-center mt-3" role="alert">Name Updated Successfully!</div>';
        }
        
    }
}

// Logging out
if(isset($_REQUEST['logout'])){
    unset($_SESSION['is_login']);
    unset($_SESSION['rEmail']);
    echo '<script> window.location="requesterLogin.php"; </script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap Link -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Custom CSS Link -->
    <link rel="stylesheet" href="../css/custom.css">
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="../css/all.min.css">


    <title><?php echo TITLE ?></title>
</head>
<body>

<!-- Topbar Start -->
<nav class="navbar navbar-dark bg-danger text-white d-print-none">
  <div class="container-fluid">
    <a href="#" class="navbar-brand col-sm-3 col-md-2 mr-0">Requester Profile</a>
  </div>
</nav>
<!-- Topbar End -->

<!-- Main Body Start -->
<div class="row">
    <div class="col-sm-2 bg-light sidebar py-3">
        <!-- Sidebar Start -->
        <div class="sidebar-sticky cn">
            <ul class="nav nav-pills flex-column d-print-none">
                <li class="nav-item"><a href="requesterProfile.php" class="nav-link <?php if(PAGE == 'Profile') {echo 'active';}?>"><i class="fas fa-user me-2"></i>Profile</a></li>
                <li class="nav-item"><a href="SubmitRequest.php" class="nav-link <?php if(PAGE == 'SubmitRequest') {echo 'active';}?>"><i class="fab fa-accessible-icon me-2"></i>Submit Request</a></li>
                <li class="nav-item"><a href="CheckStatus.php" class="nav-link <?php if(PAGE == 'CheckStatus') {echo 'active';}?>"><i class="fas fa-align-center me-2"></i>Service Status</a></li>
                <li class="nav-item"><a href="RequesterChangePass.php" class="nav-link <?php if(PAGE == 'ChangePassword') {echo 'active';}?>"><i class="fas fa-key me-2"></i>Change Password</a></li>
                <li class="nav-item"><a href="../logout.php" class="nav-link"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
            </ul>
        </div>
        <!-- Sidebar End -->
    </div>