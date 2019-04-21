<?php

    session_start();
    include_once '../../../conecta_banco.php';

    $envia = filter_input (INPUT_GET, 'editar', FILTER_SANITIZE_STRING);

    if($envia){
        //recupera os dados do form
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $endereco_ip = filter_input (INPUT_GET, 'endereco_ip', FILTER_SANITIZE_STRING);
        $unidade = filter_input (INPUT_GET, 'unidade_fk', FILTER_SANITIZE_STRING);
        $descricao = filter_input (INPUT_GET, 'descricao', FILTER_SANITIZE_STRING);
        $hostname = filter_input (INPUT_GET, 'hostname', FILTER_SANITIZE_STRING);


        $query="UPDATE serv_impressao set endereco_ip = :endereco_ip, unidade_fk = :unidade_fk, descricao = :descricao, hostname = :hostname WHERE id = ".$id." ";
        $atualiza = $conecta->prepare($query);
        $atualiza->bindParam(':endereco_ip', $endereco_ip);
        $atualiza->bindParam(':unidade_fk', $unidade);
        $atualiza->bindParam(':descricao', $descricao);
        $atualiza->bindParam(':hostname', $hostname);
        if($atualiza->execute()){
            header("Location: ../../view/consulta_rapida.php");            
        }else{
            header("Location: cadastroErro.php");
        }

    }else{
        echo 'erro ao executar a query';
    }

?>