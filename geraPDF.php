<?php
    include './mpdf60/mpdf.php';
    include_once '../faleconosco/models/Chamado.class.php';
    include_once '../faleconosco/controller/Controller.class.php';
    
    session_start();
    $c = new Controller();
    $chamado = $c->buscaChamado();
    
    
    $codigo = $chamado['cod'];
    $data = $chamado['data'];
    $usuario = $chamado['usuario'];
    $email = $chamado['email'];
    $telefone = $chamado['telefone'];
    $tipo = $chamado['tipo'];
    $status = $chamado['status'];
    $mensg = $chamado['mensagem'];
    $resp = $chamado['resposta'];
    $atend = $chamado['atendeu'];
    $fecha = $chamado['dtfecha'];

$saida = '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Relatório chamado</title>
    <link rel="stylesheet" href="./css/pdf.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="./img/fale_conosco.png">
      </div>
      <h1>UNIPÊ <br /> Projeto da Esp. de Desenvolvimento para WEB</h1>
      <div id="company" class="clearfix">
        <div>Equipe:</div>
        <div>Flávio Rodrigo</div>
        <div>Eric Neder</div>
        <div>Luiz Euzébio</div>
      </div>
      <h2>Relatório do chamado Nº '.$codigo.'</h2>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">Abertura</th>
            <th class="desc">Cliente</th>
            <th>E-mail</th>
            <th>Telefone</th>'.'/r/n'.'
            <th>Tipo</th>
            <th>Status</th>
            <th>Mensagem</th>
            <th>Resposta</th>
            <th>Atendente</th>
            <th>Fechado</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service">' .$data .' </td>
            <td class="unit">'.$usuario.'</td>
            <td class="unit">'.$email.'</td>
            <td class="qty">'.$telefone.'</td>
            <td class="total">'.$tipo.'</td>
            <td class="total">'.$status.'</td>
            <td class="total">'.$mensg.'</td>
            <td class="total">'.$resp.'</td>
            <td class="total">'.$atend.'</td>
            <td class="total">'.$fecha.'</td>    
          </tr>
        </tbody>
      </table>
    </main>
    <footer>
      Projeto desenvolvido para o módulo de PHP avançado.
    </footer>
  </body>
</html>';

$arquivo = "Exemplo.pdf";

$mpdf = new mPDF();
$mpdf->WriteHTML($saida);

$mpdf->Output($arquivo, 'I');

?>

