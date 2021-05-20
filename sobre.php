<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c3cf467fe3.js" crossorigin="anonymous"></script>
    <!-- Estilo e ícones -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="dist/css/estilo_sobre.css">
    <!-- Fim estilo -->
    <title>Sobre Nós | Imobiliaria SA</title>
</head>
<body>
    <header>
        <nav>
            <ul id="lista-horizontal">
                <?php
                    if (isset($_SESSION['usuario'])) {
                        echo "<li>Olá, " .$_SESSION['nome']. "</li>";
                    }
                ?>
                    <li><a href="index.php" class="menu-bar">Home</a></li>
                    <li><a href="sobre.php" class="menu-bar">Quem Somos</a></li>
                    <li><a href="imoveis.php" class="menu-bar">Imóveis</a></li>
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

    <section>
        <h1>Sobre Nós</h1>
        <div id="sublinhado"></div>
        <p>
            Surgiu em 2019 com a ideia de facilitar o comércio de casas, utilizando padrões mais modernos de atendimento ao 
            cliente e de vendas em uma área do mercado quase toda tradicional. Foi inicialmente fundada na pequena cidade de 
            Salto da Lontra e hoje conta com um escritório central na cidade de Joinville. Apesar do escritório físico, 
            a maioria dos atendimentos são online e totalmente virtuais.
        </p>
    </section>

    <footer>
    </footer>
</body>
</html>