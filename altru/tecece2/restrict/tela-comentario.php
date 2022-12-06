<?php

session_start();
require_once("../model/Post.php");
require_once("../model/Comentario.php");
require_once("../model/Reacao.php");
require_once("../model/ReacaoComent.php");
require_once("../model/Doador.php");
require_once("../model/Seguindo.php");

include_once("valida-permanencia.php");


$postagem = new Post();
$coment = new Comentario();
$reacao = new Reacao();
$reacaoComent = new ReacaoComent();
$seguindo = new Seguindo();

if (isset($_POST['btnComentar'])) {
  $idPost = $_POST['btnComentar'];
  $_SESSION['post'] = $idPost;
  $listarcomentario = $coment->listar($idPost);
  $listarpostagem = $postagem->listarPostId($idPost);
} else if (isset($_SESSION['post'])) {
  $listarcomentario = $coment->listar($_SESSION['post']);
  $listarpostagem = $postagem->listarPostId($_SESSION['post']);
}

$tipoPerfil = "ong";
$idPerfil = $_SESSION['idong'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Altruismus</title>

  <link class="logo1" href="../../BizLand/assets/img/logo21.png" rel="icon">
  <link rel="stylesheet" href="../css/tela-comentario.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



  <link href="https://fonts.googleapis.com/css?family=Bungee+Inline" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background-color: #E6ECF0;">

  <div class="modal fade" id="pedido" tabindex="-1" role="dialog" aria-labelledby="editar" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Fazer pedido</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="./postar.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label for="recipient-fundacao" class="col-form-label">Quantidade de Itens que quer receber</label>
              <input type="text" class="form-control" id="recipient-fundacao" name="txtQuantidade">
            </div>

            <div class="form-group">
              <label for="recipient-fundacao" class="col-form-label">Produtos que quer receber</label>
              <input type="text" class="form-control" id="recipient-fundacao" name="txtDescItem">
            </div>

            <div class="form-group">
              <label for="recipient-email" class="col-form-label">Foto</label>
              <input type="file" class="form-control" id="recipient-email" name="imagem">
            </div>

            <div class="form-group">
              <label for="recipient-fundacao" class="col-form-label">Mensagem</label>
              <input type="textarea" class="form-control" id="recipient-fundacao" name="msg">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
          <button type="submit" class="btn btn-danger" style="background-color: #5A56E9;border: none;">SALVAR</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="prestacao" tabindex="-1" role="dialog" aria-labelledby="editar" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Prestação de Contas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="./prestar.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label for="recipient-fundacao" class="col-form-label">Quantidade de Itens Recebidos</label>
              <input type="text" class="form-control" id="recipient-fundacao" name="txtqtdItens">
            </div>

            <div class="form-group">
              <label for="recipient-fundacao" class="col-form-label">Mensagem</label>
              <input type="text" class="form-control" id="recipient-fundacao" name="txtprod">
            </div>

            <div class="input-group w50">
              <label for="data" style="flex: 0.67;">Data que a doação foi feita</label>
            </div>
            <div class="input-group w50" style="flex-flow: row;">
              <input type="date" id="txtDtDoacao" name="txtDtDoacao" style="  border-radius: 20px ;" required>
            </div>

            <div class="form-group">
              <label for="recipient-fundacao" class="col-form-label">Produtos Recebidos</label>
              <input type="textarea" class="form-control" id="recipient-fundacao" name="txtmsg">
            </div>

            <div class="form-group">
              <label for="recipient-email" class="col-form-label">Foto</label>
              <input type="file" class="form-control" id="recipient-email" name="imagem">
            </div>

            <div class="form-group">
              <label for="recipient-email" class="col-form-label">Foto do doador (opcional)</label>
              <input type="file" class="form-control" id="recipient-email" name="imagem2">
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
          <button type="submit" class="btn btn-danger" style="background-color: #5A56E9;border: none;">ENVIAR</button>
        </div>
        </form>
      </div>
    </div>
  </div>


  <header class="header1">

    <style>
      #headerletter {
        font-size: clamp(0.9em, 0.9em + 1vw, 3em);
      }
    </style>

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




  <aside class="aside-esquerdo" style="justify-content: right;">


    <section class="letras" style="justify-content: right;border-radius: 0;">
      <section class="itens-p" style="justify-content: left;">

        <section class="letras-aside" style=" border-radius: 10px; text-align: center; justify-content: left;  align-items: left;">

          <section class="banana" id="home1" style="display: flex; justify-content: left; ">
            <!-- <img class="icones-side" style="width: 40px;" src="../img/sidedbar/sidebar/menu/Vector.png" alt="">
        </a> -->
            <a class="home" href="./minhas-publicacoes.php">Minhas publicações</a>
          </section>


          <section class="banana" id="home1" id="home1" style="display: flex; justify-content: left;">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#publicacao150" style="background-color: #5A56E9;border: none;">
              <section style="background-color: #5A56E9; color: #E6ECF0;">

                Publicar

              </section>
          </section>
          <section class="banana" id="home1" style="display: flex; justify-content: left; ">

            <img class="icones-side" style="width: 40px;" src="../img/sidedbar/sidebar/menu/Vector.png" alt="">
            </a>
            <a class="home" href="./explorar.php">Explorar</a>
          </section>

          <section class="banana" id="home1" id="home12" style="display: flex; justify-content: left;">


            <img class="icones-side" style="width: 40px;" src="../img/sidedbar/sidebar/menu/pessoa.png" alt="">
            </a>
            <a class="home" href="./perfil.php">Perfil</a>
          </section>

          <section class="banana" id="home1" id="home12" style="display: flex; justify-content: left;">


            <img class="icones-side" style="width: 40px;" src="../img/sidedbar/sidebar/menu/more.png" alt="">
            </a>
            <a class="home" href="./logout.php">Encerrar</a>
          </section>

          <section class="banana" id="home18" style="display: flex; justify-content: left;">
            <form action="./pesquisa-altruismus.php" class="form-busca" method="post">


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




  </aside>

  <main id="elemento-chave" style="margin-top: 10px;">

    <section style="border: 1px solid #E6ECF0;">


      <?php
      foreach ($listarpostagem as $post) {

        $idOng = $post['idong'];
        $idPost = $post['idpost'];
      ?>

        <section class="frase-do-img" style="padding: 10px;border: 2px solid #5A56E9; border-bottom: none;">
          <form action="./social.php" method="post">
            <button type="submit" name="idOng" value="<?php echo $idOng ?>" style="display: flex;padding: 10px;">
              <img src="./foto-perfil-ong/<?php echo $post['fotoong'] ?>" style="border-radius: 50%; width: 50px; height: 50px; border: 2px solid #5A56E9;" alt="">


              <section style="display: flex;flex-direction: column;padding: 5px;">

                <p class="nome-ong"><?php echo $nomeOng = $post['nomeong'] ?></p>
                <!-- <p> @ADB</p> -->

                <p style="font-weight: 800;"><?php echo $post['dtpost'] ?></p>

              </section>
            </button>
          </form>


        </section>

        <section class="" style="border: 2px solid #5A56E9;">
          <section class="frase">
            <section class="juncao" style="display: flex; justify-content: left;margin-left: 20%;">
              <p class="desc" style="font-weight: 800;"><?php echo $post['msgpost'] ?></p>
            </section>

            <section style="display: flex; justify-content: center;">
              <img class="img-responsive" src="./social-img/<?php echo $post['imagempost'] ?>" style="width: 300px;" alt="">
            </section>

          </section>
        </section>
        <style>
          .comentar {
            background-color: #5A56E9;
          }


          .comentar:hover {}

          ::placeholder {
            font-weight: 800;
          }
        </style>


        <section style="display: flex;justify-content: center;justify-content: space-around;align-items: center;border: 2px solid #5A56E9;">

          <?php
          $dataCurtida = date('Y-m-d H:i:s');
          ?>

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




        <section id="superteste" style="border: 2px solid #5A56E9;justify-content: center;  border: 2px solid #5A56E9;padding: 10px;">
          <style>





          </style>

          <?php
          foreach ($listarcomentario as $comentario) {
            $idComentario = $comentario['idcomentario'];
            $idDoador = $comentario['iddoador'];
          ?>


            <section id="superteste" style="display: flex;flex-direction: column;border: 2px solid #5A56E9;border-radius: 10px;background-color: #E6ECF0;">
              <section style="display: flex;padding: 10px;">
                <a>
                  <form action="./view-doador.php" method="post" style="border: 2px solid #5A56E9;border-radius: 50%;">
                    <button type="submit" name="idDoador" value="<?php echo $idDoador ?>">
                      <img src="./foto-perfil-doador/<?php echo $comentario['fotodoador']  ?>" style=" width: 50px; height: 50px;" alt="">
                    </button>
                  </form>

                </a>
                </button>
                <section style="display: flex; flex-direction: column;">
                  <p style="font-weight: 700;"><?php echo $comentario['nomedoador'] ?></p>
                  <p style="font-weight: 700;"><?php echo $comentario['datacomentario'] ?></p>


                  <section style="display: flex;">


                    <p style="font-weight: 900;margin: 5px;"><?php echo $comentario['comentario'] ?></p>
                    <form action="" method="" id="form-curtir-coment">
                      <?php
                      if ($reacaoComent->verificar($idComentario, $idPerfil, $tipoPerfil) == "curtiuComentario") {
                      ?>
                        <button type="submit" id="idComentario" onclick="curtirComent(<?php echo $idComentario ?>,'<?php echo $tipoPerfil ?>','<?php echo $idPerfil ?>',1);" name="idPost" value="<?php echo $idComentario ?>">
                          <img src="./coracao-vermelho.png" alt="" style="width: 30px; height: 30px;" id="imagem-coracao-vermelho">
                        </button>
                      <?php } else { ?>

                        <button type="submit" id="idComentario" onclick="curtirComent(<?php echo $idComentario ?>,'<?php echo $tipoPerfil ?>','<?php echo $idPerfil ?>',0);" name="idPost" value="<?php echo $idComentario ?>">
                          <img src="./coracao.png" alt="" style="width: 30px; height: 30px;" id="imagem-coracao">
                        </button>
                      <?php } ?>

                    </form>



                  </section>
                </section>



              </section>





            </section>





          <?php } ?>



          </div>



        <?php } ?>



        </div>


        </section>
        <script>
          function exbir() {

            var obj2 = document.getElementById('superteste').hidden = false;


          }


          var form13 = document.getElementById('form13').hidden = true;
          var obj = document.getElementById('form12').hidden = true;



          function mostrar() {

            var obj = document.getElementById('form12').hidden = false;
            var form13 = document.getElementById('form13').hidden = false;
            var coment100 = document.getElementById('coment100')
            coment100.style.padding = '10px'




          }

          function enviar() {
            var obj2 = document.getElementById('superteste').hidden = false;

          }
        </script>

  </main>

  <div class="modal fade" id="publicacao150" tabindex="-1" role="dialog" aria-labelledby="editar2" aria-hidden="true">
    <div class="modal-dialog" role="document2">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel5">Escolha uma das postagens</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pedido" style="background-color: #5A56E9;border: none;">
            <section style="background-color: #5A56E9; color: #E6ECF0;">
              Pedir
            </section>
          </button>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#prestacao" style="background-color: #5A56E9;border: none;">
            <section style="background-color: #5A56E9; color: #E6ECF0;">
              Prestar contas
            </section>
          </button>
        </div>
      </div>
    </div>
  </div>

  <aside class="aside-direito" style="display: flex; flex-direction: column; background-color: #e9ebf7;">

    <section class="aside-class1">

      <section style=" border: none; display: flex;" class="seção2">

        <form action="./pesquisa-altruismus.php" class="busca-explorar" method="post" style="padding: 0;">

          <input type="search" style="border: 1px solid #5A56E9; border-radius: 40px 0 0 40px ; height: 40px;" class="busca" id="busca2" placeholder="Busque por Ongs" name="buscar">
          <button type="submit" onclick="historico()" style=" color: #E6ECF0; border-radius: 0px 10px 10px 0px ; padding: 7px; background-color: #5A56E9;">

            <i class="fa fa-search" style="color: white; padding: 5px;"></i>

          </button>

          <section style="height: 200px; margin-top: 65px; display: flex; flex-direction: column;">


            <section style="height: 200px; margin-top: 65px; display: flex; flex-direction: column;">


              <section class="rosa" style=" display: flex; flex-direction: column; border-radius: 10px; border: 1px solid #5A56E9;">
                <section style="display: flex; justify-content: left; ">



                  <p style="color: #5A56E9; font-weight: 600;" class="maior">Seguidores</p>

                  <style>
                    .maior {

                      font-size: clamp(0.7em, 0.7em + 1vw, 3em);
                    }
                  </style>
                </section>

                <?php
                $listarSeguidores = $seguindo->listarSeguidores($_SESSION['idong']);

                foreach ($listarSeguidores as $listaSeguidores) {
                ?>


                  <section style="display: flex; padding: 0;" class="cortalvez">
                    <img style="width: 50px; height: 50px; border-radius: 100px;" src="./foto-perfil-doador/<?php echo $listaSeguidores['fotodoador'] ?>" alt="">
                    <section style="display: flex; flex-direction: column;">
                      <p style="font-weight: 600;"><?php echo $listaSeguidores['nomedoador'] ?></p>
                      <button class="seguindo2" style="background-color: #e9ebf7; color: black;"><?php echo $listaSeguidores['emaildoador'] ?></button>

                    </section>
                  </section>

                <?php } ?>

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

      // event.preventDefault();

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


</body>

</html>