<?php
if(isset($_SESSION)){
  session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
        
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet"> 

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <title>OSMS</title>
</head>
<body>
    
    
    <!-- Navbar Start -->
    <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-danger">
        <div class="container-fluid d-flex">
          <div>
            <a class="navbar-brand ps-3" href="#">
                OSMS
              </a>
            </div>
            <small class="navbar-text justify-content-start">Customers Happiness is our aim!</small>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end pe-5" id="navbarNav">
            <ul class="navbar-nav ml-5">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#services">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#registration">Registration</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Requester/requesterLogin.php">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contact">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <!-- Navbar End -->


    <!-- Banner Start -->

      <header class="p-5 back-img mt-0 cc">
        <div class="mainHeading">
          <h1 class="text-uppercase font-bold text-danger">Welcome to OSMS</h1>
          <p class="lead font-italic">Customer's Happiness is our Aim</p>
          <div>
            <a href="Requester/requesterLogin.php" class="btn btn-success me-3">Login</a>
            <a href="#registration" class="btn btn-danger me-3">Signup</a>
          </div>
        </div>
      </header>

    <!-- Banner End -->

    <!-- OSMS Introduction Start -->
    <div class="container mt-5 bg-light p-5">
      <h3 class="text-center">OSMS Services</h3>
      <p class="fs-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus consequatur delectus ullam? Qui molestiae voluptas perferendis, asperiores placeat doloribus veniam tempore, dolorum minima quaerat porro temporibus nisi voluptatum mollitia maiores. Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, delectus? Debitis harum tenetur sequi nisi cupiditate recusandae, quibusdam, consequatur quisquam nihil eaque earum amet temporibus iste adipisci quidem ex eum?</p>
    </div>
    <!-- OSMS Introduction End -->



    <!-- Services Start -->
    <div class="container text-center mt-5 border-bottom" id="services">
      <h2 class="mb-3">Our Services</h2>
      <div class="row">
        <div class="col-md-4 mb-5">
          <a href="#">
            <i class="fas fa-tv fa-8x text-success mb-4"></i>
          </a>
          <h4>Electronic Appliances</h4>
        </div>
        <div class="col-md-4 mb-5">
          <a href="#">
            <i class="fas fa-sliders-h fa-8x text-primary mb-4"></i>
          </a>
          <h4>Preventive Maintenance</h4>
        </div>
        <div class="col-md-4 mb-5">
          <a href="#">
            <i class="fas fa-cogs fa-8x text-info mb-4"></i>
          </a>
          <h4>Fault Repair</h4>
        </div>
      </div>
    </div>
    <!-- Services End -->

    <!-- Registration Form Start -->
    <?php include('userRegistration.php') ?>
    <!-- Registration Form End -->


    <!-- Happy Customers Start -->
    <div class="container-fluid p-5 bg-danger">
      <h2 class="text-center text-white">Happy Customers</h2>
      <div class="row text-center my-5">
        <div class="col-sm-6 col-md-3">
          <div class="card shadow-lg mb-3">
            <div class="card-body">
              <img class="img-fluid rounded-circle" src="images/avtar1.jpeg">
              <h4 class="card-title">Anas Makki</h4>
              <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus, perferendis.</p>
            </div>
          </div>
        </div> <!--End 1st Column-->
        <div class="col-sm-6 col-md-3">
          <div class="card shadow-lg">
            <div class="card-body">
              <img class="img-fluid rounded-circle" src="images/avtar2.jpeg">
              <h4 class="card-title">Sana Ali</h4>
              <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus, perferendis.</p>
            </div>
          </div>
        </div> <!--End 2nd Column-->
        <div class="col-sm-6 col-md-3">
          <div class="card shadow-lg">
            <div class="card-body">
              <img class="img-fluid rounded-circle" src="images/avtar3.jpeg">
              <h4 class="card-title">Sharjeel Ahmad</h4>
              <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus, perferendis.</p>
            </div>
          </div>
        </div> <!--End 3rd Column-->
        <div class="col-sm-6 col-md-3">
          <div class="card shadow-lg">
            <div class="card-body">
              <img class="img-fluid rounded-circle" src="images/avtar4.jpeg">
              <h4 class="card-title">Mahnoor</h4>
              <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus, perferendis.</p>
            </div>
          </div>
        </div> <!--End 4th Column-->
      </div>
    </div>
    <!-- Happy Customers End -->

    <!-- Contact Us Start -->
    <div class="container mt-5" id="contact">
      <h2 class="text-center">Contact Us</h2>
      <div class="row my-3">
        <div class="col-md-8">
          <!-- Contact Form Start -->
          <?php include('contactForm.php'); ?>
          <!-- Contact Form End -->
        </div> <!--End 1st Column-->
        <div class="col-md-4 text-center">
          <strong>Headquater:</strong><br>
          OSMS pvt Ltd, <br>
          Millat Chowk, Faisalabad <br>
          Punjab - 42336 <br>
          Phone: +923020006566 <br>
          <a href="#" target="_blank" class="text-reset text-decoration-none">www.osms.com</a>
          <br><br>
          <strong>Branch:</strong><br>
          OSMS pvt Ltd, <br>
          College Road, Faisalabad <br>
          Punjab - 42336 <br>
          Phone: +923020006566 <br>
          <a href="#" target="_blank" class="text-reset text-decoration-none">www.osms.com</a>
        </div> <!--End 2nd Column-->
      </div>
    </div>
    <!-- Contact Us End -->

    
    <!-- Footer Start -->
    <div class="container-fluid mt-5 bg-dark text-center text-white border-top border-danger border-5">
      <div class="row py-3">
        <div class="col-md-6">
          <span class="pe-1">Follow us:</span>
          <a href="#" class="pe-1"><i class="fab fa-facebook text-danger"></i></i></a>
          <a href="#" class="pe-1"><i class="fab fa-twitter text-danger"></i></i></a>
          <a href="#" class="pe-1"><i class="fab fa-google text-danger"></i></i></a>
          <a href="#" class="pe-1"><i class="fab fa-instagram text-danger"></i></i></a>
          <a href="#" class="pe-1"><i class="fab fa-linkedin text-danger"></i></i></a>
        </div>
        <div class="col-md-6">
          Design and developed by Anas Makki &copy; 2022
          <a href="Admin/login.php" class="text-reset text-decoration-none">Admin login</a>
        </div>
      </div>
    </div>
    <!-- Footer End -->



    <!-- Jquery , Popper and Bootstrap Javascript -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>   

    <!-- Font Awesome Javascript -->
    <script type="text/javascript" src="js/all.min.js"></script>
    
    <!-- Sweet Alert Javascript -->
    <script type="text/javascript" src="js/sweetalerts.min.js"></script>
    
    <!-- Custom Javascript -->
    <script type="text/javascript" src="js/custom.js"></script>


    <?php
    if(isset($_SESSION['title']) != '' && isset($_SESSION['icon']) != ''){
      ?>

      <script>
        swal({
          title : '<?php echo $_SESSION['title'] ?>',
          icon : '<?php echo $_SESSION['icon'] ?>',
          button : '<?php echo $_SESSION['button'] ?>',
        })
      </script>

      <?php
    }
    ?>

    
</body>
</html>