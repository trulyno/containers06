<?php

session_start();

if (isset($_POST['login'], $_POST['parola'])) {
    $login = trim($_POST['login']);
    $parola = md5($_POST['parola']);

    $fisier = "../data/utilizatori.txt";

    $utilizatori = fopen($fisier,"r") or die("Fisieru nu exista!");

    while (!feof($utilizatori)) {

        $linie = trim(fgets($utilizatori));
        if ($linie === "") {
            die("<a href='../index.php'>Înapoi</a>");
        } else {
            if ($linie === "$login:$parola") {
                $_SESSION['logat'] = true;
                header("Location: meniu.php");
                exit();
            }
        }

    }

    
    
    die("Autentificare eșuată. <a href='../index.php'>Încercați din nou</a>");
} else {
    header("Location: ../index.php");
    exit;
}
