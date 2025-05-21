<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poziomy rzek</title>
    <link rel="stylesheet" href="styl.css">


    <?php

    $con = mysqli_connect('localhost', 'root', '', 'rzeki');

    if(!$con){
        die("blad laczenia z baza: " . mysqli_connect_error());
    }
    

    



?>



</head>
<body>
    <header id='baner1'>
        <img src="obraz1.png" alt="Mapa Polski" srcset="">
    </header>


    <header id='baner2'>
        <h1>Rzeki w wojewodztwie dolnośląskim</h1>
    </header>


    <menu id="menu">
        <form action="poziomRzek.php" method="post">
<label for="wszystkie">

           Wszystkie<input type="radio" name="radio" id="" value="wszystkie">
</label>

<label for="ostrzegawczy">
            Ponad stan ostrzegawczy<input type="radio" name="radio" id="" value="ostrzegawczy">
</label>

<label for="alarmowy">

            Ponad stan alarmowy<input type="radio" name="radio" id="" value="alarmowy">
</label>
            <button type='submit'>Pokaż</option>
        </form>
        <?php



?>
</menu>



    <section id="lewy">
        <h3>Stany na dzień 2022-05-05</h3>

        <table>
            <tr><th>Wodomierz</th><th>Rzeka</th><th>Ostrzegawczy</th><th>Alarmowy</th><th>Aktualny</th></tr>
            <?php

            if(!isset($_POST["radio"]) || $_POST["radio"] == "wszystkie"){
            $tabelaZapytanie = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody FROM wodowskazy JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id WHERE dataPomiaru='2022-05-05';";
            }
            else{
                $wybor = $_POST["radio"];

                if($wybor == "ostrzegawczy"){
                    $tabelaZapytanie = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody FROM wodowskazy JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id WHERE dataPomiaru='2022-05-05' AND pomiary.stanWody>wodowskazy.stanOstrzegawczy;";
                }
                if($wybor == "alarmowy"){
                    $tabelaZapytanie = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody FROM wodowskazy JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id WHERE dataPomiaru='2022-05-05' AND pomiary.stanWody>wodowskazy.stanAlarmowy;";
                }
            }
            $tabelaResult = mysqli_query($con, $tabelaZapytanie);
            

            while($TabelaRow = mysqli_fetch_assoc($tabelaResult)){
                echo "<tr>
                <td>". $TabelaRow['nazwa'] . " </td>
                
                <td>". $TabelaRow['rzeka'] . " </td>
                
                <td>". $TabelaRow['stanOstrzegawczy'] . " </td>

                <td>". $TabelaRow['stanAlarmowy'] . " </td>

                
                <td>". $TabelaRow['stanWody'] . " </td>
                
                
                
                </tr>";
            }
        

        

           
            
            
            ?>
        </table>
    </section>


    <section id="prawy">
        <h3>Informacje</h3>
        <ol>
            <li>Brak ostrzeżeń o burzach 
            z gradem</li>
            <li>Smog w mieście Wrocław</li>
            <li>Silny wiatr w Karkonoszach</li>
        </ol>

        <h3>Średnie stany wód</h3>
        <p>
            <?php
                $skrypt4 = "SELECT dataPomiaru, AVG(stanWody) AS 'sredniStan' FROM pomiary GROUP BY dataPomiaru;";

                $skrypt4Result = mysqli_query($con, $skrypt4);

                while($skrypt4Row = mysqli_fetch_assoc($skrypt4Result)){
                    echo "<p>". $skrypt4Row['dataPomiaru'] . ": " . $skrypt4Row['sredniStan'] . "</p>";
                }


            ?>
        </p>

        <a href="https://www.komunikaty.pl/">Dowiedz sie wiecej</a>
        <img src="obraz2.jpg" alt="rzeka">

    </section>


    <footer><p>strone wykonal piotr</p></footer>



    
</body>
</html>
