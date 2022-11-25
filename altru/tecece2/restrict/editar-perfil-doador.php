<?php

    header('Location: perfil-doador.php');
    require_once('../model/Doador.php');

    session_start();
    $doador = new Doador();
    $getDoador = $doador->getDoador($_SESSION['iddoador']);

    $nome = $_POST['nomeEditar'];
    $linha = $_SESSION['iddoador'];
    $email = $_POST['emailEditar'];
    $cpf = $_POST['cpfEditar'];
    $dtNasc = $_POST['dtNasc'];
    $cidade = $_POST['cidadeEditar']; 
    $estado = $_POST['estadoEditar'];
    $bairro = $_POST['bairroEditar'];
    $rua = $_POST['ruaEditar'];
    $cep = $_POST['cepEditar'];
    $comp = $_POST['complementoEditar'];
    $logradouro = $_POST['logradouroEditar'];

    $imagem = $_FILES['imagem'];

    if(isset($_POST['senhaEditar']) && !empty($_POST['senhaEditar'])) {
        $senha = $_POST['senhaEditar'];
        $senha = md5($senha);
    }
    else {
        $senha =  $getDoador['senhadoador'];
    }

    $novo_nome = "";

    if(isset($_FILES['imagem']) && $imagem['size'] != 0){

        $extensao = strtolower(substr($_FILES['imagem']['name'], -4)); //pega a extensao do arquivo
        $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
        $diretorio = "./foto-perfil-doador/"; //define o diretorio para onde enviaremos o arquivo
    
        move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novo_nome); //efetua o upload
    }


    $doador->alterar($linha, $nome, $email, $cpf, $dtNasc, $cidade, 
                        $estado, $bairro, $rua, $cep, $comp, $logradouro,
                        $senha,$novo_nome);

?>