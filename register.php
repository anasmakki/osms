<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>Register</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container">
            <h5> <a href="index.php" class="navbar-brand">Shaheen DJ</a></h5>
            <span class="navbar-text">Developed By SUNNY RAJPOOT</span>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul id="menu" class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="index.php" class="nav-link up-case">Home</a></li>
                    <li class="nav-item"><a href="services.php" class="nav-link up-case">Services</a></li>
                    <li class="nav-item active"><a href="register.php" class="nav-link up-case">Registration</a></li>
                    <li class="nav-item"><a href="login.php" class="nav-link up-case">Login</a></li>
                    <li class="nav-item"><a href="contact-us.php" class="nav-link up-case">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="login">
        <div class="text-center services-content text-white"><h2 class="font-weight-bold d-inline">Register</h2>
        <p class="up-case mt-4">Your Information ought be secure</p>
        </div>
    </div>
    <div class="container mt-5" id="user-login">
        <div class="row">
            <div class="col-md-8 offset-2">
                <h3 class="text-center mb-4 login-heading">Requister <span class="text-primary"> Registration </span></h3>
                <div class="shadow-lg p-4">
                <?php 
                include("includes/config.php");
                include("includes/functions.php");
                if(isset($_POST['register'])) {
                    if(trim($_POST['Rname']) == "" || trim($_POST['Remail']) == "" || trim($_POST['Rname']) == "Rpassword") {
                         $error_msg = "<p class='text-danger'>All fileds requisred.</p>";
                    } elseif(strlen($_POST['Rname']) < 6 || strlen($_POST['Rname']) > 30){
                        $error_msg = "<p class='text-danger'>Name too small or large.</p>";
                    } elseif(strlen($_POST['Remail']) < 19 || strlen($_POST['Remail']) > 38){
                        $error_msg = "<p class='text-danger'>Email too small or large.</p>";
                    } elseif(strlen($_POST['Rpassword']) < 6 || strlen($_POST['Rpassword']) > 15){
                        $error_msg = "<p class='text-danger'>Password too small or large.</p>";
                    } elseif($_POST['Remail'] == db_user($conn,$_POST['Remail'])) {
                        $error_msg = "<p class='text-danger'>Already registred please login.</p>";
                    } else {
                        $requiterName = htmlentities(mysqli_real_escape_string($conn,$_POST['Rname']));
                        $requiterEMail = htmlentities(mysqli_real_escape_string($conn,$_POST['Remail']));
                        $requiterPass = htmlentities(mysqli_real_escape_string($conn,sha1($_POST['Rpassword'])));
                        insert_requister_record($conn,$requiterName,$requiterEMail,$requiterPass);
                    }
                }
                ?>
                  <form action="" method="POST">
                  <?php if(isset($error_msg)) { echo $error_msg; } ?>
                  <div class="form-group">
                        <label for="Rname" class="font-weight-bold"><i class="fa fa-user mr-2"></i>Requister Names</label>
                        <input type="Rname" name="Rname" id="Rname" placeholder="Full Name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Remail" class="font-weight-bold"><i class="fa fa-envelope mr-2"></i>Requister Email</label>
                        <input type="email" name="Remail" id="Remail" placeholder="Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Rpassword" class="font-weight-bold"><i class="fa fa-key mr-2"></i>Requister Password</label>
                        <input type="password" name="Rpassword" id="Rpassword" placeholder="Password" class="form-control">
                    </div>
                    <input type="submit" value="Register" name="register" class="btn btn-primary">
                  </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <div class="bg-white p-5">
                    <div class="text-center">
                        <i class="fa fa-phone fa-3x text-primary"></i>
                        <h5 class="my-3">Phone</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa, quas minima. Eius, qui!</p>
                        <a href="" class="btn-link">+923070458338</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white p-5">
                    <div class="text-center">
                        <i class="fa fa-envelope fa-3x text-primary"></i>
                        <h5 class="my-3">Email</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa, quas minima. Eius, qui!</p>
                        <a href="" class="byn-link">sunnyrajpoot405@gmail.com</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white p-5">
                    <div class="text-center">
                        <i class="fa fa-map fa-3x text-primary"></i>
                        <h5 class="my-3">Location</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa, quas minima. Eius, qui!</p>
                        <a href="" class="byn-link">View on Google Map</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="bgFixed" class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="content text-white">
                        <h1>Your solution are very important</h1>
                        <p class="my-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero quo ratione
                            eligendi vero maxime odio accusamus laudantium sequi magni ducimus?</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque laboriosam dolorem eaque
                            suscipit itaque!</p>
                        <a href="" class="btn btn-primary up-case">read more</a>
                    </div>
                </div>
                <div class="col-md-6 text-dark text-center">
                    <div class="row">
                        <div class="col-6 rate">
                            <div class="card card-body bg">
                                <h2 class="text-primary">245</h2>
                                <h5 class="text-cap font-weight-bold">Work hours</h5>
                            </div>
                        </div>
                        <div class="col-6 rate">
                            <div class="card card-body bg">
                                <h2 class="text-primary">300</h2>
                                <h5 class="text-cap font-weight-bold">Great Reviews</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-6 rate">
                            <div class="card card-body bg">
                                <h2 class="text-primary">400</h2>
                                <h5 class="text-cap font-weight-bold">Work Done</h5>
                            </div>
                        </div>
                        <div class="col-6 rate">
                            <div class="card card-body bg">
                                <h2 class="text-primary">1000</h2>
                                <h5 class="text-cap font-weight-bold">Awards Won</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="footer" class="p-5 mt-5">
          <div class="container">
              <div class="row text-white">
                  <div class="col-md-3">
                     <h5 class=" mb-4">Custom Services</h5>
                     <nav>
                         <ul class="list-unstyled">
                             <li><a href="" class="text-white">Repairing Devices</a></li>
                             <li class="my-1"><a href="" class="text-white">Electric Tourches</a></li>
                             <li><a href="" class="text-white">Fault Repair</a></li>
                             <li  class="my-1"><a href="" class="text-white">Sound Booking</a></li>
                             <li><a href="" class="text-white">Preventive Maintenence</a></li>
                             <li class="mt-3"><a href=""><i class="fab fa-facebook fa-2x rounded-circle bg-dark text-white"></i><i class="fab fa-twitter fa-2x mx-2 rounded-circle bg-dark text-white"></i><i class="fab fa-google-plus fa-2x rounded-circle bg-dark text-white"></i></a></li>
                         </ul>
                     </nav>
                  </div>
                  <div class="col-md-3">
                    <h5 class=" mb-4">Usefull Links</h5>
                    <nav>
                        <ul class="list-unstyled">
                            <li><a href="" class="text-white">Our Address</a></li>
                            <li class="my-1"><a href="" class="text-white">Our Testimonials</a></li>
                            <li><a href="" class="text-white"></a></li>
                            <li class="my-1"><a href="" class="text-white">customers Reviews</a></li>
                            <li><a href="" class="text-white">Successes</a></li>
                        </ul>
                    </nav>
                  </div>
                  <div class="col-md-3">
                    <h5 class=" mb-4">Addition Pages</h5>
                    <nav>
                        <ul class="list-unstyled">
                            <li><a href="" class="text-white">Home</a></li>
                            <li class="my-1"><a href="" class="text-white">Services</a></li>
                            <li><a href="" class="text-white">Registration</a></li>
                            <li class="my-1"><a href="" class="text-white">Login</a></li>
                            <li><a href="" class="text-white">Contact Us</a></li>
                        </ul>
                    </nav>

                  </div>
                  <div class="col-md-3">
                    <h5 class=" mb-4">Contact Us</h5>
                    <form action="">
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control bg-dark border border-dark text-white" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control bg-dark border border-dark text-white" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                        <textarea name="message" id="message"  rows="5" class="bg-dark text-white border border-dark form-control" placeholder="Message"></textarea>
                        </div>
                        <input type="submit" value="send message" class="btn btn-primary up-case">
                    </form>
                  </div>
                  <p class="text-white bg-dark p-2">copyright &copy; allreserved ShaheenDJ.com | 2020</p>
              </div>
          </div>
    </div>
    <!-- Jquery -->
    <script src="js/jquery.min.js"></script>
    <!-- JS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Fontawesome -->
    <script src="js/all.min.js"></script>
</body>

</html>