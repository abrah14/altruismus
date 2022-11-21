<?php

    // header('Location: doador-restrita.php');
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
    $imagem = $_FILES['imagem'];

    if(isset($imagem)){

        $extensao = strtolower(substr($_FILES['imagem']['name'], -4)); //pega a extensao do arquivo
        $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
        $diretorio = "../restrict/foto-perfil-doador/"; //define o diretorio para onde enviaremos o arquivo
    
        move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novo_nome); //efetua o upload    
      }

    $doador->alterar($linha, $nome, $email, $cpf, $dtNasc, $cidade, 
                        $estado, $bairro, $rua, $cep, $comp, $logradouro,
                        $senha, $imagem);

?>