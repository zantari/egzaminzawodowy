<?php
    $conn = new mysqli("localhost", "root", "", "hodowla");

    if($conn -> connect_error){
        die("blad polaczenia" .$conn -> connect_error);
    }


?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Hodowla świnek morskich</title>
</head>
<body> 
    <header>
        <h1>Hodowla świnek morskich - zamów świnkowe maluszki</h1>
    </header>

    <section id="lewy_menu">
        <a href="peruwianka.php">Rasa Peruwnianka</a>
        <a href="american.php">Rasa American</a>
        <a href="crested.php">Rasa Crested</a>
    </section>

    <section id="prawy">
        <h3>Poznaj wszystkie rasy świnek morskich</h3>
        <ol>
            <?php
                $sql = "SELECT rasa FROM rasy;";
                $result = $conn -> query($sql);

                while($row = $result -> fetch_assoc()){
                    echo "<li>".$row['rasa']."</li>";
                }
            ?>
        </ol>
    </section>

    <section id="lewy_glowny">
        <img src="crested.jpg" alt="Świnka morska rasy peruwianka">
        <?php
            $sql2 = "SELECT DISTINCT data_ur, miot, rasa FROM swinki INNER JOIN rasy ON rasy.id = rasy_id WHERE rasy.id = 7;";
            $result2 = $conn -> query($sql2);

            while($row2 = $result2 -> fetch_assoc()){
                echo "<h2>Rasa: ".$row2['rasa']."</h2>";
                echo "<p>Data urodzenia: ".$row2['data_ur']."</p>";
                echo "<p>Oznaczenie miotu: ".$row2['miot']."</p>";
            }

        ?>
        <hr>
        <h2>Świnki w tym miocie</h2>
        <?php
            $sql3 = "SELECT imie, cena, opis FROM swinki WHERE rasy_id = 7;";
            $result3 = $conn -> query($sql3);

            while($row3 = $result3 -> fetch_assoc()){
                echo "<h3>".$row3['imie']." - ".$row3['cena']." zł";
                echo "<p>".$row3['opis']."</p>";
            }


        ?>
    </section>
    

    <footer>
        <p>Stone wykonal: JA</p>
    </footer>
    
</body>
</html>

<?php
    $conn->close();

?>