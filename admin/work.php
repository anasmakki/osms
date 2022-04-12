<?php 
define('TITLE', 'Work Order');
define('PAGE', 'work');
include('includes/header.php'); 
?>

<!-- Main Content Area Start -->

<!-- Second Column Start -->
<div class="col-sm-9 mt-4 mx-3">

<?php
$sql = "SELECT * FROM assignwork_tb";
$result = $conn->query($sql);
if($result->num_rows < 1){
    $msg = '<div class="alert alert-info mt-4 mx-3 text-center"> No Record Found!</div>';
    echo $msg;
} else {
?>


    <table class="table">
        <thead class="table-light">
            <tr>
                <th>Req ID</th>
                <th>Req Info</th>
                <th>Name</th>
                <th>Address</th>
                <th>City</th>
                <th>Mobile</th>
                <th>Technician</th>
                <th>Assigned Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

<?php while($row = $result->fetch_assoc()){ ?>

            <tr>
                <td><?php echo $row['request_id'] ?></td>
                <td><?php echo $row['request_info'] ?></td>
                <td><?php echo $row['requester_name'] ?></td>
                <td><?php echo $row['requester_add2'] ?></td>
                <td><?php echo $row['requester_city'] ?></td>
                <td><?php echo $row['requester_mobile'] ?></td>
                <td><?php echo $row['assign_tech'] ?></td>
                <td><?php echo $row['assign_date'] ?></td>
                <td>
                    <div class="d-flex justity-content-between">
                        <form action="viewassignwork.php" method="get" class="m-auto">
                            <input type="hidden" name="id" value="<?php echo $row['request_id'] ?>">
                            <button type="submit" class="btn btn-warning" name="view"><i class="far fa-eye"></i></button>
                        </form>
                        <form action="" method="get" class="m-auto">
                            <input type="hidden" name="id" value="<?php echo $row['request_id'] ?>">
                            <button type="submit" class="btn btn-danger" name="delete"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </div>
                </td>
            </tr>

            <?php 
        
// Delete Button Clicked
if(isset($_REQUEST['delete'])){
    $requestid = $_REQUEST['id'];
    $sql = "DELETE FROM assignwork_tb WHERE request_id = '$requestid' ";
    $result = $conn->query($sql);
    if($result == TRUE){
        echo '<meta http-equiv="refresh" content="0;URL=?deleted">';
    }else {
        echo "Unable to Delete";
    }
}

        
        } ?>
        </tbody>
    </table>


    <?php

?>



    <?php } ?>
</div>


<!-- Second Column ENd -->


<!-- Main Content Area End -->



<?php include('includes/footer.php'); ?>