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

    public function getNome() :string|null
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getAldeia() :string|null
    {
        return $this->aldeia;
    }

    public function setAldeia(string $aldeia): void
    {
        $this->aldeia = $aldeia;
    }

    public function getStatus() :string|null
    {
        return $this->j_status;
    }

    public function setStatus(string $j_status): void
    {
        $this->j_status = $j_status;
    }

    public function getPontoForte() :string|null
    {
        return $this->ponto_forte;
    }

    public function setPontoForte(string $ponto_forte): void
    {
        $this->ponto_forte = $ponto_forte;
    }

    public function getLinkImage() :string|null
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

        if($this->getId() !== null){
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

    public function update()
    {
        $set = array(); //cria um array

        //monta a query sql de acordo com os campos informados
        if($this->getNome() !== null){
            $set[] = "nome=:nome";
        }
        if(!empty($this->getAldeia())){
            $set[] = "aldeia = :aldeia";
        }
        if(!empty($this->getStatus())){
            $set[] = "j_status = :jStatus";
        }
        if(!empty($this->getPontoForte())){
            $set[] = "ponto_forte = :pontoForte";
        }
        if(!empty($this->getLinkImage())){
            $set[] = "link_img = :linkImg";
        }

        //juntando todos os dados do array em uma string, separados por vírgula
        $string = implode(",", $set);
        $query = "UPDATE jinchuuriki SET " . $string. " WHERE id = :id";

        $stmt = $this->con->prepare($query); //preparando a query

        //fazendo a substituição dos marcadores por seus valores adequados
        if(!empty($this->getNome())){
            $stmt->bindValue(':nome', $this->getNome());
        }
        if(!empty($this->getAldeia())){
            $stmt->bindValue(':aldeia', $this->getAldeia());
        }
        if(!empty($this->getStatus())){
            $stmt->bindValue(':jStatus', $this->getStatus());
        }
        if(!empty($this->getPontoForte())){
            $stmt->bindValue(':pontoForte', $this->getPontoForte());
        }
        if(!empty($this->getLinkImage())){
            $stmt->bindValue(':linkImg', $this->getLinkImage());
        }
        $stmt->bindValue(':id', $this->getId()); //a inicialização do id é grantida pelo Controller

        if($stmt->execute()){//execuntando a query
            http_response_code(201);
            $stmt = null; //fechando a conexão

            $array_retorno = ['status' => true, 'message' => 'Jinchuuriki atualizado com sucesso'];
            return json_encode($array_retorno); //retorna um json
        }
        http_response_code(400);
        $error = $stmt->errorInfo(); //pegando o erro, caso haja
        $stmt = null; //fechando a conexão
        $array_retorno = ['status' => false, 'message' => 'Erro ao atualizar jinchuuriki' . ": " . $error];
        return json_encode($array_retorno); //retorna um json
    }
}


?>