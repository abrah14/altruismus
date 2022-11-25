<?php
    header("../restrict/prestacao-restrita.php");
    
    require_once("../model/PrestacaoContasOng.php");
    require_once("../model/Ong.php");

    $prestacaoContasOng = new PrestacaoContasOng();
    $ong = new Ong();

    $prestacaoContasOng->setQuantidadeItensRecebido($_POST['txtQuantidadeItensRecebido']);
    $prestacaoContasOng->setDescProdutosRecebidos($_POST['txtDescProdutosRecebidos']);
    $prestacaoContasOng->setDataRecebimento($_POST['txtDataRecebimento']);
    

    $ong->setIdOng($_POST['ong']);
    $prestacaoContasOng->setIdOng($ong);

    $foto = $_FILES['txtFotoDoador'];


          if(strlen($foto['name']) > 0 && strlen($foto['type']) > 0){

              //- - - | IF PARA VER SE O ARQUIVO DEU ERRO |- - -//
              if($foto['error']){
                  die("error");
              }

              $nomeArquivo = $foto['name'];

              //Colocando o nome da foto aleatória para não dar conflito no BD & pegando a extensão do arquivo//
              $nomeId = uniqid();
              $ext = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
              $path = "img/" . $nomeId . "." . $ext;

              move_uploaded_file($foto['tmp_name'], '../../tecece2/'.$path);

              $prestacaoContasOng->setFotoDoador($path);

          }else{

              $rand = rand(1, 6);
              $path = "img/($rand).png";
              $prestacaoContasOng->setFotoDoador($path);

          }


          $foto2 = $_FILES['txtFotoOng'];


          if(strlen($foto2['name']) > 0 && strlen($foto2['type']) > 0){

              //- - - | IF PARA VER SE O ARQUIVO DEU ERRO |- - -//
              if($foto2['error']){
                  die("error");
              }

              $nomeArquivo = $foto2['name'];

              //Colocando o nome da foto aleatória para não dar conflito no BD & pegando a extensão do arquivo//
              $nomeId = uniqid();
              $ext = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
              $path = "img/" . $nomeId . "." . $ext;

              move_uploaded_file($foto2['tmp_name'], '../../tecece2/'.$path);

              $prestacaoContasOng->setFotoOng($path);

          }else{

              $rand = rand(1, 6);
              $path = "img/($rand).png";
              $prestacaoContasOng->setFotoOng($path);

          }      

    $prestacaoContasOng->cadastrar($prestacaoContasOng);

    //echo("Paciente ". $paciente->getNomePaciente() ." cadastrado com sucesso");

?>