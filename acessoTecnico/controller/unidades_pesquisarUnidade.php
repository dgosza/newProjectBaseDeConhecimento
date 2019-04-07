<?php 

    include_once '../conecta_banco.php';
    @$busca = $_POST['busca'];
    @$ordenar = $_POST['ordena'];

    if($ordenar == ""){
        $ordenar = "unidade";
    }

    
    switch($ordenar){
        case "unidade":
            $mostraOrdena = "Unidades";
        break;

        case "empresaLink":
            $mostraOrdena = "Link";
        break;

        case "dhcp":
            $mostraOrdena = "DHCP";
        break;
    }

    echo '<div class="row container"> ';
    echo '    <div class="col s12 l12">';
    echo '        <h1 class="flow-text" style="font-size:17px;position:relative;top:-20px;">ordenando por: '.$mostraOrdena.'</h1>';
    echo '    </div>';
    echo '</div> ';

    $query = $conecta->prepare("SELECT * FROM unidades_prevent WHERE (unidade LIKE '%$busca%' OR endereco like '%$busca%') AND ativo = 1 ORDER BY ".$ordenar." ASC");
    $query->execute();
    $fetchAll = $query->fetchAll();
    $count= $query->rowCount();

    if($count>0){

        echo '<table class="highlight bordered" >';
        echo '    <thead>';
        echo '        <tr>';
        echo '            <th class="flow-text">Unidade</th>';
        echo '            <th class="flow-text">Endereço</th>';
        echo '            <th class="flow-text">CNPJ</th>';
        echo '            <th class="flow-text">DHCP</th>';
        echo '            <th class="flow-text">Range IP</th>';
        echo '            <th class="flow-text">Empresa do Link</th>';
        echo '            <th class="flow-text">Assinatura</th>';
        echo '            <th class="flow-text">Ação</th>';
        echo '        </tr>';
        echo '    </thead>';
        echo '    <tbody>';

        foreach($fetchAll as $unidades){
            echo '<tr>';
            echo '<td style="user-select:none;"><a href="" style="color:inherit;">'.$unidades['sigla'].' - '.$unidades['unidade'].'</a></td>';
            echo '<td>'.$unidades['endereco'].'</td>';
            echo '<td>'.$unidades['cnpj'].'</td>';
            $verificaDHCP = $unidades['dhcp'];
            if($verificaDHCP == 1){
                $unidades['dhcp'] = "Sim";
            }else{
                $unidades['dhcp'] = "Não";
            }
            echo '<td style="user-select:none;">'.$unidades['dhcp'].'</td>';
            echo '<td>'.$unidades['range_ip'].'</td>';
            echo '<td>'.$unidades['empresaLink'].'</td>';
            echo '<td>'.$unidades['assinatura'].'</td>';
            echo '<td>
                    <a href="" style="color:inherit;"><i class="material-icons" title="Editar Dados de '.$unidades['unidade'].'">edit</i></a>
                    <a href="" style="color:inherit;"><i class="material-icons" title="Excluir '.$unidades['unidade'].'">delete</i></a>                   
                </td>';
            echo '</tr>';                                                          
        }

        echo '</tbody>';
        echo '</table> ';


    }else{
        echo '<h1 class="flow-text>Nenhuma unidade encontrada!</h1>';
    }
?>