</div>  
  <!-- End of row -->
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