<?php
    require('conexao_db.php');

    $codigo = $_GET['codigo'];

    //$sql_select = "SELECT participantes.nome, participantes.codigo, sorteados.codigo FROM participantes, sorteados WHERE participantes.sorteado_id = sorteados.id = '" . $codigo . "';";
    $sql_select = "SELECT participantes.nome, participantes.codigo, participantes.sorteado_id, sorteados.nome AS sorteado 
                    FROM participantes, sorteados 
                    WHERE participantes.codigo = '" . $codigo . "' AND participantes.sorteado_id = sorteados.id;";

    
    $resultado = mysqli_query($conexao, $sql_select);
    $participante = $resultado->fetch_assoc();
    
    if($participante != null){
        echo "<p>" .  ucwords($participante["nome"]) . " você tirou " . ucwords($participante["sorteado"]) . "</p>";
    } else { 
        echo "Código inválido";
    }
    
    

?>