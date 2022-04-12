<?php 
define('TITLE', 'Change Password');
define('PAGE', 'changepass');
include('includes/header.php'); 
?>

<?php 
// Changing Password
if(isset($_REQUEST['passupdate'])){
    // Checking If Password Empty
    if($_REQUEST['aPassword']==""){
        $msg = '<div class="alert alert-danger text-center mt-3" role="alert">Empty Password Not Accepted</div>'; 
    } else {
    $aPassword = $_REQUEST['aPassword'];
    $sql = "UPDATE adminlogin_tb SET a_password = '$aPassword' WHERE a_email = '$aEmail'";   
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
    <form action="" method="post" class="mx-5">
        <div class="form-group">
            <label for="aEmail">Email</label>
            <input type="email" class="form-control" name="aEmail" id="aEmail" value="<?php if($_SESSION['aEmail']) {echo $_SESSION['aEmail'];} ?>" readonly>
        </div>
        <div class="form-group mt-2">
            <label for="aPassword">New Password</label>
            <input type="password" class="form-control" name="aPassword" id="aPassword" value="">
        </div>
        <input type="submit" class="btn btn-danger mt-2" value="Update" name="passupdate">

        <?php if(isset($msg)){ echo $msg;} ?>            

    </form>
</div>
<!-- Main Content Start -->



<?php include('includes/footer.php'); ?>