<?php 
    include('debugging.php');
    require('conexao_db.php');

    $sql_select = "SELECT * FROM sorteados";
    $resultado = $conexao->query($sql_select);
    $registro = $resultado->fetch_assoc();
    
    if(empty($registro['id'])){
        console_log('Tabela vazia');
        $sql_select = "SELECT nome FROM participantes ORDER BY RAND();";
        $resultado = $conexao->query($sql_select);
        $sql_insert = "";

        //Atribui a cada registro um código e popula os sorteados com os nomes dos participantes;
        while($linha = $resultado->fetch_assoc()) {
            $sql_insert .= "INSERT INTO sorteados (nome) VALUES ('" . $linha["nome"] . "'); ";
        }

        if($conexao->multi_query($sql_insert) === TRUE) {
            console_log('Deu!');
        } else {
            echo "Error<br>" . $sql_insert . "<br>" . $conexao->error;
        }
    } else {
        console_log('Tabela com conteúdo');
    }
    
/*     foreach($_SESSION["participantes"] as $index => $participante){
        $_SESSION["participantes"][$index]["codigo"] = gerarCodigo($caracteres, 5);
        $_SESSION["sorteados"][$index]=$_SESSION["participantes"][$index]["nome"];
    }
    shuffle($_SESSION["sorteados"]);
    
    //Tratar último valor igual
    $coluna = array_column($_SESSION["participantes"],0);
    if(end($coluna) == end($_SESSION["sorteados"])){
        $lastindex = count($_SESSION["sorteados"]) - 1;
        $ultimonome = $_SESSION["sorteados"][$lastindex];
        $_SESSION["sorteados"][$lastindex] = $_SESSION["sorteados"][$lastindex-1];
        $_SESSION["sorteados"][$lastindex-1] = $ultimonome;
    }
    //Tratar valores iguais
    foreach($_SESSION["participantes"] as $index => $participante){
        if($index == count($_SESSION["participantes"])-1){
            break;
        }
        if($participante["nome"] == $_SESSION["sorteados"][$index]){
            $proximonome = $_SESSION["sorteados"][$index];
            $_SESSION["sorteados"][$index] = $_SESSION["sorteados"][$index+1]; 
            $_SESSION["sorteados"][$index+1] = $proximonome;
        }
    } 
    
    //Vincular sorteados à matriz de participantes
    for($i=0;$i<count($_SESSION["participantes"]);$i++) {
        $_SESSION["participantes"][$i]["sorteado"] = $_SESSION["sorteados"][$i];
    } */
    $conexao->close();
?>