<?php
    $conn = mysqli_connect("localhost", "root", "", "szachy");
    if(!$conn){
        die("blad polaczenia z baza" .mysqli_connect_error());
    }
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <title>KOLO SZACHOWE</title>
</head>
<body>
    <header>
        <h2>Kolo szachowe <i>gambit piona</i></h2>
    </header>

    <section id="lewy">
        <h4>Polecane linki</h4>
        <ul>
            <li><a href="kw1.png">kwerenda1</a></li>
            <li><a href="kw2.png">kwerenda2</a></li>
            <li><a href="kw3.png">kwerenda3</a></li>
            <li><a href="kw4.png">kwerenda4</a></li>
        </ul>
        <img src="logo.png" alt="Logo kola">
    </section>

    <section id="prawy">
        <h3>Najlepsi gracze naszego kola</h3>
        <table>
            <tr>
                <th>Pozycja</th>
                <th>Pseudonim</th>
                <th>Tytuł</th>
                <th>Ranking</th>
                <th>Klasa</th>
                <?php
                    $sql = "SELECT pseudonim, tytul, ranking, klasa FROM zawodnicy WHERE ranking > 2787 ORDER BY ranking DESC;";
                    $result = $conn->query($sql);
                    $i = 1;
                    while($row = $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$i."</td>";
                        echo "<td>".$row['pseudonim']."</td>";
                        echo "<td>".$row['tytul']."</td>";
                        echo "<td>".$row['ranking']."</td>";
                        echo "<td>".$row['klasa']."</td>";
                        echo "</tr>";
                        $i++;
                    }
                ?>
            </tr>
        </table>

        <form action="szachy.php" method="post">
            <input type="submit" value="losuj nowa pare graczy" name="losuj">
        </form>
            <?php
                if(isset($_POST['losuj'])) {
                    $sql = "SELECT pseudonim, klasa FROM zawodnicy ORDER BY RAND() LIMIT 2;";
                    $result = $conn->query($sql);
                    echo "<h4>";
                    while($row = $result -> fetch_assoc()){
                        echo $row['pseudonim']." ".$row['klasa']." ";
                    }
                    echo "</h4>";
                            
                        
                    
                }
            ?>
        <p>Legenda: AM - Absolutny Mistrz, SM - Szkolny Mistrz, PM - Mistrz Poziomu, KM - Mistrz Klasowy </p>
    </section>

    <footer>
        <p>Strone wykonał: JA</p>
    </footer>
</body>
</html>