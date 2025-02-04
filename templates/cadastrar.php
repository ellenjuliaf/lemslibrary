<?php
    session_start();
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $edicao = $_POST['edicao'];
        $estado = $_POST['estado'];

        $dbHost = 'localhost';  // Corrigido para "localhost" em minúsculas
        $dbUsername = 'root';
        $dbPassword = '030420Mc@';
        $dbName = 'Lems_library';

        $conexao = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

        $response = array(); // Array para armazenar a resposta

        $search = mysqli_query($conexao, "SELECT * FROM livros WHERE LOWER(titulo) = '" 
        . strtolower($titulo) . "' AND LOWER(autor) = '" . strtolower($autor) . "'");

        if (mysqli_num_rows($search) > 0) {
            $response['status'] = 'error';
            $response['message'] = 'Esse livro já existe';
        } 
        else {
            $sql = "INSERT INTO livros (titulo, autor, edicao, estado) VALUES ('$titulo', '$autor', '$edicao', '$estado')";
            if (mysqli_query($conexao, $sql)) {
                $response['status'] = 'success';
                $response['message'] = 'Livro inserido com sucesso';
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Erro ao inserir registro: ' . mysqli_error($conexao);
            }
        }

        echo json_encode($response); // Retorna a resposta como JSON
?>
        