
<!DOCTYPE html>
<html>
    <head>
        <title>Lems Library catalogar</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <link rel="stylesheet" href="../static/catalogar.css">
		
    </head>
    <style>

        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif, white;
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
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: auto; 
            z-index: 1050; 
        }

        .modal-dialog {
            display: flex;
            align-items: center; 
            justify-content: center;
            height: 100%; 
            margin: 0; 
        }

        .modal-content {
            border-radius: 0.5rem; 
            background-color: #ffffff; 
            color: #000000; 
            border: 1px solid #0097B2; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
        }

        .modal-header {
            background-color: #0097B2; 
            color: #ffffff; 
            border-bottom: 1px solid #0097B2; 
            border-radius: 0.5rem 0.5rem 0 0; 
        }

        .modal-body {
            padding: 1.25rem; 
            font-size: 1rem;
        }

        .modal-footer {
            background-color: #ffffff;
            border-top: 1px solid #0097B2; 
            padding: 1rem; 
        }

        .btn-outline-info {
            color: #0097B2;
            border-color: #0097B2; 
        }

        .btn-outline-info:hover {
            background-color: #0097B2; 
            color: #ffffff; 
        }
        /* Estilo para o Modal */
        .modal {
            display: none; /* Inicialmente escondido */
            position: fixed; /* Fica fixo na tela */
            z-index: 1; /* Fica na frente de outros elementos */
            left: 0;
            top: 0;
            width: 100%; /* Largura total */
            height: 100%; /* Altura total */
            background-color: rgba(0, 0, 0, 0.5); /* Fundo semi-transparente */
        }

        /* Estilo do conteúdo do Modal */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* Centraliza vertical e horizontalmente */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Largura */
            max-width: 500px; /* Limita a largura máxima */
        }

        /* Botão de fechar o Modal */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            
        }

        .close:hover, .close:focus {
            color: #000;
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
        
    <div><img src="../imagens/logo_editar.png" alt="logo_catalogar" width="500" height="500"> </div>
        <form method="POST" action="cadastrar.php" id="cadastroForm" > 
        
            <p><fieldset style="border: 3px solid white; border-radius: 5px;" class=".label" id="Sobreolivro"><legend><font color="white">Sobre o livro:</font></legend>
                
                <p> <label for= "titulo"> Título: </label>
                <input class="styled-input" type="text" name="titulo" id = "titulo" size="60" maxlength="100" placeholder="Digite o Título" required></span></p>
                    
                <p> <label for = "autor"> Autor: </label>
                <input class="styled-input" type="text" name="autor"  id = "autor"size="60" maxlength="100" placeholder="Digite o autor" required></p>

                <p> <label for="edição"> Edição:</label>
                <input class="styled-input" type="text" name="edicao" id = "edição" size="60" maxlength="100" placeholder="Digite a edição do livro"></p>
                
            </fieldset> <br></p>

            <p> <fieldset style="border: 3px solid white; border-radius: 5px;" id="Estado"> <legend> <font color="white">Estado: </font> </legend>
                
            <div class="form-check">
                <input class="form-check-input" type="radio" name="estado" id="lido" value = "lido" required>
                <label style="color: white;" class="form-check-label" for="lido">
                Lido
                </label>
                </div>
                    
                <div class="form-check">
                <input class="form-check-input" type="radio" name="estado" id="nãolido" value = "naolido" required>
                <label style="color: white" class="form-check-label" for="nãolido">
                Não lido
                </label>
                </div>
                    
                <div class="form-check">
                <input class="form-check-input" type="radio" name="estado" id="quero ler" value = "quero ler" required>
                <label style="color: white" class="form-check-label" for="quero ler">
                Quero ler
                </label>
                </div></p>
            
            </fieldset>
            <p align="center"><button type="submit" name = "submit" id = "openModalBtn" class="search-button" onclick="abrirModal">
                Catalogar
            </button></p>
        </form>
    
    <!-- Modal para post já existente -->
<div id="modalPostExists" class="modal">
    <div class="modal-content">
        <span class="close" data-modal="postExists">&times;</span>
        <h2>Erro.</h2>
        <p id="modalPostExistsMessage">Esse livro já existe.</p>
    </div>
</div>

<!-- Modal para sucesso -->
<div id="modalSuccess" class="modal">
    <div class="modal-content">
        <span class="close" data-modal="success">&times;</span>
        <h2>Sucesso!</h2>
        <p id="modalSuccessMessage">Livro inserido com sucesso.</p>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        var modals = {
            postExists: $('#modalPostExists'),
            success: $('#modalSuccess')
        };

        var closeModalBtns = $('.close');

        $('#cadastroForm').on('submit', function(event) {
    event.preventDefault(); // Previne o envio do formulário

    $.ajax({
        type: 'POST',
        url: 'cadastrar.php', // URL do script PHP para processar o formulário
        data: $(this).serialize(), // Serializa os dados do formulário
        dataType: 'json', // Define que a resposta esperada é um JSON
        success: function(response) {
            console.log(response); // Verifica a resposta no console para debugging
            if (response.status === 'success') {
                $('#modalSuccessMessage').text(response.message);
                modals.success.show(); // Exibe o modal de sucesso
                $('#cadastroForm')[0].reset(); //limpa os campos
            } else {
                $('#modalPostExistsMessage').text(response.message);
                modals.postExists.show(); // Exibe o modal de erro
                $('#cadastroForm')[0].reset(); //limpa os campos
            }
        },
        error: function(xhr, status, error) {
            $('#modalPostExistsMessage').text('Erro ao enviar a solicitação: ' + xhr.responseText);
            modals.postExists.show(); // Exibe o modal de erro
        }
    });
});


        // Quando clicar no "x", fecha o Modal
        closeModalBtns.on('click', function() {
            var modalId = $(this).data('modal');
            modals[modalId].hide(); // Usa o valor de data-modal para fechar o modal correto
        });

        // Quando clicar fora do conteúdo do Modal, fecha o Modal
        $(window).on('click', function(event) {
            $.each(modals, function(key, modal) {
                if ($(event.target).is(modal)) {
                    modal.hide();
                }
            });
        });
    });
</script>

    

    <script src="scripts.js"></script>   
</body>
</html>

