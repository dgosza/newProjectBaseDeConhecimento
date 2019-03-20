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
        
            <div class="col s12 l12" style="">
                <nav class="clean">
                    <div class="nav-wrapper">
                        <div class="col s12">
                        <a href="consulta_rapida.php" class="breadcrumb">Consulta Rápida</a>
                        <a href="" class="breadcrumb">Unidades</a>
                        </div>
                    </div>
                </nav>
            </div>


            <div class="col s12 l12 ">            

                <div class="col s12 l12">
                    <h1 class="flow-text">unidades da prevent senior</h1>
                    <p>Informações sobre todas as unidades da Prevent Senior.</p>
                    <p>Esta pagina conta com informações sobre cada unidade da Prevent Senior, como localização dos switchs, endereço e sigla da unidade, Range de IP, caso a unidade não for DHCP, assinatura, etc...</p>
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
    
</body>
</html>