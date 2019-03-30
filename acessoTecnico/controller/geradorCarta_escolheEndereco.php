<?php
    
    include_once '../conecta_banco.php';

    $pegaEndereco = $conecta->prepare("SELECT * FROM unidades_prevent WHERE id_unidade = '".$_POST['id']."'") ;
    $pegaEndereco->execute();
    $fetchAll= $pegaEndereco ->fetchAll();


    foreach($fetchAll as $endereco){       
        echo '<input type="text" name="endereco" value="Endereço: '.$endereco['endereco'].'" disabled>';

    }
  
?>