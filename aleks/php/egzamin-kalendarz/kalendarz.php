<?php
    $conn = new mysqli("localhost", "root", "", "kalendarz");

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
    <title>Kalendarz</title>
</head>
<body>
    <header>
        <h1>Dni, miesiące, lata</h1>
    </header>

    <section id="napis">
        <p>
           <?php
                $biezaca_data = date("m-d");
                $dni_tygodnia = array(
                    'Mon' => 'Poniedziałek',
                    'Tue' => 'Wtorek',
                    'Wed' => 'Środa',
                    'Thu' => 'Czwartek',
                    'Fri' => 'Piątek',
                    'Sat' => 'Sobota',
                    'Sun' => 'Niedziela'
                );
                $dzien = date("D");

                $sql = "SELECT imiona FROM imieniny WHERE data = '$biezaca_data';";
                $result = $conn -> query($sql);

                while($row = $result -> fetch_array()){
                    echo "<p>Dzisiaj jest: ".$dni_tygodnia[$dzien].", ". date("d.m.y"). ", imieniny: ".$row['imiona']."</p>";
                }

            ?>
        </p>
    </section>

    <section id="lewy">
        <table>
            <tr>
                <th>liczba dni</th>
                <th>miesiąc</th>
            </tr>
            <tr>
                <td rowspan="3"></td>
                <td>styczeń</td>
            </tr>
            <tr>
                
                <td>marzec</td>
            </tr>
            <tr>
                
                <td>maj</td>
            </tr>
            <tr>
                <td>31</td>
                <td>lipiec</td>
            </tr>
            <tr>
                <td rowspan="3"></td>
                <td>sierpien</td>
            </tr>
            <tr>
                
                <td>październik</td>
            </tr>
            <tr>
             
                <td>grudzień</td>
            </tr>
            <tr>
                <td rowspan="1"></td>
                <td>kwiecień</td>
            </tr>
            <tr>
                <td>30</td>
                <td>czerwiec</td>
            </tr>
            <tr>
                <td rowspan="1"></td>
                <td>wrzesień</td>
            </tr>
            <tr>
                <td></td>
                <td>listopad</td>
            </tr>
            <tr>
                <td>28 lub 29</td>
                <td>luty</td>
            </tr>
            
        </table>
    </section>
    <section id="srodkowy">
        <h2>Sprawdź kto ma urodziny</h2>
        <form action="" method="post">
            <input type="date" min="2024-01-01" max="2024-12-31" value="2024-01-01" name="data">
            <button type="submit">wyślij</button>
        </form>
        <?php
                if(isset($_POST['data'])){
                    $data = $_POST['data'];
                    $format = date("m-d", strtotime($data));

                    $sql2 = "SELECT imiona FROM imieniny WHERE data = '$format';";
                    $result2 = $conn ->query($sql2);

                    while($row2 = $result2 -> fetch_array()){
                        echo "Dnia ". $data ." są imieniny ".$row2[0];
                    }
                    
                }
                
            ?>

            
            
    </section>
    <section id="prawy">
        <a href="https://pl.wikipedia.org/wiki/Kalendarz_Majów" target="_blank"><img src="kalendarz01.gif" alt="Kalendarz Majów"></a>
        <h2>Rodzaje kalendarzy</h2>
        <ol>
            <li>słoneczny</li>
            <ul>
                <li>kalendarz Majów</li>
                <li>juliański</li>
                <li>gregoriaski</li>
            </ul>
            <li>księżycowy</li>
            <ul>
                <li>starogrecki</li>
                <li>babiloński</li>
            </ul>
        </ol>
        
    </section>

    <footer>
        <p>Stronę opracował: JA</p>
    </footer>
</body>
</html>
