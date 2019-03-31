<?php 

ob_start();

$cnpj = $_POST['cnpj']; 
$endereco = $_POST['endereco'];
$unidade = $_POST['unidade'];  
$produto = $_POST['produto']; 
$patri = $_POST['patri'];
$quantidade = $_POST['quantidade']; 
$ac = $_POST['ac']; 

date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d');  
  
//array com os meses
$meses= array(
    1 => "Janeiro",
    2 => "Fevereiro",
    3 => "Março",
    4 => "Abril",
    5 => "Maio",
    6 => "Junho",
    7 => "Julho",
    8 => "Agosto",
    9 => "Setembro",
    10 => "Outubro",
    11 => "Novembro",
    12 => "Dezembro"
);

//escolhe o mes de acordo com o numero vindo da função date
for($i = 0; $i<=12; $i++){
    if(date('m') == $i){
        $mes = $meses[$i];
    }
}

include_once '../conecta_banco.php';
$query = $conecta->prepare("SELECT unidade FROM unidades_prevent WHERE id_unidade = 2 ");
$query->execute();
$fetchAll = $query->fetchAll();
foreach($fetchAll as $choose){
   $unidadeNome = $choose['unidade'];
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <style>body{ font-family: Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif;}</style>
    <title>Carta de Envio <?php echo $unidadeNome; ?></title>
</head>
<body>

    <img src="../view/imgs/logoPreventAzul.png" width="200"><br>
    <p>A empresa <b>PREVENT SENIOR PRIVATE OPERADORA DE SAÚDE LTDA</b>, estabelecida à <b>Rua
    Lourenço Marques, Nº 158 – SÃO PAULO/SP</b>, inscrita no CNPJ sob o <b>n°</b>00.461.479/0001-63,
    DECLARA, para quaisquer efeitos, que é considerada <b>NÃO CONTRIBUINTE DO ICMS</b>, nem
    sujeita à inscrição no Cadastro de Contribuinte da Secretaria da Fazenda do Estado de São Paulo
    e consequentemente, dispensada das obrigações fiscais, não realiza operações de circulação de
    mercadoria neste CNPJ e, não está obrigada a emitir qualquer nota fiscal prevista no
    Regulamento do ICMS/SP.</span>
    <span>Diante disto, a(s) mercadoria(s) abaixo relacionada(s) está(ão) sendo transportada(s) através da
    presente Declaração, como “SIMPLES REMESSA”, devendo o destinatário, uma vez que
    enquadrado como Contribuinte do ICMS, emitir a correspondente nota fiscal de entrada, nos
    termos da legislação do seu Estado.</span><br><br>

    <b>Produto: <?php echo $produto; ?></b><br>
    <b>N° Patrimônio: <?php echo $patri; ?></b><br>
    <b>Quantidade de produtos: <?php echo $quantidade;?></b><br><br>
    <b>Destinatário: PREVENT SENIOR RIVATE OPERADORA DE SAÚDE LTDA</b><br>
    <b>CNPJ: <?php echo $cnpj;?></b><br>
    <b>ENDEREÇO: <?php echo $endereco; ?></b><br>
    <b>A/C: <?php echo $ac; ?></b><br>
    <b>De: </b><br>
    <b>Setor: TI</b><br>
    <p>Motivo da Remessa <B>SIMPLES TRANSFERÊNCIA</B></p>
    <p>São Paulo, <?php echo ''.date('d').' de '.$mes.' de '.date('Y').' '; ?> </p><br>
    <div class="separador" style="width:520px;"><hr></div>
    <p>Prevent Senior Private Operadora de Saúde LTDA</p>
    <div id="texto" style="font-size:;">
        <span>As empresas não-contribuintes do ICMS que eventualmente transportem bens, materiais ou mercadorias não estão sujeitos à emissão de documento fiscal para acobertar esse transporte.</span>
        <span>Nesta situação, a legislação paulista autoriza o uso de documento interno, declaração elaborada pelo remetente, por exemplo, para acompanhar o trânsito do material até o destinatário final.</span>
        <span>Recomenda-se que referida declaração contenha no mínimo as seguintes indicações:</span>
        <ul>
            <li>Dados do emitente;</li>
            <li>Dados do destinatário;</li>
            <li>Descrição do material transportado (denominação dos materiais, número de volumes,etc.);</li>
            <li>Características do transporte (veículo utilizado, frete próprio ou terceiro, etc.);</li>
            <li>Motivo determinante da remessa ou retorno dos materiais;</li>
            <li>O fato de estar o remetente desobrigado de manter Inscrição no Estado.</li>
        </ul>
        <span>Essa declaração deve ser emitida em quantidades de vias suficientes para a retenção de uma delas em eventual fiscalização Estadual. Recomendamos a utilização de 3 (três) vias, sendo uma para o remetente, uma para o destinatário e outra para acompanhar os materiais juntamente com a via do destinatário.</span>
    </div>
    <span><b>Recebido: </b></span><br>
    

</body>
</html>

<?php
$html = ob_get_clean();
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream(
    $unidadeNome,
    array(
        "Attachment" => false //realiza o download do arquivo
    )
);

?>