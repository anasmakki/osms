<?php 
define('TITLE', 'Work Report');
define('PAGE', 'workreport');
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
        $sql = "SELECT * FROM assignwork_tb WHERE assign_date BETWEEN '$startDate' AND '$endDate' ";
        $result = $conn->query($sql);
        if($result->num_rows < 1){
            echo '<div class="alert alert-info text-center mt-4">0 Record Found!</div>';
        }else {
?>



    <div class="mt-4">
        <h6 class="bg-dark text-white text-center p-2 text-uppercase"> Work Report </h6>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Req ID</th>
                    <th>Req Info</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Mobile</th>
                    <th>Technician</th>
                    <th>Assigned Date</th>
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