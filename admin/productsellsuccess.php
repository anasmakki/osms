<?php 
define('TITLE', 'Sell Product Success');
define('PAGE', 'assets');
include('includes/header.php'); 
?>

<?php


// Product Sold
if(isset($_REQUEST['submit'])){
    // Checking Empty Fields 
    if($_REQUEST['cname'] == "" || $_REQUEST['cadd'] == "" || $_REQUEST['pname'] == "" || $_REQUEST['pquantity'] == "" || $_REQUEST['psellingcost'] == "" || $_REQUEST['totalcost'] == "" || $_REQUEST['selldate'] == ""){
        $_SESSION['title'] = "Please Fill All Fileds";
        $_SESSION['icon'] = "info";
        $_SESSION['button'] = "Okay!";        
    }else {

        $pid = $_REQUEST['pid'];
        $pavailable = $_REQUEST['pavailable'] - $_REQUEST['pquantity'];

        $custname = $_REQUEST['cname'];
        $custadd = $_REQUEST['cadd'];
        $cpname = $_REQUEST['pname'];
        $cpquantity = $_REQUEST['pquantity'];
        $cpeach = $_REQUEST['psellingcost'];
        $cptotal = $_REQUEST['totalcost'];
        $cpdate = $_REQUEST['selldate'];

        $sql = "INSERT INTO customer_tb  (cust_name, cust_add, cp_name, cp_quantity, cp_each, cp_total, cp_date) VALUES ('$custname', '$custadd', '$cpname', '$cpquantity', '$cpeach', '$cptotal', '$cpdate')";
        if($result = $conn->query($sql)){
            $genid = mysqli_insert_id($conn);
            $_SESSION['myid'] = $genid;
            echo "<script> location.href = 'productsellsuccess.php'; </script>";
        }

        $sqlup = "UPDATE assets_tb SET p_available = '$pavailable' WHERE p_id = '$pid'";
        $conn->query($sqlup);
    }
}



// Query for Printing
$sql = "SELECT * FROM customer_tb WHERE cust_id = {$_SESSION['myid']}";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>



<!-- Main Content Start -->
<div class="col-sm-4 mt-2 mx-auto">
    <div class="alert alert-success text-center d-print-none">Product Sold Successfully!</div>
    <h4 class="text-center text-uppercase">Customer Bill</h4>
    <table class="table">
        <tr>
            <th>Cusotmer ID</th>
            <td><?php echo $row['cust_id']; ?></td>
        </tr>
        <tr>
            <th>Cusotmer Name</th>
            <td><?php echo $row['cust_name']; ?></td>
        </tr>
        <tr>
            <th>Address</th>
            <td><?php echo $row['cust_add']; ?></td>
        </tr>
        <tr>
            <th>Product</th>
            <td><?php echo $row['cp_name']; ?></td>
        </tr>
        <tr>
            <th>Quantity</th>
            <td><?php echo $row['cp_quantity']; ?></td>
        </tr>
        <tr>
            <th>Price Each</th>
            <td><?php echo $row['cp_each']; ?></td>
        </tr>
        <tr>
            <th>Price Total</th>
            <td><?php echo $row['cp_total']; ?></td>
        </tr>
        <tr>
            <th>Date</th>
            <td><?php echo $row['cp_date']; ?></td>
        </tr>
    </table>

    <form action="" method="get" class="text-center">
        <button type="submit" class="btn btn-danger d-print-none text-center" onclick="window.print();">Print</button>
        <button type="submit" class="btn btn-secondary d-print-none" name="close">Close</button>
    </form>
</div>
<!-- Main Content End -->


<?php
// Close Button Clicked
if(isset($_REQUEST['close'])){
    echo '<script>location.href = "assets.php"</script>';
}
?>


<?php include('includes/footer.php'); ?>