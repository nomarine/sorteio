<?php
    require('conexao_db.php');

    $participante = $_GET['nome'];

    $sql_select = "SELECT codigo FROM participantes WHERE  nome = '" . $participante . "'";
    $resultado = $conexao->query($sql_select);
    $codigo = $resultado->fetch_assoc();

    echo "<p> Seu código é " . $codigo["codigo"] . "</p>";

    $conexao->close();
?>