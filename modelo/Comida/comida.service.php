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
                "estadofav" => $fila["estadofav"],
                "iddiagnostico" => $fila["iddiagnostico"],
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
        $sql = "SELECT c.*,d.nombre as diagnostico FROM comida as c INNER JOIN diagnostico as d on d.iddiagnostico=c.iddiagnostico";
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
                "diagnostic" => $fila["diagnostico"],
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


    public function getFoodsWithDiagnostic($idusuario)
    {
        $vector = array();
        $conexion = new Conexion();
        $db = $conexion->conectar();
        $sql = "SELECT * FROM bdscrum.comida WHERE idusuario = :idusuario";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':idusuario', $idusuario);
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
                "diagnostic" => $fila["diagnostico"],
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
            return '{"ok":"false","msg":"' . $e . '}';
        }
    }

    public function updateFood($food)
    {
        try {
            $conexion = new Conexion();
            $db = $conexion->conectar();
            $sql = "UPDATE comida SET nombre='" . $food["name"] . "',ingredientes='" . $food["ingredients"] . "',descripcion='"
                . $food["description"] . "',preparacion='" . $food["preparation"] . "',imagen='" . $food["image"] . "',video='" .
                $food["video"] . "',estadofav=" . $food["estadofav"] . ",iddiagnostico=" . $food["diagnosis"] . " WHERE idcomidas=" . $food["id"];
            $consulta = $db->prepare($sql);
            $consulta->execute();
            return '{"ok":"true","msg":"Comida actualizada con exito"}';
        } catch (Exception $e) {
            return '{"ok":"false","msg":"' . $e . '}';
        }
    }

    public function deleteFood($food)
    {
        try {
            $conexion = new Conexion();
            $db = $conexion->conectar();
            if (count($food) == 1) {
                $sql = "DELETE FROM comida WHERE idcomidas =:id";
                $consulta = $db->prepare($sql);
                $consulta->bindParam(':id', $food["id"]);
                $consulta->execute();
                return '{"ok":"true","msg":"Comida' . $food["id"] . ' eliminada con exito"}';
            } else {
                foreach ($food as $item) {
                    $sql = "DELETE FROM comida WHERE idcomidas =:id";
                    $consulta = $db->prepare($sql);
                    $consulta->bindParam(':id', $item);
                    $consulta->execute();
                }
                return '{"ok":"true","msg":"' . count($food) . ' comidas eliminadas con exito"}';
            }
        } catch (Exception $e) {
            return '{"ok":"false","msg":"' . $e . '}';
        }
    }

    public function addToFavoriteFood($food)
    {
        try {
            $conexion = new Conexion();
            $db = $conexion->conectar();
            $sql = "UPDATE comida SET  estadofav=1 WHERE idcomidas=" . $food["id"];
            $consulta = $db->prepare($sql);
            $consulta->execute();
            return '{"ok":"true","msg":"Comida numero' . $food["id"] . ' agregada a favoritos con exito"}';
        } catch (Exception $e) {
            return '{"ok":"false","msg":"' . $e . '}';
        }
    }
}
