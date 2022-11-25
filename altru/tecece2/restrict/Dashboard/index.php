<?php

session_start();
require_once("./valida-permanencia-admin.php");
require_once("../../model/Doador.php");

require('./testeOng.php');



$outubroOng = $_SESSION['var22'];


$novembroOng = $_SESSION['var25'];



try {
    $doador = new Doador();
 
    // $doacao = new Doacao();

    //QUANTIDADE DE DOADORES QUE SE CADASTRARAM POR MÊS//
    


    $janeiro = $doador->quantidadePorMes(1);
    $fevereiro = $doador->quantidadePorMes(2);
    $marco = $doador->quantidadePorMes(3);
    $abril = $doador->quantidadePorMes(4);
    $maio = $doador->quantidadePorMes(5);
    $junho = $doador->quantidadePorMes(6);
    $julho = $doador->quantidadePorMes(7);
    $agosto = $doador->quantidadePorMes(8);
    $setembro = $doador->quantidadePorMes(9);
    $outubro = $doador->quantidadePorMes(10);
    $novembro = $doador->quantidadePorMes(11);
    $dezembro = $doador->quantidadePorMes(12);

    $janeiro1 = $janeiro;
    $fevereiro1 = $fevereiro;
    $marco1 = $marco;
    $abril1 = $abril;
    $maio1 = $maio;
    $junho1 = $junho;
    $julho1 = $julho;
    $agosto1 = $agosto;
    $setembto1 = $setembro;
    $outubro1 = $outubro;
    $novembro1 = $novembro;
    $dezembro1 = $dezembro;



    
    //FIM DO GRÁFICO//

    //GRÁFICO DE PIZZA//
    $contagem = $doador->contagemUsers();


    

    foreach ($contagem as $quantidade) {
      $quantOngs = $quantidade[0];
      $quantDoador = $quantidade[1];
     
      $quantRespostaSim = $quantidade[2];
      $quantRespostaNao = $quantidade[3];
     
      $quantPrestacaoContas = $quantidade[4];
       
        // $quantRespostaSim = $quantidade[2];
        // $quantRespostaNao = $quantidade[3];
       
        // $quantPrestacaoContas = $quantidade[4];
       
        
        // $quantPrestacaoContas = $quantidade[3];

    }




  
    $quantidadeDoadores = $quantDoador;    
    
  
    
   
    // $quantiRespostaSim = $quantRespostaSim;   

    
  
   
    

    


    // $usuarios = array(
    //     array(
    //         "DOADORES : ".$quantDoador,$quantDoador
    //     ),
    //     array(
    //         "ONGs : ".$quantOngs,$quantOngs
    //     )
    // );


   

    // $graficoPizza = new PHPLOT(700,250);
    // $graficoPizza->SetFileFormat('png');

    // $graficoPizza->SetTitle("QUANTIDADE DE DOADORES E ONGs");

    // $graficoPizza->SetDataValues($usuarios);

    // $graficoPizza->SetDataType('text-data-single');
    // $graficoPizza->SetPlotType("pie");

    // foreach($usuarios as $percentual) $graficoPizza->SetLegend($percentual[0]);

    // $graficoPizza->SetIsInline(true);
    // $graficoPizza->SetOutputFile('graficoPizza.png');

    // $graficoPizza->DrawGraph();

    //FIM DO GRÁFICO//

    //GRÁFICO PONTUAL//

    
    //DOAÇÕES REALIZADAS POR MÊS//

    // $doaJan = $doacao->quantidadeDoacoesPorMes(1);
    // $doaFev = $doacao->quantidadeDoacoesPorMes(1);

    // $graficoPontual = new PHPlot(700,250);
    // $graficoPontual->SetFileFormat("png");

    // $graficoPontual->SetTitle("DOACOES REALIZADAS NOS ULTIMOS MESES");
    // $graficoPontual->SetXTitle("MESES");
    // $graficoPontual->SetYTitle("DOACOES");

    // $dados = array(
    //         array('Janeiro', 10),
    //         array('Fevereiro', 5),
    //         array('Março', 4),
    //         array('Abril', 8),
    //         array('Maio', 7),
    //         array('Junho', 5),
    //         array('Julho', 5),
    //         array('Agosto', 5),
    //         array('Setembro', 5),
    //         array('Outubro', 5),
    //         array('Novembro', 5),
    //         array('Dezembro', 5),
    // );

    // $graficoPontual->SetDataValues($dados);

    // $graficoPontual->SetIsInline(true);
    // $graficoPontual->SetOutputFile('graficoPontual.png');

    // $graficoPontual->DrawGraph();

} catch (Exception $e) {
    echo $e->getMessage();
}



?>



<?php if(isset($_SESSION['idadmin'])) { ?>


 
  <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Altruismus</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo2.png" rel="icon">


  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  

  <!-- o link a seguir direciona para a biblioteca online do Chart.js -->
<!-- a biblioteca também está disponível para download no site do Chart.js -->
<!-- o link a seguir direciona para a biblioteca online do Chart.js -->
<!-- a biblioteca também está disponível para download no site do Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  

 

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header"  style="background-color: #5A56E9;" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <img  class="img-logo" style="color: #5A56E9;" src="../../../BizLand/assets/img/logo1.png" alt="">
      <a href="./index.html" class="logo d-flex align-items-center" >
        <h1 style="color: white;" class="logo">Altruismus</h1>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

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
         


            <script>


              
            </script>
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

          <a  id="teste"  class="nav-link nav-profile d-flex align-items-center pe-0"  href="#" data-bs-toggle="dropdown">
            <!--<img src="../../../BizLand/assets/img/logo1.png" alt="Profile"  class="rounded-circle">-->

            <span id="teste" style="color: white;" class="d-none d-md-block dropdown-toggle ps-2">Olá Admin</span>
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
              <a class="dropdown-item d-flex align-items-center" href="../logout.php">
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

    .nav-link:hover{
      background-color: black;
    }
  </style>
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar"  class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link"  href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav1" data-bs-toggle="collapse" href="#">
          
          <i class="bi bi-person"  ></i><span>Doador</span><i class="bi bi-chevron-down ms-auto"></i>
          
        </a>
        <ul  style="list-style: none;" id="forms-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li >
            <a class="" href="../doador-restrita.php">
              <i class="bi bi-circle"></i><span>Doador</span>
            </a>
          </li>
         
          <li>
          <a class="" href="../respostausuario.php">
              <i class="bi bi-circle" style="list-style: none;"></i><span>Repostas</span>
            </a>
          </li>

          <li>
          <a class="" href="../telefonedoador-restrita.php">
              <i class="bi bi-circle" style="list-style: none;"></i><span>Telefone Doador</span>
            </a>
          </li>
        
          <!-- <li>
            <a href="forms-validation.html">
              <i class="bi bi-circle"></i><span>Form Validation</span>
            </a>
          </li> -->
        </ul>
  

    
  </ul>

  
  <ul class="sidebar-nav" id="sidebar-nav">

<li class="nav-item">

<li class="nav-item">
  <a class="nav-link collapsed" data-bs-target="#forms-nav2" data-bs-toggle="collapse" href="#">
    <i class="bi bi-bank"></i><span>Ong</span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul  style="list-style: none;" id="forms-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
    <a class="" href="../ong-restrita.php">
        <i class="bi bi-circle"></i><span>Ong</span>
      </a>
  </li>
    <li>
    <a class="" href="../doacao-restrita.php">
        <i class="bi bi-circle" style="list-style: none;"></i><span>Doações</span>
      </a>
    </li>
    <li>
    <a class="" href="../prestacao-restrita.php">
        <i class="bi bi-circle" style="list-style: none;"></i><span>Prestações de constas</span>
      </a>
    </li>
    <li>
    <a class="" href="../itensdoacao-restrita.php">
        <i class="bi bi-circle" style="list-style: none;"></i><span>Itens doados</span>
      </a>
    </li>
    <li>
    <a class="" href="../telefoneong-restrita.php">
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








</ul>



<ul class="sidebar-nav" id="sidebar-nav">



<li class="nav-item">


<li class="nav-item">
  <a class="nav-link collapsed" data-bs-target="#forms-nav4" data-bs-toggle="collapse" href="#">
    <i class="bi bi-journal-text"></i><span>Posts</span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul  style="list-style: none;" id="forms-nav4" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li >
      <a class="" href="../doador-restrita.php">
        <i class="bi bi-circle"></i><span>Doador</span>
      </a>
    </li>
    <li>
    <a class="" href="../ong-restrita.php">
        <i class="bi bi-circle"></i><span>Ong</span>
      </a>
    </li>
    <li>
    <a class="" href="../respostausuario.php">
        <i class="bi bi-circle" style="list-style: none;"></i><span>Repostas</span>
      </a>
    </li>
    <li>
    <a class="" href="../doacao-restrita.php">
        <i class="bi bi-circle" style="list-style: none;"></i><span>Doações</span>
      </a>
    </li>
    <li>
    <a class="" href="../prestacao-restrita.php">
        <i class="bi bi-circle" style="list-style: none;"></i><span>Prestações de constas</span>
      </a>
    </li>
    <li>
    <a class="" href="../itensdoacao-restrita.php">
        <i class="bi bi-circle" style="list-style: none;"></i><span>Itens doados</span>
      </a>
    </li>
    <li>
    <a class="" href="../telefonedoador-restrita.php">
        <i class="bi bi-circle" style="list-style: none;"></i><span>Telefone Doador</span>
      </a>
    </li>
    <li>
    <a class="" href="../telefoneong-restrita.php">
        <i class="bi bi-circle" style="list-style: none;"></i><span>Telefone Ong</span>
      </a>
    </li>
    <!-- <li>
      <a href="forms-validation.html">
        <i class="bi bi-circle"></i><span>Form Validation</span>
      </a>
    </li> -->
  </ul>

  <ul class="sidebar-nav" id="sidebar-nav">



<li class="nav-item">


<li class="nav-item">
  <a class="nav-link collapsed" data-bs-target="#forms-nav5" data-bs-toggle="collapse" href="#">
    <i class="bi bi-journal-text"></i><span>Reações</span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul  style="list-style: none;" id="forms-nav5" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li >
      <a class="" href="../doador-restrita.php">
        <i class="bi bi-circle"></i><span>Doador</span>
      </a>
    </li>
    <li>
    <a class="" href="../ong-restrita.php">
        <i class="bi bi-circle"></i><span>Ong</span>
      </a>
    </li>
    <li>
    <a class="" href="../respostausuario.php">
        <i class="bi bi-circle" style="list-style: none;"></i><span>Repostas</span>
      </a>
    </li>
    <li>
    <a class="" href="../doacao-restrita.php">
        <i class="bi bi-circle" style="list-style: none;"></i><span>Doações</span>
      </a>
    </li>
    <li>
    <a class="" href="../prestacao-restrita.php">
        <i class="bi bi-circle" style="list-style: none;"></i><span>Prestações de constas</span>
      </a>
    </li>
    <li>
    <a class="" href="../itensdoacao-restrita.php">
        <i class="bi bi-circle" style="list-style: none;"></i><span>Itens doados</span>
      </a>
    </li>
    <li>
    <a class="" href="../telefonedoador-restrita.php">
        <i class="bi bi-circle" style="list-style: none;"></i><span>Telefone Doador</span>
      </a>
    </li>
    <li>
    <a class="" href="../telefoneong-restrita.php">
        <i class="bi bi-circle" style="list-style: none;"></i><span>Telefone Ong</span>
      </a>
    </li>
    <!-- <li>
      <a href="forms-validation.html">
        <i class="bi bi-circle"></i><span>Form Validation</span>
      </a>
    </li> -->
  </ul>
  <ul class="sidebar-nav" id="sidebar-nav">



<li class="nav-item">


<li class="nav-item">
  <a class="nav-link collapsed" data-bs-target="#forms-nav6" data-bs-toggle="collapse" href="#">
    <i class="bi bi-journal-text"></i><span>Comentários</span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul  style="list-style: none;" id="forms-nav6" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li >
      <a class="" href="../doador-restrita.php">
        <i class="bi bi-circle"></i><span>Doador</span>
      </a>
    </li>
    <li>
    <a class="" href="../ong-restrita.php">
        <i class="bi bi-circle"></i><span>Ong</span>
      </a>
    </li>
    <li>
    <a class="" href="../respostausuario.php">
        <i class="bi bi-circle" style="list-style: none;"></i><span>Repostas</span>
      </a>
    </li>
    <li>
    <a class="" href="../doacao-restrita.php">
        <i class="bi bi-circle" style="list-style: none;"></i><span>Doações</span>
      </a>
    </li>
    <li>
    <a class="" href="../prestacao-restrita.php">
        <i class="bi bi-circle" style="list-style: none;"></i><span>Prestações de constas</span>
      </a>
    </li>
    <li>
    <a class="" href="../itensdoacao-restrita.php">
        <i class="bi bi-circle" style="list-style: none;"></i><span>Itens doados</span>
      </a>
    </li>
    <li>
    <a class="" href="../telefonedoador-restrita.php">
        <i class="bi bi-circle" style="list-style: none;"></i><span>Telefone Doador</span>
      </a>
    </li>
    <li>
    <a class="" href="../telefoneong-restrita.php">
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
  <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

  

  <!-- <div id="page-content-wrapper"> -->
            <!-- Top navigation-->
            <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <br>
                </div>
            </nav> -->
            <!-- Page content-->
            <!-- <div class="container-fluid">
                <h1 class="mt-4">DASHBOARD</h1>
                <img src="grafico.png" alt="">
            </div>
            <div class="grafico3" >
                 -->

                
                <!-- <img class="grafico2"  src="graficoPizza.png" alt="">
                
            </div>
            <div class="container-fluid">
               
            </div>

        </div>
    </div> -->

 


    <!-- adicione a tag canvas no seu HTML -->
 
       
  <!-- Left side columns -->
    <!-- Left side columns -->



    <div style="display: flex;">

   



      <div class="col-lg-8">
            <div class="row">
              
  
              <!-- Sales Card -->
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
  
                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                      </li>
  
                      <li><a class="dropdown-item" href="#">Today</a></li>
                      <li><a class="dropdown-item" href="#">This Month</a></li>
                      <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                  </div>
  
                  <div class="card-body">
                    <h5 class="card-title">Doadores <span style="color: #5A56E9; font-size: 22px; font-weight: 600;"> Altruismus</span></h5>
  
                    <div class="d-flex align-items-center" style="display: flex;">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" >
                        <i class="bi bi-person"  id="velho1">
                       
                        </i>
  
                          <h6  id="testando123">jsdfskfsk</h6>
                      </div>

                      <script>

                     

                        const margem1 = document.getElementById('velho1')

                        margem1.style.padding = '10'






                      

                        
                      </script>
                   
                        <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->
  
                      
                    </div>
                  </div>
  
                </div>
              </div><!-- End Sales Card -->
  
              <!-- Revenue Card -->
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">
  
                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                      </li>
  
                      <li><a class="dropdown-item" href="#">Today</a></li>
                      <li><a class="dropdown-item" href="#">This Month</a></li>
                      <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                  </div>
  
                  <div class="card-body">
                    <h5 class="card-title">Ong´s <span style="color: #5A56E9; font-size: 22px; font-weight: 600;">Altruismus</span></h5>
  
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-bank" style="padding: 11px;"  id="velho1">

                        </i>
                        <h6 id="testando1234" > sla</h6>
                      </div>

                      <script>

                     

                        const margem = document.getElementById('velho1')

                        margem.style.padding = '10'
                      

                        
                      </script>
                    
                    </div>
                    
                  </div>
                  
                  
  
                </div>
                
                
              </div><!-- End Revenue Card -->
              <canvas height="300" width="1200" id="myChart"></canvas>
            
              <!-- Customers Card -->
              <div class="col-xxl-4 col-xl-12">
  
                <div class="card info-card customers-card">
  
                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                      </li>
  
                      <li><a class="dropdown-item" href="#">Today</a></li>
                      <li><a class="dropdown-item" href="#">This Month</a></li>
                      <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                  </div>
  
                  <div class="card-body">
                    <h5 class="card-title">Respostas</h5>
  
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                      </div>
                      <div class="ps-3">
                        <h6 id="testando12345" style="font-style: normal;"></h6>
                        <!-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> -->
  
                      </div>
                    </div>
  
                  </div>
                  
                  
                </div>
                
                
  
              </div><!-- End Customers Card -->
              
    </div>

            

  
      <div>       
       
     
            <canvas height="300" width="1200" id="myChart2"></canvas>

    </div>


  </main><!-- End #main -->

  <?php

 

 


$var = $quantidadeDoadores;





//repostasSIM e não

$var3 = $quantRespostaSim;

$var4 = $quantRespostaNao;



$var6 = $quantPrestacaoContas;

// media de itens por doacao


// doadores por mes


$var11 = $janeiro1;
$var12 = $fevereiro1;

$var13 = $marco1;

$var14 = $abril1;

$var15 = $maio1;

$var16 = $junho1;

$var17 = $julho1;

$var18 = $agosto1;

$var19 = $setembto1;

$var20 = $outubro1;

$var21 = $novembro1;

$var22 = $dezembro1;

$var23 = $outubroOng;


$var25 = $novembroOng;


?>
<script>
   <?php
     
      //  echo "var jsvar ='$var';";
      
      //  echo "var jsvar2 ='$var2';";
       echo "var jsvar3 ='$var3';";
       echo "var jsvar4 ='$var4';";
      //  echo "var jsvar5 ='$var5';";
      //  echo "var jsvar6 ='$var6';";
      //  echo "var jsvar7 ='$var7';";
      //  echo "var jsvar8 ='$var8';";
      //  echo "var jsvar9 ='$var9';";


       echo "var jsvar20 ='$var20';";

       echo "var jsvar21 ='$var21';";

       echo "var jsvar23 ='$var23';";

       echo "var jsvar25 ='$var25';";




      //  echo "var jsvar3 ='$var3';";
   ?>

   //graficos de pizza
    
   // por mes


  </script>


<script>



  const totalDoadores = document.getElementById('testando123')

  const totalOngs = document.getElementById('testando1234')

  const totalRepostas = document.getElementById('testando12345')


  const totalPosts = document.getElementById('testando123456')

  const teste = document.createElement('span')

  teste.innerText = ' | '

  totalDoadores.innerHTML = (Number.parseFloat(jsvar20) +Number.parseFloat(jsvar21))



  totalOngs.innerHTML = (Number.parseFloat(jsvar23) +Number.parseFloat(jsvar25))


  const sla = document.createElement('span')

  sla.style.color = 'gray'

  sla.innerHTML = '|'


  totalRepostas.innerHTML = 'Sim ' + jsvar3 +' <span>'+' | '+ ' </span>' + 'Não '+ jsvar4 + ' <span>|</span> ' + 'Total ' +(Number.parseFloat(jsvar3) +Number.parseFloat(jsvar4))




  const labels = [
    'Junho',
    'Julho',
    'Agosto',
    'Setembro',
    'Outubro',
    'Nvembro',
    'Dezembro',
  ];

  const data = {
    labels: labels,
    datasets: [{
    
      label: 'Ongs',
      backgroundColor: '#6A5ACD',   
      borderColor: '#6A5ACD',
      data: [0, 0, 0, 0, jsvar23, jsvar25, 0],
    },
    {
      label: 'Doadores',
      backgroundColor: 'pink',   
      borderColor: 'pink',
      data: [0, 0, 0, 0,jsvar20 , jsvar21, 0],
      title: 'red'
  
      
    
    }
  
  ]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {},
    type: 'bar',
    data: data,
    options: {}
  };




// resposta usuarios



const labels2 = [
    'Junho',
    'Julho',
    'Agosto',
    'Setembro',
    'Outubro',
    'Nvembro',
    'Dezembro'
  ];

  const data2 = {
    labels: labels2,
    datasets: [{
    
      label: 'Sim',
      backgroundColor: '#6A5ACD',   
      borderColor: '#6A5ACD',
      data: [0, 0, 0, 0, jsvar3, 0, 0],
      title: 'Work'
    },
    {
      label: 'Não',
      backgroundColor: 'pink',   
      borderColor: 'pink',
      data: [0, 0, 0, 0,jsvar4 , 0, 0],
      title: 'Work'
    
    }
  
  ]
  };

  const config2 = {
    type: 'line',
    data: data2,
    options: {},
    type: 'line',
    data: data2,
    options: {}
  };



// quantidade de telefones de doadores com ongs





</script>

<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );

  console.log(0)
</script>


<script>
  const myChart2 = new Chart(
    document.getElementById('myChart2'),
    config2
  );

  console.log(0)
</script>

<script>
  const myChart3 = new Chart(
    document.getElementById('myChart3'),
    config3
  );

  console.log(0)
</script>



  

  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>




  
<?php 
  } 

  else {
    header("Location: ../login-user.php");
  }
?>