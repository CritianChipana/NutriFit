<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, Authorization,X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

require_once('../../db/Conexion.php');
require_once('ejercicio.service.php');
$method = $_SERVER['REQUEST_METHOD'];

if ($method == "GET") {
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $ComidaService = new EjercicioService();
        $obj = $ComidaService->getExercise($id);
        $json = json_encode($obj);
        echo $json;
    } else {
        $vector = array();
        $EjercicioService = new EjercicioService();
        $vector = $EjercicioService->getExercises();
        $json = json_encode($vector);
        echo $json;
    }
}

if ($method == "POST") {
    $json = null;
    $exercise = json_decode(file_get_contents("php://input"), true);
    $EjercicioService = new EjercicioService();
    $json = $EjercicioService->createExercise($exercise);
    echo $json;
}

if ($method == "DELETE") {
    $json = null;
    $exercise = json_decode(file_get_contents("php://input"), true);
    $EjercicioService = new EjercicioService();
    $json = $EjercicioService->deleteExercise($exercise);
    echo $json;
}
if ($method == "PUT") {
    $json = null;
    $exercise = json_decode(file_get_contents("php://input"), true);
    $EjercicioService = new EjercicioService();
    $json = $EjercicioService->updateExercise($exercise);
    echo $json;
}
