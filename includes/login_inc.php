<?php
if(!isset($_SESSION)){
    session_start();
}
include('../db_connect.php');

//Verifica se os campos nao estao vazios
//Eu poderia usar a função de cadastro vazia, ia ficar melhor mas tem q trocar todas as variáveis de login de usuario pra email
/*
    if (emptyInputLogin($username, $senha) !== false) {
        header('Location: ../login.php?error=campovazio');
        exit();
    }*/


if (empty($_POST['login']) || empty($_POST['senha'])) {
    header('Location: ../login.php?error=campovazio');
    exit();
}

//Protege contra ataques de mysql injection
$usuario = mysqli_real_escape_string($conn, $_POST['login']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);

$query = "SELECT iduser, email FROM `tb_user` WHERE email = '{$usuario}' AND senha = '{$senha}'";
//echo $query;exit;

//Passa como parametro a conexao e a query
$result = mysqli_query($conn, $query);

//Passa a quantidade de linhas retornada pela query result
$row = mysqli_num_rows($result);

if ($row == 1) {

    $bd = $query = "SELECT iduser, nome, telefone FROM `tb_user` WHERE email = '{$usuario}' AND senha = '{$senha}'";
    $resp = mysqli_query($conn, $bd);
    $linha = mysqli_fetch_assoc($resp);

    //$userid = $linha['iduser'];
    $_SESSION['iduser'] = $linha['iduser'];
    $_SESSION['nome'] = $linha['nome'];
    $_SESSION['fone'] = $linha['telefone'];
    $_SESSION['usuario'] = $usuario;
    header('Location: ../index.php');
    exit();
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: ../login.php?error=logininvalido');
    exit();
}