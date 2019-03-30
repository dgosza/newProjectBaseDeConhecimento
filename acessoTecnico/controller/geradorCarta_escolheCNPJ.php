<?php
    
    include_once '../conecta_banco.php';

    $pegaCNPJ = $conecta->prepare("SELECT * FROM unidades_prevent WHERE id_unidade = '".$_POST['id']."'") ;
    $pegaCNPJ->execute();
    $fetchAll= $pegaCNPJ ->fetchAll();


    foreach($fetchAll as $cnpj){       
        echo '<input type="text" name="cnpj" value="CNPJ: '.$cnpj['cnpj'].'" disabled>';

    }
 
?>