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
  $reacao = new Reacao();
  $seguindo = new Seguindo();

  $_SESSION['social2'] = true;

  if (isset($_SESSION['iddoador'])) {
    $tipoPerfil = "doador";
    $idPerfil = $_SESSION['iddoador'];
  } else if (isset($_SESSION['idong'])) {
    header("Location: ../../BizLand/index.php");
    unset($_SESSION['idong']);
    session_destroy();
  } else if (isset($_SESSION['idadmin'])) {
    header("Location: ../../BizLand/index.php");
    unset($_SESSION['idadmin']);
    session_destroy();
  }

  unset($_SESSION['idOngListar']);
  $listarSeguindo = $seguindo->listarSeguindo($_SESSION['iddoador']);

  $listapost = $post->listarDeSeguidores($_SESSION['iddoador']);
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
  <link rel="stylesheet" href="../css/explorar-doador.css">
  <link id="size-stylesheet" rel="stylesheet" type="text/css" href="" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <link class="logo1" href="../../BizLand/assets/img/logo21.png" rel="icon">

  <link rel="stylesheet" href="../css/explorar-doador.css">


  <script src="../JS/social2.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Bungee+Inline" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background-color: #e9ebf7;">

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


            <!-- <section style="display: flex; flex-direction: column; border-radius: 10px;padding: 10px; border: 1px solid ; " class="rosa" id="rosa">

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

              </section> -->



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

  <main id="elemento-chave" >

    <script type="text/javascript">
      $(function() {
        $('.carregando').hide();
        $('#tipo_publicacao').change(function() {


          if ($('#tipo_publicacao').val() == 2) {
            window.location.href = "http://localhost:8080/altruismus/altru/tecece2/restrict/prestacoes.php";
          }

        })
      })

      // document.location.reload(false);
    </script>

    <?php

    foreach ($listapost as $post) {

      $idOng = $post['idong'];
      $idPost = $post['idpost'];
      $quantidadeReacoesLista = $reacao->verificarQuantidade($idPost);
      $quantidadeReacoes = $quantidadeReacoesLista['quantidade'];

    ?>

<section style="display: flex;flex-direction: column;justify-content: center;align-items: center;">
          <section>

            <form action="./social-doador.php" method="post" class="div" style="align-items: center;border:1px solid #5A56E9;border-radius: 10px 10px 0px 0px;border-bottom: none;background-color:white ;" >
                  <button type="submit" name="idOng" value="<?php echo $idOng ?>" style="padding: 5px;display: flex;background-color: white;">
                    <img src="./foto-perfil-ong/<?php echo $post['fotoong'] ?>" style="border-radius: 50%;border: 2px solid #5A56E9; width: 50px; height: 50px; " alt="">


                    <section style="display: flex;flex-direction: column;">
                      <p class="nome-ong"><?php echo $nomeOng = $post['nomeong'] ?></p>
  
                      
      
                      <p style="font-weight: 600;"><?php echo $post['dtpost'] ?></p>
  
                      </section>
                  </button>
    
             
                <section class="msgpost" style="border: 1px solid #5A56E9;border-left: none;border-right: none;">


                  <p id="headerletter2"><?php echo $post['msgpost'] ?></p>
                </section>
          


                  </section>
                </form>
  
              
  
              <section class="div" style="display: flex;justify-content: center;">
  
  
                <img class="div-img" style="border: 2px solid #5A56E9;border-radius: 0;" src="./social-img/<?php echo $post['imagempost'] ?>" alt="">   

          </section>
            </section>

      



            <section   style="display: flex; justify-content: center;justify-content: space-around;">

            <section class="div" style="border: 1px solid #5A56E9;display: flex;align-items: center;justify-content: center;justify-content: space-around;border-radius: 0px 0px 10px 10px;background-color: white;">


            <form action="" method="" id="form-curtir">
              <?php
              if ($reacao->verificar($idPost, $tipoPerfil, $idPerfil) == "curtiu") {
              ?>

                <label for=""><?php echo ($quantidadeReacoes); ?></label>
                <button type="submit" id="idPost" onclick="valorBotao(<?php echo $idPost ?>,'curtida','doador','<?php echo $idPerfil ?>',1);" name="idPost" value="<?php echo $idPost ?>">

                  <img src="./coracao-vermelho.png" alt="" style="width: 50px; height: 50px;" id="imagem-coracao-vermelho">
                <?php } else { ?>

                  <label for=""><?php echo ($quantidadeReacoes); ?></label>

                  <button type="submit" id="idPost" onclick="valorBotao(<?php echo $idPost ?>,'curtida','doador','<?php echo $idPerfil ?>',0);" name="idPost" value="<?php echo $idPost ?>">

                    <img src="./coracao.png" alt="" style="width: 50px; height: 50px;" id="imagem-coracao">
                  <?php } ?>
                  </button>

            </form>

            <?php
            $dataCurtida = date('Y-m-d H:i:s');
            ?>
    
    
                <form action="./tela-comentario-doador.php" method="post">
                  <button style="font-weight: 800;background-color: white;"  type="submit" value="<?php echo $idPost ?>" name="btnComentar">COMENTAR</button>
                </form>

            </section>
 

              
            </section>


           


           
            <section>




            </section>
          </section>
      
              <br>
              














              <?php } ?>


        </section>

      </section>


  </main>


  <aside class="aside-direito" style="display: flex; flex-direction: column; background-color: #e9ebf7;">
  

  <section class="aside-class1">
 
    

    <section style=" border: none; display: flex;" class="seção2">
    
    
      <form action="./pesquisa-altruismus-doador.php" class="busca-explorar" method="post" style="padding: 0;">

        <input type="search" style="border: 1px solid #5A56E9; border-radius: 40px 0 0 40px ; height: 40px;" class="busca" id="busca2" placeholder="Busque por Ongs" name="buscar">
        <button type="submit" onclick="historico()" style=" color: #E6ECF0; border-radius: 0px 10px 10px 0px ; padding: 7px; background-color: #5A56E9;">

          <i class="fa fa-search" style="color: white; padding: 5px;"></i>

        </button>
      </form>

      <form action="" class="element-fixed" method="post" style="display: flex;flex-direction: column;position: fixed;">
    
      <select name="tipo_publicacao" id="tipo_publicacao">

        <option value="1"  selected >Pedido</option>
        <option value="2">Prestação de contas</option>

      </select>
      </form>
      
      <div class="divContainer" style="margin-top: 100px;">
  <div class="conteudoFixo">
      <h3 style="font-weight: 900px;">Seguindo</h3>
  </div>
  <div class="conteudoNormal">
      <ul style="display: flex;justify-content: center;flex-direction: column;margin-right: 30px;">
          
      <?php

          foreach ($listarSeguindo as $listar) {
            $idOng = $listar['idong'];
          ?>

            <section style="display: flex;padding: 3px;margin-top: 10px;border: 1px solid #5A56E9;background-color: white;" class="cortalvez">
              <img style="width: 50px; height: 50px; border-radius: 100px;" class="border-perfil"  src="./foto-perfil-ong/<?php echo $listar['fotoong'] ?>" alt="">
              <section style="display: flex; flex-direction: column;">
                <p style="font-weight: 600;"><?php echo $listar['nomeong'] ?></p>
                <form action="./social-doador.php" method="post">
                  <button name="idOng" style="padding: 2px;" class="seguindo2" value="<?php echo $idOng ?>">Seguindo</button>
                </form>

              </section>

            </section>

          <?php } ?>

      </ul>
  </div>
</div>


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





</body>

</html>