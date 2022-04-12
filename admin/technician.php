<?php 
define('TITLE', 'Technician');
define('PAGE', 'technician');
include('includes/header.php'); 
?>


<!-- Main Content Area Start -->
<!-- Second Column Start -->
<div class="col-sm-8 mx-auto my-3">


<?php
$sql = "SELECT * FROM technician_tb";
$result = $conn->query($sql);
if($result->num_rows < 1){
    $msg = '<div class="alert alert-info text-center">No Record Found !</div>';
    echo $msg;
} else {
?>


    <p class="text-center bg-dark text-white p-2">List of Technicians</p>
    <table class="table">
        <thead>
            <tr>
                <th>Emp ID</th>
                <th>Name</th>
                <th>City</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()){ ?>
            <tr>
                <td><?php echo $row['emp_id'];?></td>
                <td><?php echo $row['emp_name'];?></td>
                <td><?php echo $row['emp_city'];?></td>
                <td><?php echo $row['emp_mobile'];?></td>
                <td><?php echo $row['emp_email'];?></td>
                <td class="">
                    <form action="editemp.php" method="get" class="d-inline">
                        <input type="hidden" name="eid" value="<?php echo $row['emp_id'];?>">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></button>
                    </form>
                    <form action="" method="get" class="d-inline">
                        <input type="hidden" name="eid" value="<?php echo $row['emp_id'];?>">
                        <button type="submit" class="btn btn-danger" name="delete"><i class="fas fa-trash"></i></i></button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php } ?>
</div>

<!-- Second Column End -->
<!-- Main Content Area End -->


<?php
// Delete Button Clicked
if(isset($_REQUEST['delete'])){
    $eid = $_REQUEST['eid'];
    $sql = "DELETE FROM technician_tb WHERE emp_id = '$eid'";
    if($conn->query($sql)){
        $_SESSION['title'] = "Record Deleted";
        $_SESSION['icon'] = "success";
        $_SESSION['button'] = "Okay!";  
        echo '<meta http-equiv="refresh" content="0;URL=?deleted" >';

    }else {
        $_SESSION['title'] = "Unable to delete";
        $_SESSION['icon'] = "error";
        $_SESSION['button'] = "Okay!";   
    }
}

?>

</div>  
  <!-- End of row -->

    <div class="d-flex justify-content-end mb-5">
        <a href="insertemp.php" class="btn btn-danger me-5"><i class="fa fa-plus fa-2x"></i></a>
    </div>


</div>
<!-- End of Container -->



<script src="../js/jquery.min.js"></script>    
<script src="../js/popper.min.js"></script>    
<script src="../js/bootstrap.min.js"></script>    
<script src="../js/all.min.js"></script>   
<script src="../js/custom.js"></script>   
<script src="../js/sweetalerts.min.js"></script>   

<?php
    if(isset($_SESSION['title']) && isset($_SESSION['icon']) && isset($_SESSION['button'])){
      ?>
      <script>
        swal({
          title : '<?php echo $_SESSION['title'] ?>',
          icon : '<?php echo $_SESSION['icon'] ?>',
          button : '<?php echo $_SESSION['button'] ?>',
        })
      </script>

      <?php
      unset($_SESSION['title']);
      unset($_SESSION['icon']);
      unset($_SESSION['button']);
    }
    ?>

</body>
</html>
