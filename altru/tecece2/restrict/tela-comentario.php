<?php

    session_start();
    require_once("../model/Post.php");
    require_once("../model/Comentario.php");

    $postagem = new Post();
    $coment = new Comentario();

    if(isset($_POST['btnComentar'])) {
        $idPost = $_POST['btnComentar'];
        $_SESSION['post'] = $idPost;
        $listarcomentario = $coment->listar($idPost);
        $listarpostagem = $postagem->listarPostId($idPost);
    }

    else if(isset($_SESSION['post'])) {
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
    <link rel="stylesheet" href="../css/social.css">
    <link id="size-stylesheet" rel="stylesheet" type="text/css" href="" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <script src="../JS/social2.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Bungee+Inline" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

                <li><a id="cor-button" class="nav-link scrollto" href="#services"><button style="font-weight: 700;" type="button" class="btn-login" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Qual é a boa?

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
                    <?php if (isset($_SESSION['iddoador'])) { ?>
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
                        <a class="home" href="./explorar.php">Explorar</a>
                    </section>
                    <?php if (isset($_SESSION['iddoador'])) { ?>
                        <!-- <section class="banana" id="home1">
              <a href="">

                <img class="icones-side" src="../img/sidedbar/sidebar/menu/notification.png" alt="">
              </a>
              <a href="" class="home">Notificações

              </a>


            </section> -->
                    <?php } ?>
                    <?php if (isset($_SESSION['iddoador'])) { ?>
                        <!-- <section class="banana" id="home1">
              <a href="">
                <img style="border-radius: none;" class="icones-side" src="../img/sidedbar/sidebar/menu/mensage.png" alt="">

              </a>
              <a class="home" href="">Mensagens</a>
            </section> -->
                    <?php } ?>
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

            <?php
            foreach ($listarpostagem as $post) {

                $idOng = $post['idong'];
                $idPost = $post['idpost'];
            ?>

                <section class="frase-do-img">
                    <form action="./social.php" method="post">
                        <button type="submit" name="idOng" value="<?php echo $idOng ?>">
                            <img src="./foto-perfil-ong/<?php echo $post['fotoong'] ?>" style="border-radius: 50%; width: 50px; height: 50px;" alt="">
                        </button>
                    </form>
                    <p class="nome-ong"><?php echo $nomeOng = $post['nomeong'] ?></p>
                    <!-- <p> @ADB</p> -->
                    <img class="img-pub-v" src="../img-social/tweet/Vector (1).png" alt="">
                    <p><?php echo $post['dtpost'] ?></p>
                </section>

                <section class="">
                    <section class="frase">
                        <section class="juncao">
                            <p class="desc"><?php echo $post['msgpost'] ?></p>
                        </section>

                        <section>
                            <img class="img-responsive" src="./social-img/<?php echo $post['imagempost'] ?>" alt="">
                        </section>

                    </section>
                </section>

                <?php if (isset($_SESSION['iddoador'])) { ?>

                    <form action="./comentar.php" method="post">
                        <br>
                        <label for="">
                            <h3>Comente algo</h3>
                        </label>
                        <br>
                        <input type="text" name="txtComentario" placeholder="Insira sua mensagem aqui">
                        <br>
                        <button type="submit" value="<?php echo $idPost ?>" name="idPost">COMENTAR</button>
                    </form>

                    <br>

                    Comentários

                    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">


                        <?php foreach ($listarcomentario as $comentario) { ?>

                            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                                <section class="mensagens">
                                    <img src="./foto-perfil-doador/<?php echo $comentario['fotodoador'] ?>" style="border-radius: 50%; width: 50px; height: 50px;" alt="">
                                    <p><?php echo $comentario['nomedoador'] ?></p>
                                    <p><?php echo $comentario['datacomentario'] ?></p>
                                </section>
                                <section>
                                    <p><?php echo $comentario['comentario'] ?></p>
                                </section>

                                <div class="portfolio-info">
                                    <a href="../../BizLand/assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                                    <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                            </div>

                        <?php } ?>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-web">

                            <!-- Imgem fica aq-->
                            <div class="portfolio-info">

                                <a href="../../BizLand/assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">

                            <div class="portfolio-info">

                                <a href="../../BizLand/assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-card">

                            <div class="portfolio-info">

                                <!-- os H´s ficam aq-->
                                <a href="../../BizLand/assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-web">

                            <div class="portfolio-info">

                                <a href="../../BizLand/assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">

                            <div class="portfolio-info">

                                <a href="../../BizLand/assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-card">

                            <div class="portfolio-info">

                                <a href="../../BizLand/assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-card">

                            <div class="portfolio-info">

                                <a href="../../BizLand/assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-web">

                            <div class="portfolio-info">

                                <a href="../../BizLand/assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>

                    </div>

                <?php } ?>

            <?php } ?>



            </div>


        </section>

    </main>



    <aside class="aside-direito">

        <section class="aside-class" style="background-color: white; border: none;">


            <section style="background-color: white;border: none; ">
                <form action="./pesquisa-altruismus.php" method="post">

                    <input type="search" style="border: 1px solid #5A56E9;" class="busca" id="busca" placeholder="Busque por Ongs" name="buscar">
                    <button type="submit" style="background-color: #5A56E9; color: #E6ECF0; border-radius: 100px;">
                        <i class="fa fa-search" style="color: white; padding: 10px;"></i>



                    </button>

                    <style>
                        input:focus {
                            box-shadow: 0 0 0 0;
                            outline: 0;

                        }
                    </style>
                </form>
            </section>


        </section>

    </aside>





</body>

</html>