<?php

    require_once("../model/ReacaoComent.php");
    require_once("../model/Conexao.php");
    date_default_timezone_set('America/Sao_Paulo');

    $reacao = new ReacaoComent();
    $conexao = Conexao::conectar();

    $data = [
        'idperfil' => $_POST['idperfil'],
        'typeperfil' => $_POST['typeperfil'],
        'idcomentario' => $_POST['idcomentario']
    ];

    if($reacao->verificar($_POST['idcomentario'],$_POST['idperfil'],$_POST['typeperfil']) == "curtiuComentario") {

        $stmt = $conexao->prepare("DELETE FROM tbreacaocoment WHERE idperfilcurtiu = :idperfil AND tipoperfil = :typeperfil AND idcomentario = :idcomentario");

        try{
            $conexao->beginTransaction();
            $stmt->execute($data);
            $conexao->commit();
        }catch (Exception $e) {
            $conexao->rollBack();
            throw $e;
        }

    }else {
        $stmt = $conexao->prepare("INSERT INTO tbreacaocoment(idperfilcurtiu,tipoperfil,idcomentario) VALUES(:idperfil, :typeperfil, :idcomentario)");
    
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