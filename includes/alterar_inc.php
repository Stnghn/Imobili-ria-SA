<?php
if(!isset($_SESSION)){
    session_start();
}

include('../db_connect.php');

    if (isset($_POST['salvar'])) {

        $novonome = $_POST['novonome'];
        $novoemail = $_POST['novoemail'];
        $novofone = $_POST['novofone'];

        $query = "UPDATE tb_user SET nome='$novonome' WHERE iduser='{$_SESSION['iduser']}'";

        $result= mysqli_query($conn, $query);                      
           
        header('location: ../perfil.php?=atualizado');
        
    }
?>