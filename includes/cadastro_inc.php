<?php

if (isset($_POST["submit"])) {

    $email = $_POST["emailcad"];
    $nome = $_POST["nomecad"];
    $senha = $_POST["senhacad"];
    $repsenha = $_POST["repsenha"];
    $telefone = $_POST["fone"];
    

    /*
        Requires para o conector e para a tela de funções. As funções vao analisar possíveis erros
    */

    //require_once '../db_connect.php';
    //require_once 'functions_inc.php';
    include('../db_connect.php');
    include('functions_inc.php');

    /*
        Verifica se algum dos campos está vazio.
        SE qualquer coisa for DIFERENTE de FALSO, ele leva de volta pra tela de cadastro com um erro
        e PARA de rodar o codigo
    */
    if (emptyInputCadastro($email, $nome, $senha, $repsenha, $telefone) !== false) {
        header("location: ../cadastro.php?error=campovazio");
        exit();
    }

    if (invalidoNome($nome) !== false) {
        header("location: ../cadastro.php?error=nomeinvalido");
        exit();
    }

    if (invalidoEmail($email) !== false) {
        header("location: ../cadastro.php?error=emailinvalido");
        exit();
    }

    if (senhaConfere($senha, $repsenha) !== false) {
        header("location: ../cadastro.php?error=errosenha");
        exit();
    }

    if (nomeExistente($conn, $email) !== false) {
        header("location: ../cadastro.php?error=emailexistente");
        exit();
    }

    criarUsuario($conn, $email, $nome, $senha, $telefone);


} else {
    header("location: ../cadastro.php");
    exit();
}