<?php 
define('TITLE', 'Requesters');
define('PAGE', 'requester');
include('includes/header.php'); 
?>

<!-- Main Content Area Start -->
<!-- Second Column Start -->

<div class="col-sm-6 mt-3 mx-auto bg-light p-5">
    <h3 class="text-center">User Registration</h3>
    <form method="get">
        <div class="form-group mb-3">
            <label for="rname">Name:</label>
            <input type="text" class="form-control" name="rname" id="rname" value="">
        </div>
        <div class="form-group mb-3">
            <label for="remail">Email:</label>
            <input type="text" class="form-control" name="remail" id="remail" value="">
        </div>
        <div class="form-group mb-3">
            <label for="rpassword">Password:</label>
            <input type="text" class="form-control" name="rpassword" id="rpassword" value="">
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-danger me-2" name="register">Register</button>
            <button type="submit" class="btn btn-secondary" name="close">Close</button>
        </div>
    </form>
</div>

<!-- Second Column Start -->
<!-- Main Content Area End -->

<?php
// Register button clicked

if(isset($_REQUEST['register'])){
    // Checking Empty fields
    if($_REQUEST['rname'] == "" || $_REQUEST['remail'] == "" || $_REQUEST['rpassword'] == "" ){
        $_SESSION['title'] = "Please Fill All Fields";
        $_SESSION['icon'] = "info";
        $_SESSION['button'] = "Okay!";
    }else{
        $rname = $_REQUEST['rname'];
        $remail = $_REQUEST['remail'];
        $rpassword = $_REQUEST['rpassword'];
        $sql = "INSERT INTO requesterlogin_tb (r_name, r_email, r_password) VALUES ('$rname', '$remail', '$rpassword')";
        $result = $conn->query($sql);
        if($result == TRUE){
            $_SESSION['title'] = "New User Registered Successfully";
            $_SESSION['icon'] = "success";
            $_SESSION['button'] = "Okay!";
        }else {
            $_SESSION['title'] = "Unable to Register";
            $_SESSION['icon'] = "error";
            $_SESSION['button'] = "Okay!";
        }
    }
}



// Close button Clicked
if(isset($_REQUEST['close'])){
    echo '<script>location.href = "requester.php"</script>';
}
?>




<?php include('includes/footer.php'); ?>