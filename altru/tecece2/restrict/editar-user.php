<?php

    header('Location: doador-restrita.php');
    require_once('../model/Doador.php');

    $doador = new Doador();

    $nome = $_POST['nomeEditar'];
    $linha = $_POST['linha'];
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
    $senha = $_POST['senhaEditar'];

    $doador->alterar($linha, $nome, $email, $cpf, $dtNasc, $cidade, 
                        $estado, $bairro, $rua, $cep, $comp, $logradouro,
                        $senha);

?>