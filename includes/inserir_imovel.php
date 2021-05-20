<?php
if(!isset($_SESSION)){
    session_start();
}
include('../db_connect.php');
include('functions_inc.php');

if (isset($_FILES['imagem'])) {
    date_default_timezone_set("Brazil/East"); //Timezone padrão pro nome

    $ext = strtolower(substr($_FILES['imagem']['name'], -4)); //Colocando tudo em minusculo e cortando 4  (Pegando extensão do arquivo)

    $new_name = date("Y.m.d-H.i.s") . $ext; //Define nome pro arquivo

    $dir = '../dist/upload/'; //Diretório para uploads

    move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name); //Faz upload do arquivo
}

$titulo = $_POST['titulo'];
$desc = $_POST['desc'];
$data = $_POST['data'];
$tipon = $_POST['tiponegociacao'];
$preco = $_POST['preco'];
$imagem = $new_name;

if (emptyInsert($titulo, $desc, $data) !== false) {
    header("location: ../novoimovel.php?error=campovazio");
    exit(); 
}

$sql = "INSERT INTO tb_anuncio (`titulo`, `descricao`, `data`, `imagem`, `tiponegocio`, `preço`, `id_autor`) VALUES ('$titulo', '$desc', '$data', '$imagem', '$tipon', '$preco', '{$_SESSION['iduser']}')";
if (mysqli_query($conn, $sql)) {
    header("location: ../novoimovel.php?error=none");
    exit();
} else {
    header("location: ../novoimovel.php?error=falha");
    exit();
}

mysqli_close($conn);


