<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motocykle</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <?php
    $con = mysqli_connect('localhost', 'root', '', 'motory');

    if(!$con){
        die(mysqli_connect_error());
    }

?>
    



    <img src="motor.png" alt="motocykl" srcset="">




    <header>
        <h1>Motocykle - moja pasja</h1>
    </header>
    
    


    <section id="lewy">
        <h2>Gdzie pojechać?</h2>
        <dl>
            <?php
            $sql1 = " SELECT nazwa, opis, poczatek, zdjecia.zrodlo FROM wycieczki INNER JOIN zdjecia ON zdjecia.id = wycieczki.zdjecia_id;";
            $result1 = mysqli_query($con, $sql1);
                while($row1 = mysqli_fetch_assoc($result1)){
                    echo "
                    <dt> ". $row1['nazwa'] . " 
                    rozpoczyna się w " . $row1['poczatek'] . ",  <a href='". $row1['zrodlo'] .".jpg'>zobacz zdjęcie</a>
                    
                    </dt>

                    <dd>
                        " . $row1['opis'] . "
                    </dd>
                    
                    
                    
                    ";
                }

            ?>
        </dl>
    </section>



    <section id="prawy">

        <h2>Co kupić?</h2>
        <ol>
            <li>Honda CBR125R</li>
            <li>Yamaha YBR125</li>
            <li>Honda VFR800i</li>
            <li>Honda CBR1100XX</li>
            <li>BMW R1200GS LC</li>
        </ol>
    </section>
    <section id="prawy">
        <h2>Statystyki</h2>
        <p>Wpisanych wycieczek: 
            
        <?php

        $sql2 = "SELECT COUNT(id) AS liczba_wycieczek FROM wycieczki;";
        $result2 = mysqli_query($con, $sql2);
            while($row2 = mysqli_fetch_assoc($result2)){
                echo $row2['liczba_wycieczek'];
            }

    
            mysqli_close($con); 

?>
        </p>
        <p>Użytkowników forum: 200</p>
        <p>Przesłanych zdjęć: 1300</p>
    </section>



    <footer>
        <p>Strone wykonal pc</p>

    </footer>
</body>
</html>