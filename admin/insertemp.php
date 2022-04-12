<?php 
define('TITLE', 'Technicain');
define('PAGE', 'technician');
include('includes/header.php'); 
?>

<!-- Main Content Area Start -->
<!-- Second Column Start -->

<div class="col-sm-6 mt-3 mx-auto bg-light p-5">
    <h3 class="text-center">Employee Registration</h3>
    <form method="get">
        <div class="form-group mb-3">
            <label for="ename">Name:</label>
            <input type="text" class="form-control" name="ename" id="ename">
        </div>
        <div class="form-group mb-3">
            <label for="ecity">City:</label>
            <input type="text" class="form-control" name="ecity" id="ecity">
        </div>
        <div class="form-group mb-3">
            <label for="emobile">Mobile:</label>
            <input type="text" class="form-control" name="emobile" id="emobile" onkeypress="isInputNumber(event);">
        </div>
        <div class="form-group mb-3">
            <label for="eemail">Email:</label>
            <input type="text" class="form-control" name="eemail" id="eemail">
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
    if($_REQUEST['ename'] == "" || $_REQUEST['ecity'] == "" || $_REQUEST['emobile'] == "" || $_REQUEST['eemail'] == "" ){
        $_SESSION['title'] = "Please Fill All Fields";
        $_SESSION['icon'] = "info";
        $_SESSION['button'] = "Okay!";
    }else{
        $ename = $_REQUEST['ename'];
        $ecity = $_REQUEST['ecity'];
        $emobile = $_REQUEST['emobile'];
        $eemail = $_REQUEST['eemail'];
        $sql = "INSERT INTO technician_tb (emp_name, emp_city,  emp_mobile, emp_email) VALUES ('$ename', '$ecity', '$emobile', '$eemail')";
        $result = $conn->query($sql);
        if($result == TRUE){
            $_SESSION['title'] = "New Employee Registered Successfully";
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
    echo '<script>location.href = "technician.php"</script>';
}
?>



<?php include('includes/footer.php'); ?>