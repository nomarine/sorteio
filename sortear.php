<?php 
    function gerarCodigo($caracteres, $tamanho = 16) {
        $total_caracteres = strlen($caracteres);
        $codigo = '';
        for($i = 0; $i < $tamanho; $i++) {
            $caracter = $caracteres[mt_rand(0, $total_caracteres - 1)];
            $codigo .= $caracter;
        }
    
        return $codigo;
    }

    $_SESSION["participantes"] = [
        array("codigo"=>"", "nome"=>"david luiz", "sorteado"=>""),
        array("codigo"=>"", "nome"=>"diogo", "sorteado"=>""),
        array("codigo"=>"", "nome"=>"rafael", "sorteado"=>"")
    ];
    $_SESSION["sorteados"]=[];
    
    $caracteres = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";

    //Atribui a cada registro um código e popula os sorteados com os nomes dos participantes;
    foreach($_SESSION["participantes"] as $index => $participante){
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
    }
    
?>