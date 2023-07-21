<?php 

require_once("../models/Bijuus.php");

class BijuuController {
    public $bijuu;

    public function __construct(array $data)
    {
        $bijuu = new Bijuu(); //instancializando a model bijuu

        if(isset($data['nome'])){
            $bijuu->setNome($data['nome']);
        }
        if(isset($data['animal'])){
            $bijuu->setAldeia($data['animal']);
        }
        if(isset($data['descricao'])){
            $bijuu->setPontoForte($data['descricao']);
        }
        if(isset($data['aldeia'])){
            $bijuu->setAldeia($data['aldeia']);
        }
        if(isset($data['b_status'])){
            $bijuu->setStatus($data['j_status']);
        }
        if(isset($data['link_img'])){
            $bijuu->setLinkImage($data['link_img']);
        }
        if(isset($data['jinchuuriki_id'])){
            $bijuu->setLinkImage($data['jinchuuriki_id']);
        }
        if(isset($data['animal'])){
            $bijuu->setLinkImage($data['animal']);
        }
        if(isset($data['qtd_caudas'])){
            //convertendo o valor dde qtd_caudas para inteiro
            $data['qtd_caudas'] = intval($data['qtd_caudas']);
            $bijuu->setId($data['qtd_caudas']);
        }

        $this->bijuu = $bijuu;
    }

    public function create()
    {
        //retorna o json recebido
        return $this->bijuu->create();
    }

    public function read()
    {
        //transformando o array associativo recebido em json e o retornando
        return json_encode($this->bijuu->read());
    }

    public function update()
    {
        if($this->bijuu->qtd_caudas === null){//tratando o erro: caso a qtd_caudas não seja informada
            http_response_code(400);
            return json_encode(['status' => false, 'message' => 'Quantidade de caudas não informada']);
        }

        //retorna o json recebido
        return $this->bijuu->update();
    }

    public function delete()
    {
        if($this->bijuu->qtd_caudas === null){//tratando o erro: caso a qtd_caudas não seja informada
            http_response_code(400);
            return json_encode(['status' => false, 'message' => 'Quantidade de caudas não informada']);
        }

        //retorna o json recebido
        return $this->bijuu->delete();
    }
}

?>