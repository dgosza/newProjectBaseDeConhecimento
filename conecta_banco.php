<?php

    //Credenciais de acesso ao BD

    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '');
    define('DBNAME', 'suporte_base');
    $conecta = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);
    $conecta-> exec ('SET CHARACTER SET utf8');

    

?>