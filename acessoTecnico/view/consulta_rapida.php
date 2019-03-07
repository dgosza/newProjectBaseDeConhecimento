<?php
    session_start();
    if(!isset($_SESSION["login"]) && !isset($_SESSION["nome"]) && !isset($_SESSION["nivel"])){
        header("Location: ../../index.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Consulta Rápida</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--------------------FAV ICON--------------------------------------------!-->
    <link rel="icon" type="image/png" sizes="96x96" href="imgs/favBase.png">

    <!--------------------MATERIALIZE FRAMEWORK AND CSS STYLE------------------!-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />

    <!--------------------ICONES MATERIALIZE FRAMEWORK-----------------------!-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>

    <!----------------------------------NAV BAR--------------------------->
    <?php include_once 'navbar.php'; ?>

    <div class="middle acessibilidade">
        <div class="row container">

            <div class="col s12 l12">

                <div class="col s12 l10">
                    <h1 class="flow-text ">consulta rápida</h1>
                    <p>O intuito do Consulta Rápida é levar ao técnico a informação que o mesmo deseja, de forma rápida e dinâmica.</p>
                </div> 
                
                <div class="col s12 l12 button">
                    <h1 class="flow-text ">servidores de impressão e de pastas</h1>
                    <a class="waves-effect waves-light btn modal-trigger" href="#modalImpressao" style="background:#146BED"><i class="material-icons left">print</i>IMPRESSÂO</a>
                    <a class="waves-effect waves-light btn modal-trigger" href="#modalPastas" style="background:#146BED"><i class="material-icons left">folder</i>PASTAS</a>
                </div>

                <div class="col s12 l12">
                    <br>
                    <h1 class="flow-text ">unidades da prevent senior<i class="material-icons"></i></h1>
                    <a class="waves-effect waves-light btn" style="background-color: #146BED"><i class="material-icons left">business</i>UNIDADES</a>
                </div>

            </div>



            <!----------------------------------INICIO MODAL SERVIDOR DE IMPRESSAO--------------------------->
            <div id="modalImpressao" class="modal bottom-sheet">
                <div class="modal-content container">
                    <div class="col s12 l11">
                        <h1 class="flow-text">servidores de impressão</h1>
                    </div>

                    <!----------------------------------BOTAO REDONDO "+" ADICIONAR SERVIDOR--------------------------->
                    <!--
                        <div class="col s12 l1">
                            <a href="" class="btn-floating #0d47a1 blue darken-3 hidden"><i class="material-icons">add</i>Adicionar unidade</a>
                        </div>
                    !-->

                    <table class="highlight tabela">
                        <thead>
                            <tr>
                                <th style="user-select: none;" class="flow-text">Unidade</th>
                                <th style="user-select: none;" class="flow-text">Hostname</th>
                                <th style="user-select: none;" class="flow-text">Endereço IP</th>
                                <th style="user-select: none;" class="flow-text">Descrição</th>
                                <th style="user-select: none;" class="flow-text">Ação</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                                include_once '../conecta_banco.php';
                                $query = $conecta->prepare("SELECT unidade.*, serv_impressao.*
                                FROM serv_impressao as serv_impressao 
                                RIGHT JOIN unidades_prevent as unidade 
                                on (unidade.id_unidade = serv_impressao.unidade_fk) WHERE serv_impressao.ativo = 1");
                                $query->execute();
                                $fetchAll = $query->fetchAll();
                                foreach($fetchAll as $dados_impressao){
                                    
                                    echo '<tr>';
                                    echo '<td>'.$dados_impressao['unidade'].'</td>';
                                    echo '<td><strong>'.$dados_impressao['hostname'].'</strong></td>';
                                    echo '<td><strong>'.$dados_impressao['endereco_ip'].'</strong></td>';
                                    echo '<td>'.$dados_impressao['descricao'].'</td>';
                                    echo '<td>
                                                <a href="#editServerImpressao?id='.$dados_impressao['id'].'" class="modal-trigger" style="color:inherit"><i class=" material-icons">edit</i></a>
                                                <a href="#excluirServerImpressao?id='.$dados_impressao['id'].'" class="modal-trigger" style="color:inherit"><i class=" material-icons">delete</i></a>
                                        </td>';
                                    echo '</tr>';
                                }             

                            ?>
                        </tbody>

                    </table>

                </div>
                <div class="modal-footer container" style="height:70px;">
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat left">Fechar</a>
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat #0d47a1 blue darken-3 white-text">Adicionar Servidor de Impressão</a>
                </div>
                
            </div>



            <!----------------------------------INICIO MODAL EDITAR DADOS DO SERVER DE IMPRESSAO--------------------------->
            <?php 
            
                include_once '../conecta_banco.php';
                $query = $conecta->prepare("SELECT unidade.*, serv_impressao.*
                FROM serv_impressao as serv_impressao 
                RIGHT JOIN unidades_prevent as unidade 
                on (unidade.id_unidade = serv_impressao.unidade_fk) WHERE serv_impressao.ativo = 1 ");
                $query->execute();
                $fetchAll = $query->fetchAll();
                foreach($fetchAll as $dados_impressao){
                    
                    echo '<div id="editServerImpressao?id='.$dados_impressao['id'].'" class="modal modal-fixed-footer" style="width:600px;height:8  00px;">';
                    echo '    <div class="modal-content ">';
                    echo '        <i class="material-icons left">edit</i><h1 class="flow-text">'.$dados_impressao['unidade'].'</h1>';
                    echo '        <div class="col s12 l16" >';
                    echo '            <form method="POST" action="../model/editar_dados/edit_info_serv_impressao_envia.php">';
                    echo '                  <input type="hidden" name="id" value="'.$dados_impressao['id'].'"> ';
                    echo '                   <div class="input-field col s6">';
                    echo '                      <input id="hostname" type="text" class"validate" value="'.$dados_impressao['hostname'].'" name="hostname" maxlength="20" autocomplete="off" ">';
                    echo '                      <label for="hostname">Hostname</label>';
                    echo '                   </div>';
                    echo '                   <div class="input-field col s6">';
                    echo '                      <input id="endereco_ip" type="text" class"validate" value="'.$dados_impressao['endereco_ip'].'" name="endereco_ip" maxlength="20" autocomplete="off" ">';
                    echo '                      <label for="endereco_ip">Endereço IP</label>';
                    echo '                   </div>';

                    echo '                   <div class="input-field col s12">';
                    echo '                      <select name="unidade_fk">';
                    echo '                          <option value="'.$dados_impressao['unidade_fk'].'" selected >'.$dados_impressao['unidade'].'</option>';
                                                    $select = $conecta->prepare("SELECT * FROM unidades_prevent WHERE ativo = 1 ORDER BY unidade ASC");
                                                    $select->execute();
                                                    $fetchAll = $select->fetchAll();
                                                    foreach($fetchAll as $unidades){
                                                        echo '<option value ="'.$unidades['id_unidade'].'">'.$unidades['unidade'].'</option>';
                                                    }
                    echo '                      </select>';
                    echo '                      <label>Unidade</label>';
                    echo '                   </div>';

                    echo '                   <div class="input-field col s12">';
                    echo '                      <input id="descricao" type="text" class"validate" value="'.$dados_impressao['descricao'].'" name="descricao" maxlength="100" autocomplete="off" ">';
                    echo '                      <label for="descricao">Descrição</label><br><br>';
                    echo '                      <input class="btn left waves-effect waves-green btn-flat #0d47a1 blue darken-3 white-text" type="submit" value="Editar" name="editar"> ';
                    echo '                   </div>';
                    echo '            </form>    ';
                    echo '        </div>';
                    echo '    </div>';
                    echo '    <div class="modal-footer">';
                    echo '        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Fechar</a>';
                    echo '    </div>';
                    echo '</div>';

                }
            
            ?>
            <!----------------------------------fazer o botao no final do modal--------------------------->



            <!----------------------------------INICIO MODAL DELETE DADOS DO SERVER DE IMPRESSAO--------------------------->
            <?php 
            
                include_once '../conecta_banco.php';
                $query = $conecta->prepare("SELECT unidade.*, serv_impressao.*
                FROM serv_impressao as serv_impressao 
                RIGHT JOIN unidades_prevent as unidade 
                on (unidade.id_unidade = serv_impressao.unidade_fk) WHERE serv_impressao.ativo = 1 ");
                $query->execute();
                $fetchAll = $query->fetchAll();
                foreach($fetchAll as $dados_impressao){
                    
                    echo '<div id="excluirServerImpressao?id='.$dados_impressao['id'].'" class="modal modal-fixed-footer" style="width:600px;height:800px;">';
                    echo '    <div class="modal-content ">';
                    echo '        <h1 class="flow-text">tem certeza que deseja excluir?</h1>';
                    echo '        <div class="col s12 l16" >';
                    echo '            <form method="POST" action="../model/delete_dados/delete_info_serv_impressao_envia.php">';
                    echo '                  <input type="hidden" name="id" value="'.$dados_impressao['id'].'"> ';
                    echo '                   <div class="input-field col s6">';
                    echo '                      <input id="hostname" type="text" class"validate" value="'.$dados_impressao['hostname'].'" name="hostname" maxlength="20" autocomplete="off" disabled ">';
                    echo '                      <label for="hostname">Hostname</label>';
                    echo '                   </div>';
                    echo '                   <div class="input-field col s6">';
                    echo '                      <input id="endereco_ip" type="text" class"validate" value="'.$dados_impressao['endereco_ip'].'" name="endereco_ip" maxlength="20" autocomplete="off" disabled ">';
                    echo '                      <label for="endereco_ip">Endereço IP</label>';
                    echo '                   </div>';
                    echo '                   <div class="input-field col s12">';
                    echo '                      <select name="unidade_fk" disabled >';
                    echo '                          <option value="'.$dados_impressao['unidade_fk'].'" selected >'.$dados_impressao['unidade'].'</option>';
                                                    $select = $conecta->prepare("SELECT * FROM unidades_prevent WHERE ativo = 1 ORDER BY unidade ASC");
                                                    $select->execute();
                                                    $fetchAll = $select->fetchAll();
                                                    foreach($fetchAll as $unidades){
                                                        echo '<option value ="'.$unidades['id_unidade'].'">'.$unidades['unidade'].'</option>';
                                                    }
                    echo '                      </select>';
                    echo '                      <label>Unidade</label>';
                    echo '                   </div>';
                    echo '                   <div class="input-field col s12">';
                    echo '                      <input id="descricao" type="text" class"validate" value="'.$dados_impressao['descricao'].'" name="descricao" maxlength="100" autocomplete="off" disabled ">';
                    echo '                      <label for="descricao">Descrição</label><br><br>';
                    echo '                      <input class="btn left waves-effect waves-green btn-flat #0d47a1 blue darken-3 white-text" type="submit" value="Excluir" name="excluir"> ';
                    echo '                   </div>';
                    echo '            </form>    ';
                    echo '        </div>';
                    echo '    </div>';
                    echo '    <div class="modal-footer">';
                    echo '        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Fechar</a>';
                    echo '    </div>';

                    echo '</div>';

                }
            
            ?>
    











            <!----------------------------------MODAL SERVIDOR DE PASTAS--------------------------->
            <div id="modalPastas" class="modal bottom-sheet">
                <div class="modal-content container">
                    <div class="col s12 l11">
                        <h1 class="flow-text">servidores de pastas</h1>
                    </div>

                    <div class="col s12 l1">
                        <a href="" class="btn-floating #0d47a1 blue darken-3"><i class="material-icons">add</i></a>
                    </div>
                    
                    <table class="highlight tabela">
                        <thead>
                            <tr>
                                <th style="user-select: none;" class="flow-text">Unidade</th>
                                <th style="user-select: none;" class="flow-text">Hostname</th>
                                <th style="user-select: none;" class="flow-text">Endereço IP</th>
                                <th style="user-select: none;" class="flow-text">Descrição</th>
                                <th style="user-select: none;" class="flow-text">Ação</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                                include_once '../conecta_banco.php';
                                $query = $conecta->prepare("SELECT * from serv_pastas WHERE ativo = 1");
                                $query->execute();
                                $fetchAll = $query->fetchAll();
                                foreach($fetchAll as $dados_impressao){
                                    
                                    echo '<tr>';
                                    echo '<td style="user-select: none;">'.$dados_impressao['unidade'].'</td>';
                                    echo '<td><strong>'.$dados_impressao['hostname'].'</strong></td>';
                                    echo '<td><strong>'.$dados_impressao['endereco_ip'].'</strong></td>';
                                    echo '<td style="user-select: none;">'.$dados_impressao['descricao'].'</td>';
                                    echo '<td><i class="material-icons">edit</i><i class="material-icons">delete</i></td>';
                                    echo '</tr>';
                                }             

                            ?>
                        </tbody>

                    </table>

                </div>
                <div class="modal-footer container">
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Fechar</a>
                </div>
            </div>

            <!-- fazer modal do excluir e o de servidor de pastas !-->
            <!--verificar o height do select dentro do modal!-->

        </div>
    </div>

    <!----------------------------------FOOTER--------------------------->
    <?php include_once 'rodape.php'; ?>
    



    
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src="fonte.js"></script>

    <!--------------------SCRIPTS DE INICIALIZAÇÂO DO FRAMEWORK-----------------------!-->
    <!---------------------------DROPDOWN DO NAVBAR-----------------------------------!-->
    <script>
        //jQuery name space
        (function ($) {
            //document ready
            $(function () {
                $(".dropdown-button").dropdown({ 
                    hover: false, 
                    belowOrigin: true, 
                    constrain_width: false, 
                    alignment: 'left' 
                });
            }); // end of document ready
        })(jQuery); // end of jQuery name space
    </script>

    <!---------------------------MENU MOBILE-----------------------------------!-->
    <script>
        $(".button-collapse").sideNav();
    </script>

    <!---------------------------MODAL-----------------------------------------!-->
    <script>
        $(document).ready(function(){
            // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
            $('.modal').modal();
        });
    </script>

    <!---------------------------SELECT DAS UNIDADES EDITAR-----------------------------------------!-->
    <script>
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>
    
</body>
</html>