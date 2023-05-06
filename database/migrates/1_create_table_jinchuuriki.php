<?php 

    require_once("../Conexao.php");

    $con = new Conexao();

    //criando uma conexão com o bd
    $con = $con->conecta();

    $query = "CREATE TABLE IF NOT EXISTS jinchuuriki (
        id INT NOT NULL AUTO_INCREMENT,
        nome VARCHAR(45) NOT NULL,
        aldeia VARCHAR(45) NULL,
        j_status VARCHAR(45) NULL,
        ponto_forte ENUM('taijutsu', 'ninjutsu', 'senjutsu', 'genjutsu') NULL,
        link_img VARCHAR(255) NULL,
        PRIMARY KEY (id));";

    $stmt = $con->prepare($query);

    if($stmt->execute()){ //executando a query
        http_response_code(201);
        $array_retorno = ["status" => true, "message" => "Tabela jinchuuriki criada com sucesso"];
        echo json_encode($array_retorno);
        $con = null; //fechando a conexão com o bd
        exit;
    }

    http_response_code(400);
    $array_retorno = ["status" => false, "message" => "Erro ao criar a tabela"];
    echo json_encode($array_retorno);
    $con = null; //fechando a conexão com o bd

?>