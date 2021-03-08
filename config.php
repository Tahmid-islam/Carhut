<!-- This page use for total database connection part -->

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carhut";
$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}