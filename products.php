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
<body class="main-layout inner_posituong">

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
                                <?php
                                $con = mysqli_connect("localhost", "root", "root") OR die("cannot connect");
                                mysqli_select_db($con, 'db_site');

                                @$user = $_SESSION['username'];

                                $query_select = "SELECT * FROM customer WHERE username = '$user'";
                                $query_run_select = mysqli_query($con, $query_select);
                                if ($query_run_select) {
                                    $row_select = mysqli_fetch_array($query_run_select, MYSQLI_ASSOC);
                                    @$role = $row_select['role'];
                                    if ($role == "admin") {
                                        echo '<li class="nav-item">
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.php">About</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="products.php">Products</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="addproduct.php">Add Product</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="orders.php">Order list</a>
                                </li>';
                                    }
                                    else {
                                        echo '<li class="nav-item">
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.php">About</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="products.php">Products</a>
                                </li>';
                                    }
                                }
                                ?>

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
                <h2>Our products</h2>
            </div>
        </div>
    </div>
</div>

<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Product name:</th>
        <th scope="col">Type:</th>
        <th scope="col">Price:</th>
        <th scope="col">Processor:</th>
        <th scope="col">RAM:</th>
        <th scope="col">Memory:</th>
        <th scope="col">Graphics card:</th>
        <th scope="col" colspan="2">Action:</th>
    </tr>
    </thead>
    <tbody>

    <?php
    $con = mysqli_connect("localhost", "root", "root") OR die("cannot connect");
    mysqli_select_db($con, 'db_site');

    @$user = $_SESSION['username'];

    $query_select = "SELECT * FROM customer WHERE username = '$user'";
    $query_run_select = mysqli_query($con, $query_select);

    $query = "SELECT * FROM product LEFT JOIN specifications ON product.specifications_id = specifications.id";
    $query_run1 = mysqli_query($con, $query);

    if ($query_run_select) {
        $row_select = mysqli_fetch_array($query_run_select, MYSQLI_ASSOC);
        @$role = $row_select['role'];
        if ($role == "admin") {
            if ($query_run1) {
                while ($row = mysqli_fetch_array($query_run1, MYSQLI_ASSOC)) {
                    @$id = $row['id'];
                    @$name = $row['pr_name'];
                    @$type = $row['type'];
                    @$price = $row['price'];

                    @$processor = $row['processor'];
                    @$ram = $row['ram'];
                    @$memory = $row['memory_space'];
                    @$graphics = $row['graphics_card'];

                    echo '<tr>
           <th scope="row">'.$nb.'</th>
           <td>'.$name.'</td>
           <td>'.$type.'</td>
           <td>'.$price.' RON</td>
           <td>'.$processor.'</td>
           <td>'.$ram.'</td>
           <td>'.$memory.'</td>
           <td>'.$graphics.'</td>
           <td> <form method="post">
           <input type="hidden" name="id" value="'.$id.'">
           <div class="btn-group" role="group" aria-label="Basic example"> 
                <button type="submit" class="btn btn-outline-success" name="updateButton">Update</button>
                <button type="submit" class="btn btn-outline-danger" name="deleteButton">Delete</button>
            </div>
                <td> <form method="post">        
                        
               </form> 
            </td>
            </tr>';
                    $nb++;
                }
            }

            if(isset($_POST['deleteButton'])) {
                if(isset($_POST['id'])) {
                    @$id = $_POST['id'];
                    $delete_query1 = "DELETE FROM product WHERE id = '$id'";
                    $query_run1 = mysqli_query($con, $delete_query1);
                    $delete_query2 = "DELETE FROM specifications WHERE id = '$id'";
                    $query_run2 = mysqli_query($con, $delete_query2);
                    if($query_run1 && $query_run2) {
                        echo '<script> alert("Product Deleted"); </script>';
                    }
                    else {
                        echo '<script> alert("Error"); </script>';
                    }
                }
            }


        } else {
            if ($query_run1) {
                while ($row = mysqli_fetch_array($query_run1, MYSQLI_ASSOC)) {
                    @$id = $row['id'];
                    @$name = $row['pr_name'];
                    @$type = $row['type'];
                    @$price = $row['price'];

                    @$processor = $row['processor'];
                    @$ram = $row['ram'];
                    @$memory = $row['memory_space'];
                    @$graphics = $row['graphics_card'];

                    echo '<tr>
           <th scope="row">' . $nb . '</th>
           <td>' . $name . '</td>
           <td>' . $type . '</td>
           <td>' . $price . ' RON</td>
           <td>' . $processor . '</td>
           <td>' . $ram . '</td>
           <td>' . $memory . '</td>
           <td>' . $graphics . '</td>
           <td> <form method="post">
           <input type="hidden" name="id" value="' . $id . '">
                <button type="submit" class="btn btn-outline-primary" name="orderButton">Order</button>   
                <td> <form method="post">        
                        
               </form> 
            </td>
            </tr>';
                    $nb++;
                }
            }

            if(isset($_POST['orderButton'])) {
                if (isset($_POST['id'])) {
                    @$id = $_POST['id'];
                    @$user = $_SESSION['username'];

                    $query_select = "SELECT * FROM customer WHERE username = '$user'";
                    $query_run_select = mysqli_query($con, $query_select);
                    $row = mysqli_fetch_array($query_run_select, MYSQLI_ASSOC);
                    @$id_customer = $row['id'];

                    $query_insert = "insert into `order` (`customer_id`, `product_id`) values ($id_customer, $id)";
                    $query_run_insert = mysqli_query($con, $query_insert);

                    if($query_run_select && $query_run_insert) {
                        echo '<script> alert("Product ordered!"); </script>';
                    }
                    else {
                        echo '<script> alert("Error! You are not logged in!"); </script>';
                    }
                }
            }
        }
    }
    ?>
    </tbody>
</table>

<?php
$con = mysqli_connect("localhost", "root", "root") OR die("cannot connect");
mysqli_select_db($con, 'db_site');

if(isset($_POST['updateButton'])) {
    if (isset($_POST['id'])) {
        @$id = $_POST['id'];

        $query_select = "SELECT * FROM product WHERE id = '$id'";
        $query_run_select = mysqli_query($con, $query_select);
        $row = mysqli_fetch_array($query_run_select, MYSQLI_ASSOC);
        @$product_name = $row['pr_name'];

        echo '
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="titlepage">
                    <br>
                    <h2>Update</h2>
                </div>
            </div>
        </div>
<div class="loginform">
            <form method="post">
                <h2 class="text-center"><strong>'.$product_name.'</strong></h2>
                <div class="form-outline mb-4">
                <div class="form-outline mb-4">
                    <label class="form-label" for="name">Update name:</label>
                    <input type="text" id="name" class="form-control" name="name"/>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="type">Update type:</label>
                    <input type="text" id="type" class="form-control" name="type"/>
                </div>
                    <label class="form-label" for="price">Update price:</label>
                    <input type="text" id="price" class="form-control" name="price"/>
                </div>
                <h4 class="text-center"><em>Specifications:</em></h4>
                <div class="form-outline mb-4">
                    <label class="form-label" for="processor">Update processor:</label>
                    <input type="text" id="processor" class="form-control" name="processor"/>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="ram">Update RAM:</label>
                    <input type="text" id="ram" class="form-control" name="ram"/>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="memory">Update memory:</label>
                    <input type="text" id="memory" class="form-control" name="memory"/>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="graphics">Update graphics card:</label>
                    <input type="text" id="graphics" class="form-control" name="graphics"/>
                </div>
                <input type="hidden" name="id" value="'.$id.'">
                <button type="submit" class="btn btn-primary btn-block mb-4" name="update">Update product</button>
            </form>
            <br>
        </div>
    </div>';
    }
}
?>

<?php
$con = mysqli_connect("localhost", "root", "root") OR die("cannot connect");
mysqli_select_db($con, 'db_site');

if(isset($_POST['update'])) {
    if (isset($_POST['id'])) {
        @$updated_id = $_POST['id'];
        @$updated_name = $_POST['name'];
        @$updated_type = $_POST['type'];
        @$updated_price = $_POST['price'];

        @$updated_processor = $_POST['processor'];
        @$updated_ram = $_POST['ram'];
        @$updated_memory = $_POST['memory'];
        @$updated_graphics = $_POST['graphics'];

        $query_update1 = "";
        $query_update2 = "";
        $query_update3 = "";
        $query_update4 = "";
        $query_update5 = "";
        $query_update6 = "";
        $query_update7 = "";

        if(!empty($updated_name)){
            $query_update1 = "UPDATE product SET pr_name = '$updated_name' WHERE id = '$updated_id'";
        }
        else {
            $query_select_name = "SELECT pr_name FROM product WHERE id = '$updated_id'";
            $query_run_select_name = mysqli_query($con, $query_select_name);
            $row = mysqli_fetch_array($query_run_select_name, MYSQLI_ASSOC);
            $updated_name = $row['pr_name'];
            $query_update1 = "UPDATE product SET pr_name = '$updated_name' WHERE id = '$updated_id'";
        }

        if (!empty($updated_type)) {
            $query_update2 = "UPDATE product SET type = '$updated_type' WHERE id = '$updated_id'";
        }
        else {
            $query_select_type = "SELECT type FROM product WHERE id = '$updated_id'";
            $query_run_select_type = mysqli_query($con, $query_select_type);
            $row = mysqli_fetch_array($query_run_select_type, MYSQLI_ASSOC);
            $updated_type = $row['type'];
            $query_update2 = "UPDATE product SET type = '$updated_type' WHERE id = '$updated_id'";
        }

        if (!empty($updated_price)) {
            $query_update3 = "UPDATE product SET price = '$updated_price' WHERE id = '$updated_id'";
        }
        else {
            $query_select_price = "SELECT price FROM product WHERE id = '$updated_id'";
            $query_run_select_price = mysqli_query($con, $query_select_price);
            $row = mysqli_fetch_array($query_run_select_price, MYSQLI_ASSOC);
            $updated_price = $row['price'];
            $query_update3 = "UPDATE product SET price = '$updated_price' WHERE id = '$updated_id'";
        }

        if (!empty($updated_processor)) {
            $query_update4 = "UPDATE specifications SET processor = '$updated_processor' WHERE id = '$updated_id'";
        }
        else {
            $query_select_processor = "SELECT processor FROM specifications WHERE id = '$updated_id'";
            $query_run_select_processor = mysqli_query($con, $query_select_processor);
            $row = mysqli_fetch_array($query_run_select_processor, MYSQLI_ASSOC);
            $updated_processor = $row['processor'];
            $query_update4 = "UPDATE specifications SET processor = '$updated_processor' WHERE id = '$updated_id'";
        }

        if (!empty($updated_ram)) {
            $query_update5 = "UPDATE specifications SET ram = '$updated_ram' WHERE id = '$updated_id'";
        }
        else {
            $query_select_ram = "SELECT ram FROM specifications WHERE id = '$updated_id'";
            $query_run_select_ram = mysqli_query($con, $query_select_ram);
            $row = mysqli_fetch_array($query_run_select_ram, MYSQLI_ASSOC);
            $updated_ram = $row['ram'];
            $query_update5 = "UPDATE specifications SET ram = '$updated_ram' WHERE id = '$updated_id'";
        }

        if (!empty($updated_memory)) {
            $query_update6 = "UPDATE specifications SET memory_space = '$updated_memory' WHERE id = '$updated_id'";
        }
        else {
            $query_select_memory = "SELECT memory_space FROM specifications WHERE id = '$updated_id'";
            $query_run_select_memory = mysqli_query($con, $query_select_memory);
            $row = mysqli_fetch_array($query_run_select_memory, MYSQLI_ASSOC);
            $updated_memory = $row['memory_space'];
            $query_update6 = "UPDATE specifications SET memory_space = '$updated_memory' WHERE id = '$updated_id'";
        }

        if (!empty($updated_graphics)) {
            $query_update7 = "UPDATE specifications SET graphics_card = '$updated_graphics' WHERE id = '$updated_id'";
        }
        else {
            $query_select_graphics = "SELECT graphics_card FROM specifications WHERE id = '$updated_id'";
            $query_run_select_graphics = mysqli_query($con, $query_select_graphics);
            $row = mysqli_fetch_array($query_run_select_graphics, MYSQLI_ASSOC);
            $updated_graphics = $row['graphics_card'];
            $query_update7 = "UPDATE specifications SET graphics_card = '$updated_graphics' WHERE id = '$updated_id'";
        }

        $query_run1 = mysqli_query($con, $query_update1);
        $query_run2 = mysqli_query($con, $query_update2);
        $query_run3 = mysqli_query($con, $query_update3);
        $query_run4 = mysqli_query($con, $query_update4);
        $query_run5 = mysqli_query($con, $query_update5);
        $query_run6 = mysqli_query($con, $query_update6);
        $query_run7 = mysqli_query($con, $query_update7);

        if ($query_run1 && $query_run2 && $query_run3 && $query_run4 && $query_run5 && $query_run6 && $query_run7) {
            echo '<script> alert("Product Updated"); </script>';
        } else {
            echo '<script> alert("Error"); </script>';
        }
    }
}
?>


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
