<?php
session_start();
require_once("../model/Ong.php");
require_once("../model/Doador.php");
require_once("../model/Post.php");
require_once("../model/ItensDoacao.php");
require_once("../model/Seguindo.php");
require_once("../model/Reacao.php");
require_once("../model/PrestacaoContasOng.php");

include_once("valida-permanencia.php");

try {

  $post = new Post();
  $doador = new Doador();
  $ong = new Ong();
  $doacao = new ItensDoacao();
  $seguindo = new Seguindo();
  $reacao = new Reacao();
  $prestacao = new PrestacaoContasOng();


  $quantidade = $seguindo->countSeguidores($_SESSION['idong']);
  $countReacao = $reacao->countReacao($_SESSION['idong'], 'ong');

  if (isset($_SESSION['iddoador'])) {
    header("Location: ../../BizLand/index.php");
    unset($_SESSION['iddoador']);
    session_destroy();
  } else if (isset($_SESSION['idong'])) {
    $idPerfil = $_SESSION['idong'];
  }

  $listapresta = $prestacao->listar($idPerfil);
} catch (Exception $e) {
  echo $e->getMessage();
}
?>
<?php
require_once("../model/PrestacaoContasOng.php");

try {
  $prestacaoContasOng = new PrestacaoContasOng();

  $listaong = $ong->listar();
} catch (Exception $e) {
  echo $e->getMessage();
}
?>

<?php
if (isset($_SESSION['idong'])) {
  $listapost = $post->listar($_SESSION['idong']);
  $listdoacao = $doacao->listar($_SESSION['idong']);
  $perfilOng = $ong->getOng($_SESSION['idong']);
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
    <link class="logo1" href="../../BizLand/assets/img/logo21.png" rel="icon">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="../css/perfilOng.css">

  </head>

  <body>

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




    <script>
      const aside = document.getElementsByClassName('aside-esquerdo')

      console.log(aside)
    </script>
    <header class="header1">


      <nav style="display: flex;  justify-content: left; ">
        <div class="img-logo2" style="display: flex; flex: 1; align-items: center; justify-content: left; padding: 10px; ">

          <section style="display: flex; align-items: center; margin-left: 5px;">
            <img class="img-logo" style="width: 60px; display: flex; margin-right: 8px;" src="../../BizLand/assets/img/logo21.png" alt="">
            <p id="headerletter" style="color: white;font-weight: 600; margin-top: 10px; margin-left: 10px; ">Altruismus</p>
          </section>
        </div>


      </nav>


    </header>



    <header class="header2">


      <nav>


      </nav>


    </header>


    <header class="header3">




      <nav>


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
            <section class="banana" id="home1" id="home1" style="display: flex; justify-content: left;">

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

    <main id="elemento-chave" style="margin-top: 15px; justify-content: center; border: 1px solid #5A56E9; border-radius: 10px;">

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
          <section class="capa" style="margin-bottom: 10px;">
            <img width="300px" style="border: 2px solid;" src="./foto-perfil-ong/<?php echo $fotoOng ?>" alt="">

          </section>


          <section style="display: flex; flex-direction: column;">




            <p id="slamn">


              <?php echo $nomeOng ?>
            </p>
            <section style="display: flex;">


              <p for="" id="slamn"><?php echo "EMAIL: " . $emailOng ?></p>

            </section>

            <section style="display: flex;">


              <p for="" id="slamn" style="margin-right:15px;">TELEFONE: <?php echo $telefone ?></p>

              <p for="" id="slamn">FUNDAÇÃO: <?php echo $dtFundacao ?></p>
            </section>

            <section style="display: flex; ">

              <p for="" id="slamn" style="margin-right:15px;">Seguidores <?php echo $quantidade ?></p>

              <p for="" id="slamn">Reações: <?php echo $countReacao ?></p>
            </section>


          </section>

        </section>


      </section>


      <style>
        #headerletter {
          font-size: clamp(0.9em, 0.9em + 1vw, 3em);
        }
      </style>

      <section class="issopq-2" style=" display: flex; justify-content: center;">

        <section class="img-section">



          <section style="display: flex; justify-content: center;">






            <style>
              #slamn {
                font-size: clamp(0.5em, 0.5em + 1vw, 3em);
                font-weight: 600;
              }

              #slamn {
                color: black;
              }
            </style>

            </style>




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
                    <form action="./editar-perfil-ong.php" method="post" enctype="multipart/form-data">

                      <div class="input-group">
                        <label for="email">Foto</label>
                        <input style="border-radius: 20px;" type="file" id="imagem" name="imagem">
                      </div>

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

          </section>



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
                      Postagem
                    </section>
                  </button>
                  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#prestacao" style="background-color: #5A56E9;border: none;">
                    <section style="background-color: #5A56E9; color: #E6ECF0;">
                      Prestação
                    </section>
                  </button>
                </div>
              </div>
            </div>

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
      <section style="display: flex; justify-content: center; justify-content: space-evenly; border-top: 1px solid #5A56E9;">

      </section>



      <section style="display: flex; justify-content: center; justify-content: space-evenly; border-top: 1px solid #5A56E9;">

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


        <section style="display: flex; justify-content: center; border: 1px solid #5A56E9; background-color: #5A56E9;">

          <section style="margin-top: 3px;">

            <button data-bs-toggle="modal" style="background-color: #5A56E9; color: #E6ECF0;" data-bs-target="#editarOng" name="linha" id="linha" data-whatever="<?php echo $_SESSION['idong'] ?>" data-whatevernome="<?php echo $nomeOng ?>" data-whatevertelefone="<?php echo $telefone ?>" data-whateveremail="<?php echo $emailOng ?>" data-whatevercep="<?php echo $cepOng ?>" data-whateverestado="<?php echo $estadoOng ?>" data-whatevercidade="<?php echo $cidadeOng ?>" data-whateverbairro="<?php echo $bairroOng ?>" data-whateverrua="<?php echo $ruaOng ?>" data-whatevercomplemento="<?php echo $complementoOng ?>" data-whateverlogradouro="<?php echo $logradouroOng ?>" data-whateversenha="<?php echo $senhaOng ?>" data-whateverfundacao="<?php echo $dtNasc ?>">

              Editar Perfil
            </button>
          </section>

        </section>


      </section>

      <section>




      </section>



      </section>


      <section>


        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#publicacao150" style="background-color: #5A56E9;border: none;">
          <section style="background-color: #5A56E9; color: #E6ECF0;">

            Publicar

          </section>


        </button>



        </button>

        <div class="modal fade" id="doacao" tabindex="-1" role="dialog" aria-labelledby="editar" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Itens da Doação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="../restrita/cadastra-itensdoacao.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="recipient-fundacao" class="col-form-label">Qtd. Itens da Doação</label>
                    <input type="number" class="form-control" id="recipient-fundacao" name="txtQuantidade">
                  </div>
                  <div class="form-group">
                    <label for="recipient-fundacao" class="col-form-label">Descrição</label>
                    <input type="text" class="form-control" id="recipient-fundacao" name="txtDescItem">
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
                <button type="submit" class="btn btn-danger" style="background-color: #5A56E9;border: none;">ENVIAR</button>
              </div>
            </div>
            </form>
          </div>
        </div>
        </div>





      </section>

      </section>







      <section style="border: 2px solid #E6ECF0;">




        <section id="portfolio" class="portfolio">
          <div class="container" style="justify-content: center;" data-aos="fade-up" style="">

            <div class="row" data-aos="fade-low" data-aos-delay="100">
              <div class="col-lg-12 ">
                <ul id="portfolio-flters" id="tentando" style="display: flex; border: 1px solid; justify-content: space-around; ">

                  <!-- <li id="testando" data-filter=".filter-app" style="padding: 15px;">Pedidos</li> -->
                  <li id="" data-filter=".filter-web" style="padding: 15px;">Pedidos</li>
                  <li id="testando" data-filter=".filter-app" style="padding: 15px;">Prestações</li>



                </ul>
              </div>
            </div>



            <style>
              #testando:hover {
                border-bottom: #5A56E9 solid 5px;

              }
            </style>

            <!-- ======= Portfolio Section ======= -->

            <section>




              <section id="portfolio" class="portfolio">
                <div class="container" data-aos="fade-up">

                  <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="300">

                    <div class="col-lg-4 col-md-6 portfolio-item filter-sla">
                      <div class="portfolio-wrap">
                        <div class="portfolio-info">
                          <?php
                          foreach ($listapresta as $presta) { ?>

                            <div style="justify-content: center;">
                              <section class="mensagens" style="display: flex;">
                                <img src="./foto-perfil-ong/<?php echo $fotoOng ?>" alt="" style="border-radius: 50%; width: 50px; height: 50px;">
                                <p><?php echo $presta['nomeong'] ?></p>

                              </section>
                              <section>
                                <p>Data que foi recebido</p>
                                <p><?php echo $presta['dataRecebimento'] ?></p>
                              </section>

                              <section class="mensagens2">

                                <p><?php echo $presta['descProdutosRecebidos'] ?></p>


                                <p>Quantidade de itens recebidos</p>
                                <p><?php echo $presta['quantidadeItensRecebido'] ?></p>

                                <img class="img-violino" style="height: 400px; width: 400px; " src="./social-img/<?php echo $presta['fotoOng'] ?>" alt="">

                                <img class="img-violino" style="height: 400px; width: 400px; " src="./social-img/<?php echo $presta['fotoDoador'] ?>" alt="">

                              </section>

                            </div>
                        </div>
                      </div>

                    <?php } ?>

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



                        <div style="justify-content: center;">
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

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                  <div class="portfolio-wrap">

                    <div class="portfolio-info">
                      <?php
                      foreach ($listdoacao as $doacao) { ?>



                        <div style="justify-content: center;">
                          <section class="mensagens" style="display: flex;">
                            <p><?php echo $doacao['quantidadeitensdoacao'] ?></p>

                          </section>
                          <p><?php echo $doacao['datadoacao'] ?></p>
                          <p><?php echo $doacao['descitem'] ?></p>

                        </div>
                    </div>
                  </div>

                <?php } ?>
                </div>

          </div>
          </div>
        </section><!-- End Portfolio Section -->
      </section>



      <!-- ======= Team Section ======= -->

    </main>



    <aside class="aside-direito" style="display: flex; flex-direction: column; background-color: #e9ebf7;">




      <section class="aside-class1">


        <section style=" border: none; display: flex;" class="seção2">
          <form action="./pesquisa-altruismus.php" class="busca-explorar" method="post" style="padding: 0;">

            <input type="search" style="border: 1px solid #5A56E9; border-radius: 40px 0 0 40px ; height: 40px;" class="busca" id="busca2" placeholder="Busque por Ongs" name="buscar">
            <button type="submit" onclick="historico()" style=" color: #E6ECF0; border-radius: 0px 10px 10px 0px ; padding: 7px; background-color: #5A56E9;">

              <i class="fa fa-search" style="color: white; padding: 5px;"></i>

            </button>

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