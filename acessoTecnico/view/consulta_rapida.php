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

            <!----------------------------------MODAL SERVIDOR DE IMPRESSAO--------------------------->
            <div id="modalImpressao" class="modal bottom-sheet">
                <div class="modal-content container">
                    <div class="col s12 l11">
                        <h1 class="flow-text">servidores de impressão</h1>
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
                                $query = $conecta->prepare("SELECT * from serv_impressao WHERE ativo = 1");
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
    
</body>
</html>