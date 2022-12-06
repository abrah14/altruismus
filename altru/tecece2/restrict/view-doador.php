<?php
session_start();

require_once("../model/Ong.php");
require_once("../model/Doador.php");
require_once("../model/Post.php");
require_once("../model/Seguindo.php");
require_once("../model/Reacao.php");
require_once("../model/ReacaoComent.php");

include_once("valida-permanencia.php");

try {

  $post = new Post();
  $doador = new Doador();
  $ong = new Ong();
  $seguindo = new Seguindo();
  $reacao = new Reacao();
  $reacaoComent = new ReacaoComent();

  $perfilDoador = $doador->getDoador($_POST['idDoador']);
  $quantReacoesComent = $reacaoComent->countReacaoComent($_POST['idDoador'], "doador");
} catch (Exception $e) {
  echo $e->getMessage();
}
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

  <link rel="stylesheet" href="../css/perfilDoadorNovo.css">
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




          <section class="banana" id="home14" style="padding-top: 20px; justify-content: left;align-items: center; display: flex; flex-direction: column; " style="display: flex; justify-content: center;">




  </aside>

  <style>
    .siga {
      display: flex;
    }
  </style>

  <main id="elemento-chave" style="margin-top: 15px; justify-content: center; border: 2pxm solid red;padding: 0;">

    <section class="issopq" style="border: 1px solid #5A56E9; border-radius: 10px;">
      <section id="teste" class="pai-titulo">
        <?php
        foreach ($perfilDoador as $perfil) {
          $nomeDoador = $perfilDoador['nomedoador'];
          $telefoneDoador = $perfilDoador['telefonedoador'];
          $emailDoador = $perfilDoador['emaildoador'];
          $fotoDoador = $perfilDoador['fotodoador'];
          $entrada = $perfilDoador['datainscricao'];
        }


        ?>

      </section>

      <section class="capa" style="margin-bottom: 10px;">


      </section>

      <!-- ======= Team Section ======= -->
      <section id="tea" class="team section-bg">
        <div class="container" data-aos="fad-up">
          <div data-aos="fade-up" data-aos-delay="200">

            <div class="membr" id="nseidizer">
              <script>
                const teste = document.getElementById('nseidizer')
              </script>

              <div class="member-im" id="fullFoto" style="display: flex;flex-direction: column;border-radius: 10px;">
                <div style="display: flex; justify-content: center;border-radius: 10000px; padding: 10px;">

                  <img style="width: 300px; border-radius: 10px;border: 3px solid #a0a9fa;" id="teste30" src="./foto-perfil-doador/<?php echo $fotoDoador ?>" alt="">
                </div>


              </div>


              <p>
              </p>
      </section>
      <section class="agrvai" style="background-color: #e9ebf7;">

        <section style="display: flex; padding-top: 10px; padding: 5px; border: 5px solid #5A56E9;border-radius: 10px; ">

          <section style="padding: 10px; display: flex; flex-direction: column; border: 10 solid white;">

            <p id="slamn" style="color: black;font-weight: 600;"><?php echo $nomeDoador ?></p>
            <p id="slamn" style="color: black;font-weight: 600; "> <?php echo $emailDoador ?></p>




          </section>

          <section style="padding: 10px;">

            <?php
            $quantidade = $seguindo->countSeguindo($_POST['idDoador']);
            $quantidadeReacao = $reacao->countReacao($_POST['idDoador'], 'doador');
            ?>

            <p id="slamn" style="color: black;font-weight: 600; ">Seguindo: <?php echo $quantidade ?> </p>
            <p id="slamn" style="color: black;font-weight: 600; ">Reações: <?php echo ($quantidadeReacao + $quantReacoesComent) ?> </p>
          </section>

          <section style="padding: 10px;">

            <p id="slamn" style="color: black;font-weight: 600;" for=""><?php echo $telefoneDoador ?></p>
            <p id="slamn" style="color: black;font-weight: 600;"> Data de entrada: <?php echo date('d/m/y H:i:s', strtotime($entrada)) ?> </p>
          </section>

          <style>
            #slamn {
              font-size: clamp(0.5em, 0.5em + 1vw, 3em);
            }
          </style>

        </section>
        <!-- Button trigger modal -->

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
                <form action="./editar-perfil-doador.php" method="post" enctype="multipart/form-data">

                  <div class="input-group">
                    <label for="email">Foto</label>
                    <input style="border-radius: 20px;" type="file" id="imagem" name="imagem">
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
                    <label for="recipient-telefone" class="col-form-label">Telefone</label>
                    <input type="text" class="form-control" id="recipient-telefone" name="telefoneEditar" readonly>
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

        </div>
      </section>
      <!-- End Team Section -->


      <section class="issopq-2">




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




        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">


          <div class="col-lg-4 col-md-6 portfolio-item filter-web">

            <!-- Imgem fica aq-->

          </div>

        </div>
    </section><!-- End Portfolio Section -->

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



  <aside class="aside-direito" style="display: flex; flex-direction: column; background-color: #e9ebf7; ">

    <section class="aside-class1">


      <section style=" border: none; display: flex;margin-top: 18px;" class="seção2">
        <form action="./pesquisa-altruismus.php" class="busca-explorar" method="post" style="padding: 0;">

          <input type="search" style="border: 1px solid #5A56E9; border-radius: 40px 0 0 40px ; height: 40px;" class="busca" id="busca2" placeholder="Busque por Ongs" name="buscar">
          <button type="submit" onclick="historico()" style=" color: #E6ECF0; border-radius: 0px 10px 10px 0px ; padding: 7px; background-color: #5A56E9;">

            <i class="fa fa-search" style="color: white; padding: 5px;"></i>

          </button>
        </form>

        <section style="height: 200px; margin-top: 65px; display: flex; flex-direction: column;">



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


</body>

</html>