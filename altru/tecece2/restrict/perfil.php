<?php
session_start();
require_once("../model/Ong.php");
require_once("../model/Doador.php");
require_once("../model/Post.php");
include_once("valida-permanencia.php");

try {

  $post = new Post();
  $doador = new Doador();
  $ong = new Ong();

  if (isset($_SESSION['iddoador'])) {
    header("Location: ../../BizLand/index.php");
    unset($_SESSION['iddoador']);
    session_destroy();
  }
} catch (Exception $e) {
  echo $e->getMessage();
}
?>

<?php
if (isset($_SESSION['idong'])) {
  $listapost = $post->listar($_SESSION['idong']);
  $perfilOng = $ong->getOng($_SESSION['idong']);
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Altruismus</title>
    <link rel="stylesheet" href="../css/social.css">
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


    <link rel="stylesheet" href="../css/social.css">

  </head>

  <body>

    <style>
      img.img-responsive {
        max-width: 90%;
        width: 1100px;
      }

      img.logo {
        max-width: 100%;
        width: 40px;
      }


      img .icones-side {
        max-width: 100%;
        width: 40px;
      }

      .img-violino {
        min-width: 90%;
        width: px;
      }
    </style>


    <script>
      const aside = document.getElementsByClassName('aside-esquerdo')

      console.log(aside)
    </script>


    <aside class="aside-esquerdo" style="border: none;" id="asideEsquerdo">
      <section class="letras" style="border: none;">
        <section class="itens-p">
          <div class="section-logo" id="logo">
            <img class="logo" src="../img/Altruismos-removebg-preview 1.png" alt="">


          </div>


          <section class="letras-aside" style="border: none;">
            <!-- <section class="banana" id="home1" id="home1">

              <a href="">

                <img class="icones-side" src="../img/sidedbar/sidebar/menu/casa.png" alt="">
              </a>
              <a class="home" onclick="teste()" href="./social2.php">Home</a>

            </section> -->
            <section class="banana" id="home1">
              <a href="">

                <img class="icones-side" src="../img/sidedbar/sidebar/menu/Vector.png" alt="">
              </a>
              <a class="home" href="./explorar.php">Explorar</a>
            </section>
            <!-- <section class="banana" id="home1">
              <a href="">

                <img class="icones-side" src="../img/sidedbar/sidebar/menu/notification.png" alt="">
              </a>
              <a href="" class="home">Notificações

              </a>


            </section> -->
            <!-- <section class="banana" id="home1">
              <a href="">
                <img style="border-radius: none;" class="icones-side" src="../img/sidedbar/sidebar/menu/mensage.png" alt="">

              </a>
              <a class="home" href="">Mensagens</a>
            </section> -->
            <section class="banana" id="home1" id="home12">
              <a href="">

                <img class="icones-side" src="../img/sidedbar/sidebar/menu/pessoa.png" alt="">
              </a>
              <a class="home" href="./perfil.php">Perfil</a>
            </section>

            <section class="banana" id="home12">
              <a href="">
                <img class="icones-side" src="../img/sidedbar/sidebar/menu/more.png" alt="">
              </a>
              <a class="home" href="./logout.php">Encerrar</a>
            </section>

            <!-- <section class="banana-button">
              <button style="border: 2px solid red;" class="doar home" id="doar" type="button">Doar</button>
            </section> -->

            <script>
              //const h1 = document.getElementById('asideEsquerdo')

              //console.log(h1)

              // aq ele remove o elemento h1.innerHTML = ''

              // const main = document.getElementById('elemento-chave')

              // main.style.padding = 0
              // console.log(main)

              // const nav = document.getElementById('nav-mobile')


              // nav.style.display = 'flex'                         
            </script>

            <section>

            </section>

          </section>


        </section>



      </section>
    </aside>

    <main id="elemento-chave" style="border: none;">

      <section class="issopq" style="border: 1px solid #E6ECF0;">

        <section id="teste" class="pai-titulo">
          <?php
          foreach ($perfilOng as $perfil) {
            $nomeOng = $perfilOng['nomeong'];
            $telefoneOng = $perfilOng['telefoneong'];
            $emailOng = $perfilOng['emailong'];
            $fotoOng = $perfilOng['fotoong'];
            $nomeOng = $perfilOng['nomeong'];
            $dtNasc = $perfilOng['datanascong'];
            $cepOng = $perfilOng['cepong'];
            $estadoOng = $perfilOng['estadoong'];
            $cidadeOng = $perfilOng['cidadeong'];
            $bairroOng = $perfilOng['bairroong'];
            $ruaOng = $perfilOng['ruaong'];
            $complementoOng = $perfilOng['complementoong'];
            $emailOng = $perfilOng['emailong'];
            $senhaOng = $perfilOng['senhaong'];
            $logradouroOng = $perfilOng['lugradouroong'];
            $telefone = $perfilOng['telefoneong'];
            $dtFundacao = implode("/", array_reverse(explode("-", $dtNasc)));
          }

          // $verificacao = $seguindo->verificarSeguir($_SESSION['iddoador'],$idOng);
          // if($verificacao <= 0) {
          //   unset($_SESSION['seguindo']);
          // }

          // foreach($listaid as $id) {
          //   $idOng = $id['idong'];
          // }
          ?>


          <img class="img-agencia" src="./foto-perfil-ong/<?php echo $fotoOng ?>" height="50px" width="50px" alt="">
          <p class="titulo"><?php echo $nomeOng ?></p>


        </section>


        <section class="issopq-2">

          <section class="img-section">

            <section class="imagm">
              <img src="./foto-perfil-ong/<?php echo $fotoOng ?>" alt="" style="border-radius: 50%;">

            </section>
            <section class="agrvai">
              <p>
              <h3><?php echo $nomeOng ?></h3>
              </p>
              <!-- Button trigger modal -->
              <!-- <button type="button" class="btn btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Doar
              </button> -->

              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editarOng" name="linha" id="linha" data-whatever="<?php echo $_SESSION['idong'] ?>" data-whatevernome="<?php echo $nomeOng ?>" data-whatevertelefone="<?php echo $telefone ?>" data-whateveremail="<?php echo $emailOng ?>" data-whatevercep="<?php echo $cepOng ?>" data-whateverestado="<?php echo $estadoOng ?>" data-whatevercidade="<?php echo $cidadeOng ?>" data-whateverbairro="<?php echo $bairroOng ?>" data-whateverrua="<?php echo $ruaOng ?>" data-whatevercomplemento="<?php echo $complementoOng ?>" data-whateverlogradouro="<?php echo $logradouroOng ?>" data-whateversenha="<?php echo $senhaOng ?>" data-whateverfundacao="<?php echo $dtNasc ?>">
                Editar Perfil
              </button>

              <br>
              <br>


              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#postar" style="background-color: #5A56E9;border: none;">Publicar</button>
              <br>
              <label for=""><?php echo "EMAIL: " . $emailOng ?></label>
              <br>
              <label for="">TELEFONE: <?php echo $telefone ?></label>
              <br>
              <label for="">FUNDAÇÃO: <?php echo $dtFundacao ?></label>
              <br>

              <div class="modal fade" id="editarOng" tabindex="-1" role="dialog" aria-labelledby="editar" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">EDITAR INFORMAÇÕES</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="./editar-perfil-ong.php" method="post">

                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">NOME DA ONG</label>
                          <input type="text" class="form-control" id="recipient-name" name="nomeEditar">
                        </div>
                        <div class="form-group">
                          <label for="recipient-fundacao" class="col-form-label">FUNDAÇÃO</label>
                          <input type="date" class="form-control" id="recipient-fundacao" name="dtNasc">
                        </div>
                        <div class="form-group">
                          <label for="recipient-email" class="col-form-label">EMAIL</label>
                          <input type="text" class="form-control" id="recipient-email" name="emailEditar">
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
                          <label for="recipient-telefone" class="col-form-label">TELEFONE</label>
                          <input type="text" class="form-control" id="recipient-telefone" name="telefoneEditar">
                        </div>
                        <div class="form-group">
                          <label for="recipient-senha" class="col-form-label">SENHA</label>
                          <input type="text" class="form-control" id="recipient-senha" name="senhaOng">
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

              <div class="modal fade" id="postar" tabindex="-1" role="dialog" aria-labelledby="editar" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Fazer postagem</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="./postar.php" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                          <label for="recipient-fundacao" class="col-form-label">Mensagem</label>
                          <input type="text" class="form-control" id="recipient-fundacao" name="msg">
                        </div>
                        <div class="form-group">
                          <label for="recipient-email" class="col-form-label">Foto</label>
                          <input type="file" class="form-control" id="recipient-email" name="imagem">
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

            </section>

          </section>
          <section class="redonda">
            <img class="img-top" src="img/img-social2/upwork-pp.png" alt="">
          </section>

        </section>

        <script>
          const teste = () => {
            const imagem = document.getElementById('coracao-img')

            const coracao = document.getElementById('coracao')



          }
        </script>


        <style>
          li {
            list-style: none;
          }
        </style>

      </section>
      <section style="border: 2px solid #E6ECF0;">




        <section id="portfolio" class="portfolio">
          <div class="container" style="justify-content: center;" data-aos="fade-up">

            <div class="row" data-aos="fade-low" data-aos-delay="100">
              <div class="col-lg-12 ">
                <ul id="portfolio-flters" id="tentando" style="display: flex; border: 1px solid; justify-content: space-around; ">

                  <!-- <li id="testando" data-filter=".filter-app" style="padding: 15px;">Pedidos</li> -->
                  <li id="testando" data-filter=".filter-web" style="padding: 15px;">Pedidos</li>


                </ul>
              </div>
            </div>



            <style>
              #testando:hover {
                border-bottom: #5A56E9 solid 5px;

              }
            </style>

            <!-- ======= Portfolio Section ======= -->

            <section style="border: 2px solid #E6ECF0;">




              <section id="portfolio" class="portfolio">
                <div class="container" data-aos="fade-up">




                  <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="300">

                    <div class="col-lg-4 col-md-6 portfolio-item filter-sla">
                      <div class="portfolio-wrap">
                        <img src="assets/img/Altruismus.png" class="img-fluid" alt="">
                        <div class="portfolio-info">


                          <div class="portfolio-links">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                      <div class="portfolio-wrap">

                        <div class="portfolio-info">

                          <?php
                          foreach ($listapost as $post) { ?>


                            <div style="justify-content: center; border-bottom: #5A56E9 2px solid;">
                              <section class="mensagens" style="display: flex;">
                                <img src="./foto-perfil-ong/<?php echo $fotoOng ?>" alt="" style="border-radius: 50%; width: 50px; height: 50px;">
                                <p><?php echo $post['nomeong'] ?></p>

                              </section>
                              <section>
                                <p><?php echo $post['dtpost'] ?></p>
                              </section>

                              <section class="mensagens2">

                                <p><?php echo $post['msgpost'] ?></p>


                                <img class="img-violino" style="height: 400px; width: 400px; " src="./social-img/<?php echo $post['imagempost'] ?>" alt="">


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



    <aside class="aside-direito">

      <section class="aside-class" style="background-color: white; border: none;">


        <section style="background-color: white;border: none; ">
          <form action="./pesquisa-altruismus.php" method="post">

            <input type="search" style="border: 1px solid #5A56E9;" class="busca" id="busca" placeholder="Busque por Ongs" name="buscar">
            <button type="submit" style="background-color: #5A56E9; color: #E6ECF0; border-radius: 100px;">
              <i class="fa fa-search" style="color: white; padding: 10px;"></i>

              <style>
                input:focus {
                  box-shadow: 0 0 0 0;
                  outline: 0;

                }
              </style>


            </button>

          </form>
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

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $('#editarOng').on('show.bs.modal', function(event) {
        // Button that triggered the modal
        var button = $(event.relatedTarget)

        // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead. 
        var recipient = button.data('whatever')
        var recipientNome = button.data('whatevernome')
        var recipientEmail = button.data('whateveremail')
        var recipientEstado = button.data('whateverestado')
        var recipientCidade = button.data('whatevercidade')
        var recipientBairro = button.data('whateverbairro')
        var recipientRua = button.data('whateverrua')
        var recipientCep = button.data('whatevercep')
        var recipientComplemento = button.data('whatevercomplemento')
        var recipientLogradouro = button.data('whateverlogradouro')
        var telefone = button.data('whatevertelefone')
        var fundacao = button.data('whateverfundacao')

        var modal = $(this)
        modal.find('.modal-title').text('EDITAR INFORMAÇÕES')
        modal.find('#recipient-id').val(recipient)
        modal.find('#recipient-name').val(recipientNome)
        modal.find('#recipient-email').val(recipientEmail)
        modal.find('#recipient-estado').val(recipientEstado)
        modal.find('#recipient-cidade').val(recipientCidade)
        modal.find('#recipient-bairro').val(recipientBairro)
        modal.find('#recipient-rua').val(recipientRua)
        modal.find('#recipient-cep').val(recipientCep)
        modal.find('#recipient-complemento').val(recipientComplemento)
        modal.find('#recipient-logradouro').val(recipientLogradouro)
        modal.find('#recipient-telefone').val(telefone)
        modal.find('#recipient-fundacao').val(fundacao)
      })

      //MODAL DE EXCLUIR//
      $('#excluir').on('show.bs.modal', function(event) {

        var button = $(event.relatedTarget)
        var recipient = button.data('whatever')
        var modal = $(this)

        modal.find('.modal-title').text('EXCLUIR INFORMAÇÕES DO ID ' + recipient)
        modal.find('#idOng').val(recipient)

      })
    </script>




  </body>

  </html>


<?php } ?>