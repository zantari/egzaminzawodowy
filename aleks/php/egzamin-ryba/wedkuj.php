<?php
    $conn = mysqli_connect("localhost", "root", "", "wedkowanie");
    if(!$conn){
        die("blad polaczenia z baza danych" .mysqli_connect_error());
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wędkowanie</title>
    <link rel="stylesheet" href="styl_1.css">
</head>
<body>
    <header>
        <h1>Portal dla wedkarzy</h1>
    </header>
    <section id="lewy1">
        <h3>Ryby zamieszkujace rzeki</h3>
        <ol>
            <?php
                //skrypt 1
                $sql = "SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM ryby INNER JOIN lowisko ON ryby.id = lowisko.Ryby_id WHERE lowisko.rodzaj = 3;";
                $result = $conn->query($sql);

                while($row = $result -> fetch_array()){
                    echo "<li>".$row[0]." plywa w rzece ".$row[1].", ".$row[2]. "</li>";
                }

            ?>
        </ol>
    </section>

     <section id="prawy">
        <img src="ryba1.jpg" alt="Sum"> <br>
        <a href="kwerendy.txt">Pobierz kwerendy</a>
    </section>

    <section id="lewy2">
        <h3>Ryby drapiezne naszych wod</h3>
        <table>
            <tr>
                <th>L.p</th>
                <th>Gatunek</th>
                <th>Wystepowanie</th>
            </tr>
            <?php
                // Skrypt #2
                $sql = "SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia = 1;";
                $result = $conn->query($sql);

                while($row = $result -> fetch_array()){
                    echo "<tr>";
                        echo "<td>".$row[0]."</td>";
                        echo "<td>".$row[1]."</td>";
                        echo "<td>".$row[2]."</td>";
                    echo "</tr>";
                }
                ?>
        </table>
    </section>

  
    <footer>
        <p>Strone wykonal: JA</p>
    </footer>
</body>
</html>