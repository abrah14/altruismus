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

    $listapost = $presta->listarTd();
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

    </aside>

    <main id="elemento-chave"  style="background-color: #e9ebf7;display: flex;justify-content: center;" >

        <script type="text/javascript">
            $(function() {
                $('.carregando').hide();
                $('#tipo_publicacao').change(function() {


                    if ($('#tipo_publicacao').val() == 1) {
                        window.location.href = "http://localhost:8080/altruismus/altru/tecece2/restrict/prestacoes-explorar-ong.php";
                    }

                })
            })

            // document.location.reload(false);
        </script>

            
        <section>
            <?php
            foreach ($listapost as $post) {
                $idOng = $post['idong'];
                $idPresta = $post['idPrestacaoContasOng'];
                $quantidadeReacoesPrestaLista = $reacaoPresta->verificarQuantidade($idPresta);
                $quantidadeReacoesPresta = $quantidadeReacoesPrestaLista['quantidade'];
            ?>

<section class="frase-do-img" class="div" style="border: 1px solid #5A56E9;border-radius: 10px 10px 0px 0px;padding: 10px;background-color: white;">
                    <form action="./social.php" method="post">
                        <button type="submit" name="idOng" value="<?php echo $idOng ?>">
                            <img src="./foto-perfil-ong/<?php echo $post['fotoong'] ?>" style="border-radius: 50%; width: 50px; height: 50px;" alt="">
                        </button>
                    </form>

                    <section  style="display: flex;flex-direction: column;padding: 3px;">

                        <p class="nome-ong"><?php echo $nomeOng = $post['nomeong'] ?></p>
                

                    </section>
                </section>

               
                    <section class="frase div"  style="border: 2px solid #5A56E9;background-color: white;">
                      
                          
                              
                        <p class="desc" style="font-weight: 700;color: #5A56E9;"><?php echo $post['descProdutosRecebidos'] ?></p>
                        <p class="desc" style="font-weight: 700;color: #5A56E9;">Quantidade recebida: <?php echo $post['quantidadeItensRecebido'] ?></p>
                              
                        
                        </section>

                        <section    style="border-left: 2px solid #5A56E9; border-right: 2px solid #5A56E9;background-color: white;">
                        
                            <img  class="div-img-presta" src="./social-img/<?php echo $post['fotoOng'] ?>" alt="">

                        
                            <img class="div-img-presta" src="./social-img/<?php echo $post['fotodoador'] ?>" alt="">
                        </section>

                        <form action="" method="" c id="form-curtir" style="border: 2px solid #5A56E9;display: flex;justify-content: center;justify-content: space-around;align-items: center;" class="div">
                            <?php
                            if ($reacaoPresta->verificar($idPresta, $tipoPerfil, $idPerfil) == "curtiu") {
                            ?>
        
                                <label for=""><?php echo ($quantidadeReacoesPresta); ?></label>
        
                                <button type="submit" id="idPresta" onclick="curtirPresta(<?php echo $idPresta ?>,'<?php echo $tipoPerfil ?>','<?php echo $idPerfil ?>',1);" name="idPresta" value="<?php echo $idPresta ?>">
        
                                    <img src="./coracao-vermelho.png" alt="" style="width: 50px; height: 50px;" id="imagem-coracao-vermelho">
                                <?php } else { ?>
                                    
                                    <label for=""><?php echo ($quantidadeReacoesPresta); ?></label>
        
                                    <button type="submit" id="idPresta" onclick="curtirPresta(<?php echo $idPresta ?>,'<?php echo $tipoPerfil ?>','<?php echo $idPerfil ?>',0);" name="idPresta" value="<?php echo $idPresta ?>">
        
                                        <img src="./coracao.png" alt="" style="width: 50px; height: 50px;" id="imagem-coracao">
                                    <?php } ?>
                                    </button>
                        <?php
                        $dataCurtida = date('Y-m-d H:i:s');
                        ?>
        
                        </form>
        
                       
                                <br>
                        
                        
                        
                            <?php } ?>
                    </section>
            



        </section>




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

        <option value="1" >Pedido</option>
        <option value="2" selected>Prestação de contas</option>

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
        function curtirPresta(postagem, tipoperfil, perfil, imagem) {

            var idPrestacao = postagem;
            var tipoPerfil = tipoperfil;
            var idPerfil = perfil;
            var tipoReacao = 'curtida';

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
                url: "reagirPresta.php",
                data: {
                    idprestacao: idPrestacao,
                    typeperfil: tipoPerfil,
                    idperfil: idPerfil,
                    tiporeacao: tipoReacao
                },
                success: function(data) {
                    console.log("curtiu");
                }
            });


        }
    </script>


</body>

</html>