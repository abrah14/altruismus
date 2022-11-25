<?php

    header('Location: ./perfil.php');
    require_once('../model/Ong.php');

    session_start();
    $ong = new Ong();
    $getOng = $ong->getOng($_SESSION['idong']);

    $nome = $_POST['nomeEditar'];
    $linha = $_SESSION['idong'];
    $email = $_POST['emailEditar'];
    $dtNasc = $_POST['dtNasc'];
    $cidade = $_POST['cidadeEditar']; 
    $estado = $_POST['estadoEditar'];
    $bairro = $_POST['bairroEditar'];
    $rua = $_POST['ruaEditar'];
    $cep = $_POST['cepEditar'];
    $comp = $_POST['complementoEditar'];
    $logradouro = $_POST['logradouroEditar'];
    $novo_nome = "";
    $imagem = $_FILES['imagem'];

    if(isset($_POST['senhaOng']) && !empty($_POST['senhaOng'])) {
        $senha = $_POST['senhaOng'];
        $senha = md5($senha);
    }
    else {
        $senha =  $getOng['senhaong'];
    }

    if(isset($_FILES['imagem']) && $imagem['size'] != 0){

        $extensao = strtolower(substr($_FILES['imagem']['name'], -4)); //pega a extensao do arquivo
        $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
        $diretorio = "./foto-perfil-ong/"; //define o diretorio para onde enviaremos o arquivo
    
        move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novo_nome); //efetua o upload
    }


    $ong->alterar($linha, $nome, $email, $dtNasc, $cidade, 
                        $estado, $bairro, $rua, $cep, $comp, $logradouro,
                        $senha,$novo_nome);

?>