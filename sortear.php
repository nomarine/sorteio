<?php 

    $_SESSION["participantes"] = [
        array("David", ""),
        array("Diogo", ""),
        array("Rafael", "")
    ];
    $_SESSION["sorteados"]=[];
    
    foreach($_SESSION["participantes"] as $index => $participante){
        $_SESSION["sorteados"][$index]=$_SESSION["participantes"][$index][0];
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
        if($participante[0] == $_SESSION["sorteados"][$index]){
            $proximonome = $_SESSION["sorteados"][$index];
            $_SESSION["sorteados"][$index] = $_SESSION["sorteados"][$index+1]; 
            $_SESSION["sorteados"][$index+1] = $proximonome;
        }
    } 
    
    //Vincular sorteados à matriz de participantes
    for($i=0;$i<count($_SESSION["participantes"]);$i++) {
        $_SESSION["participantes"][$i][1] = $_SESSION["sorteados"][$i];
    }
    
    ?>
?>