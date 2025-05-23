<?php
    $conn = mysqli_connect("localhost", "root", "", "firma");
    if(!$conn){
        die("Blad polaczenia z baza" .mysqli_connect_error());
    }
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl4.css">
    <title>Wizytowki</title>
</head>
<body>
    <header>
        <h1>Wizytowki pracownikow</h1>
        <form action="" method="post">
            <input type="number" name="wizytowka" value="1" max="9" min="1">
            <button type="submit" name="wyswietl">WYŚWIETL</button>
        </form>
    </header>

    <section id="wizytowka">
        <?php
        if(isset($_POST['wizytowka'])){
            $wizytowka = $_POST['wizytowka'];
            $sql = "SELECT id, imie, nazwisko, adres, miasto FROM pracownicy WHERE id = $wizytowka;";
            $result = $conn->query($sql);

            while($row = $result->fetch_assoc()){
                echo '<img src='.$wizytowka.'.jpg alt="pracownik" id="img_php">';
                echo "<h2>".$row['imie']." ".$row['nazwisko']."</h2>";
                echo "<h4>Adres:</h4>";
                echo "<p>".$row['adres'].", ".$row['miasto']."</p>";
            }
        }
        ?>
    </section>

    <footer id="lewy">
        <img src="obraz.jpg" alt="pracownicy firmy">
    </footer>

    <footer id="prawy">
        <p>Osoby proszone o podpisanie dokumentu RODO:</p>
        <ol>
            <?php
                $sql2 = "SELECT imie, nazwisko FROM pracownicy WHERE czyRODO = 0;";
                $result2 = $conn->query($sql2);

                while($row2 = $result2->fetch_assoc()){
                    echo "<li>".$row2['imie']." ".$row2['nazwisko']."</li>";
                }
            ?>
        </ol>
    </footer>

    <footer id="srodkowy">
        <p>Autorem wizytownika jest: JA</p>
        <a href="http://agencjareklamowa543.pl/" target="_blank">Zobacz nasze realizacje</a>
    </footer>

    
</body>
</html>

<?php
    $conn->close();
?>