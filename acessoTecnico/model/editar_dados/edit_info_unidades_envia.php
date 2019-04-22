<?php

    session_start();
    include_once '../../../conecta_banco.php';

    $envia = filter_input (INPUT_GET, 'editar', FILTER_SANITIZE_STRING);

    if($envia){
        //recupera os dados do form
        $id = filter_input(INPUT_GET, 'id_unidade', FILTER_SANITIZE_NUMBER_INT);
        $sigla = filter_input(INPUT_GET, 'sigla', FILTER_SANITIZE_NUMBER_INT);
        $endereco = filter_input (INPUT_GET, 'endereco', FILTER_SANITIZE_STRING);
        $unidade = filter_input (INPUT_GET, 'unidade', FILTER_SANITIZE_STRING);
        $cnpj = filter_input (INPUT_GET, 'cnpj', FILTER_SANITIZE_STRING);
        $dhcp = filter_input (INPUT_GET, 'dhcp', FILTER_SANITIZE_INT);
        $range_ip = filter_input (INPUT_GET, 'range_ip', FILTER_SANITIZE_STRING);
        $empresaLink = filter_input (INPUT_GET, 'empresaLink', FILTER_SANITIZE_STRING);
        $assinatura = filter_input (INPUT_GET, 'assinatura', FILTER_SANITIZE_STRING);


        $query="UPDATE unidades_prevent set sigla = :sigla, endereco = :endereco, unidade = :unidade, cnpj = :cnpj, dhcp = :dhcp, range_ip = :range_ip, empresaLink = :empresaLink, assinatura = :assinatura WHERE id_unidade = ".$id." ";
        $atualiza = $conecta->prepare($query);
        $atualiza->bindParam(':sigla', $sigla);
        $atualiza->bindParam(':endereco', $endereco);
        $atualiza->bindParam(':unidade', $unidade);
        $atualiza->bindParam(':dhcp', $dhcp);
        $atualiza->bindParam(':cnpj', $cnpj);
        $atualiza->bindParam(':range_ip', $range_ip);
        $atualiza->bindParam(':empresaLink', $empresaLink);
        $atualiza->bindParam(':assinatura', $assinatura);

        if($atualiza->execute()){
            header("Location: ../../view/unidades.php");            
        }else{
            header("Location: cadastroErro.php");
        }

    }else{
        echo 'erro ao executar a query';
    }

?>