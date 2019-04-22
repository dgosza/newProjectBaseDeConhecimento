<?php

    session_start();
    include_once '../../../conecta_banco.php';

        $sigla = filter_input(INPUT_GET, 'sigla', FILTER_SANITIZE_NUMBER_INT);
        $endereco = filter_input (INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
        $unidade = filter_input (INPUT_POST, 'unidade', FILTER_SANITIZE_STRING);
        $cnpj = filter_input (INPUT_POST, 'cnpj', FILTER_SANITIZE_STRING);
        $dhcp = filter_input (INPUT_POST, 'dhcp', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $range_ip = filter_input (INPUT_POST, 'range_ip', FILTER_SANITIZE_STRING);
        $empresaLink = filter_input (INPUT_POST, 'empresaLink', FILTER_SANITIZE_STRING);
        $assinatura = filter_input (INPUT_POST, 'assinatura', FILTER_SANITIZE_STRING);
        $value = "1";

        if($dhcp == null){
            $dhcp = 0;
        }else{
            $dhcp = 1;
        }

        $query="INSERT INTO unidades_prevent (sigla, endereco, unidade, cnpj, dhcp, range_ip, empresaLink, assinatura, ativo) VALUES(:sigla, :endereco, :unidade, :cnpj, :dhcp, :range_ip, :empresaLink, :assinatura, :1) ";
        $cadastra = $conecta->prepare($query);
        $cadastra->bindParam(':sigla', $sigla);
        $cadastra->bindParam(':endereco', $endereco);
        $cadastra->bindParam(':unidade', $unidade);
        $cadastra->bindParam(':dhcp', $dhcp);
        $cadastra->bindParam(':cnpj', $cnpj);
        $cadastra->bindParam(':range_ip', $range_ip);
        $cadastra->bindParam(':empresaLink', $empresaLink);
        $cadastra->bindParam(':assinatura', $assinatura);
        $cadastra->bindParam(':1', $value);

        if($cadastra->execute()){
            header("Location: ../../view/unidades.php");            
        }else{
            header("Location: cadastroErro.php");
        }

?>