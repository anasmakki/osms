<?php
define('TITLE', "Check Status");
define('PAGE', "CheckStatus");
include('includes/header.php'); 

?>
<!-- Main Content Start -->




<!-- Second Column Start -->

<div class="col-sm-6 mt-4 mx-3">
<?php
$rEmail = $_SESSION['rEmail'];

$sql = "SELECT * FROM assignwork_tb WHERE requester_email = '$rEmail'";
$result = $conn->query($sql);
if($result->num_rows < 1){
    $msg = '<div class="alert alert-info text-center">You have Not Request Any Service Yet</div>';
    if(isset($msg)) {echo $msg;}
} else {
?>
    <form action="" method="get" class="row g-2 mx-3">
        <div class="col-sm-auto">
            <select class="form-select" name="requestid" aria-label="Default select example">
            <option selected disabled>Select Your Request ID</option>

            <?php while($row = $result->fetch_assoc()){ ?>
            <option value="<?php echo $row['request_id']; ?>"><?php echo $row['request_id']; ?></option>
            <?php } ?>

            </select>
        </div>
        <div class="col-sm-auto">
            <button type="submit" name="search" class="btn btn-danger">Search</button>
        </div>
        <?php } ?>
    </form>


<?php
// Search Button Clicked
if(isset($_REQUEST['search'])){
    if(isset($_REQUEST['requestid']) == ""){
        $msg = '<div class="alert alert-info text-center mt-4 mx-3">Please Select Request ID</div>';
        echo $msg;
    } else {
        $requestid = $_REQUEST['requestid'];
        $sql = "SELECT * FROM assignwork_tb where request_id = '$requestid' ";
        $result = $conn->query($sql);
        if($result){
            $row = $result->fetch_assoc();
?>

<div class="mt-5 mx-3">
    <p class="form-text text-center text-white bg-success p-2">Your Request Has been assigned to Technicain Named <b><?php echo $row['assign_tech']; ?></b> on <b><?php echo $row['assign_date']; ?></b></p>
    <table class="table table-bordered">
      <tbody>
          <tr>
              <th>Request ID</th>
              <td><?php echo $row['request_id']; ?></td>
          </tr>
          <tr>
              <th>Request Info</th>
              <td><?php echo $row['request_info']; ?></td>
          </tr>
          <tr>
              <th>Request Desc</th>
              <td><?php echo $row['request_desc']; ?></td>
          </tr>
          <tr>
              <th>Assigned Date</th>
              <td><?php echo $row['assign_date']; ?></td>
          </tr>
      </tbody>  
    </table>
</div>


<?php        }
    }
}
?>


</div>

<!-- Second Column End -->

<!-- Main Content End -->
<?php include('includes/footer.php'); ?>