<?php
    session_start();
    include_once '../../../conecta_banco.php';
    
    $linha=filter_input (INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $query="UPDATE serv_impressao set ativo = 0 WHERE id = ".$linha." ";
    $altera=$conecta->prepare($query);
    if($altera->execute()){
        header("Location: ../../view/consulta_rapida.php");
    }else{
        echo 'erro ao excluir filme';
    }   
?>