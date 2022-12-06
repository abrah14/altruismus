<?php
    header("Location: ../restrict/doacao-restrita.php");
    
    require_once("../model/Ong.php");
    require_once("../model/Doacao.php");
    require_once("../model/ItensDoacao.php");
    date_default_timezone_set('America/Sao_Paulo');

    $ong = new Ong();
    $doacao = new Doacao();
    $itens = new ItensDoacao();

    $dataDoacao = date('Y-m-d');

    $doacao->setDataDoacao($_POST['txtDataDoacao']);
    $ong->setIdOng($_POST['ong']);
    $doacao->setOng($ong);
    $doacao->setDataDoacao($dataDoacao);


    $doacao->cadastrar($doacao);

?>