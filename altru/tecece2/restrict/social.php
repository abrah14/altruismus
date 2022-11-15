<?php
session_start();
require_once("../model/Ong.php");
require_once("../model/Post.php");
include_once("valida-permanencia.php");

try {
  $ong = new Ong();

  $post = new Post();



  $listaong = $ong->listar();
} catch (Exception $e) {
  echo $e->getMessage();
}
?>

<?php
if (isset($_SESSION['idong'])) {
  $listapost = $post->listar($_SESSION['idong']);
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

            <section class="banana-button">
              <button style="border: 2px solid red;" class="doar home" id="doar" type="button">Doar</button>
            </section>






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




          <div class="img-agencio" height="50px" width="50px" alt="">

            <div class="vigia">

            </div>

            <script>
              const remove = document.getElementById('remove2')

              console.lo(remove)
            </script>

          </div>



        </section>


        <section class="issopq-2">

          <section class="img-section">

            <section class="agrvai">
              Agencia do bem
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
              <p>Design and development agency that promotes innovation through elevated websites, applications, and eCommerce solutions</p>
              <p>Translate bio</p>
              <p>Joined November 2019</p>

              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editar" style="background-color: #5A56E9;border: none;">Publicar</button>




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

                        <?php foreach ($listapost as $post) { ?>


                          <div style="justify-content: center; border-bottom: #5A56E9 2px solid;">
                            <section class="mensagens" style="display: flex;">

                              <p><?php echo $post['nomeong'] ?></p>

                              <p>ADB </p>

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