<?php
session_start();
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
    <link rel="stylesheet" href="dist/css/estilo_log.css">
    <!-- Fim -->
    <title>Login | Imobiliária SA</title>
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
    </header>
    <!-- Fim Topo-->

    <section>
        <!-- Início form login -->
        <form action="includes/login_inc.php" method="post">

            <h1 id="titulo">Login</h1>
            <div id="faixa"></div>
        <!--
            <?php
                if (isset($_SESSION['nao_autenticado'])) {
                    echo "Erro de login";
                }
            ?> 
            unset($_SESSION['nao_autenticado']);
        -->
            <div class="wrapper">
                <i class="fas fa-at"></i>
                <input type="text" name="login" placeholder="E-mail" class="dados">
            </div>
            
            <div class="wrapper">
                <i class="fas fa-unlock"></i>
                <input type="password" name="senha" placeholder="Senha" class="dados">
            </div>

            <input type="submit" value="Login" name="submit" class="botao">
            <p class="cadastro">Ainda não é cadastrado? <a href="cadastro.php" class="menu-bar2">Comece a postar suas ofertas já!</a> </p>
                
        </form>
        <!-- Fim form login -->

        <!-- Validações login -->
        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "campovazio") {
                    echo "<p> Preencha todos os campos. </p>";
                } else if ($_GET["error"] == "logininvalido") {
                    echo "<p> Email ou senha errados. </p>";
                } 
            }
        ?>
        <!-- Fim valid. login -->
    </section>
    <footer></footer>
</body>
</html>

