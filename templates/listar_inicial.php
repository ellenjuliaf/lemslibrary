<?php
$dbHost = 'localhost';  // Corrigido para "localhost" em minúsculas
$dbUsername = 'root';
$dbPassword = '030420Mc@';
$dbName = 'Lems_library';

$conexao = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
$resultado = mysqli_query($conexao,
"SELECT * FROM livros");

if (mysqli_num_rows($resultado) > 0 ){
	
	while($linha = mysqli_fetch_assoc($resultado)){
		echo "codigo: " . $linha["codigo"] .
		" titulo: " . $linha["titulo"] . 
		" autor : " . $linha["autor"] . 
		" edicao: " . $linha["edicao"] . "<br/>";
	}//fim-while
	
	echo mysqli_num_rows($resultado) . " resultados.";
	
}else{
	echo "0 resultados.";
}//fim-else

?>