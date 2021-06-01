<?php 

    require('conexao_db.php');

    $sql_select = "SELECT nome, codigo FROM participantes";
    $resultado = $conexao->query($sql_select);
    
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="style.css">

<head>
<title>Listagem de Participantes</title>
</head>
<body>
<div class="main">
    <table>
        <tr>
            <th>Nome</th>
            <th>Código</th>
        </tr>
        <?php
        while($linha = mysqli_fetch_array($resultado)){
            echo "<tr>
                <td>" . ucwords($linha["nome"]) . "</td>
                <td>" . ucwords($linha["codigo"]) . "</td>
            </tr>";
        }
        ?>
    </table>

</div>

</body>
</html>