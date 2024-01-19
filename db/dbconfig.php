<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

// creating connection
$conn = new mysqli($servername, $username, $password, $dbname);

// checking connection
if ($conn === false) {
    die("Error...Couldnot connect to the database" . mysqli_connect_error());
}
?>