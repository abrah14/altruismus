<?php

  header("Location: ../restrict/Social/index.php");

  require_once("../model/Admin.php");
  date_default_timezone_set('America/Sao_Paulo');

  $cidadeAdmin = $_POST['txtCidadeAdmin'];
  $bairroAdmin = $_POST['txtBairroAdmin'];
  $complementoAdmin = $_POST['txtComplementoAdmin'];
  $estadoAdmin = $_POST['txtEstadoAdmin'];
  $ruaAdmin = $_POST['txtRuaAdmin'];
  $cepAdmin = $_POST['txtCepAdmin'];
  $nomeAdmin = $_POST['txtNomeAdmin'];
  $logradouroAdmin = $_POST['txtLugradouroAdmin'];
  $dataNascAdmin = $_POST['txtDataNascAdmin'];
  $emailAdmin = $_POST['txtEmailAdmin'];
  $senhaAdmin = $_POST['txtSenhaAdmin'];
  $cpfAdmin = $_POST['txtCpfAdmin'];
  $dataInscricao = date('Y-m-d');

  $admin = new Admin();

  $admin->setCidadeAdmin($cidadeAdmin);
  $admin->setBairroAdmin($bairroAdmin);
  $admin->setComplementoAdmin($complementoAdmin);
  $admin->setEstadoAdmin($estadoAdmin);
  $admin->setRuaAdmin($ruaAdmin);
  $admin->setCepAdmin($cepAdmin);
  $admin->setNomeAdmin($nomeAdmin);
  $admin->setLogradouroAdmin($logradouroAdmin);
  $admin->setDataNascAdmin($dataNascAdmin);
  $admin->setEmailAdmin($emailAdmin);
  $admin->setSenhaAdmin($senhaAdmin);
  $admin->setCpfAdmin($cpfAdmin);
  $admin->setDataInscricaoAdmin($dataInscricao);
  

  $cpfAdmin = preg_replace('/[^0-9]/', "", $cpfAdmin);
  if (strlen($cpfAdmin) != 11) {
    header("Location: ../restrict/form-user-admin.php");
    return false;
  }
  if (preg_match('/(\d)\1{10}/', $cpfAdmin)) {
    header("Location: ../restrict/form-user-admin.php");
    return false;
  }
  for ($i = 9; $i < 11; $i++) {
    for ($d = 0, $x = 0; $x < $i; $x++) {
      $d += $cpfAdmin[$x] * (($i + 1) - $x);
    }
    $d = ((10 * $d) % 11) % 10;
    if ($cpfAdmin[$x] != $d) {
      header("Location: ../restrict/form-user-admin.php");
      return false;
    }
  };

  if (!is_numeric($cepAdmin)) { //verifica se só contém números
    header("Location: ../restrict/form-user-admin.php");
    return false;
  }
  if (strlen($cepAdmin) != 8) {
    header("Location: ../restrict/form-user-admin.php");
    return false;
  };

  if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $emailAdmin)) {
    header("Location: ../restrict/form-user-admin.php");
    return false;
  };


  $admin->cadastrar($admin);

?>
