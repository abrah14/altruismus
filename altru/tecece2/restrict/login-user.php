<?php 

  session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../css/form-login-user.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js">

  <!-- Favicons -->
  <link class="logo1" href="./niceAdmin/assets/img/logo1.png" rel="icon">
  <link href="../../BizLand/assets/img/apple-touch-icon.png" rel="">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../BizLand/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../../BizLand/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../BizLand/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../BizLand/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../BizLand/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../BizLand/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../BizLand/assets/css/style.css" rel="stylesheet">





</head>



<style>


  .modal-body:hover{
    border: 2px solid whitesmoke;
  }
</style>


<!-- Modal -->
<div class="modal fade" style="border: 0;" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="border: 0;">
    <div class="modal-content" style="border: 0; padding: 50px;">
      <div class="modal-header" style="border: 0;">


      </div>

    
      <section style="border: 0; " class="edit-modal" style="border: none; display: flex; background-color: white; padding: 100px;">
        <a href="./form-user.php">


          <div class="modal-body"  style="display: flex; background-color: #5A56E9; flex-direction: column; align-items: center;padding:20px ;">
            <h5 class="registre-doador"  style="font-weight: 600; color: white;">Sou Doador...</h5>
            <img src="../../BizLand/assets/img/mao14.png" style="width: 100px;" alt="">
  
          </div>
        </a>
        <div class="modal-bod" style="padding: 20px;" style="width: 50px;" disable>

        </div>

        <a href="./form-user-ong.php">
        <div class="modal-body" style="display: flex; background-color: #5A56E9; flex-direction: column; align-items: center;padding:30px ;">

          <h5 class="registre-doador" style="color: white; font-weight: 600;" >Sou Ong...</h5>
          <img src="../../BizLand/assets/img/mao13.png" style="width: 50px;" alt="">

          
        </div>
      </a>
      </section>
      <div class="modal-footer" style="border: 0; ">


      </div>
    </div>
  </div>
</div>

<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center" style="border: none">
  <div class="container d-flex align-items-center justify-content-between">

    <img class="img-logo" src="../../bizland/assets/img/logo1.PNG" alt="">
    <section>
      <h1 class="logo"><a href="../../BizLand/">Altruismus</a></h1>

    </section>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

    <nav id="navbar" class="navbar">
      <ul>
      <li><a style="text-decoration: none; color: white;" class="nav-link scrollto active" href="../../BizLand/index.php">Home</a></li>
          
        </a></li>
        
        <li><a class="nav-link scrollto"  href="../../BizLand/index.php">Time</a></li>
        <li><a class="nav-link scrollto"  href="../../BizLand/index.php">Contato</a></li>
        <li><a class="nav-link scrollto"   href="../../BizLand/index.php" >Projetos</a></li>
        
        <li class="dropdown"><a href="./login-user.php"><span class="login">Login</span> <i class="bi bi-chevron"></i></a>
        
        <li><a id="#cor-button" class="nav-link scrollto" href="#services"><button style="font-weight: 700;" type="button" class="btn-login" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Registre-se
            </button>
        </li>
      </ul>
      </li>
      </ul>
      </li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header><!-- End Header -->

<body style="display: block; margin: 0; ">

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" style="background-color: transparent;" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="background-color: transparent;">
      <div class="modal-content" style="background-color: transparent;">
        <div class="modal-header" style="background-color: transparent;">
          <h5 class="modal-title" id="exampleModalLabel">Registre-se</h5>

        </div>


        <section class="edit-modal" style="border: none;" style="background-color: transparent;">

        </section>


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary">Entrar</button>
        </div>
      </div>
    </div>
  </div>


  <!-- ======= Header ======= -->



  <style>

  </style>


  <main>

    <section style=" display: flex; justify-content: center;">


      <div class="box" id="box2">
        <div class="img-box" style="background-color: #5A56E9;">
          <img src="../image/donate.png">
        </div>
        <div class="form-box">
          <h2>Login</h2>
          <p class="seJunte">Junte-se a nós</p>
          <form method="POST" action="./valida-acesso.php">
            <div class="input-group">
              <label for="email">E-mail</label>
              <input style="border-radius: 20px ;" type="text" id="txtEmail" name="txtEmail" placeholder="Digite seu e-mail" required>
            </div>

            <div class="input-group">
              <label for="senha">Senha</label>
              <input style="  border-radius: 20px ;" type="password" id="txtSenha" name="txtSenha" placeholder="Digite sua senha" required>
            </div>

            <div class="input-group">
              <button type="submit">Login</button>
            </div>

            <?php if (isset($_SESSION['erro-session'])) { ?>
              <!-- <p style="background-color: red;">Email ou senha incorretos</p> -->
              <label for="">Email ou senha incorretos</label>
            <?php } ?>


          </form>


        </div>
      </div>

    </section>
  </main>

  <footer id="footer">


    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3><span style="color:#5A56E9;">Altruismus</span></h3>
            <p>
              R. Feliciano de Mendonça, 290 <br>
              Guaianases, São Paulo - SP, 08460-365<br>
              Brasil <br><br>
              <strong>Telefone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> ascensio@gmail.com<br>
            </p>




          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Sobre</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Serviços</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Termos de serviço</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Política de privacidade</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Redes sociais</h4>
            <p>Nos acompanhe para não fica de fora de eventos e atualizações</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>BizLand</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->



  <!-- Vendor JS Files -->
  <script src="../../BizLand/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../../BizLand/assets/vendor/aos/aos.js"></script>
  <script src="../../BizLand/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../BizLand/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../BizLand/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../../BizLand/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../../BizLand/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="../../BizLand/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../BizLand/assets/js/main.js"></script>


</body>

</html>