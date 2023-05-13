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
            //convertendo o valor do id para inteiro
            $data['id'] = intval($data['id']);
            $jinchuuriki->setId($data['id']);
        }

        $this->jinchuuriki = $jinchuuriki;
    }

    public function create()
    {
        //retorna o json recebido
        return $this->jinchuuriki->create();
    }

    public function read()
    {
        //transformando o array associativo recebido em json e o retornando
        return json_encode($this->jinchuuriki->read());
    }

    public function update()
    {
        if($this->jinchuuriki->id === null){//tratando o erro: caso o id não seja informado
            http_response_code(400);
            return json_encode(['status' => false, 'message' => 'ID não informado']);
        }

        //retorna o json recebido
        return $this->jinchuuriki->update();
    }

    public function delete()
    {
        if($this->jinchuuriki->id === null){//tratando o erro: caso o id não seja informado
            http_response_code(400);
            return json_encode(['status' => false, 'message' => 'ID não informado']);
        }

        //retorna o json recebido
        return $this->jinchuuriki->delete();
    }
}

?>