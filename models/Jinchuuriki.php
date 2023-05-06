<?php

class Jinchuuriki
{
    private $id;
    private $nome;
    private $aldeia;
    private $j_status;
    private $ponto_forte;
    private $link_image;
    private $con;

    private function __construct() //inicializando o atributo con com uma conexao com o bd
    {
        $con = new Conexao();
        $this->con = $con->conecta();
    }

    private function getId(): int
    {
        return $this->id;
    }

    private function setId(int $id): void
    {
        $this->id = $id;
    }

    private function getNome(): string
    {
        return $this->nome;
    }

    private function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    private function getAldeia(): string
    {
        return $this->aldeia;
    }

    private function setAldeia(string $aldeia): void
    {
        $this->aldeia = $aldeia;
    }

    private function getStatus(): string
    {
        return $this->j_status;
    }

    private function setStatus(string $j_status): void
    {
        $this->j_status = $j_status;
    }

    private function getPontoForte(): string
    {
        return $this->ponto_forte;
    }

    private function setPontoForte(string $ponto_forte): void
    {
        $this->ponto_forte = $ponto_forte;
    }

    private function getLinkImage(): string
    {
        return $this->link_image;
    }

    private function setLinkImage(string $link_image): void
    {
        $this->link_image = $link_image;
    }
}


?>