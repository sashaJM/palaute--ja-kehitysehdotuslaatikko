<?php
session_start();

    $email = $_POST["email"];
    $salasana = $_POST["salasana"];

if ($email == 'admin@gmail.com' AND $salasana == 'admin') {
    $_SESSION["user"] = $email;
    header("location: filter.php");
} else {
    $_SESSION["warning"] = "Email tai salasana on väärin";
    header("location: filter.php");
}


?>