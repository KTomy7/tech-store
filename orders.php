<?php
require 'config.php';
@$nb = 1;
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
                                <li class="nav-item">
                                    <a class="nav-link" href="addproduct.php">Add Product</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="orders.php">Order list</a>
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


<div class="container">
    <br>
    <div class="row">
        <div class="col">
            <div class="titlepage">
                <h2>Order List</h2>
            </div>
        </div>
    </div>
</div>

<table class="table table-hover">
    <thead class="table-borderless">
    <tr>
        <th></th>
        <th scope="col" colspan="3">Customer details:</th>
        <th scope="col" colspan="3">Product details:</th>
    </tr>
    <tr>
        <th scope="col">#</th>
        <th scope="col">E-mail:</th>
        <th scope="col">Phone number:</th>
        <th scope="col">Address:</th>
        <th scope="col">Product name:</th>
        <th scope="col">Type:</th>
        <th scope="col">Price:</th>
    </tr>
    </thead>
    <tbody>

    <?php
    $con = mysqli_connect("localhost", "root", "root") OR die("cannot connect");
    mysqli_select_db($con, 'db_site');

    $query = "SELECT * FROM `order`";
    $query_run = mysqli_query($con, $query);

    if($query_run) {
        while($row = mysqli_fetch_array($query_run, MYSQLI_ASSOC)) {
            @$customer_id = $row['customer_id'];
            @$product_id = $row['product_id'];

            $query_select_customer = "SELECT * FROM customer WHERE id = '$customer_id'";
            $query_customer_run = mysqli_query($con, $query_select_customer);
            $query_select_product = "SELECT * FROM product WHERE id = '$product_id'";
            $query_product_run = mysqli_query($con, $query_select_product);

            $customer_result = mysqli_fetch_array($query_customer_run, MYSQLI_ASSOC);
            $product_result = mysqli_fetch_array($query_product_run, MYSQLI_ASSOC);

            @$email = $customer_result['email'];
            @$phone = $customer_result['phone_nb'];
            @$address = $customer_result['address'];

            @$name = $product_result['pr_name'];
            @$type = $product_result['type'];
            @$price = $product_result['price'];

            echo '<tr>
           <th scope="row">'.$nb.'</th>
           <td>'.$email.'</td>
           <td>0'.$phone.'</td>
           <td>'.$address.'</td>
           <td>'.$name.'</td>
           <td>'.$type.'</td>
           <td>'.$price.' RON</td>
            </tr>';
            $nb++;
        }
    }
    ?>

    </tbody>
</table>

<footer>
    <br>
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
                        <li>Str. Ceahlau 70, Cluj Napoca  </li>
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


