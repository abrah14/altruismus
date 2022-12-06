<?php

session_start();
require_once("../model/Ong.php");
require_once("../model/Post.php");
require_once("../model/Reacao.php");
require_once("../model/PrestacaoContasOng.php");
require_once("../model/ReacaoPrestacao.php");

include_once("valida-permanencia.php");

try {
  $ong = new Ong();
  $post = new Post();
  $reacao = new Reacao();
  $presta = new PrestacaoContasOng();
  $reacaoPresta = new ReacaoPrestacao();

  $_SESSION['explorar'] = true;

  if (isset($_SESSION['iddoador'])) {
    header("Location: ../../BizLand/index.php");
    unset($_SESSION['idong']);
    session_destroy();
  } else if (isset($_SESSION['idong'])) {
    $tipoPerfil = "ong";
    $idPerfil = $_SESSION['idong'];
  }

  unset($_SESSION['idOngListar']);

  $listapost = $post->getMyPost($idPerfil);
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
  <link rel="stylesheet" href="../css/explorar-ong.css">
  <link id="size-stylesheet" rel="stylesheet" type="text/css" href="" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



  <link href="https://fonts.googleapis.com/css?family=Bungee+Inline" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background-color: #e9ebf7;">

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

  <main id="elemento-chave" style="border: none;margin-top: 15px;">

    <script type="text/javascript">
      $(function() {
        $('.carregando').hide();
        $('#tipo_publicacao').change(function() {


          if ($('#tipo_publicacao').val() == 2) {
            window.location.href = "http://localhost:8080/altruismus/altru/tecece2/restrict/minhas-publicacoes-prestacoes.php";
          }

        })
      })

      // document.location.reload(false);
    </script>


<section style="border: 1px solid #E6ECF0;">
      <?php
      foreach ($listapost as $post) {
        $idOng = $post['idong'];
        $idPost = $post['idpost'];
        $quantidadeReacoesLista = $reacao->verificarQuantidade($idPost);
        $quantidadeReacoes = $quantidadeReacoesLista['quantidade'];
      ?>
  <section style="display: flex;flex-direction: column;justify-content: center;align-items: center;">
          <section style="border-radius: 10px 10px 0px 0px;border: 1px solid #5A56E9;" >

          <form action="./social.php" method="post" class="div">
      <button type="submit" class="button-c" style="border-radius: 100px;" name="idOng" value="<?php echo $idOng ?>">
        <section style="display: flex;">
        <img src="./foto-perfil-ong/<?php echo $post['fotoong'] ?>" style="border-radius: 50%; width: 50px; height: 50px;" alt="">
        <section style="display: flex;flex-direction: column;">

          <p class="nome-ong" style="font-weight: 800;"><?php echo $nomeOng = $post['nomeong'] ?></p>   
          <p style="font-weight: 800;"><?php echo $post['dtpost'] ?></p>

        </section>

        </section>
      </button>



    </form>
    
    <section>
      
    </section>
    
    <section class="div" style="display: flex;justify-content: center;flex-direction: column">
    <section style="border: 1px solid #5A56E9;border-bottom: 2px solid #5A56E9;border-left: 0;border-right: 0;padding: 3px;">

      <p style="font-weight: 700;color: black;" class="headerletter2"><?php echo $post['msgpost'] ?></p>

    </section>
      
  
                <img class="div-img" style="border-radius: 0;border-left: 0;border-right: 0;" src="./social-img/<?php echo $post['imagempost'] ?>" alt="">   

    </section>
            </section>

      



            <section   style="display: flex; justify-content: center;justify-content: space-around;">

            <section class="div" class="div" style="border: 1px solid #5A56E9;display: flex;align-items: center;justify-content: center;justify-content: space-around;border-radius: 0px 0px 10px 10px;background-color: white;">


            <form action="" method="" id="form-curtir" >
          <?php
          if ($reacao->verificar($idPost, $tipoPerfil, $idPerfil) == "curtiu") {
          ?>

            <label for=""><?php echo ($quantidadeReacoes); ?></label>
            <button type="submit" id="idPost" onclick="valorBotao(<?php echo $idPost ?>,'curtida','<?php echo $tipoPerfil ?>','<?php echo $idPerfil ?>',1);" name="idPost" value="<?php echo $idPost ?>">

              <img src="./coracao-vermelho.png" alt="" style="width: 50px; height: 50px;" id="imagem-coracao-vermelho">
            <?php } else { ?>

              <label for=""><?php echo ($quantidadeReacoes); ?></label>

              <button type="submit" id="idPost" onclick="valorBotao(<?php echo $idPost ?>,'curtida','<?php echo $tipoPerfil ?>','<?php echo $idPerfil ?>',0);" name="idPost" value="<?php echo $idPost ?>">

                <img src="./coracao.png" alt="" style="width: 50px; height: 50px;" id="imagem-coracao">
              <?php } ?>
              </button>

        </form>

        <?php
        $dataCurtida = date('Y-m-d H:i:s');
        ?>
    
    <form action="./tela-comentario.php" method="post" style="font-weight: 700;background-color: white;">
          <button type="submit" value="<?php echo $idPost ?>" name="btnComentar" style="font-weight: 700;background-color: white;">
          Ver Comentários
          </button>
        </form>
        
      
            </section>
 

              
            </section>


           


           
            <section>




            </section>
          </section>
          
  







          
         
        
        
    <br>



  <?php } ?>


  </section>

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
    function valorBotao(postagem, reacao, perfil, iddoador, imagem) {

      idPost = postagem;
      tipoReacao = reacao;
      tipoPerfil = perfil;
      idDoador = iddoador;

      var img = imagem;

      if (img == 0) {
        img = img + 1;
        document.getElementById("imagem-coracao").src = "./coracao-vermelho.png";
        document.location.reload(false);
      } else if (img > 0) {
        document.getElementById("imagem-coracao-vermelho").src = "./coracao.png";
        document.location.reload(false);
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


</body>

</html>