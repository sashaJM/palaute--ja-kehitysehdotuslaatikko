<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palaute- ja kehitysehdotuslaatikko</title>
    <link rel="stylesheet" href="tyylit.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    

    
    
    
</body>
</html>

<?php

include_once "connect.php";


echo "<div class='lomake'>";
echo "<form action='formhandler.php' method='post'>";
echo "<h2><br>ANNA PALAUTETTA<button onclick=window.location.href='filter.php' class= 'kirjaudu'>kirjaudu</button><br><br></h2>";
echo "<h4>Nimi</h4><input type='text' name='nimi' class='nimi' maxlength='255'>";
echo "<h4>Kategoria</h4><select name='kategoria' class='kategoria' required>";
echo "<option value=''disabled selected hidden>--</option>";
echo "<option value='opetus'>opetus</option>";
echo "<option value='tilat'>tilat</option>";
echo "<option value='yleinen'>yleinen</option>";
echo "<option value='muut'>muut</option></select>";
echo "<h4>Palautteesi</h4><textarea name='teksti' class='palaute' maxlength='5000' required></textarea>";
echo "<br><br>";
echo "<input type='submit' value='LÄHETÄ' class='submit'><br><br><br>";
echo "</form></div>";


?>