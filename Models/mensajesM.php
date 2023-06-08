<?php

    require_once "Conexion.php";

    class MensajesM extends Conexion{
        //Enviar Mensajes
        public static function enviarMensajeM($tablaBD,$datos){
            $pdo = Conexion::conexionBD() -> prepare("INSERT INTO $tablaBD (titulo, mensaje, remitente, destinatario, fecha)
            VALUES (:titulo, :mensaje, :remitente, :destinatario, now())");
            $pdo -> bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
            $pdo -> bindParam(":mensaje", $datos["mensaje"], PDO::PARAM_STR);
            $pdo -> bindParam(":remitente", $datos["remitente"], PDO::PARAM_STR);
            $pdo -> bindParam(":destinatario", $datos["destinatario"], PDO::PARAM_STR);
            if($pdo -> execute()){
                return true;
            }
            $pdo -> close();
            $pdo = null;
        }
        //Mostrar listado de mensajes
        public static function mostrarMensajesM($tablaBD,$usuario){
            $pdo = Conexion::conexionBD() -> prepare("SELECT * FROM $tablaBD WHERE destinatario = :destinatario");
            $pdo -> bindParam(":destinatario", $usuario, PDO::PARAM_STR);
            $pdo -> execute();
            return $pdo -> fetchAll();
            $pdo -> close();
            $pdo = null;
        }
        //Eliminar mensajes 
        public static function eliminarMensajeM($tablaBD,$mensajeID){
            $pdo = Conexion::conexionBD() -> prepare("DELETE FROM $tablaBD WHERE id = :id");
            $pdo -> bindParam(":id", $mensajeID, PDO::PARAM_INT);
            if($pdo -> execute()){
                return true;    
            }
            $pdo -> close();
            $pdo = null;
        }
        //Ver contenido del mensaje
        public static function verMensajeM($tablaBD, $columna, $valor){
            $pdo = Conexion::conexionBD() -> prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
            $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);
            $pdo -> execute();
            return $pdo -> fetch();
        }
        //Mensaje leido
        public static function mensajeLeidoM($tablaBD, $id){
            $pdo = Conexion::conexionBD() -> prepare("UPDATE $tablaBD SET leido = '1' WHERE id = :id"); 
            $pdo -> bindParam(":id", $id, PDO::PARAM_INT);
            if($pdo -> execute()){
                return true;
            }
            $pdo -> close();
            $pdo = null;
        }
    }
?>