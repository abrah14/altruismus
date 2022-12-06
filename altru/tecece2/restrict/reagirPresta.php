<?php

    require_once("../model/ReacaoPrestacao.php");
    require_once("../model/Conexao.php");
    date_default_timezone_set('America/Sao_Paulo');

    $conexao = Conexao::conectar();
    $reacao = new ReacaoPrestacao();

    $data = [
        'idperfil' => $_POST['idperfil'],
        'typeperfil' => $_POST['typeperfil'],
        'idprestacao' => $_POST['idprestacao'],
        'tiporeacao' => $_POST['tiporeacao']
    ];

    if($reacao->verificar($_POST['idprestacao'],$_POST['typeperfil'],$_POST['idperfil']) == "curtiu") {

        $reacao->deletar($_POST['idprestacao'],$_POST['idperfil'],$_POST['typeperfil']);
        // $stmt = $conexao->prepare("DELETE FROM tbreacaoprestacao WHERE idperfil = :idperfil AND tipoperfil = :typeperfil AND idprestacaocontasong = :idprestacao");

        // try{
        //     $conexao->beginTransaction();
        //     $stmt->execute($data);
        //     $conexao->commit();
        // }catch (Exception $e) {
        //     $conexao->rollBack();
        //     throw $e;
        // }

    }else {
        $stmt = $conexao->prepare("INSERT INTO tbreacaoprestacao(tiporeacao,idprestacaocontasong,idperfil,tipoperfil) VALUES(:tiporeacao,:idprestacao,:idperfil,:typeperfil)");
    
        try{
            $conexao->beginTransaction();
            $stmt->execute($data);
            $conexao->commit();
        }catch (Exception $e) {
            $conexao->rollBack();
            throw $e;
        }
    }



?>