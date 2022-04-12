<?php 
define('TITLE', 'Work Order');
define('PAGE', 'work');
include('includes/header.php'); 
?>

<!-- Main Content Area Start -->

<!-- Second Column Start -->

<?php 
$sql = "SELECT * FROM assignwork_tb WHERE request_id = {$_REQUEST['id']}";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>


<div class="col-sm-6 my-4 mx-auto">
    <h3 class="text-center">Assigned Work Details</h3>
    <table class="table table-bordered">
        <tr>
            <th>Request ID</th>
            <td><?php echo $row['request_id'] ?></td>            
        </tr>
        <tr>
            <th>Request Info</th>
            <td><?php echo $row['request_info'] ?></td>            
        </tr>
        <tr>
            <th>Name</th>
            <td><?php echo $row['requester_name'] ?></td>            
        </tr>
        <tr>
            <th>Address Line 1</th>
            <td><?php echo $row['requester_add1'] ?></td>            
        </tr>
        <tr>
            <th>Address Line 2</th>
            <td><?php echo $row['requester_add2'] ?></td>            
        </tr>
        <tr>
            <th>City</th>
            <td><?php echo $row['requester_city'] ?></td>            
        </tr>
        <tr>
            <th>State</th>
            <td><?php echo $row['requester_state'] ?></td>            
        </tr>
        <tr>
            <th>Pin Code</th>
            <td><?php echo $row['requester_zip'] ?></td>            
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $row['requester_email'] ?></td>            
        </tr>
        <tr>
            <th>Mobile</th>
            <td><?php echo $row['requester_mobile'] ?></td>            
        </tr>
        <tr>
            <th>Assigned Date</th>
            <td><?php echo $row['assign_date'] ?></td>            
        </tr>
        <tr>
            <th>Technician Name</th>
            <td><?php echo $row['assign_tech'] ?></td>            
        </tr>
        <tr>
            <th>Customer Sign</th>
            <td></td>            
        </tr>
        <tr>
            <th>Technician Sign</th>
            <td></td>            
        </tr>
    </table>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-danger me-2 d-print-none" onclick="window.print()">Print</button>
        <form action="work.php" method="get">
            <button type="submit" class="btn btn-dark d-print-none">Close</button>
        </form>
    </div>
</div>

<!-- Second Column End -->


<!-- Main Content Area End -->



<?php include('includes/footer.php'); ?>