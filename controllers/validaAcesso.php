<?php

    //ininciando uma sessão
    session_start();

    //verificando se o usuário está autenticado por meior da super global SESSION
    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== 'true'){
        header("Location: ../views/index.html?autenticado=erro");
    }

?>