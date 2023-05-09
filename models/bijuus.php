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
    public $imagem_src;
    public $jinchuuriki_id;
    public $con;

    public function __construct() //inicializando o atributo con com uma conexao com o bd
    {
        $con = new Conexao();
        $this->con = $con->conecta();
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function getAnimal(): string
    {
        return $this->animal;
    }

    public function setAnimal(string $animal)
    {
        $this->animal = $animal;
        return $this;
    }

    public function getQuantidadeCaudas(): int
    {
        return $this->qtd_caudas;
    }

    public function setQuantidadeCaudas(int $quantidade_caudas)
    {
        $this->qtd_caudas = $quantidade_caudas;
        return $this;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    public function getAldeia(): string
    {
        return $this->aldeia;
    }

    public function setAldeia(string $aldeia)
    {
        $this->aldeia = $aldeia;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->b_status;
    }

    public function setStatus(string $b_status)
    {
        $this->b_status = $b_status;
        return $this;
    }

    function getLinkImagem(): string
    {
        return $this->imagem_src;
    }

    function setLinkImagem(string $imagem_src)
    {
        $this->imagem_src = $imagem_src;
        return $this;
    }
    
    public function getJinchuuriki(): int
    {
        return $this->jinchuuriki_id;
    }

    public function setJinchuuriki(int $jinchuuriki_id)
    {
        $this->jinchuuriki_id = $jinchuuriki_id;
        return $this;
    }

    
}
