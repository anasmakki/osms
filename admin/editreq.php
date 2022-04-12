<?php 
define('TITLE', 'Requesters');
define('PAGE', 'requester');
include('includes/header.php'); 
?>

<!-- Main Content Area Start -->
<!-- Second Column Start -->

<?php
$sql = "SELECT * FROM requesterlogin_tb where r_login_id = {$_REQUEST['rid']}";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>


<div class="col-sm-6 mt-3 mx-auto bg-light p-5">
    <h3 class="text-center">Update Requester Details</h3>
    <form method="get">
        <div class="form-group mb-3">
            <label for="rid">Requester ID:</label>
            <input type="text" class="form-control" name="rid" id="rid" value="<?php echo $row['r_login_id']; ?>" readonly>
        </div>
        <div class="form-group mb-3">
            <label for="rname">Name</label>
            <input type="text" class="form-control" name="rname" id="rname" value="<?php echo $row['r_name']; ?>">
        </div>
        <div class="form-group mb-3">
            <label for="remail">Email</label>
            <input type="text" class="form-control" name="remail" id="remail" value="<?php echo $row['r_email']; ?>">
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-danger me-2" name="update">Update</button>
            <button type="submit" class="btn btn-secondary" name="close">Close</button>
        </div>
    </form>
</div>

<!-- Second Column End -->
<!-- Main Content Area End -->


<?php 

// Updating Requester Data - Update Button Clicked
if(isset($_REQUEST['update'])){
    if($_REQUEST['rname'] == "" || $_REQUEST['remail'] == ""){
        $_SESSION['title'] = "Please Fill All Fields";
        $_SESSION['icon'] = "info";
        $_SESSION['button'] = "Okay!";
    } else {
    $rname = $_REQUEST['rname'];
    $remail = $_REQUEST['remail'];
    $sql = "UPDATE requesterlogin_tb SET r_name = '$rname', r_email = '$remail' WHERE r_login_id = {$_REQUEST['rid']}";
    $result = $conn->query($sql);
    if($result == TRUE){
        $_SESSION['title'] = "Requester Detail Updated Successfully";
        $_SESSION['icon'] = "success";
        $_SESSION['button'] = "Okay!";
    }else {
        $_SESSION['title'] = "Unable to delete";
        $_SESSION['icon'] = "error";
        $_SESSION['button'] = "Okay!";
    }
}
} 

// Close button clicked
if(isset($_REQUEST['close'])){
    echo '<script>location.href = "requester.php";</script>';
}
?>



<?php include('includes/footer.php'); ?>