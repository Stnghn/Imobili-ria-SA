<?php
    if(!isset($_SESSION)){
        session_start();
    }
    include('db_connect.php');
    include('includes/functions_inc.php');
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
    <link rel="stylesheet" type="text/css" href="dist/css/style3.css">
    <!-- Fim -->
    <title> Anúncio | Imobiliária SA</title>
</head>

<body>
    <header>
        
    </header>
        <!-- Pegar id para mostrar o anúncio ao clicar na tela -->
        <?php
             $sql = "SELECT * FROM tb_anuncio a INNER JOIN tb_user u ON u.iduser = a.id_autor WHERE idanuncio=$_GET[id]";
             $result = mysqli_query($conn, $sql);
             $row = mysqli_fetch_array($result);
            
             $telefone = $row['telefone'];
        ?>
        <!-- Fim id anúncio -->

        <section>
            <!-- Início area anuncio -->
            <div id="area-anuncio">
                <div class="titulo">
                    <h4><?= $row['titulo'] ?></h4>
                </div>

                <div class="divimg">
                    <img src="dist/upload/<?= $row['imagem'] ?>">
                </div>

                <div id="desc">
                    <div class="txt-desc">
                        <?= $row['descricao'] ?>
                    </div>
                </div>
                    
                <div id="infos">
                    <div class="preco">
                        <h2>R$ <?= number_format($row['preço'], 2,",","." )  ?></h2>
                    </div>

                     <div class="datapost">
                        <h5>Em: <?= date('d/m/Y', strtotime($row['data'])) ?> </h5>
                    </div>

                    <div class="autor">
                        <h5>Por: <?= $row['nome'] ?></h5>
                    </div>

                    <div id="contato">
                        <span>Entre em contato com o anunciante:</span>

                        <div class="fone">
                            <h6>Telefone:</h6>
                            <h6> <?= $row['telefone'] ?> </h6>
                        </div>

                        <div class="email">
                            <h6>Email:</h6>
                            <h6><?= $row['email'] ?></h6>
                        </div>
                    </div>

                    <div id="mapa">
                        <div class="app-mapa">
                            <h6>Encontre o endereço aqui!</h6>
                            <div class="google-maps">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14283.416185398677!2d-49.0918268!3d-26.49264385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1620166797968!5m2!1spt-BR!2sbr" width="300" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fim área anuncio -->
        </section>
    <footer></footer>
</body>
</html>