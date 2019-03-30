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
                                <a href="" class="breadcrumb">Gerador de Carta de Envio</a>                                
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>

                <div class="col s12 l12">
                    
                    <h1 class="flow-text">gerador de carta de envio</h1>
                    <p>Gere uma carta de envio de forma rápida e eficiente.</p>

                </div>
            </div>

        </div>

        <div class="divider"></div>

        <div class="row container">
            <div class="col s12 l12">
                <br>
                <form method="POST" action="geradorCarta_paginaPDF.php">
                    <div class="input-field col s12 l12 " style="position:relative;top:15px;">
                        <select name="unidade" id="unidade">
                            <option value="" disabled selected>Escolha a unidade</option>
                            <?php
                                include_once '../conecta_banco.php';
                                $select = $conecta->prepare("SELECT * FROM unidades_prevent where ativo = 1 ORDER BY unidade ASC");
                                $select->execute();
                                $fetchAll = $select->fetchAll();
                                foreach($fetchAll as $unidades){
                                    echo '<option value ="'.$unidades['id_unidade'].'">'.$unidades['unidade'].'</option>';
                                }
                            ?>
                        </select>
                        <label>Unidade</label>
                    </div>

                    <div class="input-field col s12 l6" id="cnpj">
                        <input type="text" name="cnpj" value="teste" class="validate" disabled style="display:none;">
                    </div>
                    <div class="input-field col s12 l6" id="endereco">
                        <input type="text" name="endereco" value="teste" class="validate" disabled style="display:none;">
                    </div>
                    
                    <div class="input-field col s12 l6">
                        <input placeholder="ex: Computador, Mouse, Teclado..." id="produto" name="produto" type="text" class="validate" maxlength="30">
                        <label for="produto">Produto a ser enviado..</label>
                    </div>

                    <div class="input-field col s12 l6">
                        <input placeholder="Caso não houver, deixe em branco" id="patri" name="patri" type="text" class="validate" maxlength="30">
                        <label for="patri">Número do Patrimônio</label>
                    </div>

                    <div class="input-field col s12 l6">
                        <input placeholder="ex: 12"" id="quantidade" name="quantidade" type="text" class="validate" maxlength="30">
                        <label for="quantidade">Quantidade de Produtos...</label>
                    </div>
                
                    <div class="input-field col s12 l6">
                        <input placeholder="ex: Sabrina, Rosangela..." id="ac" name="ac" type="text" class="validate" maxlength="30">
                        <label for="ac">Aos Cuidados...</label>
                    </div>
                

                    <input type="submit" class="waves-effect waves-light btn #0d47a1 blue darken-3 z-depth-3 right"><i class="material-icons left">drafts</i>Gerar PDF...</a>

                </form>
            </div>
        </div>

    </div>

    <!----------------------------------FOOTER--------------------------->
    <?php include_once 'rodape.php'; ?>
    











    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
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
    <!--------------------------------SELECT FORM-------------------------------------!-->
    <script>
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>

    <script>
        $("#unidade").on("change",function(){
            var idUnidade = $("#unidade").val();
            
            $.ajax({
                url: '../controller/geradorCarta_escolheCNPJ.php',
                type: 'POST',
                data:{id:idUnidade},
                beforeSend:function(){
                    $("#cnpj").css({'display':'block'});
                    $("#cnpj").html("Carregando...");
                },
                success:function(data){
                    $("#cnpj").css({'display':'block'});
                    $("#cnpj").html(data);
                },
                error:function(){
                    $("#cnpj").css({'display':'block'});
                    $("#cnpj").html("Erro ao carregar");
                }
            });
            
        });
    </script>

    <script>
        $("#unidade").on("change",function(){
            var idUnidade = $("#unidade").val();
            
            $.ajax({
                url: '../controller/geradorCarta_escolheEndereco.php',
                type: 'POST',
                data:{id:idUnidade},
                beforeSend:function(){
                    $("#endereco").css({'display':'block'});
                    $("#endereco").html("Carregando...");
                },
                success:function(data){
                    $("#endereco").css({'display':'block'});
                    $("#endereco").html(data);
                },
                error:function(){
                    $("#endereco").css({'display':'block'});
                    $("#endereco").html("Erro ao carregar");
                }
            });
            
        });
    </script>
    
</body>
</html>