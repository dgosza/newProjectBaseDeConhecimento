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
    <title>Gerador de Carta</title>
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

        <div class="row container" >
            <div class="col s12 l12" id="recarregar">
                <br>
                <form method="POST" action="geradorCarta_paginaPDF.php" target="_blank" id="formPDF">
                    <div class="input-field col s12 l12" style="position:relative;top:15px;">
                        <select name="unidade" id="unidade" data-error=".errorSelect" >
                            <option value disabled selected>Escolha a unidade</option>
                            <?php   
                                include_once '../../conecta_banco.php';
                                $select = $conecta->prepare("SELECT id_unidade, unidade FROM unidades_prevent where ativo in (1,3) ORDER BY unidade ASC");
                                $select->execute();
                                $fetchAll = $select->fetchAll();
                                foreach($fetchAll as $unidades){
                                    echo '<option value ="'.$unidades['id_unidade'].'">'.$unidades['unidade'].' </option>';
                                }
                            ?>
                        </select>

                        <div class="errorSelect formValida"></div>
                        
                    </div>

                    <div class="col s12 l12"><br></div>

                    <div class="input-field col s12 l6" id="cnpj">
                        <input type="text" name="cnpj" value="CNPJ" class="validate" disabled>
                    </div>
                    
                    <div class="input-field col s12 l6" id="endereco">
                        <input type="text" name="endereco" value="Endereço" class="validate" disabled>
                    </div>
                    
                    <div class="input-field col s12 l6">
                        <label for="produto">Produto</label>
                        <input id="produto" name="produto" type="text" class="validate" maxlength="35" data-error=".error1">
                        <div class="error1 formValida"></div>
                    </div>

                    <div class="input-field col s12 l6">
                        <label for="patri">Número do Patrimônio</label>
                        <input id="patri" name="patri" type="text" class="validate" maxlength="100" autocomplete="off">
                    </div>

                    <div class="col s12 l12"><br></div>

                    <div class="input-field col s12 l6">
                        <label for="quantidade">Quantidade do Produto</label>
                        <input id="quantidade" name="quantidade" type="text" class="validate" maxlength="30" data-error=".error2">
                        <div class="error2 formValida"></div>
                    </div>
                
                    <div class="input-field col s12 l6">
                        <label for="ac">Aos cuidados</label>
                        <input id="ac" name="ac" type="text" class="validate" maxlength="30">
                    </div>
                
                    <div class="col s12 l12">
                        <label for="gerar" class="btn left waves-effect waves-green btn-flat #0d47a1 blue darken-3 white-text right"><i class="material-icons left">drafts</i>Gerar PDF</label>
                        <input type="submit" id="gerar" name="gerar" class="hidden"  style="display:none;">
                        <a class="waves-effect waves-teal btn-flat right" id="recarregarBtn">Limpar Campos</a>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="col s12 l12"><div class="divider"></div></div>

    </div>

    <!----------------------------------FOOTER--------------------------->
    <?php include_once 'rodape.php'; ?>
    




    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <!--------------------JQUERY VALIDATION INPUT----------------------------!-->
    <script src="../packages/validation/dist/jquery.validate.js"></script>
    <script src="../packages/validation/dist/additional-methods.min.js"></script>
    <!-- <script src="../packages/lib/jquery.js"></script> -->
    <script src="fonte.js"></script>
    
    <!--------------------------------------------------------------------------------!-->
    <!--------------------------------------------------------------------------------!-->
    <!-----------------------------SCRIPTS DE INICIALIZAÇÂO---------------------------!-->
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
    <!--------------------------------------------------------------------------------!-->
    <script>
        $(".button-collapse").sideNav();
    </script>
    <!--------------------------------SELECT FORM-------------------------------------!-->
    <!--------------------------------------------------------------------------------!-->
    <script>
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>
    <!-- SCRIPT PARA BUSCAR NO BANCO O CNPJ CONFORME A UNIDADE SELECIONADA--------------->
    <!--------------------------------------------------------------------------------!-->
    <script>
        $("#unidade").on("change",function(){
            var idUnidade = $("#unidade").val();
            
            $.ajax({
                url: '../controller/geradorCarta_escolheCNPJ.php',
                type: 'post',
                data:{id:idUnidade},
                beforeSend:function(){
                    $("#cnpj").css({'display':'block'});
                    $("#cnpj").html("<div class='progress'> <div class='indeterminate'></div> </div>");
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
    <!-- SCRIPT PARA BUSCAR NO BANCO O ENDERECO CONFORME A UNIDADE SELECIONADA----------->
    <!--------------------------------------------------------------------------------!-->
    <script>
        $("#unidade").on("change",function(){
            var idUnidade = $("#unidade").val();
            
            $.ajax({
                url: '../controller/geradorCarta_escolheEndereco.php',
                type: 'post',
                data:{id:idUnidade},
                beforeSend:function(){
                    $("#endereco").css({'display':'block'});
                    $("#endereco").html("<div class='progress'> <div class='indeterminate'></div> </div>");
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
    <!---SCRIPT PARA LIMPAR OS DADOS NA PAGINA, È UM REFRESH NA PAGINA NA VERDADE-------->
    <!--------------------------------------------------------------------------------!-->
    <script>
        $(function() {
        $("#recarregarBtn").click(function() {
            window.location.href = 'geradorCarta.php';
        });
        });
    </script>
    <!------------------------SCRIPT PARA VALIDAÇAO DOS INPUTS--------------------------->
    <!--------------------------------------------------------------------------------!-->
    <script>
    $.validator.setDefaults({
       ignore: []
    });

    $("#formPDF").validate({
        
        errorClass: 'invalid',
        rules: {
            produto: "required",
			quantidade:"required",
            unidade: "required"
        },
        //For custom messages
        messages: {
            produto: "Especifique o produto a ser enviado",
            quantidade: "Especifique a quantidade a ser enviada",
            unidade: "Selecione a unidade a qual será enviada"
            
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
    });

    </script>

</body>
</html>