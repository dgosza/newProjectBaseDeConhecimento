<?php
    session_start();
    include_once '../../../conecta_banco.php';
    
    $linha=filter_input (INPUT_GET, 'id_unidade', FILTER_SANITIZE_NUMBER_INT);
    $query="UPDATE unidades_prevent set ativo = 0 WHERE id_unidade = ".$linha." ";
    $altera=$conecta->prepare($query);
    if($altera->execute()){
        header("Location: ../../view/unidades.php");
    }else{
        echo 'erro ao excluir unidade';
    }   
?>