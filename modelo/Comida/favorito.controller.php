<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, Authorization,X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

require_once('../../db/Conexion.php');
require_once('comida.service.php');
$method = $_SERVER['REQUEST_METHOD'];

if ($method == "GET") {
    $vector = array();
    $ComidaService = new ComidaService();
    $vector = $ComidaService->getFavoriteFoods();
    $json = json_encode($vector);
    echo $json;
}

if ($method == "POST") {
    $json = null;
    $food = json_decode(file_get_contents("php://input"), true);
    $ComidaService = new ComidaService();
    $json = $ComidaService->addToFavoriteFood($food);
    echo $json;
}
