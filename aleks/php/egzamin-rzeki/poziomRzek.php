<?php
    $conn = new mysqli("localhost", "root", "", "rzeki");

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
    <title>Poziom rzekt</title>
</head>
<body>
    <header>
        <img src="obraz1.png" alt="Mapa Polski">
    </header>

    <header>
        <h1>Rzeki w województwie dolnośląskim</h1>
    </header>

    <section id="menu">
        <form action="" method="post">
            <label>
            <input type="radio" name="Wszystkie" value="Wszystkie">Wszystkie
            </label>
            <label>
            <input type="radio" name="Ponadso" value="Ponad stan ostrzegawczy">Ponad stan ostrzegawczy
            </label>
            <label>
            <input type="radio" name="Ponadsa" value="Ponad stan alarmowy">Ponad stan alarmowy
            </label>
            <button type="submit">Pokaz</button>
        </form>
    </section>

    <section id="lewy">
        <h3>Stany na dzień 2022-05-05</h3>
        <table>
            <tr>
                <th>Wodomierz</th>
                <th>Rzeka</th>
                <th>Ostrzegawczy</th>
                <th>Alarmowy</th>
                <th>Aktualny</th>
            </tr>
                <?php
                    if(isset($_POST['Wszystkie'])){
                        $Wszystkie = $_POST['Wszystkie'];
                        $sql = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody FROM wodowskazy INNER JOIN pomiary ON wodowskazy.id = wodowskazy_id WHERE dataPomiaru = '2022-05-05';";
                        $result = $conn->query($sql);

                        while($row = $result -> fetch_assoc()){
                            echo "<tr>";
                           echo "<td>".$row['nazwa']."</td>";
                           echo "<td>".$row['rzeka']."</td>";
                           echo "<td>".$row['stanOstrzegawczy']."</td>";
                           echo "<td>".$row['stanAlarmowy']."</td>";
                           echo "<td>".$row['stanWody']."</td>";
                            echo "</tr>";
                            
                            
                        }
                    }

                    if(isset($_POST['Ponadso'])){
                        $Ponadso = $_POST['Ponadso'];
                        $sql3 = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody FROM wodowskazy JOIN pomiary ON wodowskazy.id = wodowskazy_id WHERE dataPomiaru='2022-05-05' AND stanWody > stanOstrzegawczy;";
                        $result3 = $conn->query($sql3);

                        while($row3 = $result3 -> fetch_assoc()){
                            echo "<tr>";
                           echo "<td>".$row3['nazwa']."</td>";
                           echo "<td>".$row3['rzeka']."</td>";
                           echo "<td>".$row3['stanOstrzegawczy']."</td>";
                           echo "<td>".$row3['stanAlarmowy']."</td>";
                           echo "<td>".$row3['stanWody']."</td>";
                            echo "</tr>";
                            
                            
                        }
                    }

                    if(isset($_POST['Ponadsa'])){
                        $Ponadso = $_POST['Ponadsa'];
                        $sql4 = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody FROM wodowskazy JOIN pomiary ON wodowskazy.id = wodowskazy_id WHERE dataPomiaru='2022-05-05' AND stanWody > stanAlarmowy;";
                        $result4 = $conn->query($sql4);

                        while($row4 = $result4 -> fetch_assoc()){
                            echo "<tr>";
                           echo "<td>".$row4['nazwa']."</td>";
                           echo "<td>".$row4['rzeka']."</td>";
                           echo "<td>".$row4['stanOstrzegawczy']."</td>";
                           echo "<td>".$row4['stanAlarmowy']."</td>";
                           echo "<td>".$row4['stanWody']."</td>";
                            echo "</tr>";
                            
                            
                        }
                    }

                    

                ?>
            
        </table>
    </section>

    <section id="prawy">
        <h3>Informacje</h3>
        <ul>
            <li>Brak ostrzeżeń o burzach z gradem</li>
            <li>Smog w mieście Wrocław</li>
            <li>Silny wiatr w Karkonoszach</li>
        </ul>
        <h3>Średnie stany wód</h3>
        <?php
            $sql2 = "SELECT dataPomiaru, AVG(stanWody) FROM pomiary GROUP BY dataPomiaru;";
            $result2 = $conn -> query($sql2);

            while($row2 = $result2 -> fetch_assoc()){
                echo "<p>".$row2['dataPomiaru'].": ".$row2['AVG(stanWody)']."</p>";
            }


        ?>
        <a href="https://komunikaty.pl">Dowiedz się więcej</a>
        <img src="obraz2.jpg" alt="rzeka" id="prawyimg">
    </section>

    <footer>
        <p>Stronę wykonał: JA</p>
    </footer>
</body>
</html>

<?php
    $conn->close();

?>
