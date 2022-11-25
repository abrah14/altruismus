<?php

session_start();
require_once("../model/Post.php");
require_once("../model/Comentario.php");
require_once("../model/Reacao.php");
require_once("../model/ReacaoComent.php");

require_once("../model/Doador.php");

$postagem = new Post();
$coment = new Comentario();
$reacao = new Reacao();
$reacaoComent = new ReacaoComent();

if (isset($_POST['btnComentar'])) {
    $idPost = $_POST['btnComentar'];
    $_SESSION['post'] = $idPost;
    $listarcomentario = $coment->listar($idPost);
    $listarpostagem = $postagem->listarPostId($idPost);
} else if (isset($_SESSION['post'])) {
    $listarcomentario = $coment->listar($_SESSION['post']);
    $listarpostagem = $postagem->listarPostId($_SESSION['post']);
}

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




    <aside class="aside-esquerdo" style="border: none;" id="asideEsquerdo">
        <section class="letras" style="border: none;">
            <section class="itens-p">
                <section class="letras-aside" style="border: none;">
                    <?php if (isset($_SESSION['iddoador'])) { ?>
                        <section class="banana" id="home1" id="home1">


                            <img class="icones-side" style="width: 40px;" src="../img/sidedbar/sidebar/menu/casa.png" alt="">
                            </a>
                            <a class="home" onclick="teste()" href="./social2.php">Home</a>

                        </section>
                    <?php } ?>
                    <section class="banana" id="home1">
                        <a href="">
                            <img class="icones-side" src="../img/sidedbar/sidebar/menu/Vector.png" alt="">
                        </a>
                        <?php
                        if (isset($_SESSION['iddoador'])) {
                            $tipoPerfil = 'doador';
                            $idPerfil = $_SESSION['iddoador'];
                        ?>
                            <a class="home" href="./explorar-doador.php">Explorar</a>
                        <?php
                        }
                        
                        ?>
                            
                    </section>


                    <section class="banana" id="home1" id="home12">
                        <a href="">

                            <img class="icones-side" src="../img/sidedbar/sidebar/menu/pessoa.png" alt="">
                        </a>
                        <?php if (isset($_SESSION['iddoador'])) { ?>
                            <a class="home" href="./perfil-doador.php">Perfil</a>
                        <?php } else if (isset($_SESSION['idong'])) { ?>
                            <a class="home" href="./perfil.php">Perfil</a>
                        <?php } ?>
                    </section>

                    <section class="banana" id="home12">
                        <a href="">
                            <img class="icones-side" src="../img/sidedbar/sidebar/menu/more.png" alt="">
                        </a>
                        <a class="home" href="./logout.php">Encerrar</a>
                    </section>

                </section>

            </section>


        </section>
    </aside>

    <main id="elemento-chave" style="margin-top: 10px;">

        <section style="border: 1px solid #E6ECF0;">


            <?php
            foreach ($listarpostagem as $post) {

                $idOng = $post['idong'];
                $idPost = $post['idpost'];
            ?>

                <section class="frase-do-img" style="padding: 10px;border: 2px solid #5A56E9; border-bottom: none;">
                    <form action="./social-doador.php" method="post">
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
                            <img class="img-responsive" src="./social-img/<?php echo $post['imagempost'] ?>" style="width: 400px;" alt="">
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

                    <?php if (isset($_SESSION['iddoador'])) { ?>

                        <form action="./comentar.php" method="post" style="display: flex; align-items: center;">

                            <section style="display: flex; flex-direction: column;">

                                <section style="margin: 5px;">
                                    <a>

                                        <h3 style="color: #E6ECF0;color: #5A56E9;font-weight: 600; " onclick="mostrar()">Comentar</h3>
                                    </a>


                                </section>

                                <section style="display: flex;">

                                    <input class="input2" type="text" name="txtComentario" id="form12" style="border-radius: 10px;padding: 10px;border: 2px solid #5A56E9; font-weight: 800;" placeholder="Comente">

                                    <img src="../img-social/tweet/enviar.png" id="form13" style="width: 30px;margin-left: 5px;" alt="">

                                </section>

                                <style>
                                    .input2:focus {
                                        border: 2px solid #5A56E9;

                                    }
                                </style>



                            </section>


                            <button id='form12' type="submit" value="<?php echo $idPost ?>" name="idPost"> </button>
                        </form>


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


            <?php } ?>

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

    <aside class="aside-direito" style="display: flex; flex-direction: column; background-color: #e9ebf7;">

        <section class="aside-class1">

            <section style=" border: none; display: flex;" class="seção2">

                <?php if (isset($_SESSION['iddoador'])) { ?>
                    <form action="./pesquisa-altruismus-doador.php" class="busca-explorar" method="post" style="padding: 0;">
                    <?php } ?>

                    <?php if (isset($_SESSION['idong'])) { ?>
                        <form action="./pesquisa-altruismus.php" class="busca-explorar" method="post" style="padding: 0;">
                        <?php } ?>

                        <input type="search" style="border: 1px solid #5A56E9; border-radius: 40px 0 0 40px ; height: 40px;" class="busca" id="busca2" placeholder="Busque por Ongs" name="buscar">
                        <button type="submit" onclick="historico()" style=" color: #E6ECF0; border-radius: 0px 10px 10px 0px ; padding: 7px; background-color: #5A56E9;">

                            <i class="fa fa-search" style="color: white; padding: 5px;"></i>

                        </button>

                        <section style="height: 200px; margin-top: 65px; display: flex; flex-direction: column;">


                            <section class="rosa" style=" display: flex; flex-direction: column; border-radius: 10px; border: 1px solid #5A56E9;">
                                <section style="display: flex; justify-content: left; ">

                                    <p style="color: #5A56E9; font-weight: 600;" class="maior">Seguindo</p>

                                    <style>
                                        .maior {

                                            font-size: clamp(0.7em, 0.7em + 1vw, 3em);
                                        }
                                    </style>
                                </section>

                                <section style="display: flex;padding: 0;margin-top: 10px;" class="cortalvez">
                                    <img style="width: 50px; height: 50px; border-radius: 100px;" src="../img/631b7543a5d0d.jpg" alt="">
                                    <section style="display: flex; flex-direction: column;">
                                        <p style="font-weight: 600;">Fuladno</p>
                                        <button class="seguindo2"> Seguindo</button>

                                    </section>
                                </section>

                                <section style="display: flex; padding: 0;" class="cortalvez">
                                    <img style="width: 50px; height: 50px; border-radius: 100px;" src="../img/631b7543a5d0d.jpg" alt="">
                                    <section style="display: flex; flex-direction: column;">
                                        <p style="font-weight: 600;">Fuladno</p>
                                        <button class="seguindo2"> Seguindo</button>

                                    </section>
                                </section>
                                <section style="display: flex; padding: 0;" class="cortalvez">
                                    <img style="width: 50px; height: 50px; border-radius: 100px;" src="../img/631b7543a5d0d.jpg" alt="">
                                    <section style="display: flex; flex-direction: column;">
                                        <p style="font-weight: 600;">Fuladno</p>
                                        <button class="seguindo2"> Seguindo</button>

                                    </section>
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