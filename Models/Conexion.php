<?php 

    class Conexion{

        public static function conexionBD(){

            $bd = new PDO("mysql:host=localhost;dbname=campus;", "root", "");
            $bd -> exec("SET NAMES utf8"); //Para caracteres especiales en ES
            return $bd;
        }   
    }
?>