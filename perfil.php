<?php
session_start();
    if (empty($_SESSION['usuario'])) {
        return header('location: index.php');
    }
include('db_connect.php');
?>

<!DOCTYPE html>
<html lang="en">
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="dist/css/style4.css">
    <!-- Fim estilo -->
    <title>Perfil | Imobiliária SA</title>
</head>

<body>

    <header>

    </header>

    <div>
        <h1>Perfil de usuário</h1>
    </div>

    <?php
        $sql = "SELECT * FROM tb_anuncio a INNER JOIN tb_user u ON u.iduser = a.id_autor";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
    ?>

    <section>
        <!-- Informações usuário -->
        <div id="area-info-usuario">
            <h4>Dados Pessoais</h4>
            <div id="dados-pessoais">
                <div id="nome">
                    <h6>Nome: <?= $row['nome'] ?></h6> 
                </div> 
                <div id="email">
                    <h6>Email: <?= $row['email'] ?></h6> 
                </div>
                <div id="fone">
                    <h6>Telefone: <?= $row['telefone'] ?></h6> 
                </div>

                <!--Início Modal Alterar dados do usuário-->
                    <!-- Botão Alterar -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Alterar
                    </button>
                    <!-- Modal Alterar dados do usuário -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form action="includes/alterar_inc.php" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" name="novonome" class="form-control" value="<?= $row['nome'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="novoemail" class="form-control" value="<?= $row['email'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="novofone" class="form-control" value="<?= $row['telefone'] ?>">
                                        </div>
                                    </div>
                                
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary" name="salvar">Salvar mudanças</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <!--Fim Modal Dados Usuários-->   
            </div> 
            <!--Fim dados pessoais -->

            <!--Início postagens user -->
            <div id="area-postagens-usuario">
                <h4>Seus anúncios</h4>  

                    <div id="postagens">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Título</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Preço</th>
                                    <th scope="col">Gereciar</th>
                                </tr>
                            </thead>
                            <?php 
                                $sql = "SELECT * FROM tb_anuncio a INNER JOIN tb_user u ON u.iduser = a.id_autor WHERE id_autor='{$_SESSION['iduser']}'";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($result)) { ?>                                     
                                <tbody>
                                    <tr>
                                        <td><?= strtoupper($row['titulo'])?></td>
                                        <td><?= $row['descricao'] ?></td>
                                        <td><?= date('d/m/Y', strtotime($row['data'])) ?></td>
                                        <td><?= $row['tiponegocio'] ?></td>
                                        <td><?= number_format($row['preço'], 2,",","." )  ?></td>
                                        <td><a class="btn btn-primary editbtn" data-toggle="modal" data-target="#myModal<?php echo $row['idanuncio']?>">Editar</a>
                                        <a class="btn btn-danger deletebtn" data-toggle="modal" data-target="#Excluir<?php echo $row['idanuncio']?>">Excluir</a>
                                        </td>
                                    </tr>
                                </tbody>

                                <!-- Início modal editar anuncios -->
                                <div id="myModal<?php echo $row['idanuncio']?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form role="form" method="post" action="includes/alterar_anunc.php" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <input id="id" class="form-control" value=" <?php echo $row['idanuncio']; ?> " name="id" type="hidden">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="ntitulo" id="ntitulo" value="<?php echo $row['titulo'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="ndesc" id="ndesc" value="<?php echo $row['descricao'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="npreco" id="npreco" value="<?php echo $row['preço'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="vender">Venda</label><input type="radio" name="tipon" value="venda" checked>
                                                        <label for="vender">Aluguel</label><input type="radio" name="tipon" value="aluguel">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="file" name="imagem" id="insertimg">
                                                        <img id="img" style="width:150px; heigth:150px;">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" name="salvar" >Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fim modal editar anuncios -->

                                <!--Início Modal Excluir -->
                                <div class="modal fade" id="Excluir<?php echo $row['idanuncio']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form role="form" method="post" action="includes/excluir_anunc.php" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input id="id" class="form-control" value=" <?php echo $row['idanuncio']; ?> " name="id" type="hidden">
                                                    </div>
                                                    <span>Deseja realmente excluir?</span>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                                                    <button type="submit" class="btn btn-primary">Sim</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fim Modal Excluir -->
                            <?php } ?>
                        </table>
                    </div>
                <!-- H4 --> 
            </div> <!--Fim postagens user -->      
        </div> <!--Fim area user -->        
    </section>
    <footer>
    
    </footer>
    <!-- Scripts 4.6, deram certo -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    
   <script>
    $(document).ready(function(){
            $('.editbtn').on('click', function(){
                $('#myModal').modal('show');
                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function(){
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#ntitulo').val(data[0]);
                    $('#ndesc').val(data[1]);
                    $('#npreco').val(data[4]);
            });
        });
    </script>

    <!-- Miniatura -->  
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
</body>
</html>