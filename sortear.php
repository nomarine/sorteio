<?php 
    $index = 0;
    foreach($_SESSION["participantes"] as $participante) {
        $_SESSION["participantes"][$index][1] = $_SESSION["sorteados"][$index];
        $index++;
    }
    unset($participante);
?>