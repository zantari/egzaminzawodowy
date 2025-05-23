<?php
    $con = mysqli_connect('localhost', 'root', '', 'konkurs');
    if(!$con){
        die("blad laczenia: ". mysqli_connect_error());
    }

    $sql = "SELECT `nazwa`, `opis`, `cena` FROM nagrody WHERE nazwa IS NOT NULL AND opis IS NOT NULL and cena IS NOT NULL ORDER BY RAND() LIMIT 5;";
    $result = mysqli_query($con, $sql);


?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WOLONTARIAT SZKOLNY</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <section id="naglowkowy">
        <h1>KONKURS - WOLONTARIAT SZKOLNY</h1>
        
    </section>
    <section id="lewy">
        <h3>Konkursowe nagrody</h3>
        <button onclick="window.location.reload()">Losuj nowe nagrody</button> <!-- na przeladowac strone -->
        <table>
        <tr>
            <th>Nr</th> <th>Nazwa</th> <th>Opis</th> <th>Wartosc</th>
        </tr>
        <?php
        if(mysqli_num_rows($result)>0){
            $i = 0;
            while($row = mysqli_fetch_assoc($result)){
                $i++;
                
                
                echo '<tr>';
                echo '<td>'. $i . '</td>';
                echo '<td>'. $row["nazwa"] . '</td>';
                echo '<td>'. $row["opis"] . '</td>';
                echo '<td>'. $row["cena"] . '</td>';
                echo '</tr>';
                

            }
        }  
        else{
            echo ' brak wynikow';
        }



?>
</table>
    </section>

    <section id="prawy">
        <img src="puchar.png" alt="Puchar dla wolontariusza">
        <h4>Polecane linki</h4>
        <ul>
            <li><a href="kw1.png">Kwerenda1</a></li>
            <li><a href="kw2.png">Kwerenda2</a></li>
            <li><a href="kw3.png">Kwerenda3</a></li>
            <li><a href="kw4.png">Kwerenda4</a></li>
        </ul>

    </section>

    <section id="stopka">
        <p>numer zdajacego: piotrk</p>

    </section> <!-- Podział zrealizowany za pomocą semantycznych znaczników sekcji języka HTML5 -->
    
</body>
</html>