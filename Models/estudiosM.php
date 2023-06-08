<?php

    require_once "Conexion.php";

    class EstudiosM extends Conexion{

        //Crear Estudios
        public static function CrearEstudiosM($tablaBD, $datos){
            $pdo = Conexion::conexionBD() -> prepare("INSERT INTO $tablaBD (nombre) VALUES (:nombre)");
            $pdo -> bindParam(":nombre", $datos, PDO::PARAM_STR);
            if($pdo -> execute()){
                return true;
            }
            $pdo -> close();
            $pdo = null;
        }
        //Mostrar datos de Estudios
        public static function MostrarEstudiosM($tablaBD){
            $pdo = Conexion::conexionBD() -> prepare("SELECT * FROM $tablaBD");
            $pdo -> execute();
            return $pdo -> fetchAll();
            $pdo -> close();
            $pdo = null;
        }
        //Mostrar datos de Estudios
        public static function MostrarEstudiosUserM($tablaBD, $columna, $valor){
            $pdo = Conexion::conexionBD() -> prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
            $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);
            $pdo -> execute();
            return $pdo -> fetch();
            $pdo -> close();
            $pdo = null;
        }
        //Editar nombre de Estudios
        public static function EditarEstudiosM($tablaBD, $moduloID){
            $pdo = Conexion::conexionBD() -> prepare("SELECT * FROM $tablaBD WHERE moduloID = :moduloID");
            $pdo -> bindParam(":moduloID", $moduloID, PDO::PARAM_INT);
            $pdo -> execute();
            return $pdo -> fetch();
            $pdo -> close();
            $pdo = null;
        }
        //Guardar Cambios para Estudios
        public static function ActualizarEstudiosM($tablaBD,$datos){
            $pdo = Conexion::conexionBD() -> prepare("UPDATE $tablaBD SET nombre = :nombre WHERE moduloID = :moduloID");
            $pdo -> bindParam(":moduloID", $datos["moduloID"], PDO::PARAM_INT);
            $pdo -> bindParam(":nombre", $datos["estudios"], PDO::PARAM_STR);
            if($pdo -> execute()){
                return true;
            }
            $pdo -> close();
            $pdo = null;
        }

        //Eliminar Estudios
        public static function EliminarEstudiosM($tablaBD, $moduloID){
            $pdo = Conexion::conexionBD() -> prepare("DELETE FROM $tablaBD WHERE moduloID = :moduloID");
            $pdo -> bindParam(":moduloID", $moduloID, PDO::PARAM_INT);
            if($pdo -> execute()){
                return true;
            }
            $pdo -> close();
            $pdo = null;
        }
        //Mostrar Estudios en gestor de Usuarios
        public static function ListadoEstudiosM($tablaBD, $columna, $valor){
            $pdo = Conexion::conexionBD() -> prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
            $pdo -> bindparam(":".$columna, $valor, PDO::PARAM_STR);
            $pdo -> execute();
            return $pdo -> fetch();
            $pdo -> close();
            $pdo = null;
        }
    } 
?>