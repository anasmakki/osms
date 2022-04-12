<?php 
define('TITLE', "Submit Request");
define('PAGE', "SubmitRequest");
include('includes/header.php');



if(isset($_REQUEST['requestsubmit'])){
    // Checking Empty Fileds
    if($_REQUEST['requestinfo'] == "" || $_REQUEST['requestdesc'] == "" || $_REQUEST['requestername'] == "" || $_REQUEST['requesteradd1'] == "" || $_REQUEST['requesteradd2'] == "" || $_REQUEST['requestercity'] == "" || $_REQUEST['requesterstate'] == "" || $_REQUEST['requesterzip'] == "" || $_REQUEST['requesteremail'] == "" || $_REQUEST['requestermobile'] == "" || $_REQUEST['requestdate'] == "" ){
        $msg = '<div class="alert alert-danger mt-3 col-sm-4 text-center mx-auto" role="alert">Please Fill all fields</div>';
    } else {
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
        $rdate = $_REQUEST['requestdate'];

        $sql = "INSERT INTO submitrequest_tb(request_info, request_desc, requester_name, requester_add1, requester_add2, requester_city, requester_state, requester_zip, requester_email, requester_mobile, request_date) VALUES ('$rinfo', '$rdesc', '$rname', '$radd1', '$radd2', '$rcity', '$rstate', '$rzip', '$remail', '$rmobile', '$rdate')";

        $result = $conn->query($sql);
        if($result == TRUE){
            $getid = mysqli_insert_id($conn);
            $_SESSION['getid'] = $getid;
            $msg = '<div class="alert alert-success mt-3 col-sm-4 text-center mx-auto" role="alert">Request Submitted Successfully</div>';
            echo '<script>location.href = "SubmitRequestSuccess.php"</script>';
        } else {
            $msg = '<div class="alert alert-warning mt-3 col-sm-4 text-center mx-auto" role="alert">Request Failed !</div>';
        }
    }
}


?>
<!-- Main Content Start -->
<div class="col-sm-9 col-md-10">
    <?php if(isset($msg)) echo $msg; ?>
    <form action="" method="POST" class="m-3">

        <div class="form-group">
            <label for="InputRequestInfo">Request Info</label>
            <input type="text" class="form-control" placeholder="Request Info" id="InputRequestInfo" name="requestinfo">
        </div><br>
        <div class="form-group">
            <label for="InputDesc">Description</label>
            <input type="text" class="form-control" placeholder="Write Description" id="InputDesc" name="requestdesc">
        </div><br>
        <div class="form-group">
            <label for="InputName">Name</label>
            <input type="text" class="form-control" placeholder="Enter Your Name" id="InputName" name="requestername">
        </div><br>

        <div class="row">
            <div class="form-group col-sm-6">
                <label for="InputAddress1">Address Line 1</label>
                <input type="text" class="form-control" name="requesteradd1" id="InputAddress1" placeholder="House No. 123">
            </div>
            <div class="form-group col-sm-6">
                <label for="InputAddress2">Address Line 2</label>
                <input type="text" class="form-control" name="requesteradd2" id="InputAddress2" placeholder="Railway Colony">
            </div>
        </div><br>

        <div class="row">
            <div class="form-group col-sm-6">
                <label for="InputCity">City</label>
                <input type="text" class="form-control" name="requestercity" id="InputCity">
            </div>
            <div class="form-group col-sm-4">
                <label for="InputState">State</label>
                <input type="text" class="form-control" name="requesterstate" id="InputState">
            </div>
            <div class="form-group col-sm-2">
                <label for="InputZip">Zip</label>
                <input type="text" class="form-control" name="requesterzip" id="InputDate" onkeypress="isInputNumber(event)">
            </div>
        </div><br>

        <div class="row">
            <div class="form-group col-sm-6">
                <label for="InputEmail">Email</label>
                <input type="email" class="form-control" name="requesteremail" id="InputEmail" value="<?php echo $_SESSION['rEmail']; ?>" readonly>
            </div>
            <div class="form-group col-sm-2">
                <label for="InputMobile">Mobile</label>
                <input type="text" class="form-control" name="requestermobile" id="InputMobile" onkeypress="isInputNumber(event)">
            </div>
            <div class="form-group col-sm-2">
                <label for="InputDate">Date</label>
                <input type="date" class="form-control" name="requestdate" id="InputDate">
            </div>
        </div> <br>

        <button type="submit" class="btn btn-danger" name="requestsubmit">Submit</button>
        <button type="reset" class="btn btn-secondary">Reset</button>

        <br>
    
    </form>
</div>
<!-- Main Content End -->

<?php include('includes/footer.php'); ?>