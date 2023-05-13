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
        (:nome,:aldeia,:jStatus,:pontoForte,:linkImg);";

        $stmt = $this->con->prepare($query);
        
        //fazendo a substituição dos marcadores por seus valores adequados
        $stmt->bindValue(':nome', $this->getNome());
        $stmt->bindValue(':aldeia', $this->getAldeia());
        $stmt->bindValue(':jStatus', $this->getStatus());
        $stmt->bindValue(':pontoForte', $this->getPontoForte());
        $stmt->bindValue(':linkImg', $this->getLinkImage());

        if($stmt->execute()){//execuntando a query
            http_response_code(201);
            $stmt = null; //fechando a conexão

            $array_retorno = ['status' => true, 'message' => 'Jinchuuriki cadastrado com sucesso'];
            return json_encode($array_retorno); //retorna um json
        }
        http_response_code(400);
        $error = $stmt->errorInfo(); //pegando o erro, caso haja
        $stmt = null; //fechando a conexão
        $array_retorno = ['status' => false, 'message' => 'Erro ao cadastrar jinchuuriki' . ": " . $error];
        return json_encode($array_retorno); //retorna um json
    }

    public function read()
    {
        $query = "SELECT * FROM jinchuuriki";

        if($this->id !== null){
            $clausulaWhere = " WHERE id = :id";
            $query = $query . $clausulaWhere; //especificando o id que se deseja ler, caso seja passado
        }

        $stmt = $this->con->prepare($query);

        if($this->id !== null){
            //substituindo o marcador ':id' pelo o id da instância em questão
            $stmt->bindValue(':id',$this->getId());
        }
        if($stmt->execute()){
            $retorno = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $stmt = null; //fechando conexão
            http_response_code(200);
            return $retorno; //retornando um array associativo
        }
    }
}


?>