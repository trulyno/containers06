<?php
if (isset($_POST['login'], $_POST['parola'])) {
    $login = trim($_POST['login']);
    $parola = md5($_POST['parola']);

    $fisier = "../data/utilizatori.txt";

    $utilizatori = fopen($fisier, "r") or die("Fisierul nu exista!");

    while (!feof($utilizatori)) {

        $linie = trim(fgets($utilizatori));
        if ($linie === "") {
            // Nu exista utilizatori
            break;
        } else {
            $date = explode(":", $linie);
            if ($date[0] === $login) {
                die("Acest cont există deja. <a href='../index.php'>Înapoi</a>");
            }
        }

    }
    fclose($utilizatori);

    $utilizatori = fopen($fisier, "a") or die("Fisierul nu exista!");

    $inregistrare = "$login:$parola\n";
    fwrite($utilizatori,$inregistrare);

    fclose($utilizatori);

    echo "Înregistrarea a fost completată cu succes! <a href='../index.php'>Înapoi</a>";
} else {
    header("Location: ../index.php");
    exit;
}
