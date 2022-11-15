<?php

    session_start();
    require_once("../model/Reacao.php");

    $teste = new Reacao();

    if(isset($_SESSION['iddoador'])) {
        var_dump($id = $_SESSION['iddoador']);
        var_dump($tipoPerfil = "doador");
    }
    else if(isset($_SESSION['idong'])) {
        var_dump($id = $_SESSION['idong']);
        var_dump($tipoPerfil = "ong");
    }

    echo "<br>";
    $lista = $teste->verificar($_POST['idPost'],$tipoPerfil,$id);

    var_dump($lista);

?>