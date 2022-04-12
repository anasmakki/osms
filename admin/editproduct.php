<?php 
define('TITLE', 'Assets');
define('PAGE', 'assets');
include('includes/header.php'); 
?>

<!-- Main Content Area Start -->
<!-- Second Column Start -->

<?php
$sql = "SELECT * FROM assets_tb where p_id = {$_REQUEST['pid']}";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>


<div class="col-sm-6 mt-3 mx-auto bg-light p-5">
    <h3 class="text-center">Update Product Details</h3>
    <form method="get">
        <div class="form-group mb-3">
            <label for="pid">Product ID:</label>
            <input type="text" class="form-control" name="pid" id="pid" value="<?php echo $row['p_id']; ?>" readonly>
        </div>
        <div class="form-group mb-3">
            <label for="pname">Product Name</label>
            <input type="text" class="form-control" name="pname" id="pname" value="<?php echo $row['p_name']; ?>">
        </div>
        <div class="form-group mb-3">
            <label for="pdop">Date of Purchase</label>
            <input type="text" class="form-control" name="pdop" id="pdop" value="<?php echo $row['p_dop']; ?>">
        </div>
        <div class="form-group mb-3">
            <label for="pavailable">Available</label>
            <input type="text" class="form-control" name="pavailable" id="pavailable" value="<?php echo $row['p_available']; ?>" onkeypress="isInputNumber(event)">
        </div>
        <div class="form-group mb-3">
            <label for="ptotal">Total</label>
            <input type="text" class="form-control" name="ptotal" id="ptotal" value="<?php echo $row['p_total']; ?>" onkeypress="isInputNumber(event)">
        </div>
        <div class="form-group mb-3">
            <label for="poriginalcost">Original Cose/Unit</label>
            <input type="text" class="form-control" name="poriginalcost" id="poriginalcost" value="<?php echo $row['p_originalcost']; ?>" onkeypress="isInputNumber(event)">
        </div>
        <div class="form-group mb-3">
            <label for="psellingcost">Selling Cost/Unit</label>
            <input type="text" class="form-control" name="psellingcost" id="psellingcost" value="<?php echo $row['p_sellingcost']; ?>" onkeypress="isInputNumber(event)">
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
    if($_REQUEST['pname'] == "" || $_REQUEST['pdop'] == "" || $_REQUEST['pavailable'] == "" || $_REQUEST['ptotal'] == "" || $_REQUEST['poriginalcost'] == "" || $_REQUEST['psellingcost'] == ""){
        $_SESSION['title'] = "Please Fill All Fields";
        $_SESSION['icon'] = "info";
        $_SESSION['button'] = "Okay!";
    } else {
    $pname = $_REQUEST['pname'];
    $pdop = $_REQUEST['pdop'];
    $pavailable = $_REQUEST['pavailable'];
    $ptotal = $_REQUEST['ptotal'];
    $poriginalcost = $_REQUEST['poriginalcost'];
    $psellingcost = $_REQUEST['psellingcost'];
    $sql = "UPDATE assets_tb SET p_name = '$pname', p_dop = '$pdop', p_available='$pavailable', p_total = '$ptotal', p_originalcost = '$poriginalcost', p_sellingcost = '$psellingcost' WHERE p_id = {$_REQUEST['pid']}";
    $result = $conn->query($sql);
    if($result == TRUE){
        $_SESSION['title'] = "Product Detail Updated Successfully";
        $_SESSION['icon'] = "success";
        $_SESSION['button'] = "Okay!";
    }else {
        $_SESSION['title'] = "Unable to Update";
        $_SESSION['icon'] = "error";
        $_SESSION['button'] = "Okay!";
    }
}
} 

// Close button clicked
if(isset($_REQUEST['close'])){
    echo '<script>location.href = "assets.php";</script>';
}
?>



<?php include('includes/footer.php'); ?>