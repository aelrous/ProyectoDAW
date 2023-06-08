<?php 
    require_once "Conexion.php";

    class RecursosM extends Conexion{
        ///ARCHIVOS///
        //Mostrar archivos
        public static function mostrarArchivosM($tablaBD,$asignaturaID,$columna,$valor){
            if($columna != null){
                $pdo = Conexion::conexionBD() -> prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
                $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);
                $pdo -> execute();
                return $pdo -> fetch();
            }else{
            $pdo = Conexion::conexionBD() -> prepare("SELECT * FROM $tablaBD WHERE asignaturaID_FK = :asignaturaID_FK");
            $pdo -> bindParam(":asignaturaID_FK", $asignaturaID, PDO::PARAM_INT);
            $pdo -> execute();
            return $pdo -> fetchAll();
            }
            $pdo -> close();
            $pdo = null;
        }
        //Subir archivos
        public static function subirArchivosM($tablaBD,$datos){
            $pdo = Conexion::conexionBD() -> prepare("INSERT INTO $tablaBD (nombre, size, tipo, archivo, asignaturaID_FK) 
            VALUES (:nombre, :size, :tipo, :archivo, :asignaturaID_FK)");
            $pdo -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $pdo -> bindParam(":size", $datos["size"], PDO::PARAM_INT);
            $pdo -> bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
            $pdo -> bindParam(":archivo", $datos["archivo"], PDO::PARAM_STR);
            $pdo -> bindParam(":asignaturaID_FK", $datos["asignaturaID_FK"], PDO::PARAM_INT);
            if($pdo -> execute()){
                return true;
            }
            $pdo -> close();
            $pdo = null;
        }
        //Eliminar archivos
        public static function eliminarArchivosM($tablaBD,$id){
            $pdo = Conexion::conexionBD() -> prepare("DELETE FROM $tablaBD WHERE id_doc = :id_doc");
            $pdo -> bindParam(":id_doc", $id, PDO::PARAM_INT);
            if($pdo -> execute()){
                return true;
            }
            $pdo -> close();
            $pdo = null;
        }

        ///ENLACES///
        //Mostrar Enlaces
        public static function mostrarEnlacesM($tablaBD,$asignaturaID,$columna,$valor){
            if($columna != null){
                $pdo = Conexion::conexionBD() -> prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
                $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);
                $pdo -> execute();
                return $pdo -> fetch();
            }else{
            $pdo = Conexion::conexionBD() -> prepare("SELECT * FROM $tablaBD WHERE asignaturaID_FK = :asignaturaID_FK");
            $pdo -> bindParam(":asignaturaID_FK", $asignaturaID, PDO::PARAM_INT);
            $pdo -> execute();
            return $pdo -> fetchAll();
            }
            $pdo -> close();
            $pdo = null;
        }
        //Subir Enlaces
        public static function subirEnlacesM($tablaBD,$datos){
            $pdo = Conexion::conexionBD() -> prepare("INSERT INTO $tablaBD (titulo, url, asignaturaID_FK) 
            VALUES (:titulo, :url, :asignaturaID_FK)");
            $pdo -> bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
            $pdo -> bindParam(":url", $datos["url"], PDO::PARAM_STR);
            $pdo -> bindParam(":asignaturaID_FK", $datos["asignaturaID_FK"], PDO::PARAM_INT);
            if($pdo -> execute()){
                return true;
            }
            $pdo -> close();
            $pdo = null;
        }
        //Eliminar Enlaces
        public static function eliminarEnlacesM($tablaBD,$id){
            $pdo = Conexion::conexionBD() -> prepare("DELETE FROM $tablaBD WHERE id_enlace = :id_enlace");
            $pdo -> bindParam(":id_enlace", $id, PDO::PARAM_INT);
            if($pdo -> execute()){
                return true;
            }
            $pdo -> close();
            $pdo = null;
        }
    }
?>