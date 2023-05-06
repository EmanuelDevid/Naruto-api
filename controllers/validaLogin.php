<?php

//ininciando uma sessão
session_start();

//array associativo contendo os usuários
$usuarios = [
    'emanuel' => '1234',
    'devid' => '4321'
];

//pegando login e senha informados pelo o usuário
$login = $_POST['login'];
$password = $_POST['password'];

//verficando se os dados informados estão do array de usuários
foreach ($usuarios as $usuario => $senha) {
    if($login === $usuario && $password === $senha){
        $_SESSION['autenticado'] = 'true';
    }
}

//redirecionando de acordo com o processo de autenticação
if($_SESSION['autenticado'] === 'true'){
    header('Location: ../views/telaInicial.php');
} else{
    header("Location: ../views/index.html?login=erro");
}
