<?php

require_once("Conexao.php");
class Bijuu
{
    private $nome = null;
    private $animal = null;
    private $qtd_caudas = 0;
    private $jinchuuriki_id = null;
    private $descricao = null;
    private $aldeia = null;
    private $status = null;
    private $imagem_src = null;

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function getAnimal()
    {
        return $this->animal;
    }

    public function setAnimal($animal)
    {
        $this->animal = $animal;
        return $this;
    }

    public function getQuantidade_caudas()
    {
        return $this->qtd_caudas;
    }

    public function setQuantidade_caudas($quantidade_caudas)
    {
        $this->qtd_caudas = $quantidade_caudas;
        return $this;
    }

    public function getJinchuuriki()
    {
        return $this->jinchuuriki_id;
    }

    public function setJinchuuriki($jinchuuriki_id)
    {
        $this->jinchuuriki_id = $jinchuuriki_id;
        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    public function getAldeia()
    {
        return $this->aldeia;
    }

    public function setAldeia($aldeia)
    {
        $this->aldeia = $aldeia;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    function getImagem()
    {
        return $this->imagem_src;
    }

    function setImagem($imagem_src)
    {
        $this->imagem_src = $imagem_src;
        return $this;
    }
    
    
}
