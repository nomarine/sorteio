<?php 

session_start();

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
/* foreach($_SESSION["participantes"] as $index => $participante){
    if($participante[$index][0] == $sorteados[$index]){

    }
} */

for($i=0;$i<count($_SESSION["participantes"]);$i++) {
    $_SESSION["participantes"][$i][1] = $_SESSION["sorteados"][$i];
}

?>

<!DOCTYPE html>
<html>
<style>
    .main{
        margin: auto;
        width: 25%;
        border: 3px solid green;
        padding: 25px;
    }

    #form {
        display:flex;
        justify-content:center;
        align-items:center;
    }

    #sorteadoInfo {
        display:flex;
        justify-content:center;
        align-items:center;
    }

    body {
        background-color: lightblue;
    }
</style>

<head>
<title>Sorteio de Nomes</title>
</head>
<body>
<div class="main">
    <div id="form">
       <!-- <input type=text value="" onchange="mostrarSorteado(this.value)"></input> -->
       <select name="participantes" id="participantes" onchange="mostrarSorteado(this.value)">
            <option value="">Escolha o seu código...</option>-->
            <?php
                foreach($_SESSION["participantes"] as $index=>$participante) {
                    echo "<option value='" . $participante[0] . "'>" . $index . "</option>";
                }
            ?>
        </select> 
    </div>
    <div id="sorteadoInfo"></div>
</div>

    <script src="mostrarSorteado.js"></script>
</body>
</html>