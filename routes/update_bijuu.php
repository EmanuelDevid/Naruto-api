<?php 

require_once("../controllers/BijuuController.php");

//recebe uma URL e extrai os valores presente nela. Pega todos os inputs que chegam da requisição php
$data = file_get_contents("php://input"); //recebe como um json

//transforma o json em array
$dataArray = json_decode($data, true);

//envia para o controlador o array associativo
$bijuuController = new BijuuController($dataArray);
echo $bijuuController->update();

?>