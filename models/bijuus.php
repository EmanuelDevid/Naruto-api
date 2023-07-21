<?php

require_once("../database/Conexao.php");
class Bijuu
{
    public $nome;
    public $animal;
    public $qtd_caudas;
    public $descricao;
    public $aldeia;
    public $b_status;
    public $link_img;
    public $jinchuuriki_id;
    public $con;

    public function __construct() //inicializando o atributo con com uma conexao com o bd
    {
        $con = new Conexao();
        $this->con = $con->conecta();
    }

    public function getNome(): string|null
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getAnimal(): string|null
    {
        return $this->animal;
    }

    public function setAnimal(string $animal): void
    {
        $this->animal = $animal;
    }

    public function getQuantidadeCaudas(): int|null
    {
        return $this->qtd_caudas;
    }

    public function setQuantidadeCaudas(int $quantidade_caudas): void
    {
        $this->qtd_caudas = $quantidade_caudas;
    }

    public function getDescricao(): string|null
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getAldeia(): string|null
    {
        return $this->aldeia;
    }

    public function setAldeia(string $aldeia): void
    {
        $this->aldeia = $aldeia;
    }

    public function getStatus(): string|null
    {
        return $this->b_status;
    }

    public function setStatus(string $b_status): void
    {
        $this->b_status = $b_status;
    }

    function getLinkImagem(): string|null
    {
        return $this->link_img;
    }

    function setLinkImagem(string $link_img): void
    {
        $this->link_img = $link_img;
    }
    
    public function getJinchuuriki(): int|null
    {
        return $this->jinchuuriki_id;
    }

    public function setJinchuuriki(int $jinchuuriki_id)
    {
        $this->jinchuuriki_id = $jinchuuriki_id;
        return $this;
    }

    public function create() //função responsável por criar um novo registro na tabela bijuus
    {
        //associar as bijuus aos jinchuurikis no próprio código
        $query = "INSERT INTO bijuus (qtd_caudas, nome, animal, aldeia, b_status, descricao, link_img, jinchuuriki_id) VALUES
        (:qtd_caudas,:nome,:animal,:aldeia,:BStatus,:decricao,:linkImg,:jinchuuriki_id);";

        $stmt = $this->con->prepare($query);
        
        //fazendo a substituição dos marcadores por seus valores adequados
        $stmt->bindValue(':qtd_caudas', $this->getQuantidadeCaudas());
        $stmt->bindValue(':nome', $this->getNome());
        $stmt->bindValue(':animal', $this->getAnimal());
        $stmt->bindValue(':aldeia', $this->getAldeia());
        $stmt->bindValue(':BStatus', $this->getStatus());
        $stmt->bindValue(':decricao', $this->getDescricao());
        $stmt->bindValue(':linkImg', $this->getLinkImagem());
        $stmt->bindValue(':jinchuuriki_id', $this->getJinchuuriki());

        if($stmt->execute()){//execuntando a query
            http_response_code(201);
            $stmt = null; //fechando a conexão

            $array_retorno = ['status' => true, 'message' => 'Bijuu cadastrada com sucesso'];
            return json_encode($array_retorno); //retorna um json
        }
        http_response_code(400);
        $error = $stmt->errorInfo(); //pegando o erro, caso haja
        $stmt = null; //fechando a conexão
        $array_retorno = ['status' => false, 'message' => 'Erro ao cadastrar Bijuu' . ": " . $error];
        return json_encode($array_retorno); //retorna um json
    }
    
}
