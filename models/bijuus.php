<?php

require_once("../database/Conexao.php");
class Bijuu
{
    private $nome;
    private $animal;
    private $qtd_caudas;
    private $descricao;
    private $aldeia;
    private $b_status;
    private $imagem_src;
    private $jinchuuriki_id;
    private $con;

    private function __construct() //inicializando o atributo con com uma conexao com o bd
    {
        $con = new Conexao();
        $this->con = $con->conecta();
    }

    private function getNome(): string
    {
        return $this->nome;
    }

    private function setNome(string $nome)
    {
        $this->nome = $nome;
        return $this;
    }

    private function getAnimal(): string
    {
        return $this->animal;
    }

    private function setAnimal(string $animal)
    {
        $this->animal = $animal;
        return $this;
    }

    private function getQuantidadeCaudas(): int
    {
        return $this->qtd_caudas;
    }

    private function setQuantidadeCaudas(int $quantidade_caudas)
    {
        $this->qtd_caudas = $quantidade_caudas;
        return $this;
    }

    private function getDescricao(): string
    {
        return $this->descricao;
    }

    private function setDescricao(string $descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    private function getAldeia(): string
    {
        return $this->aldeia;
    }

    private function setAldeia(string $aldeia)
    {
        $this->aldeia = $aldeia;
        return $this;
    }

    private function getStatus(): string
    {
        return $this->b_status;
    }

    private function setStatus(string $b_status)
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
    
    private function getJinchuuriki(): int
    {
        return $this->jinchuuriki_id;
    }

    private function setJinchuuriki(int $jinchuuriki_id)
    {
        $this->jinchuuriki_id = $jinchuuriki_id;
        return $this;
    }

    
}
