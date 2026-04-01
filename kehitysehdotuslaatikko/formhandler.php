<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nimi = $_POST["nimi"];
    $teksti = $_POST["teksti"];
    $kategoria = $_POST["kategoria"];
    
    
    try {
        require_once "connect.php";


        $query = "INSERT INTO palautelomake (nimi, teksti, kategoria) VALUES (?, ?, ?);";

        $stmt = $conn->prepare($query);
        

        $stmt->execute([$nimi, $teksti, $kategoria]);

        $conn = null;
        $stmt = null;

        header("Location: ./main.php");

        die();
    } catch (PDOException $error) {
        die("Query failed : " . $error->getMessage());
    }
}
else {
    header("Location: ./main.php");
}