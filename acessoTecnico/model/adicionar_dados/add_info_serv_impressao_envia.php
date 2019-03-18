<?php

    session_start();
    include_once '../../conecta_banco.php';

    $envia = filter_input (INPUT_POST, 'cadastrar', FILTER_SANITIZE_STRING);

    //botao cadastrar
    if($envia){
        $endereco_ip = filter_input (INPUT_POST, 'endereco_ip', FILTER_SANITIZE_STRING);
        $unidade = filter_input (INPUT_POST, 'unidade_fk', FILTER_SANITIZE_STRING);
        $descricao = filter_input (INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
        $hostname = filter_input (INPUT_POST, 'hostname', FILTER_SANITIZE_STRING);
        $value = "1";
        
        $query="INSERT INTO serv_impressao (endereco_ip, unidade_fk, descricao, hostname, ativo) VALUES (:endereco_ip, :unidade_fk, :descricao, :hostname, :1) ";
        
        $cadastra = $conecta->prepare($query);
        $cadastra->bindParam(':endereco_ip', $endereco_ip);
        $cadastra->bindParam(':unidade_fk', $unidade);
        $cadastra->bindParam(':descricao', $descricao);
        $cadastra->bindParam(':hostname', $hostname);
        $cadastra->bindParam(':1', $value);

        if($cadastra->execute()){
            header("Location: ../../view/consulta_rapida.php");
        }else{
            echo 'erro ao cadastrar';
        }
    }else{
        echo 'erro ao executar a query';
    }

?>