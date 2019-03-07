<?php

    session_start();
    include_once '../../conecta_banco.php';

    //botao com o name alterar
    $envia=filter_input (INPUT_POST, 'editar', FILTER_SANITIZE_STRING);

        //recupera os dados do form
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $endereco_ip = filter_input (INPUT_POST, 'endereco_ip', FILTER_SANITIZE_STRING);
        $unidade = filter_input (INPUT_POST, 'unidade_fk', FILTER_SANITIZE_STRING);
        $descricao = filter_input (INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
        $hostname = filter_input (INPUT_POST, 'hostname', FILTER_SANITIZE_STRING);

        $query="UPDATE serv_impressao set endereco_ip = :endereco_ip, unidade_fk = :unidade_fk, descricao = :descricao, hostname = :hostname WHERE id = ".$id." ";

        $atualiza = $conecta->prepare($query);
        $atualiza->bindParam(':endereco_ip', $endereco_ip);
        $atualiza->bindParam(':unidade_fk', $unidade);
        $atualiza->bindParam(':descricao', $descricao);
        $atualiza->bindParam(':hostname', $hostname);

        if($atualiza->execute()){
            //fazer algo que atualizou com sucesso
            header("Location: ../../view/consulta_rapida.php");
        }else{
            header("Location: cadastroErro.php");
        }



?>