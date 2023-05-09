<?php

require_once("../database/Conexao.php");

class Jinchuuriki
{
    public $id;
    public $nome;
    public $aldeia;
    public $j_status;
    public $ponto_forte;
    public $link_img;
    public $con;

    public function __construct() //inicializando o atributo con com uma conexao com o bd
    {
        $con = new Conexao();
        $this->con = $con->conecta();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getAldeia(): string
    {
        return $this->aldeia;
    }

    public function setAldeia(string $aldeia): void
    {
        $this->aldeia = $aldeia;
    }

    public function getStatus(): string
    {
        return $this->j_status;
    }

    public function setStatus(string $j_status): void
    {
        $this->j_status = $j_status;
    }

    public function getPontoForte(): string
    {
        return $this->ponto_forte;
    }

    public function setPontoForte(string $ponto_forte): void
    {
        $this->ponto_forte = $ponto_forte;
    }

    public function getLinkImage(): string
    {
        return $this->link_img;
    }

    public function setLinkImage(string $link_img): void
    {
        $this->link_img = $link_img;
    }

    public function create() //função responsável por criar um novo registro na tabela juchuuriki
    {
        $query = "INSERT INTO jinchuuriki (nome, aldeia, j_status, ponto_forte, link_img) VALUES
        ('$this->nome','$this->aldeia','$this->j_status','$this->ponto_forte','$this->link_img');";

        return $this->response($query, "Jinchuuriki cadastrado com sucesso!", "Erro ao cadastrar jinchuuriki", 201, 400);
    }

    public function response(string $query, string $msg_ok, string $msg_erro, int $code_response_ok, int $code_response_erro)
    {
        $stmt = $this->con->prepare($query); //preparando a query recebida para ser executada
        if($stmt->execute()){ //executando a query
            http_response_code($code_response_ok);
            $stmt = null; //fechando a conexão

            $array_retorno = ['status' => true, 'message' => $msg_ok];
            return json_encode($array_retorno); //retorna um json
        }

        http_response_code($code_response_erro);
        $error = $stmt->errorInfo(); //pegando o erro, caso haja
        $stmt = null; //fechando a conexão
        $array_retorno = ['status' => false, 'message' => $msg_erro . ": " . $error];
        return json_encode($array_retorno); //retorna um json
    }
}


?>