<?php

    session_start();

    if(isset($_SESSION['idong'])) {
        header("Location: ./tela-comentario.php");
    } else {
        header("Location: ./tela-comentario-doador.php");
    }
    require_once("../model/Comentario.php");

    session_start();
    date_default_timezone_set('America/Sao_Paulo');

    $comentario = new Comentario();

    $msg = $_POST['txtComentario'];
    $idPost = $_POST['idPost'];
    $doador = $_SESSION['iddoador'];
    $data = date('Y/m/d H:i:s');

    $comentario->setComentario($msg);
    $comentario->setIdPost($idPost);
    $comentario->setIdDoador($doador);
    $comentario->setDtComentario($data);

    $comentario->comentar($comentario);

?>