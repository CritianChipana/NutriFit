<?php
require_once('../../db/Conexion.php');
class EjercicioService
{
    public function getExercise($id)
    {
        $vector = array();
        $conexion = new Conexion();
        $db = $conexion->conectar();
        $sql = "SELECT * FROM ejercicio where idejercicio=:id";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':id', $id);
        $consulta->execute();
        while ($fila = $consulta->fetch()) {
            $vector[] = array(
                "id" => $fila['idejercicio'],
                "name" => $fila['nombreE'],
                "type" => $fila['tipoE'],
                "video" => $fila['videoE'],
                "duration" => $fila["duracionE"],
                "series" => $fila["seriesE"],
                "repeatxserie" => $fila["repeticionXseriesE"],
                "image" => $fila["imagenE"],
                "description" => $fila["descripcionE"]
            );
        }
        if (empty($vector[0])) {
            $error = array();
            $error[] = array("error" => "Ejercicio no encontrado");
            return $error[0];
        } else {
            return $vector[0];
        }
    }

    public function getExercises()
    {
        $vector = array();
        $conexion = new Conexion();
        $db = $conexion->conectar();
        $sql = "SELECT * FROM ejercicio";
        $consulta = $db->prepare($sql);
        $consulta->execute();
        while ($fila = $consulta->fetch()) {
            $vector[] = array(
                "id" => $fila['idejercicio'],
                "name" => $fila['nombreE'],
                "type" => $fila['tipoE'],
                "video" => $fila['videoE'],
                "duration" => $fila["duracionE"],
                "series" => $fila["seriesE"],
                "repeatxserie" => $fila["repeticionXseriesE"],
                "image" => $fila["imagenE"],
                "description" => $fila["descripcionE"]
            );
        }
        if (empty($vector[0])) {
            $error = array();
            $error[] = array("error" => "No hay ejercicios en db");
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

    public function createExercise($exercise)
    {
        try {
            $conexion = new Conexion();
            $db = $conexion->conectar();
            $sql = "INSERT INTO ejercicio (nombreE, tipoE,videoE,duracionE,seriesE,repeticionXseriesE,imagenE,descripcionE) 
            VALUES (:nombreE,:tipoE , :videoE,:duracionE,:seriesE,:repeticionXseriesE,:imagenE,:descripcionE)";
            $consulta = $db->prepare($sql);
            $consulta->bindParam(':nombreE', $exercise["name"]);
            $consulta->bindParam(':tipoE', $exercise["type"]);
            $consulta->bindParam(':videoE', $exercise["video"]);
            $consulta->bindParam(':duracionE', $exercise["duration"]);
            $consulta->bindParam(':seriesE', $exercise["series"]);
            $consulta->bindParam(':repeticionXseriesE', $exercise["repeatxserie"]);
            $consulta->bindParam(':imagenE', $exercise["image"]);
            $consulta->bindParam(':descripcionE', $exercise["description"]);
            $consulta->execute();
            return '{"ok":"true","msg":"Ejercicio agregado con exito"}';
        } catch (Exception $e) {
            return '{"ok":"false","msg":"' . $e . '}';
        }
    }

    public function updateExercise($exercise)
    {
        try {
            $conexion = new Conexion();
            $db = $conexion->conectar();
            $sql = "UPDATE ejercicio SET nombreE='" . $exercise["name"] . "',tipoE='" . $exercise["type"] . "',videoE='"
                . $exercise["video"] . "',descripcionE='" . $exercise["description"] . "',imagenE='" . $exercise["image"] . "',duracionE='" .
                $exercise["duration"] . "',seriesE=" . $exercise["series"] . ",repeticionXseriesE='" . $exercise["repeatxserie"] . "' WHERE idejercicio=" . $exercise["id"];
            $consulta = $db->prepare($sql);
            $consulta->execute();
            return '{"ok":"true","msg":"Ejercicio actualizado con exito"}';
        } catch (Exception $e) {
            return '{"ok":"false","msg":"' . $e . '}';
        }
    }

    public function deleteExercise($exercise)
    {
        try {
            $conexion = new Conexion();
            $db = $conexion->conectar();
            if (count($exercise) == 1) {
                $sql = "DELETE FROM ejercicio WHERE idejercicio =:id";
                $consulta = $db->prepare($sql);
                $consulta->bindParam(':id', $exercise["id"]);
                $consulta->execute();
                return '{"ok":"true","msg":"Ejercicio' . $exercise["id"] . ' eliminado con exito"}';
            } else {
                foreach ($exercise as $item) {
                    $sql = "DELETE FROM ejercicio WHERE idejercicio =:id";
                    $consulta = $db->prepare($sql);
                    $consulta->bindParam(':id', $item);
                    $consulta->execute();
                }
                return '{"ok":"true","msg":"' . count($exercise) . ' ejercicios eliminados con exito"}';
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
    public function removeToFavoriteFood($food)
    {
        try {
            $conexion = new Conexion();
            $db = $conexion->conectar();
            $sql = "UPDATE comida SET  estadofav=2 WHERE idcomidas=" . $food["id"];
            $consulta = $db->prepare($sql);
            $consulta->execute();
            return '{"ok":"true","msg":"Comida numero' . $food["id"] . ' agregada a favoritos con exito"}';
        } catch (Exception $e) {
            return '{"ok":"false","msg":"' . $e . '}';
        }
    }
}
