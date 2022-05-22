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
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarsExample04">
                                <ul class="col-11 navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="about.php">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="products.php">Products</a>
                                    </li>
                                </ul>
                                <ul class="col-1 navbar-nav mr-auto">
                                    <li class="nav-item d_none active">
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


    <div class="container">
        <br>
        <div class="row">
            <div class="col">
                <div class="titlepage">
                    <h2>Login</h2>
                </div>
            </div>
        </div>

        <div class="loginform">
                <form method="post">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="username">Username:</label>
                        <input type="text" id="username" class="form-control" name="name"/>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="password">Password:</label>
                        <input type="password" id="password" class="form-control" name="password"/>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mb-4" name="submitButton">Sign in</button>
                    <button type="button" class="btn btn-primary btn-block mb-4"><a class="nav-link" href="register.php" style="color: white">Register</a></button>
                </form>
        </div>
    </div>

    <?php
    $con = mysqli_connect("localhost", "root", "root") OR die("cannot connect");
    mysqli_select_db($con, 'db_site');

    if(isset($_POST['submitButton'])) {
        @$name = $_POST['name'];
        @$password = $_POST['password'];

        $query = "SELECT id FROM customer WHERE username = '$name' AND password = '$password'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);

        // If result matched $name and $password, table row must be 1 row

        if($count == 1) {
            $_SESSION['username'] = $name;
            header("Location: index.php");
            exit;
        }else {
            echo '<script type="text/javascript"> alert("Incorrect username or password!")</script>';
        }
    }
    ?>


    <div class="blank"></div>

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