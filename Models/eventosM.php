<?php 
    require_once "Conexion.php";

    class EventosM extends Conexion{

        //Mostrar eventos y lo almacenamos en un array en formato JSON
        public static function MostrarEventoM($tablaBD){
            $pdo = Conexion::conexionBD() -> prepare("SELECT * FROM $tablaBD");
            $pdo -> execute();
            return $pdo -> fetchAll();
            $pdo -> close();
            $pdo = null;
        }
        //Crear evento
        public static function crearEventoM($tablaBD,$datos){
            $pdo = Conexion::conexionBD() -> prepare("INSERT INTO $tablaBD (titulo, fInicio, fFin, descripcion, autor)
            VALUES(:titulo, :fInicio, :fFin, :descripcion, :autor)");
            $pdo -> bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
            $pdo -> bindParam(":fInicio", $datos["fInicio"], PDO::PARAM_STR);
            $pdo -> bindParam(":fFin", $datos["fFin"], PDO::PARAM_STR);
            $pdo -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
            $pdo -> bindParam(":autor", $datos["autor"], PDO::PARAM_STR);
            if($pdo -> execute()){
                return true;     
            }
            $pdo -> close();
            $pdo = null;
        }
        //editar Evento
        public static function editarEventoM($tablaBD,$datos){
            $pdo = Conexion::conexionBD() -> prepare("UPDATE $tablaBD 
            SET titulo = :titulo, fInicio = :fInicio, fFin = :fFin, descripcion = :descripcion 
            WHERE eventoID = :eventoID");
            $pdo -> bindParam(":eventoID", $datos["eventoID"], PDO::PARAM_INT);
            $pdo -> bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
            $pdo -> bindParam(":fInicio", $datos["fInicio"], PDO::PARAM_STR);
            $pdo -> bindParam(":fFin", $datos["fFin"], PDO::PARAM_STR);
            $pdo -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
            if($pdo -> execute()){
                return true;     
            }
            $pdo -> close();
            $pdo = null;
        }
        //eliminar Evento
        public static function eliminarEventoM($tablaBD,$id){
            $pdo = Conexion::conexionBD() -> prepare ("DELETE FROM $tablaBD WHERE eventoID = :eventoID");
            $pdo -> bindParam(":eventoID", $id, PDO::PARAM_INT);
            if($pdo -> execute()){
                return true;    
            }
            $pdo -> close();
            $pdo = null;
        }
    }
?>