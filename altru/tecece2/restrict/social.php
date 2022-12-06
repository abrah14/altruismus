<?php

session_start();

require_once("../model/Ong.php");
require_once("../model/Post.php");
require_once("../model/Reacao.php");
require_once("../model/Seguindo.php");

include_once("valida-permanencia.php");

try {
  $ong = new Ong();
  $post = new Post();
  $seguindo = new Seguindo();
  $reacao = new Reacao();

  $_SESSION['social'] = true;

  if (isset($_SESSION['idOng'])) {
    $idListar = $_POST['idOng'];
    $verificacao = $seguindo->verificarSeguir($_SESSION['idong'], $_SESSION['idOng']);
    if ($_SESSION['idOng'] == $_SESSION['idong']) {
      header("Location: perfil.php");
    }
  } else {
    $idListar = $_POST['idOng'];
    $verificacao = $seguindo->verificarSeguir($_SESSION['idong'], $idListar);
    if ($idListar == $_SESSION['idong']) {
      header("Location: perfil.php");
    }
  }

  if ($verificacao[0] <= 0) {
    // unset($_SESSION['seguindo']);
    $segue = false;
  } else {
    // $_SESSION['seguindo'] == true;
    $segue = true;
  }

  $listapost = $post->listar($idListar);

  // $listaong = $ong->listar();
} catch (Exception $e) {
  echo $e->getMessage();
}
?>

<?php
if (isset($_SESSION['idong'])) {
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

    <script src="../JS/social.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Bungee+Inline" rel="stylesheet">

    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- BootsStrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js">

    <!-- Favicons -->
    <link class="logo1" href="../../BizLand/../../BizLand/assets/img/logo1.png" rel="icon">
    <link href="../../BizLand/../../BizLand/assets/img/apple-touch-icon.png" rel="">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="../css/explorar-doador.css">

  </head>

  <body>

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

      <nav>
        <div class="img-logo2">

          <section>
            <img class="img-logo" src="../../BizLand/assets/img/logo21.png" alt="">
            <p id="headerletter" style="color: white;font-weight: 600; margin-top: 10px; margin-left: 10px; ">Altruismus</p>
          </section>
        </div>

        <style>
          #headerletter {
            font-size: clamp(0.9em, 0.9em + 1vw, 3em);
          }
        </style>



        <style>
          #headerletter2 {
            font-size: clamp(0.5em, 0.5em + 1vw, 2em);
            color: black;
            font-weight: 600;
          }

          .nome-ong {
            font-size: clamp(0.5em, 0.5em + 1vw, 2em);
            color: black;
            font-weight: 600;

          }
        </style>
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


    </aside>

    <main id="elemento-chave"  >
      <section class="issopq" style="justify-content: center;border: 2px solid green;justify-content: center;align-items: center;flex-direction: column;display: flex;">

        <section id="teste" class="pai-titulo"  style="justify-content: center;border: 2px solid green;justify-content: center;align-items: center;flex-direction: column;display: flex;"> 

          <?php

          foreach ($listapost as $postagem) {
            $idOng = $postagem['idong'];
            $nomeOng = $postagem['nomeong'];
            $msg = $postagem['msgpost'];
            $dtPost = $postagem['dtpost'];
            $idOng = $postagem['idong'];
            $fotoOng = $postagem['fotoong'];
            $idPost = $postagem['idpost'];
            $telefone = $postagem['telefoneong'];
            $email = $postagem['emailong'];
            if ($_SESSION['idong']) {
              $tipoPerfil = "ong";
              $idPerfil = $_SESSION['idong'];
            }
          }

          ?>


        </section>


        <section class="issopq-2"  style="justify-content: center;border: 2px solid green;justify-content: center;align-items: center;flex-direction: column;display: flex;">

          <section class="img-section div"  style="justify-content: center;border: 2px solid green;justify-content: center;align-items: center;flex-direction: column;display: flex;">
            <section class="div" style="border: 2px solid red;display: flex;justify-content: center;">

              <img src="./foto-perfil-ong/<?php echo $fotoOng ?>" alt="">
            </section>

            <section class="agrvai div" style="border: 2px solid #5A56E9;">
              <p class="titulo"><?php echo $nomeOng ?></p>
              <p class="titulo">Telefone: <?php echo $telefone ?></p>
              <p class="titulo">Email: <?php echo $email ?></p>



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



            </section>

          </section>
       
        </section>

        
        <style>
          li {
            list-style: none;
          }
        </style>

      </section>
      <section id="portfolio"  class="portfolio div" style="justify-content: center;border: 2px solid green;justify-content: center;align-items: center;flex-direction: column;display: flex;">
        <div class="container" style="justify-content: center;" data-aos="fade-up">

          <div class="row" data-aos="fade-low" data-aos-delay="100">

            <ul id="portfolio-flters" id="tentando" style="display: flex;  justify-content: space-around;border: 2px solid red;">

              <!-- <li id="testando" data-filter=".filter-app" style="padding: 15px;">Pedidos</li> -->
              <li id="testando" data-filter=".filter-web" style="padding: 15px;">Pedidos</li>
              <li id="testando" data-filter=".filter-card" style="padding: 15px;">Prestações</li>
            

            </ul>

          </div>



          <style>
            #testando:hover {
              border-bottom: #5A56E9 solid 5px;

            }
          </style>

          <!-- ======= Portfolio Section ======= -->

          <section style="border: 2px solid #E6ECF0;"  style="justify-content: center;border: 2px solid green;justify-content: center;align-items: center;flex-direction: column;display: flex;">




            <section id="portfolio" class="portfolio">
              <div class="container" data-aos="fade-up">

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="300">

                  <div class="portfolio-item filter-sla">
                    <div class="portfolio-wrap">
                      <img src="assets/img/Altruismus.png" class="img-fluid" alt="">
                      <div class="portfolio-info">


                        <div class="portfolio-links">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="portfolio-item filter-web">
                    <div>

                      <div class="portfolio-info">

                        <?php foreach ($listapost as $post) { ?>


                          <div style="justify-content: center; border: 2px solid red;width: 300px;">
                            <section class="mensagens" style="display: flex;">

                              <img src="./foto-perfil-ong/<?php echo $fotoOng ?>" alt="">
                              <p><?php echo $post['nomeong'] ?></p>
                              <p><?php echo $post['dtpost'] ?></p>

                            </section>

                            <section class="mensagens2">

                              <p><?php echo $post['msgpost'] ?></p>

                              <?php
                              if (isset($_SESSION['iddoador'])) {
                                $idPost = $post['idpost'];
                                $idPerfil = $_SESSION['iddoador'];
                                $tipoPerfil = "doador";
                              } else if (isset($_SESSION['idong'])) {
                                $idPost = $post['idpost'];
                                $idPerfil = $_SESSION['idong'];
                                $tipoPerfil = "ong";
                              }
                              ?>

                              <img class="div" src="./social-img/<?php echo $post['imagempost'] ?>" alt="">

                              <form action="" method="" id="form-curtir">
                                <?php
                                if ($reacao->verificar($idPost, $tipoPerfil, $idPerfil) == "curtiu") {
                                ?>
                                  <button type="submit" id="idPost" onclick="valorBotao(<?php echo $post['idpost'] ?>,'curtida','<?php echo $tipoPerfil ?>','<?php echo $idPerfil ?>',1);" name="idPost" value="<?php echo $post['idpost'] ?>">

                                    <img src="./coracao-vermelho.png" alt="" style="width: 50px; height: 50px;" id="imagem-coracao-vermelho">
                                  <?php } else { ?>

                                    <button type="submit" id="idPost" onclick="valorBotao(<?php echo $post['idpost'] ?>,'curtida','<?php echo $tipoPerfil ?>','<?php echo $idPerfil ?>',0);" name="idPost" value="<?php echo $post['idpost'] ?>">

                                      <img src="./coracao.png" alt="" style="width: 50px; height: 50px;" id="imagem-coracao">
                                    <?php } ?>
                                    </button>

                              </form>

                              <?php
                              $dataCurtida = date('Y-m-d H:i:s');
                              ?>


                              <form action="./tela-comentario.php" method="post">
                                <button type="submit" value="<?php echo $post['idpost'] ?>" name="btnComentar">COMENTAR</button>
                              </form>

                            </section>

                          </div>
                      </div>
                    </div>

                  <?php } ?>
                  </div>

                </div>
            </section><!-- End Portfolio Section -->
          </section>



          <!-- ======= Team Section ======= -->

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
      </form>

      <form action="" class="element-fixed" method="post" style="display: flex;flex-direction: column;position: fixed;">
    
      <select name="tipo_publicacao" id="tipo_publicacao">

        <option value="1" selected>Pedido</option>
        <option value="2" >Prestação de contas</option>

      </select>
      </form>
      
    


      </section>


      <style>




      </style>








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

<?php
} else if (isset($_SESSION['idadmin'])) {
  header("Location: ../../BizLand/index.php");
  unset($_SESSION['idadmin']);
  session_destroy();
} else if (isset($_SESSION['iddoador'])) {
  header("Location: ../../BizLand/index.php");
  unset($_SESSION['iddoador']);
  session_destroy();
}
?>