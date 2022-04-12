<?php 
define('TITLE', 'Dashboard');
define('PAGE', 'dashboard');
include('includes/header.php'); 
?>


<?php
// Number of Submitted Requests
$sql = "SELECT * FROM submitrequest_tb";
$result = $conn->query($sql);
$numOfRequests = $result->num_rows;


// Number of Assigned Works
$sql = "SELECT * FROM assignwork_tb";
$result = $conn->query($sql);
$numOfAssignWork = $result->num_rows;


// Number of Technicans
$sql = "SELECT * FROM technician_tb";
$result = $conn->query($sql);
$numOfTechnicians = $result->num_rows;



?>



      <div class="col-sm-10">

        <div class="row text-center mx-3">
          <div class="col-sm-4 mt-3">
            <div class="card bg-danger text-white">
              <div class="card-header">Requests Received</div>
              <div class="card-body">
                <h4 class="card-title"><?php echo $numOfRequests; ?></h4>
                <a href="request.php" class="btn text-white">View</a>
              </div>
            </div>
          </div>
          <div class="col-sm-4 mt-3">
            <div class="card bg-success text-white">
                <div class="card-header">Assigned Work</div>
                <div class="card-body">
                  <h4 class="card-title"><?php echo $numOfAssignWork; ?></h4>
                  <a href="work.php" class="btn text-white">View</a>
                </div>
            </div>
          </div>
          <div class="col-sm-4 mt-3">
            <div class="card bg-primary text-white">
              <div class="card-header">No. of Technicians</div>
              <div class="card-body">
                <h4 class="card-title"><?php echo $numOfTechnicians; ?></h4>
                <a href="technician.php" class="btn text-white">View</a>
              </div>
            </div>
            </div>
        </div>


        <div class="row mt-4 text-center mx-4">
            <p class="bg-dark text-white p-2">List of Requesters</p>                      
        </div>

        <?php
          $sql = "SELECT * FROM requesterlogin_tb";
          $result = $conn->query($sql);
          if($result->num_rows > 0){

        ?>

        <div class="row text-center ms-4 me-4">
          <table class="table">
            <thead>
              <tr>
                <th>Requester ID</th>
                <th>Name</th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody>

            <?php while($row = $result->fetch_assoc()){ ?>
              <tr>
                <td scope="row"><?php echo $row['r_login_id'] ?></td>
                <td><?php echo $row['r_name'] ?></td>
                <td><?php echo $row['r_email'] ?></td>
              </tr>
            <?php } ?>
            </tbody>
          </table>                  
        </div>

        <?php } else {echo "0 Result"; } ?>


      </div>
      <!-- End 2nd Column -->
   

<?php include('includes/footer.php'); ?>