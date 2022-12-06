<?php
 
  header("Location:cadastra-telefoneong.php");
  session_start();

  require_once("../model/Ong.php");
  date_default_timezone_set('America/Sao_Paulo');

    $cepOng = $_POST['txtCepOng'];
    $cidadeOng = $_POST['txtCidadeOng'];
    $bairroOng = $_POST['txtBairroOng'];
    $complementoOng = $_POST['txtComplementoOng'];
    $estadoOng = $_POST['slEstado'];
    $ruaOng = $_POST['txtRuaOng'];
    $nomeOng = $_POST['txtNomeOng'];
    $emailOng = $_POST['txtEmailOng'];
    $senhaOng = $_POST['txtSenhaOng'];
    $dataNascOng = $_POST['DataNascOng'];
    $lugradouro = $_POST['txtLugradouroOng'];
    
    $_SESSION['telefone'] = $_POST['txtTelOng'];

    $ong = new Ong();

    if(isset($_FILES['fotoOng'])){

      $extensao = strtolower(substr($_FILES['fotoOng']['name'], -4)); //pega a extensao do arquivo
      $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
      $diretorio = "../restrict/foto-perfil-ong/"; //define o diretorio para onde enviaremos o arquivo
  
      move_uploaded_file($_FILES['fotoOng']['tmp_name'], $diretorio.$novo_nome); //efetua o upload
  
      $ong->setFotoOng($novo_nome);
      
  
    }

    $_SESSION['email-session'] = $emailOng;

    $ong->setCepOng($cepOng);
    $ong->setCidadeOng($cidadeOng);
    $ong->setBairroOng($bairroOng);
    $ong->setComplementoOng($complementoOng);
    $ong->setEstadoOng($estadoOng);
    $ong->setRuaOng($ruaOng);
    $ong->setNomeOng($nomeOng);
    $ong->setEmailOng($emailOng);
    $ong->setSenhaOng($senhaOng);
    $ong->setDataNascOng($dataNascOng);
    $ong->setLugradouroOng($lugradouro);

    switch ($estadoOng) {
      case 0:
        $ong->setEstadoOng('Acre');
        break;
      case 1:
        $ong->setEstadoOng('Alagoas');
        break;
      case 2:
        $ong->setEstadoOng('Amazonas');
        break;
  
      case 3:
        $ong->setEstadoOng('Amapá');
        break;
      case 4:
        $ong->setEstadoOng('Bahia');
        break;
      case 5:
        $ong->setEstadoOng('Ceará');
        break;
  
      case 6:
        $ong->setEstadoOng('Distrito Federal');
        break;
      case 7:
        $ong->setEstadoOng('Espírito Santo');
        break;
      case 8:
        $ong->setEstadoOng('Goiás');
        break;
  
      case 9:
        $ong->setEstadoOng('Maranhão');
        break;
      case 10:
        $ong->setEstadoOng('Mato Grosso');
        break;
      case 11:
        $ong->setEstadoOng('Mato Grosso do Sul');
        break;
  
      case 12:
        $ong->setEstadoOng('Minas Gerais');
        break;
      case 13:
        $ong->setEstadoOng('Pará');
        break;
      case 14:
        $ong->setEstadoOng('Paraíba');
        break;
  
      case 15:
        $ong->setEstadoOng('Paraná');
        break;
      case 16:
        $ong->setEstadoOng('Pernambuco');
        break;
      case 17:
        $ong->setEstadoOng('Piauí');
        break;
  
      case 18:
        $ong->setEstadoOng('Rio de Janeiro');
        break;
      case 19:
        $ong->setEstadoOng('Rio Grande do Norte');
        break;
      case 20:
        $ong->setEstadoOng('Rondônia');
        break;
  
      case 21:
        $ong->setEstadoOng('Rio Grande do Sul');
        break;
      case 22:
        $ong->setEstadoOng('Roraima');
        break;
      case 23:
        $ong->setEstadoOng('Santa Catarina');
        break;
  
      case 24:
        $ong->setEstadoOng('Sergipe');
        break;
      case 25:
        $ong->setEstadoOng('São Paulo');
        break;
      case 26:
        $ong->setEstadoOng('Tocantins');
        break;
    }


    if (!is_numeric($cepOng)) { //verifica se só contém números
        header("Location: ../restrict/form-user-ong.php");
        return false;
      }
      if(strlen($cepOng) != 8){
        header("Location: ../restrict/form-user-ong.php");
        return false;
      };

      if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $emailOng)){
        header("Location: ../restrict/form-user-ong.php");
        return false;
      };

    $ong->cadastrar($ong);



?>