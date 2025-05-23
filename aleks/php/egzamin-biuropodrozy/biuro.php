<?php
    $conn = new mysqli("localhost", "root", "", "podroze");
    if($conn -> connect_error){
        die("blad polaczenia" .$conn -> connect_error);
    }


?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl9.css">
    <title>Poznaj Europę</title>
</head>
<body>
    <header>
        <h1>BIURO PODROZY</h1>
    </header>

    <section id="lewy">
        <h2>Promocje</h2>
        <table>
            <tr>
                <td>Warszawa</td>
                <td>Wenecja</td>
                <td>Paryż</td>
            </tr>
            <tr>
                <td>od 600 zł</td>
                <td>od 1200 zł</td>
                <td>od 1200 zł</td>
            </tr>
        </table>
    </section>

     <section id="prawy">
        <h2>Kontakt</h2>
        <a href="mailto:biuro@wycieczki.pl" >napisz do nas</a>
        <p>telefon: 444555666</p>
    </section>

    <section id="srodkowy">
        <h2>W tym roku jedziemy do...</h2>
        <?php
            $sql = "SELECT nazwaPliku, podpis FROM zdjecia ORDER BY podpis ASC;";
            $result = $conn->query($sql);

            while($row = $result -> fetch_assoc()){
                echo "<img src='".$row['nazwaPliku']."' alt='".$row['podpis']."'>";
            }

        ?>
    </section>


    <section id="dane">
        <h3>W poprzednich latach byliśmy w...</h3>
        <ol>
            <?php
                $sql2 = "SELECT cel, cena, dataWyjazdu FROM wycieczki WHERE dostepna = FALSE;";
                $result2 = $conn->query($sql2);

                while($row2 = $result2 -> fetch_assoc()){
                    echo "<li>Dnia ".$row2['dataWyjazdu']." pojechalismy do ".$row2['cel']."</li>";
                }

            ?>
        </ol>
    </section>

    <footer>
        <p>Strone wykonal: JA</p>
    </footer>
</body>
</html>

<?php
    $conn->close();
?>