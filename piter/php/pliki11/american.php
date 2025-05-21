 <?php
    $con = mysqli_connect('localhost', 'root', '', " hodowla");
    if(!$con){
        die('blad: '. mysqli_connect_error());
    }
    ?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hodowla świnek morskich</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
   



    <header id="baner">
    <h1>Hodowla świnek morskich - zamów świnkowe maluszki</h1>
    </header>

    <nav id="lewy">
        <a href="peruwianka.php">Rasa Peruwianka</a>
        <a href="american.php">Rasa American</a>
        <a href="crested.php">Rasa Crested</a>
    </nav>


    

    <main id="glowny">
        <img src="american.jpg" alt="Świnka morska rasy american">
        <?php
            $sql2 = 'SELECT DISTINCT data_ur, miot, rasy.rasa as rasa FROM swinki INNER JOIN rasy ON rasy.id = swinki.rasy_id WHERE rasy.id = 6;';
            $result2 = mysqli_query($con, $sql2);
            while($row2 = mysqli_fetch_assoc($result2)){
                echo '<h2>Rasa: '. $row2['rasa'] . '</h2>';
                echo '<p>Data urodzenia: ' .$row2['data_ur'] . '</p>';
                echo '<p>Oznaczenie miotu: '. $row2['miot'] . '</p>';

            }

?>
        <hr>
        <h2>Świnki w tym miocie</h2>
        <?php
        $sql3 = 'SELECT `imie`, `cena`, `opis` FROM swinki WHERE rasy_id=6;';
        $result3 = mysqli_query($con, $sql3);
            while($row3 = mysqli_fetch_assoc($result3)){
                echo '<h3>'.$row3['imie'] . ' - ' .$row3['cena'] . '</h3>';
                echo '<p>'.$row3['opis'].'</p>';
            }


?>


    </main>

    <section id="prawy">
        <h3>Poznaj wszystkie rasy świnek morskich</h3>
        <ol>
            <?php
                $sql1 = 'SELECT `rasa` FROM `rasy`;';
                $result1 = mysqli_query($con, $sql1);
                while($row1 = mysqli_fetch_assoc($result1)){
                    echo '<li>'.$row1['rasa'] . '</li>';
                }

?>
        </ol>

    </section>


    <footer><p>strone wykonal pitorek</p></footer>




    
</body>
</html>