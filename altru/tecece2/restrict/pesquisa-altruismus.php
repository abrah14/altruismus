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


    <script src="../JS/social2.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Bungee+Inline" rel="stylesheet">
</head>

<body>

    <style>
        img.img-responsive {
            max-width: 90%;
            width: 1100px;
        }

        img.img-pub {
            max-width: 100%;
            width: 800px;
        }


        img.logo {
            max-width: 100%;
            width: 40px;
        }

        img.img-agencia {
            max-width: 100%;
            width: 40px;
        }

        img .icones-side {
            max-width: 100%;
            width: 40px;
        }

        img .img-pub-v {
            max-width: 100%;
            width: 200px;
        }
    </style>


    <script>
        const aside = document.getElementsByClassName('aside-esquerdo')

        console.log(aside)
    </script>


    <header>
        <nav>
            <section class="postar">

                <li>
                    <a id="cor-button" class="nav-link scrollto" href="#services">
                        <button style="font-weight: 700;" type="button" class="btn-login" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Sua pesquisa:

                        </button>

            </section>
        </nav>


    </header>

    <aside class="aside-esquerdo" style="border: none;" id="asideEsquerdo">
        <section class="letras" style="border: none;">
            <section class="itens-p">
                <div class="section-logo" id="logo">
                    <img class="logo" src="../img/Altruismos-removebg-preview 1.png" alt="">
                </div>

                <section class="letras-aside" style="border: none;">
                    <?php if (isset($_SESSION['iddoador']) && !empty($_SESSION['iddoador'])) { ?>
                        <section class="banana" id="home1" id="home1">

                            <a href="">
                                <img class="icones-side" src="../img/sidedbar/sidebar/menu/casa.png" alt="">
                            </a>
                            <a class="home" onclick="teste()" href="./social2.php">Home</a>

                        </section>
                    <?php } ?>
                    <section class="banana" id="home1">
                        <a href="">

                            <img class="icones-side" src="../img/sidedbar/sidebar/menu/Vector.png" alt="">
                        </a>
                        <?php if (isset($_SESSION['iddoador'])) { ?>
                            <a class="home" href="./explorar-doador.php">Explorar</a>
                        <?php } ?>
                        <?php if (isset($_SESSION['idong'])) { ?>
                            <a class="home" href="./explorar.php">Explorar</a>
                        <?php } ?>
                    </section>
                    
                    <section class="banana" id="home1" id="home12">
                        <a href="">

                            <img class="icones-side" src="../img/sidedbar/sidebar/menu/pessoa.png" alt="">
                        </a>
                        <?php if (isset($_SESSION['iddoador'])) { ?>
                            <a class="home" href="./perfil-doador.php">Perfil</a>
                        <?php } ?>
                        <?php if (isset($_SESSION['idong'])) { ?>
                            <a class="home" href="./perfil.php">Perfil</a>
                        <?php } ?>
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


                </section>
            </section>
        </section>
    </aside>


    <main id="elemento-chave" style="border: none;">

        <section style="border: 1px solid #E6ECF0;">

            <script>
                const teste = () => {
                    const imagem = document.getElementById('coracao-img')

                    const coracao2 = document.getElementById('numero-reacao-coracao')

                    const coracao = document.getElementById('coracao')

                    coracao.style.border = 'none'
                    imagem.style.backgroundColor = '#5A56E9'

                    coracao2.innerHTML = '1'

                    const retirada = document.getElementById('retirada')

                    if (retirada.classList.contains('open')) {
                        retirada.classList.remove('open')
                    }


                }
            </script>

            <?php foreach ($pesquisar as $pesquisa) { ?>

                <section class="frase-do-img">

                    <img src="./foto-perfil-ong/<?php echo $pesquisa['fotoong'] ?>" alt="" style="border-radius: 50%; width: 50px; height: 50px;">
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
                            <img class="img-responsive" src="./social-img/<?php echo $pesquisa['imagempost'] ?>" alt="">
                        </section>

                    </section>
                </section>

                <?php
                if (isset($_SESSION['iddoador'])) {
                    $idPost = $pesquisa['idpost'];
                    $idPerfil = $_SESSION['iddoador'];
                    $tipoPerfil = "doador";
                } else if (isset($_SESSION['idong'])) {
                    $idPost = $pesquisa['idpost'];
                    $idPerfil = $_SESSION['idong'];
                    $tipoPerfil = "ong";
                }
                ?>

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


                <form action="./tela-comentario.php" method="post">
                    <button type="submit" value="<?php echo $pesquisa['idpost'] ?>" name="btnComentar">COMENTAR</button>
                </form>

            <?php } ?>

        </section>

    </main>

    <aside class="aside-direito">

        <section class="aside-class" style="background-color: white; border: none;">

            <section style="background-color: white;border: none; ">
                <form action="./pesquisa-altruismus.php" method="post">

                    <input type="search" placeholder="Buscar por Altruismus" name="buscar">
                    <button type="submit">Buscar</button>

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