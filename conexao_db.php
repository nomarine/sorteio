<?php
    session_start();

    $servidor = "127.0.0.1";
    $usuario = "root";
    $senha = "";
    $db = "sorteio";

    $conexao = new mysqli($servidor, $usuario, $senha, $db);

    if ($conexao->connect_error) {
        die("Falha de conexão: " . $conexao->connect_error);
    }

?>