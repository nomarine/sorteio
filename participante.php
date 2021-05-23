<?php 

session_start();

?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="style.css">

<head>
<title>Consultar código</title>
</head>
<body>
<div class="main">
    <div id="form">
       <label>Coloque seu nome para ver seu código do sorteio:</label>
       <input type=text id="nomeParticipante"></input>
    </div>
    <input id="botao" type="button" value="Consultar código" onclick="mostrarCodigo(nomeParticipante.value)">
    <div id="codigoParticpante"></div>

</div>

    <script src="mostrarCodigo.js"></script>
</body>
</html>