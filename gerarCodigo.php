<?php
    require('conexao_db.php');

    function gerarCodigo($caracteres, $tamanho = 16) {
        $total_caracteres = strlen($caracteres);
        $codigo = '';
        for($i = 0; $i < $tamanho; $i++) {
            $caracter = $caracteres[mt_rand(0, $total_caracteres - 1)];
            $codigo .= $caracter;
        }
    
        return $codigo;
    }
    
    $caracteres = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";

    $sql_select = "SELECT nome FROM participantes";
    $resultado = $conexao->query($sql_select);
    $sql_insert = "";

    while($participante = $resultado->fetch_assoc()) {
        $codigo = gerarCodigo($caracteres, 5);
        $sql_insert .= "UPDATE participantes SET codigo = '" . $codigo . "' WHERE nome = '" . $participante["nome"] . "'; ";
    }

    if($conexao->multi_query($sql_insert) === TRUE) {
        echo "Deu!";
    } else {
        echo "Error<br>" . $sql_insert . "<br>" . $conexao->error;
    }

    $conexao->close();
?>