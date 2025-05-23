<?php
    $conn = new mysqli("localhost", "root", "", "baza2");
        if($conn -> connect_error){
            die("blad polaczenia" .$conn->connect_error);
        }

?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl3.css">
    <title>Dane o zwierzetach</title>
</head>
<body>
    <header>
        <h1>ATLAS ZWIERZAT</h1>
    </header>

    <section id="formularz">
        <h2>Gromady</h2>
        <ol>
            <li>Ryby</li>
            <li>Plazy</li>
            <li>Gady</li>
            <li>Ptaki</li>
            <li>Ssaki</li>
        </ol>
        <form action="" method="post">
            <label for="gromada">Wybierz gromade</label>
            <input type="number" name="gromada">
            <button type="submit">Wyswietl</button>
        </form>
    </section>

     <section id="prawy">
        <h2>Wszystkie zwierzeta w bazie</h2>
        <?php
                // Skrypt #1
                if(isset($_POST["gromada"])) {
                    $gromada = $_POST["gromada"];

                    if($gromada == 1) {
                        echo "<h2>RYBY</h2>";
                    }
                    else if ($gromada == 2) {
                        echo "<h2>PŁAZY</h2>";
                    }
                    else if ($gromada == 3) {
                        echo "<h2>GADY</h2>";
                    }
                    else if ($gromada == 4) {
                        echo "<h2>PTAKI</h2>";
                    }
                    else if ($gromada == 5) {
                        echo "<h2>SSAKI</h2>";
                    }
                    
                    $sql = "SELECT gatunek, wystepowanie FROM zwierzeta, gromady WHERE zwierzeta.Gromady_id = gromady.id AND gromady.id = $gromada;";
                    $result = $conn->query($sql);
    
                    while($row = $result -> fetch_array()) {
                        echo $row["gatunek"].", ".$row["wystepowanie"]."<br>";
                    }
                }
            ?>
    </section>

    <section id="lewy">
        <img src="zwierzeta.jpg" alt="dzikie zwierzeta">
    </section>

    <section id="srodkowy">
        <?php
            if(isset($_POST['gromada'])){
                $gromada = $_POST['gromada'];

                if($gromada == 1){
                    echo "<h2>$gromada</h2>";
                } elseif ($gromada == 2){
                    echo "<h2>$gromada</h2>";
                } elseif ($gromada == 3){
                    echo "<h2>$gromada</h2>";
                } elseif ($gromada == 4){
                    echo "<h2>$gromada</h2>";
                } elseif ($gromada == 5){
                    echo "<h2>$gromada</h2>";
                }

                $sql = "SELECT gatunek, wystepowanie FROM zwierzeta WHERE id = $gromada;";
                $result = $conn->query($sql);

                while($row =$result -> fetch_assoc()){
                    echo "<p>".$row['gatunek'].", ".$row['wystepowanie']." ";
                }
            }
        ?>
    </section>


    <footer>
        <a href="atlas-zwierzat.pl" target="_blank">Poznaj inne strony o zwierzetach</a>
        <p>autor Atlasu zwierzat: Ja</p>
    </footer>
</body>
</html>

<?php
    $conn->close();
?>