<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ważenie samochodów ciężarowych</title>
    <link rel="shortcut icon" href="obraz2.jpg" type="image/x-icon">
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <?php
    $con = mysqli_connect('localhost', 'root', '', 'wazenietirow');
    if(!$con){
        die('blad: '. mysqli_connect_error());
    }




?>
    <header id="baner1">
        <h1>Ważenie pojazdów we
        Wrocławiu</h1>

    </header>

    <header id="baner2">
        <img src="obraz1.png" alt="waga">

    </header>


    <section id="lewy">
        <h2>Lokalizacje wag</h2>
        <ul>
            <?php
            $sql1 = 'SELECT ulica FROM lokalizacje;';
            $result1 = mysqli_query($con, $sql1);
            while($row1 = mysqli_fetch_assoc($result1)){
                echo '<li>ulica '. $row1["ulica"].'</li>';
            }


?>
        </ul>
        <h2>Kontakt</h2>
        <a href="wazenie@wroclaw.pl">napisz</a>


    </section>

    <section id="srodkowy">
        <h2>Alerty</h2>
        <table>
            <tr>
                <th>„rejestracja”</th>
                <th>„ulica”</th>
                <th>„waga”</th>
                <th>„dzień”</th>
                <th>„czas”</th>
            </tr>
            <?php
            $sql2 = 'SELECT `rejestracja`, `waga`, `dzien`, `czas`, lokalizacje.ulica AS `lulica` FROM `wagi` INNER JOIN lokalizacje ON wagi.lokalizacje_id = lokalizacje.id WHERE `waga` > 5;';
            $result2 = mysqli_query($con, $sql2);
            while($row2 = mysqli_fetch_assoc($result2)){
                echo '<tr>';
                echo '<td>' . $row2["rejestracja"]. '</td>';
                echo '<td>' . $row2["lulica"]. '</td>';
                echo '<td>' . $row2["waga"]. '</td>';
                echo '<td>' . $row2["dzien"]. '</td>';
                echo '<td>' . $row2["czas"]. '</td>';





                echo '</tr>';
            }

?>
        </table>
        <?php
        $sql3 = "INSERT INTO wagi(lokalizacje_id, waga, rejestracja, dzien, czas) VALUES (5 , FLOOR(1 + RAND() * ( 10- 1+1)),'DW12345',CURRENT_DATE,CURRENT_TIME);";
        mysqli_query($con, $sql3);
        header('refresh: 10;');


?>

    </section>

    <section id="prawy">
        <img src="obraz2.jpg" alt="tir">

    </section>

    <footer>
        <p>strone wyklonal piotrek</p>

    </footer>
    
</body>
</html>