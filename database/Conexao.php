<?php

class Conexao
{
    public $dbname = "narutoapi";
    public $password = "davidspfcfcb1992-21";
    public $server = "localhost";
    public $user = "root";

    //função de conexão com o bd
    public function conecta(): PDO|null
    {
        $con = new \PDO("mysql:host=$this->server;dbname=$this->dbname", "$this->user", "$this->password");
        return $con;
    }
}
