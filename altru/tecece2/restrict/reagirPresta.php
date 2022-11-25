<?php

use FontLib\Table\Type\head;

    session_start();

    if($_SESSION['explorar-doador'] == true) {
        header("Location: explorar-doador.php");
    } else if($_SESSION['explorar'] == true) {
        header("Location: explorar.php");
    } else if($_SESSION['social2.php'] == true) {
        header("Location: social2.php");
    } else if($_SESSION['social'] == true) {
        header("Location: social.php");
    } else if($_SESSION['social-doador'] == true) {
        header("Location: social-doador.php");
    }

    
    session_start();
    require_once("../model/ReacaoPrestacao.php");

    $reacaoPresta = new ReacaoPrestacao();

    $tipo = "curtida";
    $idPresta = $_POST['idPrestacao'];

    if(isset($_SESSION['iddoador'])) {
        $idPerfil = $_SESSION['iddoador'];
        $tipoPerfil = "doador";
    }
    else if(isset($_SESSION['idong'])) {
        $idPerfil = $_SESSION['idong'];
        $tipoPerfil = "ong";
    }

    if($reacaoPresta->verificar($idPresta,$tipoPerfil,$idPerfil) == "curtiu") {
        $reacaoPresta->deletar($idPresta,$idPerfil,$tipoPerfil);
    }
    else {
        $reacaoPresta->setTipoReacao($tipo);
        $reacaoPresta->setIdPrestacaoContasOng($idPresta);
        $reacaoPresta->setIdPost(1);
    
        $reacaoPresta->setTipoPerfil($tipoPerfil);
        $reacaoPresta->setIdPerfil($idPerfil);
    
        $reacaoPresta->reagirPresta($reacaoPresta);
    }


?>