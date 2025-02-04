<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Lems Library</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../static/style.css">
</head>
<style>
    body {
            background-color: #345558 !important;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            margin: 0;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
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

        .styled-input {
            width: 300px;
            padding: 10px;
            border: 10px solid #cfa766;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s ease;
            outline: none;
        }

        .styled-button {
            padding: 10px;
            border: 10px solid #cfa766;
            border-radius: 5px;
            background-color: #cfa766;
            color: white;
            font-size: 16px;
            transition: background-color 0.3s ease, border-color 0.3s ease;
            cursor: pointer;
        }

        .styled-button:hover {
            background-color: #d8b67d;
            border-color: #cfa766;
        }

        .nav-link {
            color: white;
            font-size: 25px;
            margin: 0 20px;
        }

        .nav-link:hover {
            color: black;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .search-container {
            margin-top: 20px;
        }
</style>
<body>
    <header class="header">
        <nav>
            <ul class="nav nav-underline">
                <li class="nav-item">
                <a class="nav-link" href="catalogar.php">Cadastrar livros</a>
                </li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <img src="../imagens/logo_oficial.png" alt="logo_oficial" width="499" height="349"/><br>
        <form action="pesquisar_inicial.php" method="POST">
            <div class="search-container">
                <div class="input-group">
                    <input class="styled-input" type="search" placeholder="Pesquisar..." name="titulo" required>
                    <button type="submit" class="styled-button"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>

        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    
        

</body>
</html>