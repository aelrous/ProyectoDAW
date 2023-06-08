<?php
    require_once "Conexion.php";

    class ExpedienteM extends Conexion{

        //Mostrar notas
        public static function MostrarExpedienteM($tablaBD, $columna, $valor){  
            $pdo = Conexion::conexionBD() -> prepare("SELECT * FROM $tablaBD 
            WHERE $columna = :$columna");
            $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);
            $pdo -> execute();
            return $pdo;
            $pdo -> close();
            $pdo = null;
        }
        //Mostrar notas expediente Alumno
        public static function MostrarExpedienteAlumnoM($tablaBD, $columna, $valor, $usuario){  
            $pdo = Conexion::conexionBD() -> prepare("SELECT * FROM $tablaBD 
            WHERE $columna = :$columna AND alumnoID_FK = :alumnoID_FK");
            $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);
            $pdo -> bindParam(":alumnoID_FK", $usuario, PDO::PARAM_STR);
            $pdo -> execute();
            return $pdo;
            $pdo -> close();
            $pdo = null;
        }
        //Añadir nota
        public static function anadirNotaM($tablaBD,$datos){
            $pdo = Conexion::conexionBD() -> prepare("INSERT INTO $tablaBD (alumnoID_FK, asignaturaID_FK, nota)
            VALUES (:alumnoID_FK, :asignaturaID_FK, :nota)");
            $pdo -> bindParam(":alumnoID_FK", $datos["alumnoID_FK"], PDO::PARAM_STR);
            $pdo -> bindParam(":asignaturaID_FK", $datos["asignaturaID_FK"], PDO::PARAM_INT);
            $pdo -> bindParam(":nota", $datos["nota"], PDO::PARAM_INT);
            if($pdo -> execute()){
                return true;
            }
            $pdo -> close();
            $pdo = null;
        }
        //Editar nota
        public static function editarNotaM($tablaBD,$datos){
            $pdo = Conexion::conexionBD() -> prepare("UPDATE $tablaBD 
            SET nota = :nota WHERE asignaturaID_FK = :asignaturaID_FK");
            $pdo -> bindParam(":asignaturaID_FK", $datos["asignaturaID_FK"], PDO::PARAM_INT);
            $pdo -> bindParam(":nota", $datos["nota"], PDO::PARAM_INT);
            if($pdo -> execute()){
                return true;
            }
            $pdo -> close();
            $pdo = null;
        }
    }
?>