<?php
$con = mysqli_connect('localhost', 'root', '', 'szachy');

if(!$con){
    die("Blad laczenia z baza danych ". mysqli_connect_error());
}


?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOŁO SZACHOWE</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="naglowkowy">
        <h2>Koło szachowe <i>gambit piona</i></h2>

    </header>

    <main>

    <section class="lewy">
        <h4>Polecane linki</h4>

        <ul>
            <li><a href="kw1.png">kwerenda1</a></li>
            <li><a href="kw2.png">kwerenda2</a></li>
            <li><a href="kw3.png">kwerenda3</a></li>
            <li><a href="kw4.png">kwerenda4</a></li>
        </ul>
        <img src="logo.png" alt="Logo kola">

    </section>

    <section class="prawy">
        
        <h3>Najlepsi gracze naszego koła</h3>

        
       

        <table>
            <tr>
            <th>Pozycja</th>
            <th>Pseudonim</th>
            <th>Tytuł</th>
            <th>Ranking</th>
            <th>Klasa</th>
            </tr>
            <?php
            $sql1 = 'SELECT `pseudonim`, `tytul`, `ranking`, `klasa` FROM zawodnicy WHERE ranking>2787 ORDER BY ranking desc';
            $sql1result = mysqli_query($con, $sql1);

            $i=0;

            while($row = mysqli_fetch_assoc($sql1result)){
                $i++;

                echo '<tr>';
                echo '<td>' . $i . '</td>';
                echo '<td>' . htmlspecialchars($row["pseudonim"]) . '</td>';
                echo '<td>' . htmlspecialchars($row["tytul"]) . '</td>';
                echo '<td>' . htmlspecialchars($row["ranking"]) . '</td>';
                echo '<td>' . htmlspecialchars($row["klasa"]) . '</td>';
                


                echo '</tr>';
            }


?>
        </table>

         <form method="post">
            <button type="submit">Losuj nowa pare graczy</button>
        </form>
            <h4>
        <?php
            if($_SERVER["REQUEST_METHOD"] === "POST" || $_SERVER["REQUEST_METHOD"] != "POST"){ 
                $sql2 = 'SELECT `pseudonim`, `klasa` FROM zawodnicy ORDER BY rand() limit 2;';
                $result2 = mysqli_query($con, $sql2);

                while($row = mysqli_fetch_assoc($result2)){
                    echo htmlspecialchars($row['pseudonim'] . " ". $row["klasa"] . " ");
                }
            }

?>
</h4>
        <p>Legenda: AM - Absolutny Mistrz, SM - Szkolny Mistrz, PM - Mistrz Poziomu, KM - Mistrz Klasowy</p>

    </section>

    </main>

    <footer class="stopka">
        <p>strone wykonal piotrek</p>

    </footer>
    
</body>
</html>
