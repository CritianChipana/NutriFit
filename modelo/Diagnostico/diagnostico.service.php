<?php
require_once('../../db/Conexion.php');
class DiagnosticoService
{
    public function getDiagnostico($id)
    {
        $vector = array();
        $conexion = new Conexion();
        $db = $conexion->conectar();
        $sql = "SELECT * FROM diagnostico where iddiagnostico=:id";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':id', $id);
        $consulta->execute();
        while ($fila = $consulta->fetch()) {
            $vector[] = array(
                "id" => $fila['iddiagnostico'],
                "name" => $fila['nombre'],
            );
        }
        if (empty($vector[0])) {
            $error = array();
            $error[] = array("error" => "diagnostico no encontrado");
            return $error[0];
        } else {
            return $vector[0];
        }
    }
}
