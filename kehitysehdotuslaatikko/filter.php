<?php
include "header.php";

session_start();

if(isset($_SESSION["user"])) {
    $email = $_SESSION["user"];




echo "<div class='palautelomakkeet'>";
echo "<h2><br>ADMIN-Palautteet<br><br></h2>";

echo "<form action='filter.php'method='POST'>";
echo "<input type='text' name='search' class='search' placeholder='Hae kategoria'> ";
echo "<button type='submit' name='submit-search' class='submit-search'>Hae</button></form><br>";

echo "</body>";
echo "</html>";





    if (isset($_POST['submit-search'])) {
        $search = mysqli_real_escape_string($conn, $_POST["search"]);
        $sql = "SELECT * FROM palautelomake WHERE kategoria LIKE '%$search%'";
        $result = mysqli_query($conn, $sql);

         if($result->num_rows >0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='palautelomakkeet-box'>";
                $id = $row['id'];
                if($row["tila"] == "käsittelemätön"){
                    echo "<br><div class='status1'><b>" . $row["tila"] . "</b></div>";
                } else {
                    echo "<br><div class='status2'><b>" . $row["tila"] . "</b></div>";
                }
                echo "<br><b>Nimi: </b>". $row["nimi"];
                echo "<p>";
                echo $row["teksti"];
                echo "</p>";
                echo "<b>Kategoria: </b>". $row["kategoria"];
                echo "<br><b>Lähetetty: </b>". $row["päiväys"];
                echo "<br><form action='update.php' method='post'>";
                echo '<input type="hidden" name="id" value='; echo $id; echo '>';
                echo "<button type='submit' name='update' class='update'>KÄSITTELE</button></form>";
                echo "<form action='delete.php' method='post'>";
                echo "<input type='hidden' name='id' value="; echo $id; echo ">";
                echo "<button type='submit' name='delete' class='delete'>POISTA</button></form>";
                echo "</div>";

            }
        } else {
            echo "Ei löydy palautteita tällä kategorialla";
        }

    } else {

        $sql = "SELECT * FROM palautelomake ORDER BY id ASC";
        $result = $conn->query($sql);



        if($result->num_rows >0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='palautelomakkeet-box'>";
                $id = $row['id'];
                if($row["tila"] == "käsittelemätön"){
                    echo "<br><div class='status1'><b>" . $row["tila"] . "</b></div>";
                } else {
                    echo "<br><div class='status2'><b>" . $row["tila"] . "</b></div>";
                }
                echo "<br><b>Nimi: </b>". $row["nimi"];
                echo "<p>";
                echo $row["teksti"];
                echo "</p>";
                echo "<b>Kategoria: </b>". $row["kategoria"];
                echo "<br><b>Lähetetty: </b>". $row["päiväys"];
                echo "<br><form action='update.php' method='post'>";
                echo '<input type="hidden" name="id" value='; echo $id; echo '>';
                echo "<button type='submit' name='update' class='update'>KÄSITTELE</button></form>";
                echo "<form action='delete.php' method='post'>";
                echo "<input type='hidden' name='id' value="; echo $id; echo ">";
                echo "<button type='submit' name='delete' class='delete'>POISTA</button></form>";
                echo "</div>";

            }
        } 
    }


} else {


    echo "<div class='login'><form action='login.php' method='post'><h2><br>KIRJAUDU SISÄÄN<br><br></h2><h4>Email</h4> <input type='email' name='email' id='' required>";
    echo "<h4>Salasana</h4> <input type='password' name='salasana' id='' required>";
    echo "<br><br><button class='kirjautuminen' type='submit'>kirjaudu</button></form><br></div>";

}

if (isset($_SESSION['warning'])) {
    echo $_SESSION['warning'];
    session_destroy();
}



?>