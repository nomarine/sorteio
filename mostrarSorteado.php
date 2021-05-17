<?php
    session_start();

    $participante = $_GET['q'];

    $index = array_search($participante, array_column($_SESSION["participantes"],0));

    echo "<p>" . $index . " Você tirou " . $_SESSION["participantes"][$index][1] . "</p>";
?>