<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Base de Conhecimento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--------------------FAV ICON--------------------------------------------!-->
    <link rel="icon" type="image/png" sizes="96x96" href="imgs/favBase.png">

    <!--------------------MATERIALIZE FRAMEWORK AND CSS STYLE------------------!-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

    <!--------------------ICONES MATERIALIZE FRAMEWORK-----------------------!-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style type="text/css">
        body{
            background-color:#0d47a1;
        }
        .escolheAcesso{
            user-select:none;
        }
    </style>
</head>
<body>

    <div class="row container escolheAcesso">
        <div class="col s12 l12">
            <div class="col s12 l12 center">
                <br><br><br><br><br>
                <img class="responsive-img" src="imgs/logoPreventBranco.png"> 
            </div>
        </div>

        <div class="col s12 l12 center">
            <br><br><br>
            <div class="col s12 l4 offset-l4">
                <form action="../controller/validaLogin.php" method="POST" id="formLogin">
                    <div class="input-field col s12" style="color:#fff;">
                        <input id="login" name="login" type="text" class="validate" autocomplete="off">
                        <label for="login">Login</label>
                    </div>

                    <div class="input-field col s12" style="color:#fff;">
                        <input  id="senha" name="senha" type="password" class="validate" style="color:#fff;">
                        <label for="senha">Senha</label>
                    </div>

                    <div class="col s12 l12">
                        <input class="waves-effect waves-light btn white" type="submit" name="logar" value="Logar na Base de Conhecimento" style="color:#115FD3">
                    </div>

                    <div class="col s12 l12">
                        <br><br><br>
                        <a href="../../index.php" style="color:#fff;" class="left"><i class="material-icons left">keyboard_backspace</i>Voltar ao Menu Principal</a>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>  
    

</body>
</html>