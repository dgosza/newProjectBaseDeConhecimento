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
    <!--------------------------------BUSCAR UNIDADE-------------------------------------!-->
    <script>
        $("#pesquisar").keyup(function(){
        var busca = $("#pesquisar").val();
        
        $.post('../controller/unidades_pesquisarUnidade.php', {busca: busca},function(data){
          $("#unidades").html(data);
          
        });

      });
        
    </script>
    <!--------------------------------ORDERNAR UNIDADES----------------------------------!-->
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