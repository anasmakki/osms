<?php 
define('TITLE', 'Assets');
define('PAGE', 'assets');
include('includes/header.php'); 
?>


<!-- Main Content Area Start -->
<!-- Second Column Start -->
<div class="col-sm-8 mx-auto my-3">


<?php
$sql = "SELECT * FROM assets_tb";
$result = $conn->query($sql);
if($result->num_rows < 1){
    $msg = '<div class="alert alert-info text-center">No Record Found !</div>';
    echo $msg;
} else {
?>


    <p class="text-center bg-dark text-white p-2">Product/Part Details</p>
    <table class="table">
        <thead>
            <tr>
                <th>Prodcut ID</th>
                <th>Name</th>
                <th>DOP</th>
                <th>Available</th>
                <th>Total</th>
                <th>Original Cost</th>
                <th>Selling Cost</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()){ ?>
            <tr>
                <td><?php echo $row['p_id'];?></td>
                <td><?php echo $row['p_name'];?></td>
                <td><?php echo $row['p_dop'];?></td>
                <td><?php echo $row['p_available'];?></td>
                <td><?php echo $row['p_total'];?></td>
                <td><?php echo $row['p_originalcost'];?></td>
                <td><?php echo $row['p_sellingcost'];?></td>
                <td class="">
                    <form action="editproduct.php" method="get" class="d-inline">
                        <input type="hidden" name="pid" value="<?php echo $row['p_id'];?>">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></button>
                    </form>
                    <form action="" method="get" class="d-inline">
                        <input type="hidden" name="pid" value="<?php echo $row['p_id'];?>">
                        <button type="submit" class="btn btn-danger" name="delete"><i class="fas fa-trash"></i></i></button>
                    </form>
                    <form action="sellproduct.php" method="get" class="d-inline">
                        <input type="hidden" name="pid" value="<?php echo $row['p_id'];?>">
                        <input type="hidden" name="pavailable" value="<?php echo $row['p_available'];?>">
                        <input type="hidden" name="pname" value="<?php echo $row['p_name'];?>">
                        <input type="hidden" name="psellingcost" value="<?php echo $row['p_sellingcost'];?>">
                        <button type="submit" class="btn btn-warning" name="issue"><i class="fas fa-handshake"></i></i></button>
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
    $pid = $_REQUEST['pid'];
    $sql = "DELETE FROM assets_tb WHERE p_id = '$pid'";
    if($conn->query($sql)){
        $_SESSION['title'] = "Product Deleted";
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
        <a href="addproduct.php" class="btn btn-danger me-5"><i class="fa fa-plus fa-2x"></i></a>
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