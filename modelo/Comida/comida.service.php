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
                "description" => $fila['descripcion'],
                "image" => $fila['imagen'],
                "ingredients" => $fila["ingredientes"],
                "preparation" => $fila["preparacion"],
                "preparationVideo" => $fila["video"],
                "idDiagnostic" => $fila["iddiagnostico"],
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


    public function getFavoriteFoods()
    {
        $vector = array();
        $conexion = new Conexion();
        $db = $conexion->conectar();
        $sql = "SELECT * FROM comida where estadofav=1";
        $consulta = $db->prepare($sql);
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
            $error[] = array("error" => "No se encontraron comidas marcadas como favoritas");
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

    public function deleteFood($food)
    {
        try {
            $conexion = new Conexion();
            $db = $conexion->conectar();
            $sql = "DELETE FROM comida WHERE idcomidas =:id";
            $consulta = $db->prepare($sql);
            $consulta->bindParam(':id', $food["id"]);
            $consulta->execute();
            return '{"ok":"true","msg":"Comida' . $food["id"] . ' eliminada con exito"}';
        } catch (Exception $e) {
            return '{"ok":"false","msg":"' . $e . '}';
        }
    }



    public function addToFavoriteFood($food)
    {
        try {
            $conexion = new Conexion();
            $db = $conexion->conectar();
            $sql = "UPDATE comida SET  estadofav=1 WHERE idcomidas=:idcomida";
            $consulta = $db->prepare($sql);
            $consulta->bindParam(':idcomida', $food["id"]);
            $consulta->execute();
            return '{"ok":"true","msg":"Comida agregada a favoritos con exito"}';
        } catch (Exception $e) {
            return $e;
        }
    }
}
