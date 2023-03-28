<?php

//ininciando uma sessão
session_start();

if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== 'true'){
    header("Location: ../index.html?autenticado=erro");
}