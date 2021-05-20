<?php
if(!isset($_SESSION)){
    session_start();
}

include('../db_connect.php');

    $id= $_POST['id'];

    $query = "DELETE FROM `tb_anuncio` WHERE idanuncio='$id'";

    $result= mysqli_query($conn, $query);                      
           
header('location: ../perfil.php?=atualizado');