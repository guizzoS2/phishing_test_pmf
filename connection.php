<?php
    $usuario = 'user de cadasto';
    $senha = 'senha utilizada na conexao';
    $database = 'banco de dados a ser utilizado';
    $host = 'ip +  :porta';

    $mysqli = new mysqli($host, $usuario, $senha, $database);

    if ($mysqli->connect_error) {
        die('Falha ao conectar ao banco de dados:'. $mysqli->connect_error);
    }
?>