<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'banco';

    $conexao = new mysqli($host, $user, $pass, $db);

    if($conexao->connect_error) {
        die("Erro na conexão" .$conexao-> connect_error);
    }

?>