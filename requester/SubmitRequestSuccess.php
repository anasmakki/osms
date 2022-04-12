<?php
define('TITLE', 'Success');
include('includes/header.php'); 

$sql = "SELECT * FROM submitrequest_tb WHERE request_id = {$_SESSION['getid']}";
$result = $conn->query($sql);
if($result->num_rows == 1){
    $row = $result->fetch_assoc();
}

?>

<!-- Start Main Content -->

<div class="col-sm-8">
    
    <table class="table m-3">

        <?php 
        $msg = '<div class="alert alert-success mt-3 col-sm-4 text-center mx-auto" role="alert">Request Submitted Successfully</div>';
        if(isset($msg)) {echo $msg;} ?>
        <tbody>
            <tr>
                <th>Request ID</th>
                <td><?php echo $row['request_id'] ?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?php echo $row['requester_name'] ?></td>
            </tr>
            <tr>
                <th>Email ID</th>
                <td><?php echo $row['requester_email'] ?></td>
            </tr>
            <tr>
                <th>Request Info</th>
                <td><?php echo $row['request_info'] ?></td>
            </tr>
            <tr>
                <th>Request Description</th>
                <td><?php echo $row['request_desc'] ?></td>
            </tr>
            <tr class="d-print-none">
                <td>
                    <form action="">
                        <input type="submit" class="btn btn-danger" value="Print" onClick="window.print()">
                    </form>
                </td>
            </tr>
        </tbody>
    </table>

</div>


<!-- End Main Content -->







<?php
include('includes/footer.php'); 
?>