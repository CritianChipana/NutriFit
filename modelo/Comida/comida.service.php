<?php
require_once('../../db/Conexion.php');
class ComidaService
{
    public function getFood($id)
    {
        $vector = array();
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT * FROM comida where idcomidas=:id";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':id', $id);
        $consulta->execute();
        while ($fila = $consulta->fetch()) {
            $vector[] = array(
                "id" => $fila['idcomidas'],
                "name" => $fila['nombre'],
                "description" => $fila['descripcion'],
                "image" => $fila['imagen'],
                "ingredients" => $fila["ingredientes"],
                "preparation" => $fila["preparacion"],
                "preparationVideo" => $fila["video"],
            );
        }
        if (empty($vector[0])) {
            $error = array();
            $error[] = array("error" => "producto no encontrado");
            return $error[0];
        } else {
            return $vector[0];
        }
    }

    public function getFoods()
    {
        $vector = array();
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT * FROM comida";
        $consulta = $db->prepare($sql);
        $consulta->execute();
        while ($fila = $consulta->fetch()) {
            $vector[] = array(
                "id" => $fila['idcomidas'],
                "name" => $fila['nombre'],
                "image" => $fila['imagen'],
            );
        }
        if (empty($vector[0])) {
            $error = array();
            $error[] = array("error" => "No hay comidas en db");
            return $error[0];
        } else {
            return $vector;
        }
    }
}
