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
    <title>Acesso Técnico</title>
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
            
            <div class="col s12 l12 ">            

                <div class="col s12 l12" style="height:0px;position:relative;top:-30px;left:-23px">
                    <div class="col s12 l12 ">
                        <nav class="clean">
                            <div class="nav-wrapper">
                                <div class="col s12">
                                <a href="consulta_rapida.php" class="breadcrumb">Consulta Rápida</a>
                                <a href="" class="breadcrumb">Unidades</a>                                
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>

                <div class="col s12 l12">
                    
                    <h1 class="flow-text">unidades da prevent senior</h1>
                    <p>Informações sobre todas as unidades da Prevent Senior.</p>
                    <p>Esta pagina conta com informações sobre cada unidade da Prevent Senior, como localização dos switchs, endereço e sigla da unidade, Range de IP, caso a unidade não for DHCP, assinatura, etc...</p>
                </div> 

            </div>

        </div>

        <div class="divider"></div>

        <div class="row">
            <div class="col s12 l12">
                <div class="row container">

                    <div class="col s12 l6 ordenar">
                        <h2 class="flow-text">ORDERNAR POR</h2>
                        <a class="waves-effect waves-light btn #0d47a1 blue darken-3 z-depth-3" id="ordernaUnidade" title="Ordernar Unidades por Nome"><i class="material-icons large left">business</i>por Unidade</a>
                        <a class="waves-effect waves-light btn #0d47a1 blue darken-3 z-depth-3" id="ordernaDHCP" title="Ordernar Unidades por DHCP"><i class="material-icons left">network_check</i>por DHCP</a>
                        <a class="waves-effect waves-light btn #0d47a1 blue darken-3 z-depth-3" id="ordernaLink" title="Ordernar Unidades pelo Link"><i class="material-icons left">network_check</i>por Link</a>
                        
                    </div>

                    <div class="col 12 l6">
                        <form>
                            <div class="input-field col s12 l12" style="postiion:relative;top:50px;">
                                <input type="text" id="pesquisar" autocomplete="off">
                                <label for="pesquisar"><i class="material-icons left">search</i>Pesquisar Unidade...</label>
                            </div>
                        </form>
                    </div>

                </div>    
            </div>

            <!-- TABELA DAS UNIDADES -->
            <div class="col s12 l12 tabelaUnidades" id="unidades">
                <?php include_once '../controller/unidades_pesquisarUnidade.php'; ?>
            </div>

            <!-- MODAL DAS UNIDADES -->
            <div>
                <!-- MODAL EDIT UNIDADE -->
                <?php
                    include_once '../conecta_banco.php';
                    $query = $conecta->prepare("SELECT * FROM unidades_prevent WHERE ativo = 1;");
                    $query->execute();
                    $fetchAll = $query->fetchAll();
                    foreach($fetchAll as $unidades){
                        echo '<div id="editUnidade?id_unidade='.$unidades['id_unidade'].'" class="modal modal-fixed-footer" style="width:1250px;">';
                        echo '  <div class="modal-content">';
                        echo '      <h1 class="flow-text">'.$unidades['sigla'].' - '.$unidades['unidade'].'</h1>';
                        echo '      <div class="col s12 l12">';
                        echo '          <form method="post" action="../model/editar_dados/edit_info_unidades_envia.php">';
                        echo '              <input type="hidden" name="id_unidade" value="'.$unidades['id_unidade'].'">';

                        echo '              <div class="input-field col s12 l1">';
                        echo '                  <input type="text" class="validate" id="sigla" name="sigla" value="'.$unidades['sigla'].'" autocomplete="off" maxlength="3"> ';
                        echo '                  <label for="sigla">Sigla</label>';
                        echo '              </div>';

                        echo '              <div class="input-field col s12 l5">';
                        echo '                  <input type="text" class="validate" id="unidade" name="unidade" value="'.$unidades['unidade'].'" autocomplete="off" maxlength="3"> ';
                        echo '                  <label for="unidade">Unidade</label>';
                        echo '              </div>';

                        echo '              <div class="input-field col s12 l4">';
                        echo '                  <input type="text" class="validate" id="endereco" name="endereco" value="'.$unidades['endereco'].'" autocomplete="off" maxlength="3"> ';
                        echo '                  <label for="endereco">Endereço</label>';
                        echo '              </div>';

                        echo '              <div class="input-field col s12 l2">';
                        echo '                  <input type="text" class="validate" id="cnpj" name="cnpj" value="'.$unidades['cnpj'].'" autocomplete="off" maxlength=""> ';
                        echo '                  <label for="cnpj">CNPJ</label>';
                        echo '              </div>';

                        echo '              <div class="col s12 l3 switch" style="position:relative;top:35px;">';
                                                if($unidades['dhcp']==1){
                                                    echo '<label>DHCP OFF<input type="checkbox" name="dhcp" checked> <span class="lever"></span>DHCP ON</label>';
                                                }else{
                                                    echo '<label>DHCP OFF<input type="checkbox" name="dhcp"> <span class="lever"></span>DHCP ON</label>';
                                                }
                        echo '              </div>';
                        echo '              <div class="input-field col s12 l3">';
                        echo '                  <input type="text" class="validate" id="range_ip" name="range_ip" value="'.$unidades['range_ip'].'" autocomplete="off" maxlength=""> ';
                        echo '                  <label for="range_ip">Range IP</label>';
                        echo '              </div>';
                        echo '              <div class="input-field col s12 l3">';
                        echo '                  <input type="text" class="validate" id="empresaLink" name="empresaLink" value="'.$unidades['empresaLink'].'" autocomplete="off" maxlength=""> ';
                        echo '                  <label for="empresaLink">Empresa Responsável pelo Link</label>';
                        echo '              </div>';
                        echo '              <div class="input-field col s12 l3">';
                        echo '                  <input type="text" class="validate" id="assinatura" name="assinatura" value="'.$unidades['assinatura'].'" autocomplete="off" maxlength=""> ';
                        echo '                  <label for="assinatura">Assinatura</label>';
                        echo '              </div>';

                        echo '              <input type="submit" value="Editar" id="editar?id_unidade='.$unidades['id_unidade'].'" name="editar" style="display:none;"> ';
                        echo '          </form>';
                        echo '      </div>';
                        echo '  </div>';
                        echo '  <div class="modal-footer">';
                        echo '      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Fechar</a>';
                        echo '        <label for="editar?id_unidade='.$unidades['id_unidade'].'" class="btn left waves-effect waves-green btn-flat #0d47a1 blue darken-3 white-text right" tabindex="0"><i class="material-icons right">send</i>Editar</label>';
                        echo '  </div>';
                        echo '</div>';
                    }
                ?>

                <!-- MODAL DELETE UNIDADE -->
                <?php
                    include_once '../conecta_banco.php';
                    $query = $conecta->prepare("SELECT * FROM unidades_prevent WHERE ativo = 1;");
                    $query->execute();
                    $fetchAll = $query->fetchAll();
                    foreach($fetchAll as $unidades){
                        echo '<div id="deleteUnidade?id_unidade='.$unidades['id_unidade'].'" class="modal">';
                        echo '  <div class="modal-content">';
                        echo '      <h1 class="flow-text">tem certeza que deseja excluir '.$unidades['unidade'].'?</h1>';
                        echo '  </div>';
                        // pendente fazer
                        echo '  <div class="modal-footer">';
                        echo '      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Fechar</a>';
                        echo '  </div>';
                        echo '</div>';
                    }
                ?>

            </div>

            
        </div>

    </div>

    <!----------------------------------FOOTER--------------------------->
    <?php include_once 'rodape.php'; ?>
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src="fonte.js"></script>
    <!--------------------------------------------------------------------------------!-->
    <!--------------------------------------------------------------------------------!-->
    <!-----------------------SCRIPTS DE INICIALIZAÇÂO DO FRAMEWORK--------------------!-->
    <!--------------------------------------------------------------------------------!-->
    <!--------------------------------------------------------------------------------!-->
    <!--------------------------------DROPDOWN DO NAVBAR------------------------------!-->
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
    <!--------------------------------MENU MOBILE-------------------------------------!-->
    <script>
        $(".button-collapse").sideNav();
    </script>
    <!--------------------------------MODAL-------------------------------------------!-->
    <script>
        $(document).ready(function(){
        // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
        $('.modal').modal();
        });
    </script>
    <!--------------------------------BUSCAR UNIDADE----------------------------------!-->
    <script>
        $("#pesquisar").keyup(function(){
        var busca = $("#pesquisar").val();
        
        $.post('../controller/unidades_pesquisarUnidade.php', {busca: busca},function(data){
          $("#unidades").html(data);
          
        });

      });
        
    </script>
    <!--------------------------------ORDERNAR UNIDADES-------------------------------!-->
    <script>
        $("#ordernaUnidade").click(function(){
        var unidade = ("unidade");
        $.post('../controller/unidades_pesquisarUnidade.php', {ordena: unidade},function(data){
           $("#unidades").html(data);
            // alert(data);
        });

      });

      $("#ordernaDHCP").click(function(){
        var dhcp = ("dhcp");
        $.post('../controller/unidades_pesquisarUnidade.php', {ordena: dhcp},function(data){
           $("#unidades").html(data);
        //   alert(data);
        });

      });

      $("#ordernaLink").click(function(){
        var link = ("empresaLink");
        $.post('../controller/unidades_pesquisarUnidade.php', {ordena: link},function(data){
           $("#unidades").html(data);
            // alert(data);
        });

      });
    </script>

</body>
</html>