<?php

use FontLib\Table\Type\head;

session_start();

require_once("../model/Ong.php");
require_once("../model/Post.php");
require_once("../model/Reacao.php");
include_once("valida-permanencia.php");
require_once("../model/Seguindo.php");
require_once("../model/PrestacaoContasOng.php");
require_once("../model/ReacaoPrestacao.php");;

try {
  $ong = new Ong();
  $post = new Post();
  $seguindo = new Seguindo();
  $reacao = new Reacao();
  $presta = new PrestacaoContasOng();
  $reacaoPresta = new ReacaoPrestacao();

  if (isset($_SESSION['idOngListar'])) {
    $listapost = $post->listar($_SESSION['idOngListar']);
    $verificacao = $seguindo->verificarSeguir($_SESSION['iddoador'], $_SESSION['idOngListar']);
    if ($verificacao[0] <= 0) {
      unset($_SESSION['seguindo']);
    } else {
      $_SESSION['seguindo'] = true;
    }
  } else {
    $idListar = $_POST['idOng'];
    $verificacao = $seguindo->verificarSeguir($_SESSION['iddoador'], $idListar);
    if ($verificacao[0] <= 0) {
      unset($_SESSION['seguindo']);
    } else {
      $_SESSION['seguindo'] = true;
    }
    $listapost = $post->listar($idListar);
  }

  foreach ($listapost as $postagem) {
    $nomeOng = $postagem['nomeong'];
    $msg = $postagem['msgpost'];
    $dtPost = $postagem['dtpost'];
    $idOng = $postagem['idong'];
    $fotoOng = $postagem['fotoong'];
    $idPost = $postagem['idpost'];
    $tipoPerfil = "doador";
    $idPerfil = $_SESSION['iddoador'];
  }

  // $verificacao = $seguindo->verificarSeguir($_SESSION['iddoador'],$idOng);
  // if($verificacao <= 0) {
  //   unset($_SESSION['seguindo']);
  // }

  // foreach($listaid as $id) {
  //   $idOng = $id['idong'];
  // }


} catch (Exception $e) {
  echo $e->getMessage();
}

if (isset($_SESSION['iddoador'])) {
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Altruismus</title>

    <link id="size-stylesheet" rel="stylesheet" type="text/css" href="" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <link href="https://fonts.googleapis.com/css?family=Bungee+Inline" rel="stylesheet">

    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- BootsStrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js">

    <!-- Favicons -->
    <link class="logo1" href="../../BizLand/assets/img/logo21.png" rel="icon">
    <link href="../../BizLand/../../BizLand/assets/img/apple-touch-icon.png" rel="">

    <link rel="stylesheet" href="../css/social-doador.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>

  <body>

    <style>

    </style>


    <script>
      const aside = document.getElementsByClassName('aside-esquerdo')

      console.log(aside)
    </script>

    <style>
      #headerletter {
        font-size: clamp(0.9em, 0.9em + 1vw, 3em);
      }
    </style>


    <header class="header1">



      <nav>
        <div class="img-logo2">

          <section>
            <img class="img-logo" src="../../BizLand/assets/img/logo21.png" alt="">
            <p id="headerletter" style="color: white;font-weight: 600; margin-top: 10px; margin-left: 10px; ">Altruismus</p>
          </section>
        </div>


      </nav>


    </header>


    <style>
      .home {
        font-size: clamp(1em, 1em + 1vw, 1.0em);
        color: #5A56E9;

        -webkit-text-stroke-width: 1px;


      }

      .home:hover {
        color: #5A56E9;

      }

      .letras-aside a {
        align-items: center;

      }
    </style>


    <aside class="aside-esquerdo">


      <section class="letras" style="display: flex; justify-content: center;">
        <section class="itens-p">

          <style>


          </style>


          <section class="letras-aside">
            <section class="banana" id="home1" id="home1">

              <img class="icones-side" style="width: 40px;" src="../img/sidedbar/sidebar/menu/casa.png" alt="">
              </a>
              <a class="home" onclick="teste()" href="./social2.php">Home</a>

            </section>
            <section class="banana" id="home1">

              <img class="icones-side" style="width: 40px;" src="../img/sidedbar/sidebar/menu/Vector.png" alt="">
              </a>
              <a class="home" href="./explorar-doador.php">Explorar</a>
            </section>

            <section class="banana" id="home1" id="home12">


              <img class="icones-side" style="width: 40px;" src="../img/sidedbar/sidebar/menu/pessoa.png" alt="">
              </a>
              <a class="home" href="./perfil-doador.php">Perfil</a>
            </section>

            <section class="banana" id="home1" id="home12">


              <img class="icones-side" style="width: 40px;" src="../img/sidedbar/sidebar/menu/more.png" alt="">
              </a>
              <a class="home" href="./logout.php">Encerrar</a>
            </section>

            <section class="banana" id="home18">
              <form action="./pesquisa-altruismus-doador.php" class="form-busca" method="post">


                <button type="submit" style="background-color: #5A56E9; color: #E6ECF0; border-radius: 100px; padding: 0; background-color: #5A56E9;">
                  <i class="fa fa-search" style="color: white; padding: 10px;"></i>

                  <style>
                    input:focus {
                      box-shadow: 0 0 0 0;
                      outline: 0;

                    }

                    ::placeholder {
                      font-weight: 700;
                    }
                  </style>


                </button>


              </form>


            </section>

            <section class="banana" id="home14" style="padding-top: 20px; justify-content: left;align-items: center; display: flex; flex-direction: column; " style="display: flex; justify-content: center;">

              <section style="display: flex; flex-direction: column; border-radius: 10px;padding: 10px; border: 1px solid ; " class="rosa" id="rosa">

                <script>
                  const rosa = document.getElementById('rosa')

                  rosa.style.marginBottom = '1000px'
                </script>


                <section class="seguir">
                  <p class="seguir" style="font-weight: 600; padding-left: 10px; font-size: 20px;">Seguir</p>
                </section>

                <section class="siga" id="cortalvez">
                  <img width="50px" height="50px" style="border-radius: 100px;" class="testeSumi" style="border: 2px solid #5A56E9;" src="../img/631b7543a5d0d.jpg" alt="">
                  <section>

                    <p class="seguidores"> alguma coisa</p>
                    <button class="seguindo2"> Seguir</button>
                  </section>


                </section>
                <section class="siga" id="cortalvez">
                  <img width="50px" height="50px" style="border-radius: 100px;" class="testeSumi" style="border: 2px solid #5A56E9;" src="../img/631b7543a5d0d.jpg" alt="">
                  <section>

                    <p class="seguidores"> alguma coisa</p>
                    <button class="seguindo2"> Seguir</button>
                  </section>

                </section>



              </section>

            </section>
          </section>

          <style>
            .siga {
              display: flex;
            }
          </style>

        </section>

        <!-- 
                <section>
  
  
                 Sugestões
                </section> -->

      </section>


    </aside>


    <main id="elemento-chave" style="margin-top: 13px; justify-content: center; ">

      <section class="issopq">
        <section id="teste" class="pai-titulo">




        </section>

        <section class="issopq-2">

          <section class="img-section" id="capa" style="border: 2px solid #5A56E9;">


            <section>
              <img src="./foto-perfil-ong/<?php echo $fotoOng ?>" alt="" style="border-radius: 50%; width: 300px; height: 300px; border: 2px solid #5A56E9;">

            </section>


            <section class="agrvai">

              <!-- Button trigger modal -->
              <!-- <button type="button" class="btn btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Doar
                        </button> -->

              <br>

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
                      <form action="./postar.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="recipient-id" class="col-form-label">Mensagem</label>
                          <input type="text" class="form-control" placeholder="Insira sua mensagem" name="msg">
                        </div>

                        <div class="form-group">
                          <label for="recipient-id" class="col-form-label">Imagem</label>
                          <input type="file" name="imagem">
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




              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="box">
                      <div class="img-box">
                        <img src="../image/donate.png">
                      </div>
                      <div class="form-box">
                        <form method="post" action="../restrita/cadastra-doacao.php">
                          <div class="input-group">
                            <label for="data">Data da Doação</label>
                            <input type="date" id="txtDataDoacao" name="txtDataDoacao" placeholder="Digite a data da doação" required>
                          </div>

                          <div class="input-group">
                            <label for="descricao">Descrição</label>
                            <input type="text" id="txtDescDoacao" name="txtDescDoacao" placeholder="Digite a descrição" required>
                          </div>

                          <label>Ong:</label>
                          <select name="ong">
                            <option value="0">Selecione</option>
                            <?php foreach ($listaong as $listar) { ?>
                              <option value="<?php echo $listar['idong'] ?>">
                                <?php echo $listar['nomeong'] ?>
                              </option>
                            <?php } ?>
                          </select>

                          <div class="input-group">
                            <button type="submit">Doe</a></button>
                          </div>
                          <p class="temConta">Já tem uma conta? <a href="login-user.php">LOGIN</a></p>
                        </form>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                  </div>
                </div>
              </div>


            </section>

          </section>


        </section>

        <style>
          li {
            list-style: none;
          }
        </style>

      </section>



      <section style="border: 2px solid #5A56E9; ">


        <section style="display: flex; flex-direction: column; justify-content: center;">

          <style>
            #slamn {
              font-size: clamp(0.5em, 0.5em + 1vw, 3em);
              color: black;
              font-weight: 600;
            }
          </style>


          <section>

            <section style="background-color: #5A56E9; display: flex; justify-content: center;">



            </section>

            <section style="display: flex;">

              <section style="display: flex; flex-direction: column;padding: 10px;">

                <p id="slamn">

                </p>

                <p for="" id="slamn">Email</p>
                <form action="./seguir.php" method="post">
                  <button class="btn btn-primary" type="submit" name="ong" value="<?php echo $idOng ?>"><?php if ((isset($_SESSION['seguindo'])) && ($_SESSION['seguindo'] == true)) {
                                                                                                          echo "SEGUINDO";
                                                                                                        } else {
                                                                                                          echo "SEGUIR";
                                                                                                        } ?></button>
                </form>

              </section>

              <section style="display: flex;flex-direction: column; padding: 10px;">

                <p for="" id="slamn">Seguidores: 0</p>

                <p for="" id="slamn">Reações: 0</p>
              </section>


            </section>
            <section>



            </section>

          </section>

          <section id="portfoio" class="row" style=" display: flex;">
            <div class="row1" style="justify-content: center;" data-aos="fade-up">

              <div data-aos="fade-low">
                <div id="testando" class="testando12" style="border: 2px solid #5A56E9; justify-content: center; ">
                  <ul id="portfolio-flters" style="display: flex; justify-content: center; justify-content: space-between;">
                    <button style="background-color: #e9ebf7;">

                      <li data-filter=".filter-app" class="prest" style="padding: 15px;" class="filter-active">Prestações</li>

                    </button>

                    <button style="background-color: #e9ebf7;">
                      <li data-filter=".filter-card" class="prest" onclick="adiciona()" style="padding: 15px;">Pedidos</li>

                    </button>
                    <button style="background-color: #e9ebf7;">

                      <li onclick="adiciona2()" class="prest" data-filter=".filter-web" style="padding: 15px;">Fotos</li>
                    </button>


                  </ul>
                </div>
              </div>

              <style>
                .prest {
                  font-weight: 600;
                  font-size: clamp(0.4em, 0.4em + 1vw, 3em);


                }


                .nome-ong1 {

                  color: #5A56E9;
                  font-weight: 600;


                }


                .nome-ong {
                  font-size: clamp(0.5em, 0.5em + 1vw, 3em);
                  color: #5A56E9;
                  font-weight: 800;
                  padding: 0;
                  margin-top: 10px;



                }
              </style>


              <div class="portfolio-container" data-aos="fade-up" data-aos-delay="200" style="display: flex; flex-direction: column; ">

                <?php 
                  foreach ($listapost as $post) { 
                    $idPost = $post['idpost']
                ?>

                  <div class="portfolio-item filter-app" style="border: 2px solid #5A56E9;">
                    <section class="mensagens" style="border-bottom: 2px solid #5A56E9; display: flex; justify-content: left;align-items: center;padding: 30px; order: 1;">
                      <img src="./foto-perfil-ong/<?php echo $fotoOng ?>" style="border-radius: 50%; width: 50px; height: 50px; border: 2px solid #5A56E9;" alt="">

                      <section style="display: flex; flex-direction: column; align-items: center;justify-content: center;">
                        <section style="margin: 0;padding: 0;">
                          <p class="nome-ong"><?php echo $post['nomeong'] ?></p>

                        </section>
                        <p class="nome-ong1"><?php echo $post['dtpost'] ?></p>

                      </section>
                    </section>


                    <section class="nsei">
                      <p style="font-weight: 600; color: black;"><?php echo $post['msgpost'] ?></p>

                      <section>
                        <img src="./social-img/<?php echo $post['imagempost'] ?>" alt="">


                      </section>
                    </section>

                    <section style="border-top: 2px solid #5A56E9; padding-left: 30%; " class="hover">
                      <form action="" method="" id="form-curtir">
                        <?php
                        if ($reacao->verificar($idPost, $tipoPerfil, $idPerfil) == "curtiu") {
                        ?>
                          <button type="submit" id="idPost" onclick="valorBotao(<?php echo $idPost ?>,'curtida','<?php echo $tipoPerfil ?>','<?php echo $idPerfil ?>',1);" name="idPost" value="<?php echo $idPost ?>">

                            <img src="./coracao-vermelho.png" alt="" style="width: 50px; height: 50px;" id="imagem-coracao-vermelho">
                          <?php } else { ?>

                            <button type="submit" id="idPost" onclick="valorBotao(<?php echo $idPost ?>,'curtida','<?php echo $tipoPerfil ?>','<?php echo $idPerfil ?>',0);" name="idPost" value="<?php echo $idPost ?>">

                              <img src="./coracao.png" alt="" style="width: 50px; height: 50px;" id="imagem-coracao">
                            <?php } ?>
                            </button>

                      </form>

                    </section>

                  </div>



                <?php } ?>



                <div class="portfolio-item filter-web" id="divsla" style="display: flex; justify-content: center;">

                  <div class="portfolio-info" style="display: flex; justify-content: center; margin: 0;">
                    <?php foreach ($listapost as $post) { ?>

                      <section style="display: flex; justify-content: center; justify-content: space-around; border: 1px solid #5A56E9;">

                        <img id="ola" src="./social-img/<?php echo $post['imagempost'] ?>" style="width: 275px;" alt="">

                      </section>



                    <?php }  ?>

                    <style>
                      #ola:hover {
                        border: 1px solid #5A56E9;
                        -webkit-transform: scale(1.8);
                        -ms-transform: scale(1.8);
                        transform: scale(1.8);
                        z-index: 100;
                        transition: 1s;
                      }
                    </style>




                  </div>
                </div>


                <div class="col-lg-4 col-md-6 portfolio-item filter-card">

                  <div class="portfolio-info">

                    <h1 id="remove12">Algo Novo</h1>

                    <a href="../../BizLand/assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>



              </div>

            </div>
          </section><!-- End Portfolio Section -->

          <!-- ======= Team Section ======= -->



          <script>
            var element = document.getElementById('remove12')

            var element2 = document.getElementById('ola')


            const ola = document.getElementById('divsla').hidden = true;


            element.innerHTML = ''

            element2.innerHTML = ''

            function adiciona() {

              element.innerHTML = 'Olá de novo'


            }


            function adiciona2() {
              const ola = document.getElementById('divsla').hidden = false;

              element2.innerHTML = 'Olá novamente'


            }
          </script>





    </main>



    <aside class="aside-direito" style="display: flex; flex-direction: column; background-color: #e9ebf7;">

      <section class="aside-class1">

        <section style=" border: none; display: flex;" class="seção2">
          <form action="./pesquisa-altruismus-doador.php" class="busca-explorar" method="post" style="padding: 0;">

            <input type="search" style="border: 1px solid #5A56E9; border-radius: 40px 0 0 40px ; height: 40px;" class="busca" id="busca2" placeholder="Busque por Ongs" name="buscar">
            <button type="submit" onclick="historico()" style=" color: #E6ECF0; border-radius: 0px 10px 10px 0px ; padding: 7px; background-color: #5A56E9;">

              <i class="fa fa-search" style="color: white; padding: 5px;"></i>

            </button>

            <section style="height: 200px; margin-top: 65px; display: flex; flex-direction: column;">


              <section class="rosa" style=" display: flex; flex-direction: column; border-radius: 10px; border: 1px solid #5A56E9;">
                <section style="display: flex; justify-content: left; ">



                  <p style="color: #5A56E9; font-weight: 600;" class="maior">Seguindo</p>

                  <style>
                    .maior {

                      font-size: clamp(0.7em, 0.7em + 1vw, 3em);
                    }
                  </style>
                </section>

                <section style="display: flex;padding: 0;margin-top: 10px;" class="cortalvez">
                  <img style="width: 50px; height: 50px; border-radius: 100px;" src="../img/631b7543a5d0d.jpg" alt="">
                  <section style="display: flex; flex-direction: column;">
                    <p style="font-weight: 600;">Fuladno</p>
                    <button class="seguindo2"> Seguindo</button>

                  </section>
                </section>

                <section style="display: flex; padding: 0;" class="cortalvez">
                  <img style="width: 50px; height: 50px; border-radius: 100px;" src="../img/631b7543a5d0d.jpg" alt="">
                  <section style="display: flex; flex-direction: column;">
                    <p style="font-weight: 600;">Fuladno</p>
                    <button class="seguindo2"> Seguindo</button>

                  </section>
                </section>
                <section style="display: flex; padding: 0;" class="cortalvez">
                  <img style="width: 50px; height: 50px; border-radius: 100px;" src="../img/631b7543a5d0d.jpg" alt="">
                  <section style="display: flex; flex-direction: column;">
                    <p style="font-weight: 600;">Fuladno</p>
                    <button class="seguindo2"> Seguindo</button>

                  </section>
                </section>
              </section>

            </section>


            <style>
              .seguindo2 {
                background-color: #5A56E9;
                color: #e9ebf7;
                font-weight: 600;
                border-radius: 10px;
              }
            </style>




        </section>



      </section>

      </form>

      <script>
        function historico() {

          const historico = document.getElementById('busca2').value


          const busca = document.getElementById('buscaRecente')

          busca.innerHTML = historico



        }
      </script>
      </section>




      </section>


    </aside>

    <script type="text/javascript">
      var posicao = localStorage.getItem('posicaoScroll');

      if (posicao) {
        /* Timeout necessário para funcionar no Chrome */
        setTimeout(function() {
          window.scrollTo(0, posicao);
        }, 1);
      }

      window.onscroll = function(e) {
        posicao = window.scrollY;
        localStorage.setItem('posicaoScroll', JSON.stringify(posicao));
      }

      function valorBotao(postagem, reacao, perfil, iddoador, imagem) {

        idPost = postagem;
        tipoReacao = reacao;
        tipoPerfil = perfil;
        idDoador = iddoador;

        var img = imagem;

        if (img == 0) {
          img = img + 1;
          document.getElementById("imagem-coracao").src = "./coracao-vermelho.png";
          document.location.reload(true);
        } else if (img > 0) {
          document.getElementById("imagem-coracao-vermelho").src = "./coracao.png";
          document.location.reload(true);
        }

        event.preventDefault();

        $.ajax({
          type: "POST",
          url: "reagir.php",
          data: {
            tipo: tipoReacao,
            tipoperfil: tipoPerfil,
            idperfil: idDoador,
            idpost: idPost
          },
          success: function(data) {
            console.log("curtiu");
          }
        });

      }

      function curtirComent(comentario, tipoperfil, perfil, imagem) {
        var idComentario = comentario;
        var tipoPerfil = tipoperfil;
        var idPerfil = perfil;

        var img = imagem;

        if (img == 0) {
          img = img + 1;
          document.getElementById("imagem-coracao").src = "./coracao-vermelho";
          document.location.reload(true);
        } else if (img > 0) {
          document.getElementById("imagem-coracao-vermelho").src = "./coracao.png";
          document.location.reload(true);
        }

        $.ajax({
          type: "POST",
          url: "reagirComent.php",
          data: {
            idcomentario: idComentario,
            typeperfil: tipoPerfil,
            idperfil: idPerfil
          },
          success: function(data) {
            console.log("curtiu");
          }
        });

      }
    </script>


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
        var recipientInscricao = button.data('whateverinscricao')
        var recipientTel = button.data('whatevertel')

        var modal = $(this)
        modal.find('.modal-title').text('EDITAR PERFIL')
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

<?php
}
?>