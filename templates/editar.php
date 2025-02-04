<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar dados</title>
</head>
<style>
    body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            display: flex;
            height: 100vh;
            margin: 0;
            background-color: #345457;
            align-items: center;
            justify-content:center;
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
        text-decoration: none;
        }   
        
        .nav-link:hover {
            color: black; /* Cor ao passar o mouse */
            text-decoration: underline;
            text-decoration-color: black;
            text-decoration-thickness: 0.7px; /* Espessura do sublinhado */
            text-underline-offset: 15px; /* Distância entre o texto e o sublinhado */
            }

        ul {
            list-style-type: none; /* Remove os pontos */
            margin: 0;
            padding: 0;
            display: flex;
            }


         .styled-input {

            border: 5px solid white;
            border-radius: 10px;
            }

        .search-button {

            cursor: pointer;          /* Cursor de mãozinha ao passar o mouse */
            border: 5px solid  white;
            border-radius: 4px;
            background-color: white;
            text-decoration-color: black; /* Bordas arredondadas */

        }

        .search-button:hover {
            background-color: #d8b67d;
            color: white;
            border-color: #d8b67d;
        }

        div {
        08   width: 100px;
        09   height:100px;
        10   border-width:2px;
        11   border-color:black;
        12   border-style:solid;
        13   display:flex;
        }

        .label {
        display: block;
        width: 10%;
        float:left;
        padding-left: 3%;
        padding-right: 3%;
        }

        label{
            color: white;
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
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; 
            padding: 20px;
            border: 1px solid #888;
            border-radius: 10px;
            width: 30%; 
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
    
</style>

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
    
    <?php
        $dbHost = 'localhost';  // Corrigido para "localhost" em minúsculas
        $dbUsername = 'root';
        $dbPassword = '030420Mc@';
        $dbName = 'lems_library';

        $conexao = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
        $codigo = $_GET['codigo'] ;
        $status = isset($_GET['status']) ? $_GET['status'] : '';
        $sql = "SELECT * FROM livros where codigo=$codigo";
        $result = $conexao->query($sql);
        $dados= $result->fetch_assoc();

    ?>
    <div><img src="../imagens/logo_editar.png" alt="logo_editar" width="500" height="500"> </div>
   
       <form action = "atualizar.php" method = "POST">
       <p><fieldset style="border: 3px solid white; border-radius: 5px;" class=".label" id="Sobreolivro"><legend><font color="white">Editar informações: </font></legend>
     
            <p> <label for= "codigo"> Código: </label>
            <input class="styled-input" type="text" name="codigo" 
            value = "<?php echo $dados["codigo"]?>" size="59" maxlength="100" placeholder="Digite o Título" readonly></span></p> 
            
            <p> <label for= "titulo"> Título: </label>
            <input class="styled-input" type="text" name="titulo"  
            value = "<?php echo $dados["titulo"]?>" id = "titulo" size="60" maxlength="100" placeholder="Digite o Título"></span></p>
                        
            <p> <label for = "autor"> Autor: </label>
            <input class="styled-input" type="text" name="autor"  
            value = "<?php echo $dados["autor"]?>" id = "autor"size="60" maxlength="100" placeholder="Digite o autor"></p>

            <p> <label for="edicao"> Edição:</label>
            <input class="styled-input" type="text" name="edicao" value = "<?php echo $dados["edicao"]?>"
            id = "edicao" size="59" maxlength="100" placeholder="Digite a edição do livro"></p>

        </fieldset><br></p>
        
        <p> <fieldset style="border: 3px solid white; border-radius: 5px;" id="Estado"> <legend> <font color="white">Estado: </font> </legend>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="estado" id="lido" value="lido"
                <?php echo (isset($dados['estado']) && $dados['estado'] == 'lido') ? 'checked' : ''; ?> required>
            <label style="color: white;" class="form-check-label" for="lido">Lido</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="estado" id="não lido" value="não lido"
                    <?php echo (isset($dados['estado']) && $dados['estado'] == 'não lido') ? 'checked' : ''; ?> required>
                <label style="color: white;" class="form-check-label" for="não lido">Não lido</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="estado" id="quero ler" value="quero ler"
                    <?php echo (isset($dados['estado']) && $dados['estado'] == 'quero ler') ? 'checked' : ''; ?> required>
                <label style="color: white;" class="form-check-label" for="quero ler">Quero ler</label>
            </div>

            </fieldset>
            <p align='center'><input type="submit" class="search-button" value="Salvar"></p> 
        </form>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Sucesso!</h2>
            <p id="modalMessage"></p>
            
        </div>
    </div>

    <script>
        var modal = document.getElementById("myModal");
        var span = document.getElementsByClassName("close")[0];
        var modalMessage = document.getElementById("modalMessage");

        <?php if ($status === 'success'): ?>
            modalMessage.innerText = 'Dados alterados com sucesso';
            modal.style.display = "block";
        <?php elseif ($status === 'error'): ?>
            modalMessage.innerText = 'Erro ao atualizar os dados';
            modal.style.display = "block";
        <?php endif; ?>

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
