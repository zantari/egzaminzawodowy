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
        <form action="zamow.php" method="post">
            <label for="model">Model: </label>
            <select name="model" id="kontrolki">
                <?php
                    $sql = "SELECT model FROM produkt;";
                    $result = $conn -> query($sql);

                    while($row = $result -> fetch_assoc()){
                        echo "<option>".$row['model']."</option>";
                    }

                ?>
            </select>
            <label for="rozmiar">Rozmiar: </label>
            <select name="rozmiar" id="kontrolki">
                <option value="40">40</option>
                <option value="41">41</option>
                <option value="42">42</option>
                <option value="43">43</option>
            </select>
            <label for="pary">Liczba par: </label>
            <input type="text" name="pary" id="kontrolki">
            <button type="submit" id="kontrolki">Zamów</button>
        </form>
                <?php
                    $sql2 = "SELECT buty.model AS model, buty.nazwa AS nazwa, buty.cena AS cena, produkt.nazwa_pliku AS plik FROM buty INNER JOIN produkt ON buty.model = produkt.model;";
                    $result2 = $conn -> query($sql2);

                    while($row2 = $result2 -> fetch_assoc()){
                        echo "<div id='buty'>";
                            echo "<img src='".$row2['plik']."' alt='but meski'>";
                            echo "<h2>".$row2['nazwa']."</h2>";
                            echo "<h5>Model: ".$row2['model']."</h5>";
                            echo "<h4>Cena: ".$row2['cena']."</h4>";
                        echo "</div>";
                    }

                ?>
    </section>

    <footer>
        <p>Autor strony: JA</p>
    </footer>
</body>
</html>

<?php
    $conn -> close();
?>
