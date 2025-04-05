<?php
    session_start();
    //$_SESSION['logat'] = false;
    session_destroy();
    header("location: ../index.php");
?>