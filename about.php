<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <title>Tech Store</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">

   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/responsive.css">
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
</head>

<body class="main-layout inner_posituong computer_page">

   <header>
      <div class="header">
         <div class="container-fluid">
            <div class="row">
               <div class="col-xl-12 col-lg-9 col-md-9 col-sm-9">
                  <nav class="navigation navbar navbar-expand-md navbar-dark ">
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04"
                        aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarsExample04">
                        <ul class="col-11 navbar-nav mr-auto">
                           <li class="nav-item">
                              <a class="nav-link" href="index.php">Home</a>
                           </li>
                           <li class="nav-item active">
                              <a class="nav-link" href="about.php">About</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="products.php">Products</a>
                           </li>
                        </ul>
                        <ul class="col-1 navbar-nav mr-auto">
                           <li class="nav-item d_none">
                              <a class="nav-link" href="login.php">Login</a>
                           </li>
                        </ul>
                     </div>
                  </nav>
               </div>
            </div>
         </div>
      </div>
   </header>

   <!-- about section -->
   <div class="about">
      <div class="container">
         <div class="row d_flex">
            <div class="col-md-5">
               <div class="titlepage">
                  <h2>About Us</h2>
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nesciunt laborum sequi quas ad
                     necessitatibus eius nulla in modi cumque nam blanditiis natus ipsum dolore distinctio rerum iste,
                     dignissimos id quae?
                     Voluptas quam iure quibusdam eius molestiae accusamus id omnis? Sequi quod consectetur quasi, et,
                     qui iusto possimus quo dolore praesentium ducimus provident eveniet illo tenetur officiis! Sed, qui
                     reprehenderit. Accusamus?
                     Vel minima maiores consectetur fugiat, illum commodi eveniet eos voluptate non, numquam enim earum
                     doloribus iusto, quas suscipit corporis! Commodi possimus vitae error earum non, saepe impedit
                     facilis eum tempora?
                     Aspernatur nemo officia porro? Tempora velit facere quasi nobis laboriosam quo, pariatur eaque
                     totam, earum temporibus nostrum ducimus nisi impedit quibusdam fugit! Quis numquam assumenda
                     repellat, ipsa nobis vero perferendis?</p>
               </div>
            </div>
            <div class="col-md-7">
               <div class="about_img">
                  <figure><img src="images/about.jpg" alt="#" /></figure>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>

   <footer>
      <div class="footer">
         <div class="container">
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                  <h3>Program</h3>
                  <ul class="about_us">
                     <li>Monday - Friday: 10:00 - 18:00</li>
                     <li>Saturday - Sunday: closed</li>
                  </ul>
               </div>
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                  <h3>Address</h3>
                  <ul class="about_us">
                     <li>Str. Ceahlau 70, Cluj Napoca </li>
                  </ul>
               </div>
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                  <h3>Contact</h3>
                  <ul class="conta">
                     <li>Phone - 0721 196 648 </li>
                     <li>Mail - techstore@gmail.com </li>
                     <br>
                  </ul>
               </div>
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                  <h3>Follow Us</h3>
                  <ul class="social_icon">
                     <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                     <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                     <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                     <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </footer>

   <!-- Javascript files-->
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/jquery-3.0.0.min.js"></script>
   <!-- sidebar -->
   <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="js/custom.js"></script>
</body>

</html>