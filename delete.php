<?php
include_once "db/dbconfig.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM test WHERE id = '$id'";
    $result = $conn->query($sql);
    if ($result == true) {
        echo "Record deleted successfully...";
        header('location:viewrecord.php');
    } else {
        echo "error: " . $sql . "<br>" . $conn->error;
    }
}
