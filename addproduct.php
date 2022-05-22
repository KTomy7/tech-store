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

<body class="main-layout inner_posituong">
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
                                    <li class="nav-item active">
                                        <a class="nav-link" href="addproduct.php">Add Product</a>
                                    </li>
                                    <li class="nav-item">
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
        <div class="row">
            <div class="col">
                <div class="titlepage">
                    <br>
                    <h2>Add a new product</h2>
                </div>
            </div>
        </div>

        <div class="loginform">
            <form method="post">
                <div class="form-outline mb-4">
                    <label class="form-label" for="name">Name:</label>
                    <input type="text" id="name" class="form-control" name="name"/>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="type">Type:</label>
                    <input type="text" id="type" class="form-control" name="type"/>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="price">Price:</label>
                    <input type="text" id="price" class="form-control" name="price"/>
                </div>
                <h4 class="text-center"><em>Specifications:</em></h4>
                <div class="form-outline mb-4">
                    <label class="form-label" for="processor">Processor:</label>
                    <input type="text" id="processor" class="form-control" name="processor"/>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="ram">RAM:</label>
                    <input type="text" id="ram" class="form-control" name="ram"/>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="memory">Memory:</label>
                    <input type="text" id="memory" class="form-control" name="memory"/>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="graphics">Graphics card:</label>
                    <input type="text" id="graphics" class="form-control" name="graphics"/>
                </div>
                <button type="submit" class="btn btn-primary btn-block mb-4" name="submitButton">Add product</button>
            </form>
            <br>
        </div>
    </div>

<?php
    $con = mysqli_connect("localhost", "root", "root") OR die("cannot connect");
    mysqli_select_db($con, 'db_site');

    if(isset($_POST['submitButton'])) {
        @$name = $_POST['name'];
        @$type = $_POST['type'];
        @$price = $_POST['price'];

        @$processor = $_POST['processor'];
        @$ram = $_POST['ram'];
        @$memory = $_POST['memory'];
        @$graphics = $_POST['graphics'];

        $query1 = "insert into specifications(processor, ram, memory_space, graphics_card) values('$processor', '$ram', '$memory', '$graphics')";
        $query_run1 = mysqli_query($con, $query1);

        $query2 = "select id from specifications where processor = '$processor' and ram = '$ram' and memory_space = '$memory' and graphics_card = '$graphics'";
        $query_run2 = mysqli_query($con, $query2);
        $row = mysqli_fetch_array($query_run2);
        $id = $row['id'];

        $query3 = "insert into product(pr_name, type, price, specifications_id) values('$name', '$type', $price, $id)";
        $query_run3 = mysqli_query($con, $query3);


        if ($query_run1 && $query_run2 && $query_run3) {
            echo '<script type="text/javascript"> alert("Values inserted successfully")</script>';
    }
        else {
            echo '<script type="text/javascript"> alert("Values NOT inserted successfully")</script>';
        }
    }
?>

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