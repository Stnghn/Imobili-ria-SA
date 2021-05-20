<?php 
    session_start();
    if (empty($_SESSION['usuario'])) {
        return header('location: index.php');
    }
    include('../db_connect.php');

    if (isset($_POST['salvar'])) {

        if (isset($_FILES['imagem'])) {
            date_default_timezone_set("Brazil/East"); //Timezone padrão pro nome
        
            $ext = strtolower(substr($_FILES['imagem']['name'], -4)); //Colocando tudo em minusculo e cortando 4  (Pegando extensão do arquivo)
        
            $new_name = date("Y.m.d-H.i.s") . $ext; //Define nome pro arquivo
        
            $dir = '../dist/upload/'; //Diretório para uploads
        
            move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name); //Faz upload do arquivo
        }

        $id= $_POST['id'];
        $titulo = $_POST['ntitulo'];
        $desc = $_POST['ndesc'];
        $tipon = $_POST['tipon'];
        $preco = $_POST['npreco'];
        $imagem = $new_name;

        $query = "UPDATE tb_anuncio SET `titulo`='$titulo', `descricao`='$desc', `imagem`='$imagem', `tiponegocio`='$tipon',`preço`='$preco' WHERE idanuncio='$id'";

        $result= mysqli_query($conn, $query);                      
           
        header('location: ../perfil.php?=atualizado');
        
    }