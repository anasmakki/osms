<?php
if(!isset(($_SESSION))){
  session_start();
  if($_SESSION['is_admin_login']){
    $aEmail = $_SESSION['aEmail'];
  }else {
    echo '<script>location.href = "login.php"</script>';
  }
}
include('../dbConnection.php');
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

<nav class="navbar navbar-dark bg-danger fixed-top shadow-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">OSMS</a>
  </div>
</nav>

<div class="container-fluid mt-3">
  <div class="row" style="margin-top:80px;">

    <div class="col-sm-2 bg-light sidebar py-3">
          <!-- Sidebar Start -->
            <div class="sidebar-sticky cn">
                <ul class="nav nav-pills flex-column d-print-none">
                <li class="nav-item">
                <a href="dashboard.php" class="nav-link <?php if(PAGE == 'dashboard') {echo 'active';} ?>">
                <i class="fas fa-tachometer-alt"></i>

                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a href="work.php" class="nav-link <?php if(PAGE == 'work') {echo 'active';} ?>">
                <i class="fas fa-tasks"></i>
                  Work Order
                </a>
              </li>
              <li class="nav-item">
                <a href="request.php" class="nav-link <?php if(PAGE == 'request') {echo 'active';} ?>">
                <i class="fas fa-hand-holding"></i>
                  Requests
                </a>
              </li>
              <li class="nav-item">
                <a href="assets.php" class="nav-link <?php if(PAGE == 'assets') {echo 'active';} ?>">
                  <i class="fa fa-assistive-listening-systems"></i>
                  Assets
                </a>
              </li>
              <li class="nav-item">
                <a href="technician.php" class="nav-link <?php if(PAGE == 'technician') {echo 'active';} ?>">
                <i class="fas fa-tools"></i>
                  Technician
                </a>
              </li>
              <li class="nav-item">
                <a href="requester.php" class="nav-link <?php if(PAGE == 'requester') {echo 'active';} ?>">
                <i class="fas fa-hand-holding-usd"></i>
                  Requester
                </a>
              </li>
              <li class="nav-item">
                <a href="soldproductreport.php" class="nav-link <?php if(PAGE == 'soldproductreport') {echo 'active';} ?>">
                  <i class="fas fa-poll"></i>
                  Sell Report
                </a>
              </li>
              <li class="nav-item">
                <a href="workreport.php" class="nav-link <?php if(PAGE == 'workreport') {echo 'active';} ?>">
                  <i class="fa fa-poll-h" aria-hidden="true"></i>
                  Work Report
                </a>
              </li>
              <li class="nav-item">
                <a href="changepass.php" class="nav-link <?php if(PAGE == 'changepass') {echo 'active';} ?>">
                  <i class="fa fa-key" aria-hidden="true"></i>
                  Change Password
                </a>
              </li>
              <li class="nav-item">
                <a href="../logout.php" class="nav-link">
                <i class="fas fa-fire-extinguisher    "></i>
                Logout
                </a>
              </li>                
                </ul>
            </div>
          <!-- Sidebar End -->
      </div>

      <!-- End 1st Column -->