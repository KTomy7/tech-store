<?php
session_start();
$con = mysqli_connect("localhost", "root", "root") OR die("cannot connect");
mysqli_select_db($con, 'db_site');
?>