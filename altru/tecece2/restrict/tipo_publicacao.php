<?php

    include_once("../model/Conexao.php");

    if(empty($_SESSION['iddoador'])) {
        session_start();
        $seguidor = $_SESSION['iddoador'];
    }

    $conexao = Conexao::conectar();
    $tipo_publicacao = $_REQUEST['tipo_publicacao'];
    
    if($tipo_publicacao == 1) {
        $query = 
            "SELECT 
                tbpost.idpost,msgpost,dtpost,imagempost,nomeong,
                tbong.idong,fotoong
            FROM tbpost
            INNER JOIN tbong
                ON tbong.idong = tbpost.idong
                INNER JOIN tbseguindo
                    ON tbseguindo.idong = tbong.idOng
            WHERE tbseguindo.iddoador = $seguidor 
                AND tbpost.atividade <> 0 AND tbpost.atividade <> 0
            ORDER BY dtpost";
    }
    else if($tipo_publicacao == 2) {
        $query = 
            "SELECT 
                tbprestacaocontasong.idong,quantidadeitensrecebido,
                descprodutosrecebidos,fotodoador,datarecebimento,
                tbong.fotoong,tbong.nomeong,tbprestacaocontasong.fotoong
            FROM tbprestacaocontasong
            INNER JOIN tbong 
                ON tbong.idong = tbprestacaocontasong.idong
                INNER JOIN tbseguindo
                    ON tbseguindo.idong = tbong.idong
            WHERE tbseguindo.iddoador = $seguidor 
            AND tbpost.atividade <> 0
            AND tbong.atividade <> 0
            ORDER BY datarecebimento";
    }
    

    $resultado = $conexao->query($query);

    while($linha_publicacao = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $resulta[] = array(
            'idong' => $linha_publicacao['idong'],
            'msgpost' => $linha_publicacao['msgpost'],
            'imagempost' => $linha_publicacao['imagempost'],
        );
    }

    echo(json_encode($resulta));

?>