<?php 
define('TITLE', 'Sell Product');
define('PAGE', 'assets');
include('includes/header.php'); 

?>

<!-- Main Content Area Start -->
<!-- Second Column Start -->

<div class="col-sm-6 mt-3 mx-auto bg-light p-5">
    <h3 class="text-center">Customer Bill</h3>
    <form method="get" action="productsellsuccess.php">
        <div class="form-group mb-3">
            <label for="pid">Product ID:</label>
            <input type="text" class="form-control" name="pid" id="pid" value="<?php echo $_REQUEST['pid'] ?>" readonly>
        </div>
        <div class="form-group mb-3">
            <label for="cname">Customer Name:</label>
            <input type="text" class="form-control" name="cname" id="cname">
        </div>
        <div class="form-group mb-3">
            <label for="cadd">Customer Address:</label>
            <input type="text" class="form-control" name="cadd" id="cadd">
        </div>
        <div class="form-group mb-3">
            <label for="pname">Product Name:</label>
            <input type="text" class="form-control" name="pname" id="pname" value="<?php echo $_REQUEST['pname'] ?>" readonly>
        </div>
        <div class="form-group mb-3">
            <label for="pavailable">Available:</label>
            <input type="text" class="form-control" name="pavailable" id="pavailable" value="<?php echo $_REQUEST['pavailable'] ?>" onkeypress="isInputNumber(event)" readonly>
        </div>
        <div class="form-group mb-3">
            <label for="pquantity">Quantity:</label>
            <input type="text" class="form-control" name="pquantity" id="pquantity" onkeypress="isInputNumber(event)">
        </div>
        <div class="form-group mb-3">
            <label for="psellingcost">Price Each:</label>
            <input type="text" class="form-control" name="psellingcost" id="psellingcost" value="<?php echo $_REQUEST['psellingcost'] ?>" onkeypress="isInputNumber(event)" readonly>
        </div>
        <div class="form-group mb-3">
            <label for="totalcost">Total Price:</label>
            <input type="text" class="form-control" name="totalcost" id="totalcost" onkeypress="isInputNumber(event)">
        </div>
        <div class="form-group mb-3">
            <label for="selldate">Date:</label>
            <input type="date" class="form-control" name="selldate" id="selldate" onkeypress="isInputNumber(event)">
        </div>
            <button type="submit" class="btn btn-danger me-2" name="submit">Submit</button>
            <button type="submit" class="btn btn-secondary" name="close">Close</button>
    </form>
</div>

<!-- Second Column Start -->
<!-- Main Content Area End -->

<?php

// Close button Clicked
if(isset($_REQUEST['close'])){
    echo '<script>location.href = "assets.php"</script>';
}
?>



<?php include('includes/footer.php'); ?>