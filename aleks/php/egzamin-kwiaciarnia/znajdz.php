<?php
    $conn = mysqli_connect("localhost", "root", "", "kwiaciarnia");

    if(!$conn){
        die("Blad polaczenia z baza danych" .mysqli_connect_error());
    }

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl3.css">
    <title>Kwiaty</title>
</head>
<body>
    <header>
        <h1>Grupa Polskich Kwiaciarni</h1>
    </header>

    <section id="lewy">
        <h2>Menu</h2>
        <ol>
            <li><a href="index.html">Strona główna</a></li>
            <li><a href="https://www.kwiaty.pl/" target="_blank">Rozpoznaj kwiaty</a></li>
            <li><a href="znajdz.php">Znajdz kwiaciarnie</a></li>
            <ul>
                <li>w Warszawie</li>
                <li>w Malborku</li>
                <li>w Poznaniu</li>
            </ul>
        </ol>
    </section>

    <section id="prawy">
        <h2>Znajdz kwiaciarnie</h2>
        <form action="" method="post">
            <label for="miasto">Podaj nazwe miasta</label>
            <input type="text" name="miasto" id="miasto">
            <button type="submit" name="sprawdz">SPRAWDZ</button>
            <?php
                if(isset($_POST['miasto'])){
                    $miasto = $_POST['miasto'];

                    $sql = "SELECT nazwa, ulica FROM kwiaciarnie WHERE miasto = '$miasto';";
                    $result = $conn->query($sql);
                    if($result && $result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            echo "<h3>".$row['nazwa'].", ".$row['ulica']. "</h3>";
                        }
                    } else {
                        echo "<h3>nie ma</h3>";
                    }
                }
            ?>
        </form>
    </section>

    <footer>
        <p>Strone opracowal: JA</p>
    </footer>
</body>
</html>

