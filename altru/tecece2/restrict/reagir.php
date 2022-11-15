<?php

    require_once("../model/Reacao.php");
    require_once("../model/Conexao.php");
    date_default_timezone_set('America/Sao_Paulo');

    $reacao = new Reacao();
    $conexao = Conexao::conectar();

    if($reacao->verificar($_POST['idpost'],$_POST['tipoperfil'],$_POST['idperfil']) == "curtiu") {
        $reacao->deletar($_POST['idpost'],$_POST['idperfil'],$_POST['tipoperfil']);
    }else {
        $data = [
            'tipo' => $_POST['tipo'],
            'tipoperfil' => $_POST['tipoperfil'],
            'idperfil' => $_POST['idperfil'],
            'idpost' => $_POST['idpost'],
            'datacurtida' => $dataCurtida = date('Y-m-d H:i:s')
        ];
    
        $stmt = $conexao->prepare("INSERT INTO tbreacao(tiporeacao,datareacao,idpost,idperfil,tipoperfil) VALUES(:tipo, :datacurtida, :idpost, :idperfil, :tipoperfil)");
    
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