<?php
    session_start();

    $participante = $_GET['q'];

    echo "<p> Você tirou " . $_SESSION["participantes"][$participante][1] . "</p>";
?>