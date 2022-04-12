<?php 
define('TITLE', "Change Password");
define('PAGE', "ChangePassword");
include('includes/header.php'); 

// Changing Password
if(isset($_REQUEST['passupdate'])){
    // Checking If Password Empty
    if($_REQUEST['rPassword']==""){
        $msg = '<div class="alert alert-danger text-center mt-3" role="alert">Empty Password Not Accepted</div>'; 
    } else {
    $rPassword = $_REQUEST['rPassword'];
    $sql = "UPDATE requesterlogin_tb SET r_password = '$rPassword' WHERE r_email = '$rEmail'";   
    $result = $conn->query($sql);
    if($result){
        $msg = '<div class="alert alert-success text-center mt-3" role="alert">Password Changed Successfully!</div>'; 
    } else {
        $msg = '<div class="alert alert-info text-center mt-3" role="alert">Unable to Change Password!</div>'; 
    }
    }
}

?>
<!-- Main Content Start -->
<div class="col-sm-6 my-3">
    <form action="" method="get" class="mx-5">
        <div class="form-group">
            <label for="rEmail">Email</label>
            <input type="email" class="form-control" name="rEmail" id="rEmail" value="<?php if($_SESSION['rEmail']) {echo $_SESSION['rEmail'];} ?>" readonly>
        </div>
        <div class="form-group mt-2">
            <label for="rPassword">New Password</label>
            <input type="password" class="form-control" name="rPassword" id="rPassword" value="">
        </div>
        <input type="submit" class="btn btn-danger mt-2" value="Update" name="passupdate">

        <?php if(isset($msg)){ echo $msg;} ?>            

    </form>
</div>
<!-- Main Content Start -->

<?php include('includes/footer.php'); ?>