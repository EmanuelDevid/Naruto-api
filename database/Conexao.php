<?php

class Conexao
{
    public function __construct() //quando instanciada, já retorna a conexão com o database
    {
        $dbname = "narutoapi";
        $password = "davidspfcfcb1992-21";
        $server = "localhost";
        $user = "root";

        try {
            $pdo = new \PDO("mysql:host=$server;dbname=$dbname", "$user", "$password");
        } catch(PDOException $erro) {
            echo "Ocorreu um erro: " . $erro->getMessage();
        }
    }
}
