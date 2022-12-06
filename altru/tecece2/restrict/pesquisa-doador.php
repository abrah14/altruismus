<?php
session_start();
require_once("../model/Doador.php");
include_once("valida-permanencia.php");

try {
    $doador = new Doador();

    $nomeDoador = $_POST['txtNomeDoador'];

    $pesquisaDoador = $doador->pesquisaDoador($nomeDoador);
} catch (Exception $e) {
    echo $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - Dashboard Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="./Dashboard/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./Dashboard/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="./Dashboard/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="./Dashboard/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="./Dashboard/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="./Dashboard/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="./Dashboard/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

    <!-- Template Main CSS File -->
    <link href="./Dashboard/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Dashboard - v2.4.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" style="background-color: #5A56E9;" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <img class="img-logo" style="color: #5A56E9;" src="../../BizLand/assets/img/logo1.png" alt="">
            <a href="Dashboard/index.php" class="logo d-flex align-items-center">
                <h1 style="color: white;" class="logo">Altruismus</h1>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="./pesquisa-doador.php">
                <input type="text" name="txtNomeDoador" placeholder="Id ou Nome" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <form class="d-flex" role="search" action="./gera-relatorio-doador.php" method="post">
            <button class="btn btn-outline-success" type="submit">Gerar Relatório</button>
        </form>

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number"></span>
                    </a><!-- End Notification Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have 4 new notifications
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-warning"></i>
                            <div>
                                <h4>Lorem Ipsum</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>30 min. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-x-circle text-danger"></i>
                            <div>
                                <h4>Atque rerum nesciunt</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>1 hr. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-check-circle text-success"></i>
                            <div>
                                <h4>Sit rerum fuga</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>2 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-info-circle text-primary"></i>
                            <div>
                                <h4>Dicta reprehenderit</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a href="#">Show all notifications</a>
                        </li>

                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-chat-left-text"></i>
                        <span class="badge bg-success badge-number"></span>
                    </a><!-- End Messages Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                        <li class="dropdown-header">
                            You have 3 new messages
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>Maria Hudson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>4 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>Anna Nelson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>6 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>David Muldon</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>8 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="dropdown-footer">
                            <a href="#">Show all messages</a>
                        </li>

                    </ul><!-- End Messages Dropdown Items -->

                </li><!-- End Messages Nav -->

                <li class="nav-item dropdown pe-3">

                    <a id="teste" class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <!--<img src="../../../BizLand/assets/img/logo1.png" alt="Profile"  class="rounded-circle">-->

                        <span id="teste" class="d-none d-md-block dropdown-toggle ps-2">Olá Admin</span>
                    </a><!-- End Profile Iamge Icon -->
                    <style>


                    </style>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>Admin</h6>
                            <span>Altruismus</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                                <!-- Se o admin futuramente quiser alterar a senha dele-->
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>


                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="./logout.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Encerrar</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->


    <style>
        @media only screen and (min-width: 500px) {


            #container {
                font-size: clamp(0.3em, 0.3em + 1vw, 0.6em);
                color: #000000;
                font-weight: 600;

            }

            #linha:hover {
                background-color: #5A56E9;
                color: #000000;
                color: white;
            }
        }


        .nav-link:hover {
            background-color: black;
        }
    </style>
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Gráficos</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>

            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Rotinas</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a class="" href="./doador-restrita.php">
                            <i class="bi bi-circle"></i><span>Doador</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="./ong-restrita.php">
                            <i class="bi bi-circle"></i><span>Ong</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="./respostausuario.php">
                            <i class="bi bi-circle" style="list-style: none;"></i><span>Repostas</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="./doacao-restrita.php">
                            <i class="bi bi-circle" style="list-style: none;"></i><span>Doações</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="./prestacao-restrita.php">
                            <i class="bi bi-circle" style="list-style: none;"></i><span>Prestações de constas</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="./itensdoacao-restrita.php">
                            <i class="bi bi-circle" style="list-style: none;"></i><span>Itens doados</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="./telefonedoador-restrita.php">
                            <i class="bi bi-circle" style="list-style: none;"></i><span>Telefone Doador</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="./telefoneong-restrita.php">
                            <i class="bi bi-circle" style="list-style: none;"></i><span>Telefone Ong</span>
                        </a>
                    </li>
                    <!-- <li>
            <a href="forms-validation.html">
              <i class="bi bi-circle"></i><span>Form Validation</span>
            </a>
          </li> -->
                </ul>
        </ul>
    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="container-fluid">
            <div id="container">
                <table>
                    <h1>Lista de Doadores</h1>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Doador</th>
                            <th>Email</th>
                            <th>CPF</th>
                            <th>Data de Nascimento</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                            <th>Bairro</th>
                            <th>Rua</th>
                            <th>CEP</th>
                            <th>Número</th>
                            <th>Lugradouro</th>
                            <th>Senha</th>
                            <th>Entrada</th>
                            <th>Telefone</th>
                            <!-- <th>Editar</th>
                            <th>Excluir</th> -->
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($pesquisaDoador as $key => $listar) { ?>
                            <tr>

                                <td><?php echo $idDoador = $listar['iddoador'] ?></td>
                                <td><?php echo $nomeDoador = $listar['nomedoador'] ?></td>
                                <td><?php echo $emailDoador = $listar['emaildoador'] ?></td>
                                <td><?php echo $cpfDoador = $listar['cpfdoador'] ?></td>
                                <?php $dataNascDoador = $listar['datanascdoador'] ?>
                                <td><?php echo date('d/m/Y', strtotime($dataNascDoador)) ?></td>
                                <td><?php echo $cidadeDoador = $listar['cidadedoador'] ?></td>
                                <td><?php echo $estadoDoador = $listar['estadodoador'] ?></td>
                                <td><?php echo $bairroDoador = $listar['bairrodoador'] ?></td>
                                <td><?php echo $ruaDoador = $listar['ruadoador'] ?></td>
                                <td><?php echo $cepDoador = $listar['cepdoador'] ?></td>
                                <td><?php echo $complementoDoador = $listar['complementodoador'] ?></td>
                                <td><?php echo $lugradouroDoador = $listar['lugradourodoador'] ?></td>
                                <td><?php echo $senhaDoador = $listar['senhadoador'] ?></td>
                                <td><?php echo $inscricaoDoador = $listar['datainscricao'] ?></td>
                                <td><?php echo $telDoador = $listar['telefonedoador'] ?></td>

                                <div class="">

                                    <!-- <td>
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editar" name="editar" id="editar" data-whatever="<?php echo $idDoador ?>" data-whatevernome="<?php echo $nomeDoador ?>" data-whateveremail="<?php echo $emailDoador ?>" data-whatevercpf="<?php echo $cpfDoador ?>" data-whatevernasc="<?php echo $dataNascDoador ?>" data-whatevercidade="<?php echo $cidadeDoador ?>" data-whateverestado="<?php echo $estadoDoador ?>" data-whateverbairro="<?php echo $bairroDoador ?>" data-whateverrua="<?php echo $ruaDoador ?>" data-whatevercep="<?php echo $cepDoador ?>" data-whatevercomplemento="<?php echo $complementoDoador ?>" data-whateverlogradouro="<?php echo $lugradouroDoador ?>" data-whateversenha="<?php echo $senhaDoador ?>" data-whateverinscricao="<?php echo $inscricaoDoador ?>" data-whatevertel="<?php echo $telDoador ?>">
                                            EDITAR
                                        </button>
                                    </td> -->

                                </div>

                                <!-- <td>
                                    <button data-bs-toggle="modal" data-bs-target="#excluir" data-whatever="<?php echo $idDoador ?>" class="btn btn-danger">EXCLUIR</button>
                                </td> -->

                                <div class="modal fade" id="excluir" tabindex="-1" role="dialog" aria-labelledby="editar" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">EXCLUIR INFORMAÇÕES</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>TEM CERTEZA QUE DESEJA EXCLUIR OS DADOS?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="./decisao-excluir.php" method="post">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">CANCELAR</button>
                                                    <button type="submit" class="btn btn-danger" name="iddoador" id="iddoador" value="<?php echo $idDoador ?>">EXCLUIR</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="editar" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">EDITAR INFORMAÇÕES</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="./editar-user.php" method="post">
                                                    <div class="form-group">
                                                        <label for="recipient-id" class="col-form-label">ID</label>
                                                        <input type="text" class="form-control" id="recipient-id" name="linha" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">NOME</label>
                                                        <input type="text" class="form-control" id="recipient-name" name="nomeEditar">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-email" class="col-form-label">EMAIL</label>
                                                        <input type="text" class="form-control" id="recipient-email" name="emailEditar">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-cpf" class="col-form-label">CPF</label>
                                                        <input type="text" class="form-control" id="recipient-cpf" name="cpfEditar">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-nasc" class="col-form-label">DT.NASCIMENTO</label>
                                                        <input type="text" class="form-control" id="recipient-nasc" name="dtNasc">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-cep" class="col-form-label">CEP</label>
                                                        <input type="text" class="form-control" id="recipient-cep" name="cepEditar">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-estado" class="col-form-label">ESTADO</label>
                                                        <input type="text" class="form-control" id="recipient-estado" name="estadoEditar">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-cidade" class="col-form-label">CIDADE</label>
                                                        <input type="text" class="form-control" id="recipient-cidade" name="cidadeEditar">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-bairro" class="col-form-label">BAIRRO</label>
                                                        <input type="text" class="form-control" id="recipient-bairro" name="bairroEditar">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-rua" class="col-form-label">RUA</label>
                                                        <input type="text" class="form-control" id="recipient-rua" name="ruaEditar">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-complemento" class="col-form-label">COMPLEMENTO</label>
                                                        <input type="text" class="form-control" id="recipient-complemento" name="complementoEditar">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-logradouro" class="col-form-label">LOGRADOURO</label>
                                                        <input type="text" class="form-control" id="recipient-logradouro" name="logradouroEditar">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-senha" class="col-form-label">SENHA</label>
                                                        <input type="text" class="form-control" id="recipient-senha" name="senhaEditar">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-inscricao" class="col-form-label">DT.INSCRIÇÃO</label>
                                                        <input type="text" class="form-control" id="recipient-inscricao" name="dtInscricao" disabled="">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="recipient-telefone" class="col-form-label">Telefone</label>
                                                        <input type="text" class="form-control" id="recipient-telefone" name="telefoneEditar" disabled="">
                                                    </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">CANCELAR</button>
                                                <button type="submit" class="btn btn-danger">SALVAR</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

            </div>


            </tr>
        </div>

        </div>
        </div>

    <?php } ?>


    </tbody>
    </table>
    </div>




    <!-- código de passar variável de PHP para js


<?php

?>

<script>


   <?php

    //echo "var jsvar ='$var';";
    ?>
   
  console.log(jsvar)

   
</script>




<h2>Gráficos a segir em js</h2>

  <canvas id="primeiroGrafico">
          
          2d
</canvas>

<script>
  let primeiroGrafico = document.getElementById('primeiroGrafico').getContext('2d');

                  
  let chart = new Chart(primeiroGrafico, {});

  let chart1 = new Chart(primeiroGrafico, {
      type: 'line'             
  });

  chart1 = new Chart(primeiroGrafico, {
      type: 'line',
                          
      data: {
          labels: ['2000', '2001', '2002', '2003', '2004', '2005'],
                      
          datasets: [
              {
                  label: 'Crecimento Populacional',
                  data: [173448346, 175885229, 178276128, 180619108, 182911487, 185150806]
              }
          ]
      }
  });

  //cores

  chart1 = new Chart(primeiroGrafico, {
      type: 'line',

      data: {
          labels: ['2000', '2001', '2002', '2003', '2004', '2005'],

          datasets: [{
              label: 'Crecimento Populacional',
              data: [173448346, 175885229, 178276128, 180619108, 182911487, 185150806],
              backgroundColor: "#ff2200"
          }]
      }
  });

  //cor da linha
   chart1 = new Chart(primeiroGrafico, {
      type: 'line',

      data: {
          labels: ['2000', '2001', '2002', '2003', '2004', '2005'],

          datasets: [{
              label: 'Crecimento Populacional',
              data: [173448346, 175885229, 178276128, 180619108, 182911487, 185150806],
              backgroundColor: "#ff2200",
              borderColor: "#0000ff"
          }]
      }
  });

  //comparação
   chart1 = new Chart(primeiroGrafico, {
      type: 'line',

      data: {
          labels: ['2000', '2001', '2002', '2003', '2004', '2005'],

          datasets: [{
                  label: 'Crecimento Populacional',
                  data: [173448346, 175885229, 178276128, 180619108, 182911487, 185150806],
                  backgroundColor: "rgba(255, 34, 0, 0.3)",
                  borderColor: "#0000ff"
              },
              {
                  label: 'Exemplo de Gráfico Comparativo',
                  data: [173448346, 185150806, 175885229, 182911487, 178276128, 180619108],
                  backgroundColor: "rgba(0, 255, 0, 0.3)",
                  borderColor: "#002200"
              }
          ]
      }

  });
  
  </script> -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Dashboard</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="./Dashboard/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="./Dashboard/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./Dashboard/assets/vendor/chart.js/chart.min.js"></script>
    <script src="./Dashboard/assets/vendor/echarts/echarts.min.js"></script>
    <script src="./Dashboard/assets/vendor/quill/quill.min.js"></script>
    <script src="./Dashboard/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="./Dashboard/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="./Dashboard/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="./Dashboard/assets/js/main.js"></script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $('#editar').on('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = $(event.relatedTarget)

            // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead. 
            var recipient = button.data('whatever')
            var recipientNome = button.data('whatevernome')
            var recipientEmail = button.data('whateveremail')
            var recipientCpf = button.data('whatevercpf')
            var recipientNasc = button.data('whatevernasc')
            var recipientEstado = button.data('whateverestado')
            var recipientCidade = button.data('whatevercidade')
            var recipientBairro = button.data('whateverbairro')
            var recipientRua = button.data('whateverrua')
            var recipientCep = button.data('whatevercep')
            var recipientComplemento = button.data('whatevercomplemento')
            var recipientLogradouro = button.data('whateverlogradouro')
            var recipientSenha = button.data('whateversenha')
            var recipientInscricao = button.data('whateverinscricao')
            var recipientTel = button.data('whatevertel')

            var modal = $(this)
            modal.find('.modal-title').text('EDITAR INFORMAÇÕES DO ID ' + recipient)
            modal.find('#recipient-id').val(recipient)
            modal.find('#recipient-name').val(recipientNome)
            modal.find('#recipient-email').val(recipientEmail)
            modal.find('#recipient-nasc').val(recipientNasc)
            modal.find('#recipient-cpf').val(recipientCpf)
            modal.find('#recipient-estado').val(recipientEstado)
            modal.find('#recipient-cidade').val(recipientCidade)
            modal.find('#recipient-bairro').val(recipientBairro)
            modal.find('#recipient-rua').val(recipientRua)
            modal.find('#recipient-cep').val(recipientCep)
            modal.find('#recipient-complemento').val(recipientComplemento)
            modal.find('#recipient-logradouro').val(recipientLogradouro)
            modal.find('#recipient-senha').val(recipientSenha)
            modal.find('#recipient-inscricao').val(recipientInscricao)
            modal.find('#recipient-telefone').val(recipientTel)
        })

        //MODAL DE EXCLUIR//
        $('#excluir').on('show.bs.modal', function(event) {

            var button = $(event.relatedTarget)
            var recipient = button.data('whatever')
            var modal = $(this)

            modal.find('.modal-title').text('EXCLUIR INFORMAÇÕES DO ID ' + recipient)
            modal.find('#iddoador').val(recipient)

        })
    </script>


</body>

</html>