<?php 

ob_start();

$nome = "diego";

?>

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<style>body{ font-family: Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif;}</style>
<title>Title</title>
</head>
<body>

    <img src="../view/imgs/logoPreventAzul.png" width="200">
    <p>A empresa <b>PREVENT SENIOR PRIVATE OPERADORA DE SAÚDE LTDA</b>, estabelecida à <b>Rua
    Lourenço Marques, Nº 158 – SÃO PAULO/SP</b>, inscrita no CNPJ sob o <b>n°</b>00.461.479/0001-63,
    DECLARA, para quaisquer efeitos, que é considerada <b>NÃO CONTRIBUINTE DO ICMS</b>, nem
    sujeita à inscrição no Cadastro de Contribuinte da Secretaria da Fazenda do Estado de São Paulo
    e consequentemente, dispensada das obrigações fiscais, não realiza operações de circulação de
    mercadoria neste CNPJ e, não está obrigada a emitir qualquer nota fiscal prevista no
    Regulamento do ICMS/SP.</p>
    <p>Diante disto, a(s) mercadoria(s) abaixo relacionada(s) está(ão) sendo transportada(s) através da
    presente Declaração, como “SIMPLES REMESSA”, devendo o destinatário, uma vez que
    enquadrado como Contribuinte do ICMS, emitir a correspondente nota fiscal de entrada, nos
    termos da legislação do seu Estado.</p>

    <br>

    <b>Produto: <?php echo $nome; ?></b>
    <b>N° Patrimônio: $nome</b>
    <b>Produto: $nome</b>

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
    "relatorio_titulo_pdf",
    array(
        "Attachment" => false //realiza o download do arquivo
    )
);

?>