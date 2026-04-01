<?php


require "connect.php";


if(isset($_POST['delete'])) {
    $delete = $_POST['id'];
    $sql = mysqli_query($conn, "DELETE FROM palautelomake WHERE id = '$delete'");
    header("refresh:0.2; url=filter.php");
}