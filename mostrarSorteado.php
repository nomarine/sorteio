<?php
    require('conexao_db.php');

    $codigo = $_GET['codigo'];

    $sql_select = "SELECT nome, codigo FROM participantes WHERE codigo = '" . $codigo . "'";
    $resultado = $conexao->query($sql_select);
    $participante = $resultado->fetch_assoc();

    echo "<p>" .  $participante["nome"] . " - Você tirou " . ucwords($participante["nome"]) . "</p>";
?>