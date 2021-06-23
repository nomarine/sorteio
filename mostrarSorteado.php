<?php
    require('conexao_db.php');
    include('debugging.php');

    $codigo = $_GET['codigo'];

    //$sql_select = "SELECT participantes.nome, participantes.codigo, sorteados.codigo FROM participantes, sorteados WHERE participantes.sorteado_id = sorteados.id = '" . $codigo . "';";
    $sql_select = "SELECT participantes.nome, participantes.codigo, participantes.sorteado_id, sorteados.nome AS sorteado FROM participantes, sorteados WHERE participantes.codigo = '" . $codigo . "';";
    $resultado = $conexao->query($sql_select);
    $participante = $resultado->fetch_assoc();
    console_log($participante);

    echo "<p>" .  ucwords($participante["nome"]) . " você tirou " . ucwords($participante["sorteado"]) . "</p>";

    
?>