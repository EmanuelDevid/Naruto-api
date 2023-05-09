<?php 

require_once("../models/Jinchuuriki.php");

class JinchuurikiController {
    public $jinchuuriki;

    public function __construct(array $data)
    {
        $jinchuuriki = new Jinchuuriki(); //instancializando a model jinchuuriki

        if(isset($data['nome'])){
            $jinchuuriki->setNome($data['nome']);
        }
        if(isset($data['aldeia'])){
            $jinchuuriki->setAldeia($data['aldeia']);
        }
        if(isset($data['j_status'])){
            $jinchuuriki->setStatus($data['j_status']);
        }
        if(isset($data['ponto_forte'])){
            $jinchuuriki->setPontoForte($data['ponto_forte']);
        }
        if(isset($data['link_img'])){
            $jinchuuriki->setLinkImage($data['link_img']);
        }
        if(isset($data['id'])){
            $jinchuuriki->setId($data['id']);
        }

        $this->jinchuuriki = $jinchuuriki;
    }

    public function create()
    {
        return $this->jinchuuriki->create();
    }
}

?>