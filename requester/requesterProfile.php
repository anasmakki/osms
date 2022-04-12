
<?php
define('TITLE', "Profile"); 
define('PAGE', "Profile"); 
include('includes/header.php'); 
 ?>

    <!-- Main Content Start -->
    <div class="col-sm-6 my-3">
        <form action="" method="get" class="mx-5">
            <div class="form-group">
                <label for="rEmail">Email</label>
                <input type="email" class="form-control" name="rEmail" id="rEmail" value="<?php if($_SESSION['rEmail']) {echo $_SESSION['rEmail'];} ?>" readonly>
            </div>
            <div class="form-group">
                <label for="rName">Name</label>
                <input type="text" class="form-control" name="rName" id="rName" value="<?php echo $rName; ?>">
            </div>
            <input type="submit" class="btn btn-danger mt-2" value="Update" name="nameupdate">

            <?php if(isset($msg)){ echo $msg;} ?>            

        </form>
    </div>
    <!-- Main Content Start -->

    <?php include('includes/footer.php'); ?>
