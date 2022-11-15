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

    if(isset($_POST['senhaEditar']) && !empty($_POST['senhaEditar'])) {
        $senha = $_POST['senhaEditar'];
        $senha = md5($senha);
    }
    else {
        $senha =  $getDoador['senhadoador'];
    }
    
    $doador->alterar($linha, $nome, $email, $cpf, $dtNasc, $cidade, 
                        $estado, $bairro, $rua, $cep, $comp, $logradouro,
                        $senha);

?>