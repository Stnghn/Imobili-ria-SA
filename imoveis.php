<?php
    if(!isset($_SESSION)){
        session_start();
    }
    include('db_connect.php');
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
    <link rel="stylesheet" type="text/css" href="dist/css/estilo_imov.css">
    <!-- Fim -->
    <title>Imóveis | Imobiliária SA</title>
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
        <div id="redondo">
            <h1 class="menu-bar2">Navegue pelas ofertas postadas</h1>
        </div>   
            <?php
                $query = "SELECT * FROM tb_anuncio a INNER JOIN tb_user u ON u.iduser = a.id_autor";
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_array($result)) { ?>

                <!-- Corpo da área dos anúncios-->
                    <a href="pag_imovel.php?id=<?php echo $row['idanuncio'] ?>">
                        <div id="area-postagem">
                            <div id="imagem">
                                <img src="dist/upload/<?= $row['imagem']?>" style="width:150px; heigth:150px;">
                            </div>

                            <div id="titulo">
                                <h4> <?= strtoupper($row['titulo'])?> </h4>
                            </div>

                            <div id="preco">
                                <h4> R$ <?= number_format($row['preço'], 2,",","." )  ?></h4>
                            </div>

                            <div id="autor">
                                    <h6>Postado por: <?= strtoupper($row['nome']) ?></h6> 
                            </div>

                            <div id="data">
                                <h6><?= date('d/m/Y', strtotime($row['data'])) ?></h6> 
                            </div>
                        </div> 
                    </a>
            <!-- Fim anúncios -->
            
        <?php }?>
    </section>
    <footer></footer>
</body>
</html>