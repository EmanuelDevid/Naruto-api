<?php 

require_once("../controllers/JinchuurikiController.php");

//recebe uma URL e extrai os valores presente nela. Pega todos os inputs que chegam da requisição php
$data = file_get_contents("php://input"); //recebe como um json

//transformando em um array associativo
$dataArray = json_decode($data, true);

$jinchuurikiController = new JinchuurikiController($dataArray);
echo $jinchuurikiController->read();

?>