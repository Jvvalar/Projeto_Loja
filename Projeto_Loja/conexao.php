<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'bancoteste';

    $conexao = new mysqli($host, $user, $pass, $db);

    if($conexao->connect_error) {
        die("Erro na conexão" .$conexao-> conenect_error);
    }

?>