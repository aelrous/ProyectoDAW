<?php

    require_once "Conexion.php";

    class AsignaturaM extends Conexion{

        //Añadir asignaturas a los Modulos
        public static function anadirAsignaturaM($tablaBD,$datos){
            $pdo = Conexion::conexionBD() -> prepare("INSERT INTO $tablaBD (nombre, curso, semestre, moduloID_FK)
            VALUES (:nombre, :curso, :semestre, :moduloID_FK)");
            $pdo -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $pdo -> bindParam(":curso", $datos["curso"], PDO::PARAM_STR);
            $pdo -> bindParam(":semestre", $datos["semestre"], PDO::PARAM_STR);
            $pdo -> bindParam(":moduloID_FK", $datos["moduloID_FK"], PDO::PARAM_INT);
            if($pdo -> execute()){
                return true;
            }
            $pdo -> close();
            $pdo = null;
        }
        //Mostrar asignaturas según módulo
        public static function MostrarAsignaturasM($tablaBD, $columna, $valor){
            if($columna != null){
                $pdo = Conexion::conexionBD() -> prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
                $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);
                $pdo -> execute();
                return $pdo -> fetch(); 
            }else{
                $pdo = Conexion::conexionBD() -> prepare("SELECT * FROM $tablaBD");
                $pdo -> execute();
                return $pdo -> fetchAll();
            }
            $pdo -> close();
            $pdo = null;
        }
        //Mostrar asignaturas según Usuario
        public static function MostrarAsignaturasUserM($tablaBD, $columna, $valor){
            $pdo = Conexion::conexionBD() -> prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
            $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);
            $pdo -> execute();
            return $pdo -> fetchAll(); 
            $pdo -> close();
            $pdo = null;
        }
        //Eliminar asignaturas
        public static function EliminarAsignaturaM($tablaBD,$id){

            $pdo = Conexion::conexionBD() -> prepare("DELETE FROM $tablaBD WHERE asignaturaID = :asignaturaID"); 
            $pdo -> bindParam(":asignaturaID", $id, PDO::PARAM_INT);
            if($pdo -> execute()){
                return true;
            }
            $pdo -> close();
            $pdo = null;
        }
        //Editar Asignaturas
        public static function EditarAsignaturaM($tablaBD,$datos){
            $pdo = Conexion::conexionBD() -> prepare("UPDATE $tablaBD 
            SET nombre = :nombre, curso = :curso, semestre = :semestre
            WHERE asignaturaID = :asignaturaID");
            $pdo -> bindParam(":asignaturaID", $datos["asignaturaID"], PDO::PARAM_INT);
            $pdo -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $pdo -> bindParam(":curso", $datos["curso"], PDO::PARAM_STR);
            $pdo -> bindParam(":semestre", $datos["semestre"], PDO::PARAM_STR);
            
            if($pdo -> execute()){
                return true;    
            }
            $pdo -> close();
            $pdo = null;
        }
    }
?>