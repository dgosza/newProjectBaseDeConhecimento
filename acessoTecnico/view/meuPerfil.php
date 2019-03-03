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

    <div class="middle">
        <div class="row container">

            <div class="col s12 l12 ">

                <h1 class="flow-text">meu perfil</h1><br><br>
                   
               

                <div class="col s12 l2 ">
                    <img src="imgs/me.png" alt="" class="circle responsive-img" width="180">
                </div>

                <div class="col s12 l10 ">
                    <h1 class="flow-text left">Diego Magalhães de Souza</h1>
                </div>
                
                <div class="col s12 l10 ">
                    <i>Tipo de Acesso: <b>Administrador</b></i> <br>
                    <i>Cadastrado: 12/12/2019</i>
                </div>

            </div>

            <div class="col s12 l12 "><br><div class="divider"></div></div>

            <div class="col s12 l12">
                <h1 class="flow-text">meus favoritos</h1>
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
    
</body>
</html>