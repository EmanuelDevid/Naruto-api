<?php 

    require_once("../Conexao.php");

    $con = new Conexao();

    //criando uma conexão com o bd
    $con = $con->conecta();

    $query = "CREATE TABLE IF NOT EXISTS bijuus (
        qtd_caudas INT NOT NULL,
        nome VARCHAR(45) NULL,
        animal VARCHAR(45) NULL,
        aldeia VARCHAR(45) NULL,
        b_status ENUM('livre', 'capturada', 'morta', 'viva') NULL,
        descricao VARCHAR(45) NULL,
        link_img VARCHAR(255) NULL,
        jinchuuriki_id INT NOT NULL,
        PRIMARY KEY (qtd_caudas),
        INDEX fk_bijuu_jinchuuriki_idx (jinchuuriki_id ASC) VISIBLE,
        CONSTRAINT fk_bijuu_jinchuuriki
            FOREIGN KEY (jinchuuriki_id)
            REFERENCES jinchuuriki (id)
            ON DELETE CASCADE
            ON UPDATE CASCADE);";

    $stmt = $con->prepare($query);

    if($stmt->execute()){ //executando a query
        http_response_code(201);
        $array_retorno = ["status" => true, "message" => "Tabela bijuus criada com sucesso"];
        echo json_encode($array_retorno);
        $con = null; //fechando a conexão com o bd
        exit;
    }

    http_response_code(400);
    $array_retorno = ["status" => false, "message" => "Erro ao criar a tabela"];
    echo json_encode($array_retorno);
    $con = null; //fechando a conexão com o bd

?>