<?php
    include_once '../../../conecta_banco.php';

@$checkbox = $_POST['dhcp'];
$unidade = $_POST['unidade'];
$sigla = $_POST['sigla'];
$endereco = $_POST['endereco'];
$cnpj = $_POST['cnpj'];

if($checkbox != "on"){
    $checkbox = "0";
}else{
    $checkbox = "1";
}

echo $checkbox;
echo '<br>';
echo $unidade;
echo '<br>';
echo $sigla;
echo '<br>';
echo $endereco;


?>