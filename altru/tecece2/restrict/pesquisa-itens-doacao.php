<?php
session_start();
require_once("../model/ItensDoacao.php");
include_once("valida-permanencia.php");

try {
  $itensDoacao = new ItensDoacao();

  $pesquisa = $_POST['queryItensDoacao'];

  $listaItensDoacao = $itensDoacao->pesquisaItensDoacao($pesquisa);
} catch (Exception $e) {
  echo $e->getMessage();
}
?>



<!DOCTYPE html>
<html lang="en">

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
      <form class="search-form d-flex align-items-center" method="POST" action="./pesquisa-itens-doacao.php">
        <input type="text" name="queryItensDoacao" placeholder="Id ou ONG" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <form class="d-flex" role="search" action="./gera-relatorio-itens-doacao.php" method="post">
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
          <h2>Lista de doações </h2>
          <thead>
            <tr>
              <th>ID</th>
              <th>Ong</th>
              <th>Quantidade de Itens</th>
              <th>Item</th>
              <th>Data</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($listaItensDoacao as $key => $listar) { ?>
              <tr>

                <td><?php echo $idItensDoacao = $listar['iditensdoacao'] ?></td>
                <td><?php echo $nomeOng = $listar['nomeong'] ?></td>
                <td><?php echo $quantItens = $listar['quantidadeitensdoacao'] ?></td>
                <td><?php echo $item = $listar['descitem'] ?></td>
                <td><?php echo $data = $listar['datadoacao'] ?></td>



                <!--editar-->

                <!-- data-bs-toggle="modal" data-bs-target="#editar" -->

                <!-- <td>
                  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editar" name="editar" id="editar" data-whateverong="<?php echo $nomeOng ?>" data-whatever="<?php echo $idItensDoacao ?>" data-whateverdata="<?php echo $data ?>" data-whateverquant="<?php echo $quantItens ?>" data-whateveritem="<?php echo $item ?>">EDITAR</button>
                </td>

                <td>
                  <button data-bs-toggle="modal" data-bs-target="#excluir" data-whatever="<?php echo $idItensDoacao ?>" class="btn btn-danger">EXCLUIR</button>
                </td> -->

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
                        <form action="./editar-user-itensdoacao.php" method="post">
                          <div class="form-group">
                            <label for="recipient-id" class="col-form-label">ID</label>
                            <input type="text" class="form-control" id="recipient-id" name="linha" readonly>
                          </div>
                          <div class="form-group">
                            <label for="recipient-ong" class="col-form-label">ONG</label>
                            <input type="text" class="form-control" id="recipient-ong" name="ongEditar">
                          </div>
                          <div class="form-group">
                            <label for="recipient-quant" class="col-form-label">Unidades</label>
                            <input type="text" class="form-control" id="recipient-quant" name="quantEditar">
                          </div>
                          <div class="form-group">
                            <label for="recipient-data" class="col-form-label">Data da doação</label>
                            <input type="date" class="form-control" id="recipient-data" name="dataEditar">
                          </div>
                          <div class="form-group">
                            <label for="recipient-item" class="col-form-label">Item</label>
                            <input type="text" class="form-control" id="recipient-item" name="itemEditar">
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
                        <form action="./decisao-excluir-itensdoacao.php" method="post">
                          <button type="button" class="btn btn-primary" data-dismiss="modal">CANCELAR</button>
                          <button type="submit" class="btn btn-danger" name="iditem" id="iditem" value="<?php echo $idItensDoacao ?>">EXCLUIR</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>


              </tr>
          </tbody>
        <?php } ?>
        </table>
      </div>
    </div>

    </div>
    </div>

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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script type="text/javascript">
    $('#editar').on('show.bs.modal', function(event) {
      // Button that triggered the modal
      var button = $(event.relatedTarget)

      // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead. 
      var recipient = button.data('whatever')
      var recipientQuant = button.data('whateverquant')
      var recipientData = button.data('whateverdata')
      var recipientItem = button.data('whateveritem')
      var recipientOng = button.data('whateverong')

      var modal = $(this)
      modal.find('.modal-title').text('EDITAR INFORMAÇÕES DO ID ' + recipient)
      modal.find('#recipient-id').val(recipient)
      modal.find('#recipient-quant').val(recipientQuant)
      modal.find('#recipient-data').val(recipientData)
      modal.find('#recipient-item').val(recipientItem)
      modal.find('#recipient-ong').val(recipientOng)
    })

    //MODAL DE EXCLUIR//
    $('#excluir').on('show.bs.modal', function(event) {

      var button = $(event.relatedTarget)
      var recipient = button.data('whatever')
      var modal = $(this)

      modal.find('.modal-title').text('EXCLUIR INFORMAÇÕES DO ID ' + recipient)
      modal.find('#iditem').val(recipient)

    })
  </script>

</body>

</html>