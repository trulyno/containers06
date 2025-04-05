<?php
session_start();

if (isset($_SESSION['logat']) && $_SESSION['logat'] === true) {
    header('Location: ./php/meniu.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autentificare & Înregistrare</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <h1>Bine ai venit!</h1>

    <form action="PHP/inregistrare.php" method="POST">
        <h2>Înregistrare</h2>
        <input type="text" name="login" placeholder="Introduce-ți login-ul" required><br>
        <input type="password" name="parola" placeholder="Introduce-ți parola" required><br>
        <button type="submit">Înregistrează-te</button>
    </form>

    <form action="PHP/login.php" method="POST">
        <h2>Autentificare</h2>
        <input type="text" name="login" placeholder="Introduce-ți login-ul" required><br>
        <input type="password" name="parola" placeholder="Introduce-ți parola" required><br>
        <button type="submit">Autentifică-te</button>
    </form>
</body>

</html>