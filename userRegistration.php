<?php
include('dbConnection.php');

if(isset($_REQUEST['rSignup'])){

  $rName = $_REQUEST['rName'];
  $rEmail = $_REQUEST['rEmail'];
  $rPassword = $_REQUEST['rPassword'];

  echo "<script> window.location = '#registration'; </script>";
  // Checking Empty Fields
  if($_REQUEST['rName'] == "" || $_REQUEST['rEmail'] == "" || $_REQUEST['rPassword']== ""){

    $msg = '<div class="alert alert-danger text-center mt-3">All Fields are required!</div>';

  }

  // Checking for valid Email using regex
  else if(!preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $rEmail)){
    $msg = '<div class="alert alert-danger text-center mt-3">Invalid Email Address!</div>';
  }

  else {
    $rName = $_REQUEST['rName'];
    $rEmail = $_REQUEST['rEmail'];
    $rPassword = $_REQUEST['rPassword'];

    // If Email Already Exist
    $sql = "SELECT r_email FROM requesterlogin_tb WHERE r_email = '$rEmail' ";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
      $_SESSION['title'] = "Email Already Used";
      $_SESSION['icon'] = "error";
      $_SESSION['button'] = "Okay!";
    }

    else {
      // Inserting into database
      $sql = "INSERT INTO requesterlogin_tb (r_name , r_email, r_password) VALUES('$rName', '$rEmail', '$rPassword')";
      $result = $conn->query($sql);
      if($result){
        $_SESSION['title'] = "Registration Successful!";
        $_SESSION['icon'] = "success";
        $_SESSION['button'] = "Okay!";
      } else {
        $_SESSION['title'] = "Please Try Again, System is busy!";
        $_SESSION['icon'] = "info";
        $_SESSION['button'] = "Okay!";
      }

    }

  }
}

?>



<div class="container mt-5 mb-5" id="registration">
<h3 class="text-center my-3">Registration</h3>
  <div class="row">
    <div class="col-sm-10 col-md-6 mx-auto">
      <form action="" method="POST" class="shadow-lg p-3" novalidate>
        <div class="form-group mb-2">
          <i class="fa fa-user"></i>
          <label for="name" class="form-label fw-bold">Name</label>
          <input type="text" class="form-control" id="rName" name="rName" required>
          <div id="errorMsg1"></div>
        </div>
        <div class="form-group mb-2">
          <i class="fa fa-envelope" aria-hidden="true"></i>
          <label for="email" class="form-label fw-bold">Email</label>
          <input type="email" class="form-control" id="rEmail" name="rEmail" required>
          <small class="form-text text-muted ms-2">We 'll never share your email with anyone else</small>
        </div>
        <div class="form-group mb-2">
          <i class="fa fa-key"></i>
          <label for="name" class="form-label fw-bold">New Password</label>
          <input type="password" class="form-control" id="rPassword" name="rPassword" required>
        </div>
        <div class="form-group mt-2">
          <button type="submit" class="btn btn-danger w-100 shadow-sm fw-bold" id="rSignup" name="rSignup" onclick="check()">Sign Up</button>
        </div>
        
        <?php if(isset($msg)) { echo $msg;} ?>        
      </form>
    </div>
  </div>
</div>