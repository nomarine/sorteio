<?php
    session_start();

    $servidor = "127.0.0.1";
    $usuario = "root";
    $senha = "";
    $db = "sorteio";

    $_SESSION["conexao"] = new mysqli($servidor, $usuario, $senha, $db);

    if ($_SESSION["conexao"]->connect_error) {
        die("Falha de conexão: " . $_SESSION["conexao"]->connect_error);
    }

?>