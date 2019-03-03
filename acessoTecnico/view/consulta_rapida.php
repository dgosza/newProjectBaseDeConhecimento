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

    <div class="middle">
        <div class="row container">

            <div class="col s12 l12">

                <div class="col s12 l12">
                    <h1 class="flow-text">consulta rápida</h1>
                    <p>O intuito do Consulta Rápida é levar ao técnico a informação que o mesmo deseja, de forma rápida e dinâmica.</p>
                </div> 
                
                <div class="col s12 l12">
                    <h1 class="flow-text">servidores de impressão e de pastas</h1>
                    <a class="waves-effect waves-light btn" style="background:#146BED"><i class="material-icons left">print</i>IMPRESSÂO</a>
                    <a class="waves-effect waves-light btn" style="background:#146BED"><i class="material-icons left">folder</i>PASTAS</a>
                </div>

                <div class="col s12 l12">
                    <h1 class="flow-text">unidades da prevent senior<i class="material-icons"></i></h1>
                    <a class="waves-effect waves-light btn" style="background-color: #146BED"><i class="material-icons left">business</i>UNIDADES</a>
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