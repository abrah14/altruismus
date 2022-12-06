<?php
    header("Location: ../restrict/perfil.php");
    
    session_start();

    require_once("../model/PostPrestacao.php");
    require_once("../model/PrestacaoContasOng.php");
    date_default_timezone_set('America/Sao_Paulo');

    $prestacaoContasOng = new PrestacaoContasOng();
    $postPrestacao = new PostPrestacao();

    $data = date('Y-m-d H:i:s');
    $id = 7;

    $postPrestacao->setDescPostPrestacao($_SESSION['mensagem']);
    $postPrestacao->setDtPostPrestacao($data);
    $postPrestacao->setIdPrestacaoContasOng($id);
    $postPrestacao->cadastrar($postPrestacao);

?>