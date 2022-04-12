<?php

use LDAP\Result;

define('TITLE', 'Requests');
define('PAGE', 'request');
include('includes/header.php'); 

$sql = "SELECT request_id, request_info, request_desc, request_date FROM submitrequest_tb";
$result = $conn->query($sql);
if($result->num_rows >0){



?>

<!-- Main Content Area Start -->

<div class="col-sm-4 mt-5 mx-3">
    <?php 
    while($row = $result->fetch_assoc()){ ?>
    <div class="card mb-3">
        <div class="card-header">
            Request ID: <?php echo $row['request_id'] ?>
        </div>
        <div class="card-body">
            <h5 class="card-title">Request Info: <?php echo $row['request_info']?></h5>
            <p class="card-text"><?php echo $row['request_desc'] ?></p>
            <p class="card-text">Request Date: <b><?php echo $row['request_date'] ?></b></p>
            <div class="d-flex justify-content-end">
                <form action="" method="get">
                    <input type="hidden" name="id" value="<?php echo $row['request_id'] ?>">
                    <input type="submit" class="btn btn-danger me-2" value="View" name="view">
                    <input type="submit" class="btn btn-secondary" value="Close" name="close">
                </form>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<?php           

} ?>


<div class="col-sm-5 mt-5 mx-3"> <!-- Second Column Start -->

<?php
// View Button Clicked
if(isset($_REQUEST['view'])){
    $sql = "SELECT * FROM submitrequest_tb WHERE request_id = {$_REQUEST['id']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

// Close Button Clicked
if(isset($_REQUEST['close'])){
    $sql = "DELETE FROM submitrequest_tb WHERE request_id = {$_REQUEST['id']}";
    $result = $conn->query($sql);
    if($result == TRUE){
        echo '<meta http-equiv="refresh" content="0;URL=?closed" />';
    }
}

// Assign Button Clicked
if(isset($_REQUEST['assign'])){
    // Checking EMpty Fileds
    if($_REQUEST['requestid'] == "" || $_REQUEST['requestinfo'] == "" || $_REQUEST['requestdesc'] == "" || $_REQUEST['requestername'] == "" || $_REQUEST['requesteradd1'] == "" || $_REQUEST['requesteradd2'] == "" || $_REQUEST['requestercity'] == "" || $_REQUEST['requesterstate'] == "" || $_REQUEST['requesterzip'] == "" || $_REQUEST['requesteremail'] == "" || $_REQUEST['requestermobile'] == "" || $_REQUEST['technician'] == "" || $_REQUEST['assigndate'] == ""){
        $_SESSION['title'] = "Please Fill All Fields";
        $_SESSION['icon'] = "info";
        $_SESSION['button'] = "Okay!";
    } else {
        $rid = $_REQUEST['requestid'];
        $rinfo = $_REQUEST['requestinfo'];
        $rdesc = $_REQUEST['requestdesc'];
        $rname = $_REQUEST['requestername'];
        $radd1 = $_REQUEST['requesteradd1'];
        $radd2 = $_REQUEST['requesteradd2'];
        $rcity = $_REQUEST['requestercity'];
        $rstate = $_REQUEST['requesterstate'];
        $rzip = $_REQUEST['requesterzip'];
        $remail = $_REQUEST['requesteremail'];
        $rmobile = $_REQUEST['requestermobile'];
        $technician = $_REQUEST['technician'];
        $assigndate = $_REQUEST['assigndate'];



        $sql = "INSERT INTO assignwork_tb (request_id, request_info	, request_desc, requester_name, requester_add1, requester_add2, requester_city, requester_state, requester_zip, requester_email, requester_mobile, assign_tech, assign_date) VALUES('$rid', '$rinfo', '$rdesc', '$rname', '$radd1', '$radd2', '$rcity', '$rstate', '$rzip', '$remail', '$rmobile', '$technician', '$assigndate')";

        $result = $conn->query($sql);
        if($result){
            $_SESSION['title'] = "Work Assigned Successfully";
            $_SESSION['icon'] = "success";
            $_SESSION['button'] = "Okay!";
        } else {
            $_SESSION['title'] = "Failed! Please Try Again...";
            $_SESSION['icon'] = "error";
            $_SESSION['button'] = "Okay!";
        }

    }
}

?>

    <form action="" method="POST" class="bg-light p-5">

    <h5 class="text-center">Assign Work Order Request</h3>

    <div class="form-group">
        <label for="InputRequestInfo">Request ID</label>
        <input type="text" class="form-control" placeholder="Request ID" id="InputRequestId" name="requestid" value="<?php if(isset($row['request_id'])) {echo $row['request_id'];} ?>" readonly>
    </div><br>
    <div class="form-group">
        <label for="InputRequestInfo">Request Info</label>
        <input type="text" class="form-control" placeholder="Request Info" id="InputRequestInfo" name="requestinfo" value="<?php if(isset($row['request_info'])) {echo $row['request_info'];} ?>">
    </div><br>
    <div class="form-group">
        <label for="InputDesc">Description</label>
        <input type="text" class="form-control" placeholder="Write Description" id="InputDesc" name="requestdesc" value="<?php if(isset($row['request_desc'])) {echo $row['request_desc'];} ?>">
    </div><br>
    <div class="form-group">
        <label for="InputName">Name</label>
        <input type="text" class="form-control" placeholder="Enter Your Name" id="InputName" name="requestername" value="<?php if(isset($row['requester_name'])) {echo $row['requester_name'];} ?>">
    </div><br>

    <div class="row">
        <div class="form-group col-sm-6">
            <label for="InputAddress1">Address Line 1</label>
            <input type="text" class="form-control" name="requesteradd1" id="InputAddress1" placeholder="House No. 123" value="<?php if(isset($row['requester_add1'])) {echo $row['requester_add1'];} ?>">
        </div>
        <div class="form-group col-sm-6">
            <label for="InputAddress2">Address Line 2</label>
            <input type="text" class="form-control" name="requesteradd2" id="InputAddress2" placeholder="Railway Colony" value="<?php if(isset($row['requester_add2'])) {echo $row['requester_add2'];} ?>">
        </div>
    </div><br>

    <div class="row">
        <div class="form-group col-sm-4">
            <label for="InputCity">City</label>
            <input type="text" class="form-control" name="requestercity" id="InputCity" value="<?php if(isset($row['requester_city'])) {echo $row['requester_city'];} ?>">
        </div>
        <div class="form-group col-sm-4">
            <label for="InputState">State</label>
            <input type="text" class="form-control" name="requesterstate" id="InputState" value="<?php if(isset($row['requester_state'])) {echo $row['requester_state'];} ?>">
        </div>
        <div class="form-group col-sm-4">
            <label for="InputZip">Zip</label>
            <input type="text" class="form-control" name="requesterzip" id="InputDate" onkeypress="isInputNumber(event)" value="<?php if(isset($row['requester_zip'])) {echo $row['requester_zip'];} ?>">
        </div>
    </div><br>

    <div class="row">
        <div class="form-group col-sm-8">
            <label for="InputEmail">Email</label>
            <input type="email" class="form-control" name="requesteremail" id="InputEmail" value="<?php if(isset($row['requester_email'])) {echo $row['requester_email'];} ?>">
        </div>
        <div class="form-group col-sm-4">
            <label for="InputMobile">Mobile</label>
            <input type="text" class="form-control" name="requestermobile" id="InputMobile" onkeypress="isInputNumber(event)" value="<?php if(isset($row['requester_mobile'])) {echo $row['requester_mobile'];} ?>">
        </div>
    </div> <br>

    <div class="row">
        <div class="form-group col-sm-6">
            <label for="InputEmail">Technicain</label>
            <input type="text" class="form-control" name="technician" id="InputEmail">
        </div>
        <div class="form-group col-sm-6">
            <label for="InputDate">Date</label>
            <input type="date" class="form-control" name="assigndate" id="InputDate" <?php if(isset($row['request_date'])) {echo $row['request_date'];} ?>>
        </div>
    </div> <br>


    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-success me-2" name="assign">Assign</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    </div>
    </form>

</div> <!-- Second Column End -->

<!-- Main Content Area End -->


<?php include('includes/footer.php'); ?>