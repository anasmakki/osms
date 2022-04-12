<?php 
define('TITLE', 'Sold Product Report');
define('PAGE', 'soldproductreport');
include('includes/header.php'); 
?>


<!-- Main Content Area Start -->

<div class="col-sm-8 mt-3 mx-auto">
    <form action="" method="get" class="row d-print-none">
        <div class="form-group col-sm-auto">
            <input type="date" class="form-control" name="startDate" id="startDate">
        </div>
        <div class="col-sm-auto form-text">To</div>
        <div class="form-group col-sm-auto">
            <input type="date" class="form-control" name="endDate" id="endDate">
        </div>
        <div class="form-group col-sm-auto">
            <input type="submit" class="btn btn-danger" value="Search" name="search">
        </div>
    </form>


<?php
// When Search Button Clicked
if(isset($_REQUEST['search'])){
    // Checking Empty Fields
    if($_REQUEST['startDate'] == "" || $_REQUEST['endDate'] == ""){
        $_SESSION['title'] = "Please Select Valid Date";
        $_SESSION['icon'] = "info";
        $_SESSION['button'] = "Okay!";
    } else {
        $startDate = $_REQUEST['startDate'];
        $endDate = $_REQUEST['endDate'];
        $sql = "SELECT * FROM customer_tb WHERE cp_date BETWEEN '$startDate' AND '$endDate' ";
        $result = $conn->query($sql);
        if($result->num_rows < 1){
            echo '<div class="alert alert-info text-center mt-4">0 Record Found!</div>';
        }else {
?>






    <div class="mt-4">
        <h6 class="bg-dark text-white text-center p-2 text-uppercase"> Sell Product Report </h6>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price Each</th>
                    <th>Total</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_row()){ ?>
                <tr>
                    <td><?php echo $row['0'] ?></td>
                    <td><?php echo $row['1'] ?></td>
                    <td><?php echo $row['2'] ?></td>
                    <td><?php echo $row['3'] ?></td>
                    <td><?php echo $row['4'] ?></td>
                    <td><?php echo $row['5'] ?></td>
                    <td><?php echo $row['6'] ?></td>
                    <td><?php echo $row['7'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <button type="submit" class="btn btn-danger float-end d-print-none" onclick="print();">Print</button>
    </div>



<?php
            

        }
    }
}

?>

</div>
<!-- Main Content Area End -->



<?php include('includes/footer.php'); ?>