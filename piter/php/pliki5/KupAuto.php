<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komis aut</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <?php
        $con = mysqli_connect('localhost', 'root', '', 'kupauto');

        if(!$con){
            die("blad bazy ". mysqli_connect_error());
        }



?>
    
</body>
</html>


    <header id="baner">
        <h1><i>KupAuto!</i> Internetowy Komis Samochodowy</h1>
        
    </header>

    <section id="glowny1">
        <?php //skrypt 1
        $sql1 = 'SELECT model, rocznik, przebieg, paliwo, cena, zdjecie FROM samochody WHERE id = 10;';
        $result1 = mysqli_query($con, $sql1);
        while($row1 = mysqli_fetch_assoc($result1)){
            echo '<img src="' . $row1["zdjecie"] . '" alt="oferta dnia">';
            echo '<h4>Oferta Dnia: Toyota ' .$row1["model"] . '</h4>';
            echo '<p>Rocznik: ' .$row1["rocznik"]. ', przebieg: ' .$row1["przebieg"]. ', rodzaj paliwa: '.$row1["paliwo"]. ' </p>';
            echo '<h4>Cena: '. $row1["cena"] . '</h4>';

        }



?>
    </section>
    <section id="glowny2">
        <h2>Oferty Wyróżnione</h2>
        <?php //skrypt 2
        $sql2 = 'SELECT marki.nazwa AS mnazwa, model, rocznik, cena, zdjecie FROM samochody INNER JOIN marki on marki.id=samochody.marki_id WHERE samochody.wyrozniony = 1 LIMIT 4;';
        $result2 = mysqli_query($con, $sql2);
        while($row2 = mysqli_fetch_assoc($result2)){
            echo '<div id="oferty">';
            echo '<img src="' . $row2["zdjecie"] . '" alt="' .$row2["model"] .'">';
            echo '<h4>'.$row2["mnazwa"]. ' '. $row2["model"] .'   </h4>';
            echo '<p>Rocznik: '. $row2["rocznik"] . '</p>';
            echo '<h4>Cena: '. $row2["cena"] . '<h4>';




            echo '</div>';
        }




?>
    </section>
    <section id="glowny3">
        <form action="" method="post">
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <h2> Wybierz markę</h2>
            <select name="markaWybor" id="markaWybor">
                
        <?php //skrypt 3

        $sql3 = 'SELECT nazwa FROM marki;';
        $result3 = mysqli_query($con, $sql3);
        while($row3 = mysqli_fetch_assoc($result3)){
            echo '<option value="' .$row3["nazwa"] .'" name="' .$row3["nazwa"] . '">' . $row3["nazwa"] .'</option>';
            

        }






?>
</select>
        <button type="submit">Wyszukaj</button>
        </form>
        <?php
            if(isset($_POST['markaWybor'])){
                $wybor = $_POST['markaWybor'];

                $sql4 = 'SELECT marki.nazwa AS marka, model, cena, zdjecie 
                FROM samochody 
                INNER JOIN marki ON samochody.marki_id = marki.id 
                WHERE marki.nazwa = "' . $wybor . '";';
                  
                $result4 = mysqli_query($con, $sql4);
        while($row4 = mysqli_fetch_assoc($result4)){
            echo '<div id="oferty">';
            echo '<img src="' . $row4["zdjecie"] . '" alt="' . $row4["model"] . '">';
            echo '<h4>' . $row4["marka"] . ' ' . $row4["model"] . '</h4>';
            echo '<h4>Cena: ' . $row4["cena"] . '</h4>';
            echo '</div>';

        }
                
            }




?>
    </section>


    <footer>
        <p>strone wykona; piotr</p>
        <p><a href="http://firmy.pl/komis">Znajdź nas także</a></p>

    </footer>

