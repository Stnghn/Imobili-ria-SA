<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Estilo e ícones -->
    <script src="https://kit.fontawesome.com/c3cf467fe3.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="dist/css/estilo_index.css">
    <!-- Fim -->
    <title>Imobiliária SA | Aluguel e Vendas</title>
</head>

<body>
    <header>
    <!-- Div tudo, usado para colocar o rodapé -->
    <div id="tudo">
        <nav>
            <ul id="lista-horizontal">
                <!-- Mostrar nome de usuário, se online -->
                <?php
                    if (isset($_SESSION['usuario'])) {
                        echo "<li>Olá, " .$_SESSION['nome']. "</li>";
                    }
                ?>
                    <li><a href="index.php" class="menu-bar">Home</a></li>
                    <li><a href="sobre.php" class="menu-bar">Quem Somos</a></li>
                    <li><a href="imoveis.php" class="menu-bar">Imóveis</a></li>
                <!-- Links para o usuário, se online -->
                <?php
                    if (isset($_SESSION['usuario'])) {
                        echo "<li><a class='menu-bar' href='novoimovel.php'>Cadastrar Imóveis</a></li>";  
                        echo "<li><a class='menu-bar' href='perfil.php'>Perfil</a></li>";                              
                        echo "<li><a class='menu-bar' href='includes/logout.php'>Sair</a></li>";
                    } else {
                        echo "<li><a class='menu-bar' href='cadastro.php'>Cadastro</a></li>";
                        echo "<li><a class='menu-bar' href='login.php'>Login</a></li>";
                    } 
                ?> 
            </ul>
        </nav>
    <div id="linha-horizontal"></div>
    <!-- Fim Topo-->
    </header>

        <!-- Início section com foto e frase -->            
        <section>
            <div id="frase-centro">
                <h1 id="titulo">IMOBILIÁRIA REFERÊNCIA</h1>
                <h1 class="subtitulo">EM ALUGUEL</h1>
                <h1 class="subtitulo">E VENDA</h1>
                <h1 class="subtitulo">DE IMÓVEIS</h1>
            </div>

            <div id="container-img">
                <img src="dist/upload/casa-site.png" id="casa-site"> 
            </div>
        </section>
        <!-- Fim section foto e frase -->
         
        <!-- Início rodapé e imagem-->
        <footer>
            <img src="dist/upload/img12.png" id="img-footer">
            
            <div id="lista-vertical">
                <ul id="posicionamento-vertical">
                    <li class="distancia"><i class="fas fa-phone-alt"></i><a href="" class='menu-bar2'> ATENDIMENTO - TELEFONE</a></li>
                    <li class="distancia"><i class="fas fa-at"></i><a href="" class='menu-bar2'> ATENDIMENTO - E-MAIL</a></li>
                    <li><i class="fas fa-comments"></i><a href="" class='menu-bar2'> ATENDIMENTO - CHAT ONLINE</a></li>
                </ul> 
            </div>     
        </footer>
        <!-- Fim rodapé e imagem-->

    </div> <!-- Fim Tudo (div lá do início) -->
    
</body>
</html>