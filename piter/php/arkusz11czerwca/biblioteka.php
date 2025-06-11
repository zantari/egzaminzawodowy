<?php
    $con = mysqli_connect('localhost', 'root', '', 'biblioteka11czerwca');

    if(!$con){
        die("blad laczenia z baza ". mysqli_connect_error());
    }


?>



<?php
    //skrypt3
    



?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka miejska</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header class="naglowkowy">
        <img src="gortat.jpg" alt="" width='100%' height='200px'>

    </header>

    <section class="sekcja">
        <h2>Liryka</h2>
        <form method="post">
            <select name="doS3Liryka">
                <?php
                    $sqlS2 = "SELECT `id`, `tytul` FROM ksiazka WHERE gatunek = 'liryka';";
                    $resultS2 = mysqli_query($con, $sqlS2);
                    while($row = mysqli_fetch_assoc($resultS2)){
                        
                        echo '<option value='. $row["id"].'>'.$row["tytul"] .'</option>';  
                    }  
                ?>

                
                
            </select>

            <button type="submit" name="rezerwujs3">Rezerwuj(s3)</button>
        </form>


        <?php
                if(isset($_POST['doS3Liryka']) || $_SERVER["REQUEST_METHOD"] === 'post'){
                    $id = $_POST['doS3Liryka'];

        
                    $sqlSkrypt3 = "SELECT `tytul` FROM ksiazka WHERE id=".$id . ";";
                    $sqlSkrypt3result = mysqli_query($con, $sqlSkrypt3);
                    while($row = mysqli_fetch_assoc($sqlSkrypt3result)){
                        
                    echo  'ksiazka '.$row["tytul"].' zostala zarezerwowana';
                    }

                    $zmienienie = "UPDATE `ksiazka` SET `rezerwacja` = '1' WHERE `ksiazka`.`id` = ".$id . ";";
                    $zmienienieQuery = mysqli_query($con, $zmienienie);
                    
                }


?>
    </section>
    <section class="sekcja">
        <h2>Epika</h2>
        <form method="post">
            <select name="doS3">
                <?php
                    
                    $sqlS3 = "SELECT `id`, `tytul` FROM ksiazka WHERE gatunek = 'epika';";
                    $resultS3 = mysqli_query($con, $sqlS3);
                    while($row = mysqli_fetch_assoc($resultS3)){
                        
                        echo '<option value='. $row["id"].'>'.$row["tytul"] .'</option>';  
                    }  
                
                ?>
                
            </select>

            <button type="submit" name="rezerwujs3">Rezerwuj(s3)</button>
        </form>
    </section>
    <section class="sekcja">
        <h2>Dramat</h2>
        <form method="post">
            <select name="doS3">
                <?php
                    $sqlS4 = "SELECT `id`, `tytul` FROM ksiazka WHERE gatunek = 'dramat';";
                    $resultS4 = mysqli_query($con, $sqlS4);
                    while($row = mysqli_fetch_assoc($resultS4)){
                        
                        echo '<option value='. $row["id"].'>'.$row["tytul"] .'</option>';  
                    }    
                ?>
                
            </select>

            <button type="submit" name="rezerwujs3">Rezerwuj(s4)</button>
        </form>

    </section>
    <section class="sekcja">
        <h2>Zalegle ksiazki</h2>
        <ul>
            <?php
                echo '<li>skrypt4</li>';
            ?>
        </ul>
    </section>

    <footer class="stopka">
        <p>autor: <strong>piotrek</strong></p>
    </footer>
    
</body>
</html>

<?php
mysqli_close($con);

?>