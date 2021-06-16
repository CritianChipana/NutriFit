<?php
require_once('../../db/Conexion.php');
class ComidaService
{
    public function getFood($id)
    {
        $vector = array();
        $conexion = new Conexion();
        $db = $conexion->conectar();
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
        $db = $conexion->conectar();
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

    public function createFood($food)
    {
        try {
            $conexion = new Conexion();
            $db = $conexion->conectar();
            $sql = "INSERT INTO comida (nombre, ingredientes,descripcion,preparacion,imagen,video,estadofav,iddiagnostico) 
            VALUES (:nombre,:ingredientes , :descripcion,:preparacion,:imagen,:video,:estadofav,:iddiagnostico)";
            $consulta = $db->prepare($sql);
            $consulta->bindParam(':nombre', $food["name"]);
            $consulta->bindParam(':ingredientes', $food["ingredients"]);
            $consulta->bindParam(':descripcion', $food["description"]);
            $consulta->bindParam(':preparacion', $food["preparation"]);
            $consulta->bindParam(':imagen', $food["image"]);
            $consulta->bindParam(':video', $food["video"]);
            $consulta->bindParam(':estadofav', $food["estadofav"]);
            $consulta->bindParam(':iddiagnostico', $food["diagnosis"]);
            $consulta->execute();
            return '{"ok":"true","msg":"Comida agregada con exito"}';
        } catch (Exception $e) {
            return $e;
        }
    }
}
