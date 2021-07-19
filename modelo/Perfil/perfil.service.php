<?php

require_once('../../db/Conexion.php');

class PerfilService {

    public function DatosPersona( $id ){
        $vector = array();
        $conexion = new Conexion();
        $db = $conexion->conectar();
        
        $sql = "SELECT * FROM historial WHERE idhistorial =:id";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':id', $id);
        $consulta->execute();
        while ($fila = $consulta->fetch()) {
            $vector[] = array(
                "idhistorial" => $fila['idhistorial'],
                "peso" => $fila['peso'],
                "altura" => $fila['altura'],
                "imc" => $fila['imc'],
                "descripcion" => $fila["descripcion"],
                "fecha" => $fila["fecha"],
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

}

?>