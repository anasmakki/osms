<?php 
define('TITLE', 'Assets');
define('PAGE', 'assets');
include('includes/header.php'); 
?>

<!-- Main Content Area Start -->
<!-- Second Column Start -->

<div class="col-sm-6 mt-3 mx-auto bg-light p-5">
    <h3 class="text-center">Add New Product</h3>
    <form method="get">
        <div class="form-group mb-3">
            <label for="pname">Product Name:</label>
            <input type="text" class="form-control" name="pname" id="pname">
        </div>
        <div class="form-group mb-3">
            <label for="pdop">Date of Purchase:</label>
            <input type="date" class="form-control" name="pdop" id="pdop">
        </div>
        <div class="form-group mb-3">
            <label for="pavailable">Available:</label>
            <input type="text" class="form-control" name="pavailable" id="pavailable" onkeypress="isInputNumber(event)">
        </div>
        <div class="form-group mb-3">
            <label for="ptotal">Total:</label>
            <input type="text" class="form-control" name="ptotal" id="ptotal" onkeypress="isInputNumber(event)">
        </div>
        <div class="form-group mb-3">
            <label for="poriginalcost">Original Cost/Unit:</label>
            <input type="text" class="form-control" name="poriginalcost" id="poriginalcost" onkeypress="isInputNumber(event)">
        </div>
        <div class="form-group mb-3">
            <label for="psellingcost">Selling Cost/Unit:</label>
            <input type="text" class="form-control" name="psellingcost" id="psellingcost" onkeypress="isInputNumber(event)">
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-danger me-2" name="add">Add</button>
            <button type="submit" class="btn btn-secondary" name="close">Close</button>
        </div>
    </form>
</div>

<!-- Second Column Start -->
<!-- Main Content Area End -->

<?php
// Add button clicked

if(isset($_REQUEST['add'])){
    // Checking Empty fields
    if($_REQUEST['pname'] == "" || $_REQUEST['pdop'] == "" || $_REQUEST['pavailable'] == "" || $_REQUEST['ptotal'] == "" || $_REQUEST['poriginalcost'] == "" || $_REQUEST['psellingcost'] == "" ){
        $_SESSION['title'] = "Please Fill All Fields";
        $_SESSION['icon'] = "info";
        $_SESSION['button'] = "Okay!";
    }else{
        $pname = $_REQUEST['pname'];
        $pdop = $_REQUEST['pdop'];
        $pavailable = $_REQUEST['pavailable'];
        $ptotal = $_REQUEST['ptotal'];
        $poriginalcost = $_REQUEST['poriginalcost'];
        $psellingcost = $_REQUEST['psellingcost'];

        $sql = "INSERT INTO assets_tb (p_name, p_dop,  p_available, p_total, p_originalcost, p_sellingcost) VALUES ('$pname', '$pdop', '$pavailable', '$ptotal', '$poriginalcost', '$psellingcost')";
        $result = $conn->query($sql);
        if($result == TRUE){
            $_SESSION['title'] = "New Product Added Successfully";
            $_SESSION['icon'] = "success";
            $_SESSION['button'] = "Okay!";
        }else {
            $_SESSION['title'] = "Unable to Add Product";
            $_SESSION['icon'] = "error";
            $_SESSION['button'] = "Okay!";
        }
    }
}



// Close button Clicked
if(isset($_REQUEST['close'])){
    echo '<script>location.href = "assets.php"</script>';
}
?>



<?php include('includes/footer.php'); ?>