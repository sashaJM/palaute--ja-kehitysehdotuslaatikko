<?php


require "connect.php";


if(isset($_POST['update'])) {
    $update = $_POST['id'];
    $sql = mysqli_query($conn, "UPDATE palautelomake SET tila = 'käsitelty' WHERE id = '$update'");
    header("refresh:0.2; url=filter.php");
}