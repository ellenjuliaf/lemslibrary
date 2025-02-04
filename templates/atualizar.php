<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '030420Mc@';
$dbName = 'Lems_library';
        
$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

$codigo = $_POST['codigo'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$edicao = $_POST['edicao'];
$estado = $_POST['estado'];

$sql = "UPDATE livros SET titulo = '$titulo', autor = '$autor', edicao = '$edicao', estado = '$estado'
 WHERE codigo = $codigo";

$resultado = $conexao->query($sql);
$conexao->close();

$status = $resultado ? 'success' : 'error';
header("Location: editar.php?codigo=$codigo&status=$status");
exit();
}
?>