<?php 
    include('debugging.php');
    require('conexao_db.php');

    $query = "SELECT * FROM sorteados";
    $resultado = mysqli_query($conexao, $query);
    $a = $resultado->fetch_assoc();
    if($a != null) {
        echo "Sorteio já rolou";
    } else {

        //Criar lista de nomes
        $sorteados = [];
        $index = 0;
        $sql_select = "SELECT * FROM participantes";
        $resultado = $conexao->query($sql_select);
        while($registro = $resultado->fetch_assoc()){
            $sorteados[$index] = $registro["nome"];
            $index++;
        }
        
        shuffle($sorteados);

        //Tratar último valor igual
        $sql_select = "SELECT * FROM participantes ORDER BY ID DESC LIMIT 1";
        $resultado = $conexao->query($sql_select);
        $ultimoregistro = mysqli_fetch_array($resultado);
        if(end($sorteados) == $ultimoregistro["nome"]){
            $ultimoindex = count($sorteados) - 1;
            $ultimonome = $sorteados[$ultimoindex];
            $sorteados[$ultimoindex] = $sorteados[$ultimoindex-1];
            $sorteados[$ultimoindex-1] = $ultimonome;
        }
        
        //Tratar valores iguais
        foreach($sorteados as $index => $participante){
            if($index == count($sorteados)-1){
                break;
            }
            if($participante == $sorteados[$index]){
                $proximonome = $sorteados[$index];
                $sorteados[$index] = $sorteados[$index+1]; 
                $sorteados[$index+1] = $proximonome;
            }
        } 
        
        //Vincular sorteados à matriz de participantes
        $sql_select = "SELECT * FROM sorteados";
        $resultado = $conexao->query($sql_select);
        $registro = $resultado->fetch_assoc();
        console_log($registro);
        if(empty($registro['id'])){
            console_log('Tabela vazia');
            $sql_insert = "";
            //Atribui a cada registro um código e popula os sorteados com os nomes dos participantes;
            foreach($sorteados as $index => $participante){
                $sql_insert .= "INSERT INTO sorteados (nome) VALUES ('" . $participante . "');";
            }

            if($conexao->multi_query($sql_insert) === TRUE) {
                console_log('Deu!');
            } else {
                echo "Error<br>" . $sql_insert . "<br>" . $conexao->error;
            }

        } else {
            console_log('Tabela com conteúdo');
        }

        $sql_update = "";
        foreach($sorteados as $index => $nome){
            $sql_update .= "UPDATE participantes SET sorteado_id='" . $index+1 . "' WHERE id='" . $index+1 . "';";
            $index++;
        }
        if($conexao->multi_query($sql_update) === TRUE) {
            console_log('Tabela participantes atualizada!');
        } else {
            console_log($conexao->error);
        }

    }

    $conexao->close();
?>