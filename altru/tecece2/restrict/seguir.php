<?php

    header("Location: ./social-doador.php");
    session_start();

    require_once("../model/Seguindo.php");
    require_once("../model/Ong.php");
    
    $seguindo = new Seguindo();
    $ong = new Ong();

    $idDoador = $_SESSION['iddoador'];
    $idOng = $_POST['ong'];
    $_SESSION['idOngListar'] = $idOng;

    if(isset($_SESSION['seguindo']) == true) {
        $seguindo->deletar($idDoador,$idOng);
        unset($_SESSION['seguindo']);
    }
    else {
        $seguindo->setIdDoador($idDoador);
        $seguindo->setIdOng($idOng);
    
        $seguindo->seguir($seguindo);
    
        $_SESSION['seguindo'] = true;

    }


?>