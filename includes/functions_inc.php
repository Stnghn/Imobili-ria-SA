<?php

/*
    Se os campos abaixo estiverem vazios, o result é true e gera um erro
*/

function emptyInputCadastro($email, $nome, $senha, $repsenha, $telefone){
    $result;
    if (empty($email) || empty($nome) || empty($senha) || empty($repsenha) || empty($telefone)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

/*
    A função preg_match faz uma busca nos parâmetros dentro do colchetes
    Se os caracteres do nome estão incluídos ali dentro, tá tudo certo
*/
function invalidoNome($nome){
    $result;
    if (!preg_match("/^[a-zA-Z\s]*$/", $nome)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidoEmail($email){
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function senhaConfere($senha, $repsenha){
    $result;
    if ($senha !== $repsenha) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function nomeExistente($conn, $email){
    $sql = "SELECT * FROM tb_user WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../cadastro.php?error=stmtfailed");
        exit();
    }

    //A quantidade de S muda se for mais de 1 parametro

    /*
        Tanto pra conferencia de email no cadastro
        quanto pra conferir dado no login
    */

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);

}

function criarUsuario($conn, $email, $nome, $senha, $telefone){
    $sql = "INSERT INTO tb_user (email, nome, senha, telefone) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../cadastro.php?error=stmtfailed");
        exit();
    }

    //Faz um hash onde a senha é substituida no banco por um monte de numero aleatorio
    //$hashedSenha = password_hash($senha, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $email, $nome, $senha, $telefone);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../cadastro.php?error=none");
    exit();

}

/* FUNÇÃO INSERT */

function emptyInsert($titulo, $desc, $data){
    $result;
    if (empty($titulo) || empty($desc) || empty($data)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

/* FUNÇÕES ALTERAR */

function emptyAlterar($nome, $telefone, $email){
    if (empty($nome) || empty($telefone) || empty($email) ) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}



/* FUNÇÕES LOGIN */
/*
function emptyInputLogin($username, $senha){
    $result;
    if (empty($username) || empty($senha)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
} 

function loginUser($conn, $email, $senha){

    //Verifica se o email existe
    $uidExists = nomeExistente($conn, $email); 

    if ($uidExists === false) {
        header("location: ../login.php?error=emailerrado");
        exit();
    }
 
    $senhaHashed = $uidExists["senha"];
    $checkPwd = password_verify($senha, $senhaHashed);
    

    if ($checkPwd === false) {
        header("location: ../login.php?error=senhaerrada");
        exit();
    } else if ($checkPwd === true) {
        header("location: ../login.php?error=LOGOU");
        exit();
    } 

  
}

*/