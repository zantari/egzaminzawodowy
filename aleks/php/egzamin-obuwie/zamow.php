<?php
    $conn = new mysqli("localhost", "root", "", "obuwie");
    if($conn -> connect_error){
        die("blad polaczenia" .$conn -> connect_error);
    }

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Obuwie</title>
</head>
<body>
    <header>
        <h1>Obuwie męskie</h1>
    </header>

    <section id="glowny">
        <h2>Zamówienie</h2>
        <?php
            
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $model = $_POST['model'];
                    $liczba_par = $_POST['pary'];
                    $rozmiar = $_POST['rozmiar'];
                    $sql2 = "SELECT buty.nazwa AS nazwa, buty.cena AS cena, produkt.kolor AS kolor, produkt.kod_produktu,
                     produkt.material AS material, produkt.nazwa_pliku AS zdjecie FROM buty INNER JOIN produkt ON buty.model = produkt.model WHERE produkt.model = '$model';";
                    $result2 = $conn -> query($sql2);
                    
                    while($row2 = $result2 -> fetch_assoc()){
                        $cena = $row2['cena'];
                        $liczba_calkowita = ($cena * $liczba_par);
                        echo "<img src='".$row2['zdjecie']."' alt='but męski'>";
                        echo "<h2>".$row2['nazwa']."</h2>";
                        echo "<p>cena za ".$liczba_par." par: ".$liczba_calkowita." zł</p>";
                        echo "<p>Szczegóły produktu: ".$row2['kolor'].", ".$row2['material']."</p>";
                        echo "<p>Rozmiar: ".$rozmiar."</p>";
                    }
                    $conn -> close();
                }

               
          

        ?>
        <a href="index.php">Strona głowna</a>
    </section>

    <footer>
        <p>Autor strony: JA</p>
    </footer>
</body>
</html>
