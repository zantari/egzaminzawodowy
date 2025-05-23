<?php
    $conn = mysqli_connect("localhost", "root", "", "sklep");

    if(!$conn){
        die("blad polaczenia" .mysqli_connect_error());
    }

?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Sklep dla uczniów</title>
</head>
<body>  
    <header>
        <h1>Dzisiejsze promocje naszego sklepu</h1>
    </header>

    <section id="lewy">
        <h2>Taneij 30%</h2>
        <ol type="a">
            <?php
                $sql = "SELECT nazwa FROM towary WHERE promocja = 1;";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()){
                    echo"<li>".$row['nazwa']."</li>";
                }
            ?>
        </ol>
    </section>

    <section id="srodkowy">
        <h2>Sprawdz cene</h2>
        <form action="" method="post">
            <select name="towary" id="towary">
                <option value="Gumka do mazania">Gumka do mazania</option>
                <option value="Cienkopis">Cienkopis</option>
                <option value="Pisaki 60 szt.">Pisaki 60 szt.</option>
                <option value="Markery 4 szt.">Markery 4 szt.</option>
            </select>
            <button type="submit" name="sprawdz">SPRAWDZ</button>
            <div id="skrypt">
                <?php
                    if(isset($_POST['towary'])){
                        $towary = $_POST['towary'];
                        $sql2 = "SELECT cena FROM towary WHERE nazwa = '$towary';";
                        $result2 = $conn->query($sql2);

                        while($row2 = $result2->fetch_assoc()){
                            $cena_regularna = $row2['cena'];
                            $cena_promocyjna = round($cena_regularna * 0.7, 2);
                                echo "<div><p>cena regularna: ".$cena_regularna."<br>cena w promocji 30%: ".$cena_promocyjna."</p></div>";
                        }
                    }
                ?>
                
            </div>
        </form>
    </section>

    <section id="prawy">
        <h2>Kontakt</h2>
        <p>e-mail: <a href="mailto:bok@sklep.pl">bok@sklep.pl</a></p>
        <img src="promocja.png" alt="promocja">
    </section>

    <footer>
        <h4>Autor strony: ja</h4>
    </footer>
</body>
</html>

<?php
    $conn->close();
?>