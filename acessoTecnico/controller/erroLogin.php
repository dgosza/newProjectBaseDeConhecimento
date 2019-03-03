<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Erro ao Logar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--------------------FAV ICON--------------------------------------------!-->
    <link rel="icon" type="image/png" sizes="96x96" href="../view/imgs/favBase.png">

    <!--------------------MATERIALIZE FRAMEWORK AND CSS STYLE------------------!-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

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
                <img class="responsive-img" src="../view/imgs/logoPreventBranco.png"> 
            </div>
        </div>

        <div class="col s12 l12 center">
            <br><br><br>
            <h1 class="flow-text white-text">Login Inválido!</h1>
            <h1 class="flow-text white-text">Tente novamente</h1>
            <?php header("Refresh: 2; url=../view/verificaLogin.php"); ?>
        </div>

    </div>

</body>
</html>