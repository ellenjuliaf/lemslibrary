<?php
    $dbHost = 'localhost';  // Corrigido para "localhost" em minúsculas
    $dbUsername = 'root';
    $dbPassword = '030420Mc@';
    $dbName = 'Lems_library';

    // Corrigido o ponto e vírgula que faltava no final da linha
    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    
    if ($conexao->connect_errno) {
        echo "Erro: " . $conexao->connect_error;
    } else {
        echo "Conexão efetuada";
    }
?>
