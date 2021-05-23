<?php
    session_start();

    $participante = $_GET['nome'];

    $colunanome = array_column($_SESSION["participantes"], "nome");

    $index = array_search($participante, $colunanome);

    echo "<p> Seu código é " . $_SESSION["participantes"][$index]["codigo"] . "</p>";
?>