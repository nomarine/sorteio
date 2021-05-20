<?php 

    $_SESSION["participantes"] = [
        array("codigo"=>"", "nome"=>"David", "sorteado"=>""),
        array("codigo"=>"", "nome"=>"Diogo", "sorteado"=>""),
        array("codigo"=>"", "nome"=>"Rafael", "sorteado"=>"")
    ];
    $_SESSION["sorteados"]=[];

    foreach($_SESSION["participantes"] as $index => $participante){
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