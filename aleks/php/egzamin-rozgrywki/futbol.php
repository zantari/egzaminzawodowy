<?php
    $conn = new mysqli("localhost", "root", "", "egzamin");
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
    <title>Document</title>
</head>
<body>
    <header>
        <h2>Światowe rozgrywki piłkarskie</h2>
        <img src="obraz1.jpg" alt="boisko">
    </header>

    <section id="mecze">
        <?php
            $sql = "SELECT zespol1, zespol2, wynik, data_rozgrywki FROM rozgrywka WHERE zespol1 = 'EVG';";
            $result = $conn -> query($sql);

            while($row = $result -> fetch_assoc()){
                echo "<section id='informacje'>";
                    echo "<h3>".$row['zespol1']." - ".$row['zespol2']."</h3>";
                    echo "<h4>".$row['wynik']."</h4>";
                    echo "<p>w dniu: ".$row['data_rozgrywki']."</p>";
                echo "</section>";
            }

        ?>
    </section>

    <section id="glowny">
        <h2>Reprezentacja Polski</h2>
    </section>

    <section id="lewy">
        <p>Podaj pozycje zawodnikow (1-bramkarze, 2-obrońcy, 3-pomocnicy,4-napastnicy):</p>
        <form action="" method="post">
            <input type="number" name="pozycja" min="1" max="4" id="dlugosc">
            <button type="submit">Sprawdź</button>
            <ul>
                <?php
                        if(isset($_POST['pozycja']) && ($_POST['pozycja']) !== ''){
                        $pozycja = $_POST['pozycja'];
                        $sql2 = "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id = $pozycja;";
                        $result2 = $conn -> query($sql2);
                        
                        
                        while($row2 = $result2 -> fetch_assoc()){
                            echo "<li><p>".htmlspecialchars($row2['imie'])." ".htmlspecialchars($row2['nazwisko'])."</li></p>";
                            
                        }
                    }
                      
                
                      $conn -> close();

                ?>
            </ul>
        </form>
    </section>

    <section id="prawy">
        <img src="zad1.png" alt="piłkarz">
        <p>Autor: JA</p>
    </section>
</body>
</html>
