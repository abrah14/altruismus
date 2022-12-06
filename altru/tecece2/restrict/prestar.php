<?php

    header("Location: ../restrita/cadastra-postPrestacao.php");
    session_start();
    require_once("../model/PrestacaoContasOng.php");
    require_once("../model/PostPrestacao.php");

    $prestacaoContasOng = new PrestacaoContasOng();
    $postPrestacao = new PostPrestacao();
    
    $qtdItens = $_POST['txtqtdItens'];
    $msg = $_POST['txtprod'];
    $data = $_POST['txtDtDoacao'];
    $idOng = $_SESSION['idong'];
    $data = date('Y-m-d H:i:s');

    $_SESSION['mensagem'] = $_POST['txtmsg'];


    if(isset($_FILES['imagem'])){

        $extensao = strtolower(substr($_FILES['imagem']['name'], -4)); //pega a extensao do arquivo
        $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
        $diretorio = "social-img/"; //define o diretorio para onde enviaremos o arquivo
    
        move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novo_nome); //efetua o upload
    
        $prestacaoContasOng->setFotoOng($novo_nome);
        
    }

    var_dump($_FILES['imagem2']);

    if(isset($_FILES['imagem2'])){

        $extensao = strtolower(substr($_FILES['imagem2']['name'], -4)); //pega a extensao do arquivo
        $novo_nome = md5($extensao); //define o nome do arquivo
        $diretorio = "social-img/"; //define o diretorio para onde enviaremos o arquivo
    
        move_uploaded_file($_FILES['imagem2']['tmp_name'], $diretorio.$novo_nome); //efetua o upload
    
        $prestacaoContasOng->setFotoDoador($novo_nome);
        
    }

    $prestacaoContasOng->setDtPostagem($data);
    $prestacaoContasOng->setDescProdutosRecebidos($msg);
    $prestacaoContasOng->setDataRecebimento($data);
    $prestacaoContasOng->setIdOng($idOng);
    $prestacaoContasOng->setQuantidadeItensRecebido($qtdItens);
    
    $prestacaoContasOng->cadastrar($prestacaoContasOng);

?>