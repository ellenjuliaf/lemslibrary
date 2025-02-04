<?php
session_start();

$titulo = $_POST["titulo"];

// Conectando ao banco de dados
$dbHost = 'localhost';  // Corrigido para "localhost" em minúsculas
$dbUsername = 'root';
$dbPassword = '030420Mc@';
$dbName = 'Lems_library';

$conexao = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Sanitizando o input do usuário
$titulo = mysqli_real_escape_string($conexao, $titulo);

// Executando a consulta SQL
$sql = "SELECT * FROM livros WHERE titulo LIKE '%$titulo%' OR autor LIKE '%$titulo%' OR edicao LIKE '%$titulo%' or estado LIKE '%$titulo%'";
$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {
    die("Erro na consulta: " . mysqli_error($conexao));
}

$livrosEncontrados = mysqli_num_rows($resultado) > 0;

mysqli_close($conexao);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados da Pesquisa</title>
    <style>
        body {
            background-image: url("../imagens/background_telaresultados (1).webp");
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
            flex-direction: column;

        }
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 20px 100px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 100;
        }    
        /* barra de navegação*/
        nav {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 4vh;
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;

            }
        .nav-link {
        color: white; /* Define a cor da fonte dos links */
        font-size: 25px;
        margin: 0 20px;
        }   
        
        .nav-link:hover {
            color: while; /* Cor ao passar o mouse */
            text-decoration: underline;
            text-decoration-color: while;
            text-decoration-thickness: 0.7px; /* Espessura do sublinhado */
            text-underline-offset: 15px; /* Distância entre o texto e o sublinhado */
            }

        ul {
            list-style-type: none; /* Remove os pontos */
            margin: 0;
            padding: 0;
            display: flex;
            }
        .container {
            width: 80%;
            max-width: 800px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            overflow-y: auto; 
            max-height: 70vh; 
            position: relative; 
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 2px solid #056374;
        }
        td {
            padding: 8px;
            text-align: center;
            background-color: rgb(232, 240, 254);
            color: black;
        }
        tr {
            background-color: rgb(232, 240, 254);
            color: black;
        }
        a {
            color: #007BFF;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            border-radius: 10px;
            width: 80%;
            max-width: 400px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .back-button {
            display: block;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #cfa766;
            color: white;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            position: fixed; 
            bottom: 20px; 
            left: 50%;
            transform: translateX(-50%);
            z-index: 10; 
        }
        .back-button.hidden {
            display: none; 
        }
    </style>
</head>
<body>
    <header class="header">
        <nav class="nav">
            <ul class="nav-underline">
                <li class="nav-item">
                    <a class="nav-link" href="tela_inicial.php">Voltar</a>
                </li>
            </ul>
        </nav>
    </header>
        

<div class="container">
    <?php if ($livrosEncontrados): ?>
        <?php while ($linha = mysqli_fetch_assoc($resultado)): ?>
        <table>
            <tr>
                <td><strong>Título:</strong></td>
                <td><?php echo htmlspecialchars($linha["titulo"]); ?></td>
            </tr>
            <tr>
                <td><strong>Autor:</strong></td>
                <td><?php echo htmlspecialchars($linha["autor"]); ?></td>
            </tr>
            <tr>
                <td><strong>Edição:</strong></td>
                <td><?php echo htmlspecialchars($linha["edicao"]); ?></td>
            </tr>
            <tr>
                <td><strong>Estado:</strong></td>
                <td><?php echo htmlspecialchars($linha["estado"]); ?></td>
            </tr>
            <tr>
                <td><strong>Editar:</strong></td>
                <td><a href="editar.php?codigo=<?php echo htmlspecialchars($linha['codigo']); ?>">Editar</a></td>
            </tr>
        </table>
        <?php endwhile; ?>
    <?php else: ?>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>0 resultados</h2>
                <p>Nenhuma correspondência para o título "<?php echo htmlspecialchars($titulo); ?>"</p>
            </div>
        </div>
    <?php endif; ?>
</div>



<script>
    var modal = document.getElementById("myModal");
    var span = document.getElementsByClassName("close")[0];
    var backButton = document.getElementById("backButton");

    if (modal) {
        modal.style.display = "block";
        backButton.classList.add('hidden'); 
    }

    span.onclick = function() {
        window.location.href = "tela_inicial.php"; 
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            window.location.href = "tela_inicial.php"; 
        }
    }
</script>

</body>
</html>
