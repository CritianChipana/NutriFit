<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, Authorization,X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

require_once('../../db/Conexion.php');
require_once('diagnostico.service.php');
$method = $_SERVER['REQUEST_METHOD'];

if ($method == "GET") {
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $DiagnosticoService = new DiagnosticoService();
        $obj = $DiagnosticoService->getDiagnostico($id);
        $json = json_encode($obj);
        echo $json;
    }
}
