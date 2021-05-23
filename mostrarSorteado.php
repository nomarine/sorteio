<?php
    session_start();

    $participante = $_GET['q'];

    echo "<p> Cód " .  $_SESSION["participantes"][$participante]["codigo"] . " - Você tirou " . ucwords($_SESSION["participantes"][$participante]["sorteado"]) . "</p>";
?>