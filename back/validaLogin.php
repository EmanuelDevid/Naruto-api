<?php

$usuarios = [
    'emanuel' => '1234',
    'devid' => '4321'
];

$login = $_POST['login'];
$password = $_POST['password'];

foreach ($usuarios as $usuario => $senha) {
    if($login === $usuario && $password === $senha){
        $_SESSION['autenticado'] = 'true';
        header("Location: ../front/telaInicial.php");
        return;
    }
}

header("Location: ../index.html?login=erro");