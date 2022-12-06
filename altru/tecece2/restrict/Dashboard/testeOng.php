<?php

//tem precedência de cabeçalho, deve ser a 1ª linha do seu bloco
require_once("../../model/Ong.php");

// require_once("../model/Doacao.php");

// require("./phplot-6.2.0/phplot.php");



try {
    $ong = new Ong();
 
    // $doacao = new Doacao();

    //QUANTIDADE DE DOADORES QUE SE CADASTRARAM POR MÊS//


    $janeiro = $ong->quantidadePorMes(1);
    $fevereiro = $ong->quantidadePorMes(2);
    $marco = $ong->quantidadePorMes(3);
    $abril = $ong->quantidadePorMes(4);
    $maio = $ong->quantidadePorMes(5);
    $junho = $ong->quantidadePorMes(6);
    $julho = $ong->quantidadePorMes(7);
    $agosto = $ong->quantidadePorMes(8);
    $setembro = $ong->quantidadePorMes(9);
    $outubro = $ong->quantidadePorMes(10);
    $novembro = $ong->quantidadePorMes(11);
    $dezembro = $ong->quantidadePorMes(12);

    $janeiro1 = $janeiro;
    $fevereiro1 = $fevereiro;
    $marco1 = $marco;
    $abril1 = $abril;
    $maio1 = $maio;
    $junho1 = $junho;
    $julho1 = $julho;
    $agosto1 = $agosto;
    $setembto1 = $setembro;
    $outubro1 = $outubro;
    $novembro1 = $novembro;
    $dezembro1 = $dezembro;






    $meses = array(
        "JANEIRO", "FEVEREIRO", "MARÇO", "ABRIL", "MAIO", "JUNHO", "JULHO", "AGOSTO", "SETEMBRO", "OUTUBRO",
        "NOVEMBRO", "DEZEMBRO"
    );

    // $grafico = new PHPLOT(700, 250); //defini as dimensões do grafico
    // $grafico->SetFileFormat("png");

    # Indicamos o títul do gráfico e o título dos dados no eixo X e Y do mesmo
    // $grafico->SetTitle("NUMBER OF REGISTERED DONORS PER MONTH");
    // $grafico->SetXTitle("MONTHS");
    // $grafico->SetYTitle("REGISTERED DONORS");

    $meses = array(1, 2, 3, 4, 5);


   
    # Definimos os dados do gráfico
    $dados = array(
        array('Janeiro', $janeiro),
        array('Fevereiro', $fevereiro),
        array('Março', $marco),
        array('Abril', $abril),
        array('Maio', $maio),
        array('Junho', $junho),
        array('Julho', $julho),
        array('Agosto', $agosto),
        array('Setembro', $setembro),
        array('Outubro', $outubro),
        array('Novembro', $novembro),
        array('Dezembro', $dezembro),
    );

  
    
    
    // $grafico->SetDataValues($dados);



    # Neste caso, usariamos o gráfico em barras
    // $grafico->SetPlotType("bars");

    # Exibimos o gráfico

    // $grafico->SetIsInline(true);
    // $grafico->SetOutputFile('grafico.png');

    // $grafico->DrawGraph();

    //FIM DO GRÁFICO//

    //GRÁFICO DE PIZZA//
    $contagem = $ong->contagemUsers();


    

    foreach ($contagem as $quantidade) {
        $quantOngs = $quantidade[0];
        $quantDoador = $quantidade[1];
       
        $quantRespostaSim = $quantidade[2];
        $quantRespostaNao = $quantidade[3];
       
        $quantPrestacaoContas = $quantidade[4];
       
      
      
        
        // $quantPrestacaoContas = $quantidade[3];

    }
 
    
   
    // $quantiRespostaSim = $quantRespostaSim;   

    
  
   
    

    


    // $usuarios = array(
    //     array(
    //         "DOADORES : ".$quantDoador,$quantDoador
    //     ),
    //     array(
    //         "ONGs : ".$quantOngs,$quantOngs
    //     )
    // );


   

    // $graficoPizza = new PHPLOT(700,250);
    // $graficoPizza->SetFileFormat('png');

    // $graficoPizza->SetTitle("QUANTIDADE DE DOADORES E ONGs");

    // $graficoPizza->SetDataValues($usuarios);

    // $graficoPizza->SetDataType('text-data-single');
    // $graficoPizza->SetPlotType("pie");

    // foreach($usuarios as $percentual) $graficoPizza->SetLegend($percentual[0]);

    // $graficoPizza->SetIsInline(true);
    // $graficoPizza->SetOutputFile('graficoPizza.png');

    // $graficoPizza->DrawGraph();

    //FIM DO GRÁFICO//

    //GRÁFICO PONTUAL//

    
    //DOAÇÕES REALIZADAS POR MÊS//

    // $doaJan = $doacao->quantidadeDoacoesPorMes(1);
    // $doaFev = $doacao->quantidadeDoacoesPorMes(1);

    // $graficoPontual = new PHPlot(700,250);
    // $graficoPontual->SetFileFormat("png");

    // $graficoPontual->SetTitle("DOACOES REALIZADAS NOS ULTIMOS MESES");
    // $graficoPontual->SetXTitle("MESES");
    // $graficoPontual->SetYTitle("DOACOES");

    // $dados = array(
    //         array('Janeiro', 10),
    //         array('Fevereiro', 5),
    //         array('Março', 4),
    //         array('Abril', 8),
    //         array('Maio', 7),
    //         array('Junho', 5),
    //         array('Julho', 5),
    //         array('Agosto', 5),
    //         array('Setembro', 5),
    //         array('Outubro', 5),
    //         array('Novembro', 5),
    //         array('Dezembro', 5),
    // );

    // $graficoPontual->SetDataValues($dados);

    // $graficoPontual->SetIsInline(true);
    // $graficoPontual->SetOutputFile('graficoPontual.png');

    // $graficoPontual->DrawGraph();

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
    <title>Document</title>
</head>
<body>


<?php
$var22 = $outubro;

$var25 = $novembro;


$_SESSION['var22'] = $var22;

$_SESSION['var25'] = $var25;



?>




    
</body>
</html>