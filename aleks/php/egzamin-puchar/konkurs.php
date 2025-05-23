<?php
    $conn = new mysqli("localhost", "root", "", "konkurs");
    if($conn -> connect_error){
        die("blad polaczenia" .$conn -> connect_error);
    }


?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>WOLONTARIAT SZKOLNY</title>
</head>
<body>
    <header>
        <h1>KONKURS - WOLONTARIAT SZKOLNY</h1>
    </header>

    <section id="lewy">
        <h3>Konkursowe nagrody</h3>
        <button onclick="location.reload()">Losuj nowe nagrody</button>
        <table>
            <tr>
                <th>NR</th>
                <th>Nazwa</th>
                <th>Opis</th>
                <th>Wartość</th>
            </tr>

            <?php
                $sql = "SELECT nazwa, opis, cena FROM nagrody ORDER BY RAND() LIMIT 5;";
                $result = $conn -> query($sql);
                $i = 1;
               

                while($row = $result -> fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$i."</td>";
                    echo "<td>".$row['nazwa']."</td>";
                    echo "<td>".$row['opis']."</td>";
                    echo "<td>".$row['cena']."</td>";
                    echo "</tr>";
                    $i++;
                }




            ?>
        </table>
    </section>

    <section id="prawy">
        <img src="puchar.png" alt="Puchar dla wolontariusza">
        <h4>Polecane linki</h4>

        <ul>
            <li><a href="">Kwerenda1</a></li>
            <li><a href="">Kwerenda2</a></li>
            <li><a href="">Kwerenda3</a></li>
            <li><a href="">Kwerenda4</a></li>
        </ul>
    </section>

    <footer>
        <p>Numer zdającego: JA</p>
    </footer>
</body>
</html>
