<?php

class Conexao
{
    public $dbname = "apinaruto";
    public $password = "1006332707";
    public $server = "db4free.net";
    public $user = "emanuel_devid415";

    //função de conexão com o bd
    public function conecta(): PDO|null
    {
        $con = new \PDO("mysql:host=$this->server;dbname=$this->dbname", "$this->user", "$this->password");
        return $con;
    }
}
