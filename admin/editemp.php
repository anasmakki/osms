<?php 
define('TITLE', 'Technicain');
define('PAGE', 'technician');
include('includes/header.php'); 
?>

<!-- Main Content Area Start -->
<!-- Second Column Start -->

<?php
$sql = "SELECT * FROM technician_tb where emp_id = {$_REQUEST['eid']}";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>


<div class="col-sm-6 mt-3 mx-auto bg-light p-5">
    <h3 class="text-center">Update Employee Details</h3>
    <form method="get">
        <div class="form-group mb-3">
            <label for="eid">Employee ID:</label>
            <input type="text" class="form-control" name="eid" id="eid" value="<?php echo $row['emp_id']; ?>" readonly>
        </div>
        <div class="form-group mb-3">
            <label for="ename">Name</label>
            <input type="text" class="form-control" name="ename" id="ename" value="<?php echo $row['emp_name']; ?>">
        </div>
        <div class="form-group mb-3">
            <label for="ecity">City</label>
            <input type="text" class="form-control" name="ecity" id="ecity" value="<?php echo $row['emp_city']; ?>">
        </div>
        <div class="form-group mb-3">
            <label for="emobile">Mobile</label>
            <input type="text" class="form-control" name="emobile" id="emobile" value="<?php echo $row['emp_mobile']; ?>">
        </div>
        <div class="form-group mb-3">
            <label for="eemail">Email</label>
            <input type="text" class="form-control" name="eemail" id="eemail" value="<?php echo $row['emp_email']; ?>">
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

// Updating Employee Data - Update Button Clicked
if(isset($_REQUEST['update'])){
    if($_REQUEST['ename'] == "" || $_REQUEST['ecity'] == "" || $_REQUEST['emobile'] == "" || $_REQUEST['eemail'] == ""){
        $_SESSION['title'] = "Please Fill All Fields";
        $_SESSION['icon'] = "info";
        $_SESSION['button'] = "Okay!";
    } else {
    $ename = $_REQUEST['ename'];
    $ecity = $_REQUEST['ecity'];
    $emobile = $_REQUEST['emobile'];
    $eemail = $_REQUEST['eemail'];
    $sql = "UPDATE technician_tb SET emp_name = '$ename', emp_city = '$ecity', emp_mobile = '$ecity', emp_email = '$eemail' WHERE emp_id = {$_REQUEST['eid']}";
    $result = $conn->query($sql);
    if($result == TRUE){
        $_SESSION['title'] = "Employee Details Updated Successfully";
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
    echo '<script>location.href = "technician.php";</script>';
}
?>



<?php include('includes/footer.php'); ?>