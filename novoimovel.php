<?php
    session_start();
    if (empty($_SESSION['usuario'])) {
        return header('location: index.php');
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
    <link rel="stylesheet" href="dist/css/estilo_novo.css">
    <!-- Fim -->
    <title>Novo Imóvel | Imobiliaria SA  </title>
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

    <div>
        <h1> Dificuldades para vender e negociar seus imóveis?</h1>
        <h2> Anuncie aqui e deixe eles disponíveis para milhares de pessoas verem!</h2>
    </div>

    <section>
        <!--Início form imóvel novo-->
        <form action="includes/inserir_imovel.php" method="post" enctype="multipart/form-data">

            <div class="inputs">
                <input type="text" name="titulo" placeholder="Título" class="dados"> 
                <input type="decimal" name="preco" placeholder="Preço" class="dados">
            </div>

            <div class="margem">
                <textarea name="desc" cols="50" rows="10" placeholder="Descrição" class="dados"></textarea>
                <h4>Qual o tipo da negociação?</h4>
                <label for="vender">Venda</label><input type="radio" name="tiponegociacao" value="venda" checked>
                <label for="vender">Aluguel</label><input type="radio" name="tiponegociacao" value="aluguel"> <br> <br>
                
                <h4>Data que você está fazendo esse anúncio:</h4> 
                <input type="date" name="data" id="data"> <br> <br>

                <label for="insertimg"> <h4>Para chamar mais atenção, coloque algumas imagens! </h4>
                <input type="file" name="imagem" id="insertimg"> <br>
                </label>

                <img id="img" style="width:150px; heigth:150px;">

                <?php
                    echo "<h4> O seu número de telefone que ficará visível para contato é o </h4>" .$_SESSION['fone']. "";               
                ?> 
                <input type="button" value="Alterar" >
            </div> 

            <div class="inputs">   
                <input type="submit" name="enviaimovel" id="enviaimovel" class="botao1">
            </div> 

        </form>
        <!--Fim form imóvel novo-->

        <!-- Script para a miniatura da imagem -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha512-3P8rXCuGJdNZOnUx/03c1jOTnMn3rP63nBip5gOP2qmUh5YAdVAvFZ1E+QLZZbC1rtMrQb+mah3AfYW11RUrWA==" crossorigin="anonymous"></script>
        <script>
            $(function(){
                $('#insertimg').change(function(){
                    const file = $(this)[0].files[0]
                    const fileReader = new FileReader()
                    fileReader.onloadend = function(){
                        $('#img').attr('src', fileReader.result)
                    }
                    fileReader.readAsDataURL(file)
                })
            })
        </script>
        <!-- Fim miniatura -->
        
        <!--Validações cadastro imóvel-->
        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "campovazio") {
                    echo "<p> Preencha todos os campos. </p>";
                } else if ($_GET["error"] == "falha") {
                    echo "<p> Um erro inesperado aconteceu. Tente novamente </p>";
                } else if ($_GET["error"] == "none") {
                    echo "<p> Anúncio cadastrado! </p>";
                } 
            }
        ?>
    </section>
    <footer></footer> 
</body>
</html>