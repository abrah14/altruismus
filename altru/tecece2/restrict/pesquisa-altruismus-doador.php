<?php

session_start();
require_once("../model/Post.php");
require_once("../model/Ong.php");
require_once("../model/Reacao.php");
include_once("valida-permanencia.php");

$post = new Post();
$ong = new Ong();
$reacao = new Reacao();

$texto = $_POST['buscar'];

$pesquisar = $ong->pesquisaNomeOng($texto);
$quantidadeOng = count($pesquisar);

if ($quantidadeOng <= 0) {
  $pesquisar = $post->pesquisaPost($texto);
  $quant = count($pesquisar);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Altruismus</title>
  <link rel="stylesheet" href="../css/social2.css">
  <link id="size-stylesheet" rel="stylesheet" type="text/css" href="" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <link rel="stylesheet" href="../css/explorar-doador.css">
  <script src="../JS/social2.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Bungee+Inline" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link href="https://fonts.googleapis.com/css?family=Bungee+Inline" rel="stylesheet">
</head>

<body>



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
            <section class="banana" id="home1" id="home1" style="display: flex; justify-content: left; margin-top: 50px;">

                <section class="banana" id="home1" id="home1">

                  <a href="">
                    <img class="icones-side" src="../img/sidedbar/sidebar/menu/casa.png" alt="">
                  </a>
                  <a class="home" onclick="teste()" href="./social2.php">Home</a>

                </section>

            </section>
            <section class="banana" id="home1" style="display: flex; justify-content: left; ">

              <img class="icones-side" style="width: 40px;" src="../img/sidedbar/sidebar/menu/Vector.png" alt="">
              </a>
                <a class="home" href="./explorar-doador.php">Explorar</a>
            </section>

            <section class="banana" id="home1" id="home12" style="display: flex; justify-content: left;">


              <img class="icones-side" style="width: 40px;" src="../img/sidedbar/sidebar/menu/pessoa.png" alt="">
              </a>
              
                <a class="home" href="./perfil-doador.php">Perfil</a>
              
            </section>

            <section class="banana" id="home1" id="home12" style="display: flex; justify-content: left;">


              <img class="icones-side" style="width: 40px;" src="../img/sidedbar/sidebar/menu/more.png" alt="">
              </a>
              <a class="home" href="./logout.php">Encerrar</a>
            </section>

            <section class="banana" id="home18" style="display: flex; justify-content: left;">
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


    </aside>



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




  <main id="elemento-chave" style="border: none;margin-top: 13px;margin-left: 120px;margin-right: 120px;">

    <section style="border: 1px solid #E6ECF0;">

     

      <?php foreach ($pesquisar as $pesquisa) { ?>

        <section class="frase-do-img">

          <img width="100px" src="./foto-perfil-ong/<?php echo $pesquisa['fotoong'] ?>" alt="" style="border-radius: 50%; width: 50px; height: 50px;">
          <p class="nome-ong"><?php echo $pesquisa['nomeong'] ?></p>
          <!-- <p> @ADB</p> -->
          <img class="img-pub-v" src="../img-social/tweet/Vector (1).png" alt="">
          <p><?php echo $pesquisa['dtpost'] ?></p>
        </section>

        <section class="">
          <section class="frase">
            <section class="juncao">
              <p class="desc">
                <?php echo $pesquisa['msgpost'] ?>
              </p>
            </section>

            <section>
              <img style="width: 100px;" class="img-responsive" src="./social-img/<?php echo $pesquisa['imagempost'] ?>" alt="">
            </section>

          </section>
        </section>

        <?php
            if (isset($_SESSION['iddoador'])) {
            $idPost = $pesquisa['idpost'];
            $idPerfil = $_SESSION['iddoador'];
            $tipoPerfil = "doador";
            } else if (isset($_SESSION['idong'])) {
                header("Location: ../../BizLand/index.php");
                unset($_SESSION['email-session']);
                unset($_SESSION['senha-session']);
            }
        ?>

        <section style="display: flex;align-items: center;justify-content: center;justify-content: space-around;">

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
  
          <?php
          $dataCurtida = date('Y-m-d H:i:s');
          ?>
  
  
          <form action="./tela-comentario-doador.php" method="post">
            <button type="submit" value="<?php echo $pesquisa['idpost'] ?>" name="btnComentar">COMENTAR</button>
          </form>


        </section>


      <?php } ?>


    </section>

  </main>

  <aside class="aside-direito" style="padding: 0; justify-content: right;">




<section class="aside-class1">

  <section style=" border: none; display: flex;" class="seção2">
  <form action="./pesquisa-altruismus-doador.php" class="busca-explorar" method="post" style="padding: 0;">

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


</body>

</html>