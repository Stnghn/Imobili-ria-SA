<?php

/*
    Dica: Se tiver mais linhas abaixo da tag de fechamento do PHP, em páginas onde é usado puramente o PHP (tipo essa), pode dar erro no site
    Então é melhor não fehar a tag! 
*/

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "mydb";

$conn = mysqli_connect($servername, $username, $password, $db_name);

if (!$conn) {
    die("Conexão falhou: " .mysqli_connect_error());
}


