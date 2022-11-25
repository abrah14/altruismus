<?php

  header("Location: cadastra-telefonedoador.php");
  require_once("../model/Doador.php");
  require_once("../model/TelefoneDoador.php");

  session_start();

  $cidadeDoador = $_POST['txtCidadeDoador'];
  $bairroDoador = $_POST['txtBairroDoador'];
  $complementoDoador = $_POST['txtComplementoDoador'];

  $estadoDoador = $_POST['txtEstadoDoador'];

  echo($estadoDoador);


  $ruaDoador = $_POST['txtRuaDoador'];
  $cepDoador = $_POST['txtCepDoador'];


  $nomeDoador = $_POST['txtNomeDoador'];
  $lugradouroDoador = $_POST['txtLugradouroDoador'];
  $dataNascDoador = $_POST['txtDataNascDoador'];
  $emailDoador = $_POST['txtEmailDoador'];
  $senhaDoador = $_POST['txtSenhaDoador'];
  $cpfDoador = $_POST['txtCpfDoador'];
  // $dataInscricao = date('Y-m-d H:i:s');
  $dataInscricao = date('Y-m-d');

  $_SESSION['telefone'] = $_POST['txtTelDoador'];

  $doador = new Doador();
  $telefone = new TelefoneDoador();

  $email = $_SESSION['email-session'];


  $doador->setCidadeDoador($cidadeDoador);
  $doador->setBairroDoador($bairroDoador);
  $doador->setComplementoDoador($complementoDoador);

  $doador->setRuaDoador($ruaDoador);
  $doador->setCepDoador($cepDoador);
  $doador->setNomeDoador($nomeDoador);
  $doador->setLugradouroDoador($lugradouroDoador);
  $doador->setDataNascDoador($dataNascDoador);
  $doador->setEmailDoador($emailDoador);
  $doador->setSenhaDoador($senhaDoador);
  $doador->setCpfDoador($cpfDoador);
  $doador->setDataInscricao($dataInscricao);

  if(isset($_FILES['imagem'])){

    $extensao = strtolower(substr($_FILES['imagem']['name'], -4)); //pega a extensao do arquivo
    $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
    $diretorio = "../restrict/foto-perfil-doador/"; //define o diretorio para onde enviaremos o arquivo

    move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novo_nome); //efetua o upload

    $doador->setFotoDoador($novo_nome);
    

  }

  switch ($estadoDoador) {
    case "AC":
      $doador->setEstadoDoador('Acre');
      break;
    case "AL":
      $doador->setEstadoDoador('Alagoas');
      break;
    case "AM":
      $doador->setEstadoDoador('Amazonas');
      break;

    case "AP":
      $doador->setEstadoDoador('Amapá');
      break;
    case "BA":
      $doador->setEstadoDoador('Bahia');
      break;
    case "CE":
      $doador->setEstadoDoador('Ceará');
      break;

    case "DF":
      $doador->setEstadoDoador('Distrito Federal');
      break;
    case "ES":
      $doador->setEstadoDoador('Espírito Santo');
      break;
    case "GO":
      $doador->setEstadoDoador('Goiás');
      break;

    case "MA":
      $doador->setEstadoDoador('Maranhão');
      break;
    case "MT":
      $doador->setEstadoDoador('Mato Grosso');
      break;
    case "MS":
      $doador->setEstadoDoador('Mato Grosso do Sul');
      break;

    case "MG":
      $doador->setEstadoDoador('Minas Gerais');
      break;
    case "PA":
      $doador->setEstadoDoador('Pará');
      break;
    case "PB":
      $doador->setEstadoDoador('Paraíba');
      break;

    case "PR":
      $doador->setEstadoDoador('Paraná');
      break;
    case "PE":
      $doador->setEstadoDoador('Pernambuco');
      break;
    case "PI":
      $doador->setEstadoDoador('Piauí');
      break;

    case "RJ":
      $doador->setEstadoDoador('Rio de Janeiro');
      break;
    case "RN":
      $doador->setEstadoDoador('Rio Grande do Norte');
      break;
    case "RO":
      $doador->setEstadoDoador('Rondônia');
      break;

    case "RS":
      $doador->setEstadoDoador('Rio Grande do Sul');
      break;
    case "RR":
      $doador->setEstadoDoador('Roraima');
      break;
    case "SC":
      $doador->setEstadoDoador('Santa Catarina');
      break;

    case "SE":
      $doador->setEstadoDoador('Sergipe');
      break;
    case "SP":
      $doador->setEstadoDoador('São Paulo');
      break;
    case "TO":
      $doador->setEstadoDoador('Tocantins');
      break;
  }

  $cpfDoador = preg_replace('/[^0-9]/', "", $cpfDoador);
  if (strlen($cpfDoador) != 11) {
    header("Location: ../restrict/form-user.php");
    return false;
  }
  if (preg_match('/(\d)\1{10}/', $cpfDoador)) {
    header("Location: ../restrict/form-user.php");
    return false;
  }
  for ($i = 9; $i < 11; $i++) {
    for ($d = 0, $x = 0; $x < $i; $x++) {
      $d += $cpfDoador[$x] * (($i + 1) - $x);
    }
    $d = ((10 * $d) % 11) % 10;
    if ($cpfDoador[$x] != $d) {
      header("Location: ../restrict/form-user.php");
      return false;
    }
  };

  if (!is_numeric($cepDoador)) { //verifica se só contém números
    header("Location: ../restrict/form-user.php");
    return false;
  }
  if (strlen($cepDoador) != 8) {
    header("Location: ../restrict/form-user.php");
    return false;
  };

  if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $emailDoador)) {
    header("Location: ../restrict/form-user.php");
    return false;
  };


  $doador->cadastrar($doador);

?>
