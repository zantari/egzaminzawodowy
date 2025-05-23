<?php
    $conn = new mysqli("localhost", "root", "", "wykaz");

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
    <link rel="shortcut icon" href="fav.png" type="image/x-icon">
    <title>Wyszukiwarka miast</title>
</head>
<body>
    <section id="kontener_zawartosci">
        <header>
            <img src="baner.jpg" alt="Polska">
        </header>

        <section id="lewy_gorny">
            <h4>Podaj początek nazwy miasta</h4>
            <form action="" method="post">
                <input type="text" name="nazwa">
                <button type="submit">Szukaj</button>
            </form>
        </section>


        <section id="prawy">
            <h1>Wyniki wyszukiwania miast z uwzględnieniem filtra:</h1>
            <?php
                if(isset($_POST['nazwa'])){
                    $nazwa = $_POST['nazwa'];
                    echo "<p id='p_skrypt'>".$nazwa."</p>";

                    $sql = "SELECT miasta.nazwa AS nazwa, wojewodztwa.nazwa AS nazwy FROM miasta INNER JOIN wojewodztwa ON wojewodztwa.id = id_wojewodztwa WHERE miasta.nazwa LIKE '$nazwa%' ORDER BY miasta.nazwa ASC;";
                    $result = $conn -> query($sql);
                    echo "<table>";
                        echo "<tr>";
                            echo "<th>Miasto</th><th>Wojewodztwo</th>";
                        echo "</tr>";
                    
                    while($row = $result -> fetch_assoc()){
                        
                        echo "<tr>";
                            echo "<td>".$row['nazwa']."</td>";
                            echo "<td>".$row['nazwy']."</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                
                    $conn -> close();
                }

                
            ?>
        </section>

        <section id="lewy_dolny">
            <p>Egzamin INF.03</p>
            <p>Autor: JA</p>
        </section>
    </section>
    
</body>
</html>

