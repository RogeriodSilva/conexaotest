<?php

session_start();

require_once('./config/Conexao.php');
require_once('./model/Instances.php');

$DAO = new DAO();

if(!$DAO->checkLogin()){
    header("Location: ./views/user/login");
}


foreach($DAO->getUser() as $DATA){
    if($DATA->getValue('nome') == 'Admin'){
        
        header('Location: ./views/user/index/admin.php');

        break;
    }

    header('Location: ./views/user/index/usuario.php');
}

?>

<!--  -->