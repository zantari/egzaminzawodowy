<?php
    $con = mysqli_connect('localhost', 'root', '', 'gry');

    if(!$con){
        die('blad laczenia '. mysqli_connect_error());
    }



?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gry komputerowe</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header class="naglowkowa">
        <h1>Ranking gier komputerowych</h1>

    </header>

    <aside class="lewa">
        <h3>Top 5 gier w tym miesiacu</h3>
        <ul>
            <?php
        $sql1 = 'SELECT `nazwa`, `punkty` FROM gry ORDER BY punkty desc Limit 5;';
        $result1 = mysqli_query($con, $sql1);

        while($row = mysqli_fetch_assoc($result1)){
            echo '<li>'.$row['nazwa'] . ' <span class="punktyOznaczenie">'.$row["punkty"] . '</span></li>';
        }



?>
        </ul>
        <h3>Nasz sklep</h3>
        <a href="https://sklep.gry.pl">Tu kupisz gry</a>
        <h3>Strone wykonal</h3>
        <p>piotrek</p>

    </aside>

    <main class="srodkowa">
        <?php
    $sql2 = 'SELECT`id`, `nazwa`, `zdjecie` FROM gry;';
    $result2 = mysqli_query($con, $sql2);

    while($row = mysqli_fetch_assoc($result2)){
        echo '<div class="blokGier">';
        echo '<img src="'.$row["zdjecie"] .'" alt="'.$row["nazwa"] . '" title="'. $row["id"]. '">';
        echo '<p>'.$row["nazwa"] . '</p>';
        echo '</div>';



    }


?>
        

    </main>

    <aside class="prawa">

    <h3>Dodaj nowa gre</h3>
        <form method="post">
            <label for="nazwa">
                nazwa <br>
                <input type="text" name="nazwa"> <br>

            </label>


            <label for="opis">
                opis <br>
                <input type="text" name="opis"> <br>
            </label>

            <label for="cena">
                cena <br>
                <input type="number" name="cena"> <br>
            </label>

            <label for="zdjecie">
                zdjecie <br>
                <input type="text" name="zdjecie">
            </label>
            <br>

            <button type="submit" name="dodaj">DODAJ</button>

        </form>
        <?php
    if(isset($_POST["nazwa"]) && isset($_POST["dodaj"]) ){
        if($_POST["nazwa"] !== ''){
            $nazwa = $_POST["nazwa"];
            $opis = $_POST["opis"];
            $cena = $_POST["cena"];
            $zdjecie = $_POST["zdjecie"];
            $sql4 = "INSERT INTO `gry` (`nazwa`, `opis`, `punkty`, `cena`, `zdjecie`) VALUES ('$nazwa', '$opis', 0, $cena, '$zdjecie')";
            $result4 = mysqli_query($con, $sql4);
        }
    }


?>

    </aside>

    <footer class="stopka">
        <form method="post">
            <input type="text" name="poleEdycyjneStopka"> <button>Pokaz opis</button>

        </form>

        <?php
    if(isset($_POST["poleEdycyjneStopka"])){
        if($_POST["poleEdycyjneStopka"] == ''){

        }
        else{
        $sql3 = 'SELECT `nazwa`, LEFT(opis, 100) AS OPIS , punkty, cena FROM gry WHERE id = '.$_POST["poleEdycyjneStopka"] . ';';
        $result3 = mysqli_query($con, $sql3);

        while($row = mysqli_fetch_assoc($result3)){
            echo '<h2>';
            echo $row["nazwa"];
            echo ', '. $row['punkty'] . ' punktow, ';
            echo $row["cena"] . 'zl.';

            echo '</h2>';

            echo '<p>'. $row["opis"] . '</p>';
        }
        }

    }

?>

    </footer>

</body>

</html>