<?php
    include("conexao_db.php");

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

/*   $sql_participantes = "SELECT * FROM Participantes";
     $sql_sorteados = "SELECT * FROM Sorteados";
     $rsltd_participantes = $_SESSION["conexao"]->query($sql_participantes);
     $rsltd_sorteados = $_SESSION["conexao"]->query($sql_sorteados);
     $participante = $rsltd_participantes->fetch_assoc();
     $sorteado = $rsltd_sorteados->fetch_assoc(); */
 
     $index = 0;

     while($index < count($_SESSION["participantes"])) {
        $codigo = gerarCodigo($caracteres, 5);
        $insert_participante = "INSERT INTO Participantes (id, codigo, nome) VALUES(?, ?, ?)";
        $stmt_participante = $_SESSION["conexao"]->prepare($insert_participante);
        $stmt_participante->bind_param('iss', $index, $codigo, $_SESSION["participantes"][$index]["nome"]);
        $stmt_participante->execute();
        $index++;
     }
?>