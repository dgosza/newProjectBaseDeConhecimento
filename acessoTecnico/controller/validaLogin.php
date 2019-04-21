<?php

    session_start();
    include_once '../../conecta_banco.php';
    $message = "";
    try{  
        $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(isset($_POST['logar'])){
            $query = "SELECT * FROM users WHERE login = :login AND senha = :senha";
            $statement = $conecta->prepare($query);
            $statement->execute(
                array(
                    'login'  =>  $_POST["login"],
                    'senha'  =>  $_POST["senha"],
                )
            );
            $count = $statement->rowCount();
            $dados = $statement->fetch(PDO::FETCH_OBJ);
            if($count>0){
                //Grava os dados na session
                $_SESSION["login"] = $_POST["login"];
                $_SESSION["nome"] = $dados->nome;
                $_SESSION["nivel"] = $dados->nivel;

                header("Location: ../view/index.php");
        }else{
            header("Location: erroLogin.php");
        }
    }}catch(PDOException $error){  
       $message = $error->getMessage();  
    }

?>