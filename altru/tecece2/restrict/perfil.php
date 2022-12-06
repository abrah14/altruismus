<?php
session_start();
require_once("../model/Ong.php");
require_once("../model/Doador.php");
require_once("../model/Post.php");
require_once("../model/ItensDoacao.php");
require_once("../model/Seguindo.php");
require_once("../model/Reacao.php");
require_once("../model/ReacaoComent.php");
require_once("../model/PrestacaoContasOng.php");

include_once("valida-permanencia.php");

try {

  $post = new Post();
  $doador = new Doador();
  $ong = new Ong();
  $doacao = new ItensDoacao();
  $seguindo = new Seguindo();
  $reacao = new Reacao();
  $reacaoComent = new ReacaoComent();
  $prestacao = new PrestacaoContasOng();

  $quantidade = $seguindo->countSeguidores($_SESSION['idong']);
  $quantReacoesComent = $reacaoComent->countReacaoComent($_SESSION['idong'], "ong");
  $countReacao = $reacao->countReacao($_SESSION['idong'], "ong");

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

    
    <link href="https://fonts.googleapis.com/css?family=Bungee+Inline" rel="stylesheet">

    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- BootsStrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js">

    <!-- Favicons -->
    <link class="logo1" href="../../BizLand/assets/img/logo21.png" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/perfilDoadorNovo.css">

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



    <script>
      const aside = document.getElementsByClassName('aside-esquerdo')

      console.log(aside)
    </script>
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

    <main id="elemento-chave" style="margin-top: 15px; justify-content: center;">

      <section class="issopq div" style="border: 1px solid #E6ECF0;">

        <section id="teste" class="pai-titulo" style="border: 2px solid #5A56E9;">
          <?php
          foreach ($perfilOng as $perfil) {
        
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

          ?>
          <section class="capa" >
            <img class="div" style="border-radius: 300px;" src="./foto-perfil-ong/<?php echo $fotoOng ?>" alt="">

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

              <p for="" id="slamn" style="margin-right:15px;">Seguidores: <?php echo $quantidade ?></p>

              <p for="" id="slamn">Reações: <?php echo ($countReacao + $quantReacoesComent) ?></p>
            </section>

            <section style="display: flex; justify-content: center; border: 1px solid #5A56E9; background-color: #5A56E9;">

       

<button data-bs-toggle="modal" style="background-color: #5A56E9; color: #E6ECF0;" data-bs-target="#editarOng" name="linha" id="linha" data-whatever="<?php echo $_SESSION['idong'] ?>" data-whatevernome="<?php echo $nomeOng ?>" data-whatevertelefone="<?php echo $telefone ?>" data-whateveremail="<?php echo $emailOng ?>" data-whatevercep="<?php echo $cepOng ?>" data-whateverestado="<?php echo $estadoOng ?>" data-whatevercidade="<?php echo $cidadeOng ?>" data-whateverbairro="<?php echo $bairroOng ?>" data-whateverrua="<?php echo $ruaOng ?>" data-whatevercomplemento="<?php echo $complementoOng ?>" data-whateverlogradouro="<?php echo $logradouroOng ?>" data-whateversenha="<?php echo $senhaOng ?>" data-whateverfundacao="<?php echo $dtNasc ?>">

  Editar Perfil
</button>
</section>




<section>
          </section>

        </section>


      </section>


      <style>
        #headerletter {
          font-size: clamp(0.9em, 0.9em + 1vw, 3em);
        }
      </style>

     




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



      <section id="portfolio" class="portfolio div" style="border: 2px solid blue;" >
            <div class="container" style="justify-content: center;" data-aos="fade-up">

<div class="row" data-aos="fade-low" data-aos-delay="100" style="border-bottom: 2px solid #5A56E9;">
  <div >
  <ul  id="portfolio-flters" style="display: flex; justify-content: center;justify-content: space-around; padding: 20px;margin: 0;list-style: none;">
          <button style="background-color: white;">

            <li data-filter=".filter-app" onclick="mostrarprestacao()" style="font-weight: 700;color: #5A56E9;" class="prest" class="filter-active">Prestações</li>

          </button>

          <button style="background-color: white;">
            <li data-filter=".filter-card" style="font-weight: 700;color: #5A56E9;"  onclick="pedido()" class="prest" >Pedidos</li>

          </button>
       

        </ul>
  </div>
</div>
  
                
  
  
                <div class="portfolio-container" id="remove13" style="display: flex; ">
  
                  <?php 
                    foreach ($listapost as $post) { 
                      $idPost = $post['idpost']
                      
                  ?>

  
  
                    <div class="portfolio-item filter-card" id="teste12" >
  
                    
                      <section class="mensagens" style=" display: flex; justify-content: left;align-items: center; ">
                        <img src="./foto-perfil-ong/<?php echo $fotoOng ?>" style="border-radius: 50%; width: 50px; height: 50px; margin: 10px;" alt="">
  
                        <section style="display: flex; flex-direction: column; align-items: center;justify-content: center;">
                          
                            <p class="nome-ong"><?php echo $post['nomeong'] ?></p>
  
                          </section>
                          <p class="nome-ong1"><?php echo $post['dtpost'] ?></p>
  
                      </section>
  
  
                      <section class="nsei">
                        <p style="font-weight: 600; color: black;"><?php echo $post['msgpost'] ?></p>
  
  
                        <script>
  
                          const post = document.getElementById('elemento-chave')
                          console.log(post)
  
  
  
                        </script>
  
                        <section>
                          <img style="width: 299px;"  src="./social-img/<?php echo $post['imagempost'] ?>" alt="">
  
                        </section>
                      </section>
  
                    
  
                    </div>
  
  
                  <?php } ?>
                  
  
  
                  
                  <div class="portfolio-container" id="prest"  data-aos="fade-up" data-aos-delay="200" style="display: flex; flex-direction: column; ">
  
  <?php foreach ($listapresta as $presta) { ?>
    <div class="portfolio-item filter-app" >
  
  
                              <div style="justify-content: center;">
                                <section class="mensagens" style="display: flex;justify-content: center;padding: 10px;">
                                  <img src="./foto-perfil-ong/<?php echo $fotoOng ?>" alt="" style="border-radius: 50%; width: 50px; height: 50px;">
                                  <p  class="nome-ong" style="font-weight: 700;"><?php echo $presta['nomeong'] ?></p>
  
                                </section>
                                <section style="display: flex;padding: 10px;padding: 10px;">
                                  <p  class="nome-ong" >Data de recebimento :</p>
                                  <span>
                                    <?php echo $presta['dataRecebimento'] ?></p>

                                  </span>
                                </section>
  
                                <section class="mensagens2">
                                  <section style="display: flex;justify-content: left;">

                                    <p style="font-weight: 900;">Quantidade de itens recebidos</p>
                                    <span>
                                      <?php echo $presta['quantidadeItensRecebido'] ?></p>

                                    </span>

                                    <section>

                                  

                                    </section>
                                  </section>

  
    

                                <section style="display: flex;">


                                  <img class="img-violino"style="width: 100px;" src="./social-img/<?php echo $presta['fotoOng'] ?>" alt="">
  
                                  <img class="img-violino" style="width: 100px;" src="./social-img/<?php echo $presta['fotoDoador'] ?>" alt="">

                                </section>
  
                                </section>
  
                              </div>
                          </div>
                          
                          <?php } ?>
    
  
    </div>
  
              </div>
  
  
  
              <div class="portfolio-container"  data-aos="fade-up" data-aos-delay="200" style="display: flex; flex-direction: column; ">
  
  
                                       
    <div class="portfolio-item filter-web" id="fotos" >
  
  
                              <div style="justify-content: center;">
                              
  
  
                             
                                
                                
                                
                              


                                <script>
                                  var data = document.getElementById('post601')
                                  var tipo  = document.getElementById('post600')

                                  data.hidden = true

                                  tipo.hidden = true

                                  function  mostrar() {

                                    data.hidden = false

                                    tipo.hidden = false



                                    



                                  }


                                  function fechar(){

                                    data.hidden = true

                                    tipo.hidden = true

                                  }



                              

                                  


                                </script>
    
  
    </div>
  
  
              </div>
            </section><!-- End Portfolio Section -->




          </section>


          <!-- ======= Team Section ======= -->



          <script>

            var prestacao = document.getElementById('prest').hidden = true;

            var fotos = document.getElementById('fotos').hidden = true;


            function mostrarprestacao(){
              fotos = document.getElementById('fotos').hidden = true;

              prestacao = document.getElementById('prest').hidden = false;

            }

            function mostrarfotos(){
              fotos = document.getElementById('fotos').hidden = false;

            }

            function pedido(){
              var fotos = document.getElementById('fotos').hidden = true;

            }

          
              
            </script>




    </main>



    <aside class="aside-direito" style="padding: 0; justify-content: right;background-color: #E6ECF0;">




<section class="aside-class1">

  <section style=" border: none; display: flex;" class="seção2">
  <form action="./pesquisa-altruismus.php" class="busca-explorar" method="post" style="padding: 0;">

<input type="search" style="border: 1px solid #5A56E9; border-radius: 40px 0 0 40px ; height: 40px;" class="busca" id="busca2" placeholder="Busque por Ongs" name="buscar">
<button type="submit" onclick="historico()" style=" color: #E6ECF0; border-radius: 0px 10px 10px 0px ; padding: 7px; background-color: #5A56E9;">

  <i class="fa fa-search" style="color: white; padding: 5px;"></i>

</button>

</form>



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