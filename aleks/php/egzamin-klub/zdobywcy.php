<?php
    $conn = new mysqli("localhost", "root", "", "zdobywcy");
    if($conn -> connect_error){
        die("blad polaczenia" .$conn -> connect_error);
    }


?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>ZDOBYWCY GÓR</title>
</head>
<body> 
    <header>
        <h1>Klub zdobywców gór polskich</h1>
    </header>

    <nav>
        <a href="kwerenda1.png">kwerenda1</a>
        <a href="kwerenda2.png">kwerenda2</a>
        <a href="kwerenda3.png">kwerenda3</a>
        <a href="kwerenda4.png">kwerenda4</a>
    </nav>

    <section id="lewy">
        <img src="logo.png" alt="logo zdobywcy">
        <h3>razem z nami</h3>
        <ul>
            <li>wyjazdy</li>
            <li>szkolenia</li>
            <li>rekreacja</li>
            <li>wypoczynek</li>
            <li>wyzwania</li>
        </ul>
    </section>

    <section id="prawy">
        <h2>Dołącz do naszego zespołu!</h2>
        <p>Wpisz swoje dane do formularza</p>
        <form action="" method="post" name="form">
    
            <label for="nazwisko">Nazwisko: </label>

            <input type="text" name="nazwisko">

            <label for="imie">Imię: </label>

            <input type="text" name="imie">

            <label for="funkcja"></label>

            <select name="funkcja">
                <option value="uczestnik">uczestnik</option>
                <option value="przewodnik">przewodnik</option>
                <option value="zaopatrzeniowiec">zaopatrzeniowiec</option>
                <option value="organizator">organizator</option>
                <option value="ratownik">ratownik</option>
            </select>

            <label for="email">Email: </label>

            <input type="email" name="email">
            
            <button type="submit">Dodaj</button>
            <table>
                <tr>
                    <th>Nazwisko</th>
                    <th>Imie</th>
                    <th>Funkcja</th>
                    <th>Email</th>

                    <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $nazwisko = $_POST['nazwisko'];
                            $imie = $_POST['imie'];
                            $funkcja = $_POST['funkcja'];
                            $email = $_POST['email'];

                            // Skrypt - dodawanie
                            $sql = "INSERT INTO osoby VALUES (NULL, '$nazwisko', '$imie', '$funkcja', '$email');";
                            $result = $conn->query(query: $sql);
                        }    
                
                        $sql = "SELECT nazwisko, imie, funkcja, email FROM osoby;";
                        $result = $conn -> query($sql);
                        while ($row = $result -> fetch_assoc()) {
                            $nazwisko = $row["nazwisko"];
                            $imie = $row["imie"];
                            $funkcja = $row["funkcja"];
                            $email = $row["email"];

                            echo "<tr>";
                                echo "<th>$nazwisko</th>";
                                echo "<th>$imie</th>";
                                echo "<th>$funkcja</th>";
                                echo "<th>$email</th>";
                            echo "</tr>";
                        }

                        

                        $conn -> close();
                     
                    
                    ?>
                </tr>
            </table>
        </form>
    </section>

    <footer>
        <p>Stronę wykonał: JA</p>
    </footer>
    
</body>
</html>
