<?php
    session_start();
    if (isset($_SESSION["logat"]) && $_SESSION["logat"] == true) {
        $fisier = "../data/utilizatori.txt";

        $utilizatori = [];

        $utilizatoriFisier = fopen($fisier, "r") or die("Fisierul nu exista!");

        while (!feof($utilizatoriFisier)) {
            $linie = trim(fgets($utilizatoriFisier));

            $utilizator = explode(":", $linie)[0];

            array_push($utilizatori, $utilizator);
        }
        
    } else {
        header("location: ../index.php");
        exit();
    }   

    
?>
<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Bine ai venit!</title>
</head>

<body>
    <h1>Bine ai venit în contul tău!</h1>
    <img src="../Images/welcome.gif" alt="Bun venit" style="width: 300px;">

    <div class="lista-utilizatori">
        <h2>Utilizatori înregistrați</h2>
        <div class="container-utilizatori">
            <?php 
                if (!empty($utilizatori)) {
                    foreach ($utilizatori as $utilizator) {
                        if ($utilizator == "") {
                            continue;
                        }
                        echo '<div class="utilizator"><h2>' . $utilizator . '</h2></div>';
                    }
                } else {
                    echo "<p>Nu există utilizatori înregistrați.</p>";
                }
            ?>
        </div>
    </div>
    <div class="logout">
        <form action="logout.php" method="post">
            <button type="submit">Deloghează-te</button>
        </form>
    </div>
</body>

</html>