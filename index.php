<?php 

include("conexao_db.php");

?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="style.css">

<head>
<title>Sorteio de Nomes</title>
</head>
<body>
<?php
    include('navbar.html');
?>
<div class="main">
    <div id="form">
       <label>Digite seu código:</label>
       <input type=text id="sorteio"></input>
    </div>
    <input id="botao" type="button" value="Mostrar sorteado" onclick="mostrarSorteado(sorteio.value)">
    <div id="sorteadoInfo"></div>

</div>

    <script src="mostrarSorteado.js"></script>
</body>
</html>