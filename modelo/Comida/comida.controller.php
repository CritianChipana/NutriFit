<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, Authorization,X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

require_once('../../db/Conexion.php');
require_once('comida.service.php');
$method = $_SERVER['REQUEST_METHOD'];

if ($method == "GET") {
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $ComidaService = new ComidaService();
        $obj = $ComidaService->getFood($id);
        $json = json_encode($obj);
        echo $json;
    } else {
        $vector = array();
        $ComidaService = new ComidaService();
        $vector = $ComidaService->getFoods();
        $json = json_encode($vector);
        echo $json;
    }
}
