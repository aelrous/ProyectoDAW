<?php 

    require_once "Conexion.php";

    class UsuariosM extends Conexion{

        //Inicio Sesion
        public static function IniciarSesionM($tablaBD, $datos){
            $pdo = Conexion::conexionBD() -> prepare("SELECT * FROM $tablaBD WHERE correo = :correo");
            $pdo -> bindParam(":correo", $datos, PDO::PARAM_STR);
            $pdo -> execute();
            return $pdo -> fetch();
            $pdo -> close();
            $pdo = null;
        }
        //Registrar Usuario
        public static function RegistrarUsuarioM($tablaBD,$datos){
            $pdo = Conexion::conexionBD() -> prepare("INSERT INTO $tablaBD (userID, contrasena, nombre, apellidos, correo, tipoUsuario, moduloID_FK)
            VALUES(:userID, :contrasena, :nombre, :apellidos, :correo, :tipoUsuario, :moduloID_FK)");
            $pdo -> bindParam(":userID", $datos["userID"], PDO::PARAM_STR);
            $pdo -> bindParam(":contrasena", $datos["contrasena"], PDO::PARAM_STR);
            $pdo -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $pdo -> bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
            $pdo -> bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
            $pdo -> bindParam(":tipoUsuario", $datos["tipoUsuario"], PDO::PARAM_STR);
            $pdo -> bindParam(":moduloID_FK", $datos["moduloID_FK"], PDO::PARAM_INT);
            if($pdo -> execute()){
                return true;     
            }
            $pdo -> close();
            $pdo = null;
        }
        //Mostrar datos de usuario
        public static function MostrarDatosM($tablaBD, $userID){
            $pdo = Conexion::conexionBD() -> prepare("SELECT * FROM $tablaBD WHERE userID = :userID");
            $pdo -> bindParam(":userID", $userID, PDO::PARAM_STR);
            $pdo -> execute();
            return $pdo -> fetch();
            $pdo -> close();
            $pdo = null;
        }
        //Actualizar datos usuario
        public static function ActualizarDatosM($tablaBD, $datos){
            $pdo = Conexion::conexionBD() -> prepare("UPDATE $tablaBD 
            SET nombre = :nombre, apellidos = :apellidos, correo = :correo, contrasena = :contrasena
            WHERE userID = :userID");
            $pdo -> bindParam(":userID", $datos["userID"], PDO::PARAM_STR);
            $pdo -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $pdo -> bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
            $pdo -> bindParam(":contrasena", $datos["contrasena"], PDO::PARAM_STR);
            $pdo -> bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
            //$pdo -> bindParam(":contrasena", $datos["contrasena"], PDO::PARAM_STR);
            if($pdo -> execute()){
                return true;     
            }
            $pdo -> close();
            $pdo = null;
        }
        //Crear nuevo Usuario
        public static function CrearUsuarioM($tablaBD,$datos){
            $pdo = Conexion::conexionBD() -> prepare("INSERT INTO $tablaBD (userID, contrasena, nombre, apellidos, correo, tipoUsuario, moduloID_FK)
            VALUES(:userID, :contrasena, :nombre, :apellidos, :correo, :tipoUsuario, :moduloID_FK)");
            $pdo -> bindParam(":userID", $datos["userID"], PDO::PARAM_STR);
            $pdo -> bindParam(":contrasena", $datos["contrasena"], PDO::PARAM_STR);
            $pdo -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $pdo -> bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
            $pdo -> bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
            $pdo -> bindParam(":tipoUsuario", $datos["tipoUsuario"], PDO::PARAM_STR);
            $pdo -> bindParam(":moduloID_FK", $datos["moduloID_FK"], PDO::PARAM_INT);
            if($pdo -> execute()){
                return true;     
            }
            $pdo -> close();
            $pdo = null;
        }
        //Mostrar Usuarios
        public static function MostrarUsuariosM($tablaBD, $columna, $valor){
            if($columna != null){
                $pdo = Conexion::conexionBD() -> prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
                $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);
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
        //Actualizar Datos Usuario
        public static function ActualizarUsuariosM($tablaBD,$datos){
            $pdo = Conexion::conexionBD() -> prepare("UPDATE $tablaBD 
            SET nombre = :nombre, apellidos = :apellidos, correo = :correo, tipoUsuario = :tipoUsuario, moduloID_FK = :moduloID_FK 
            WHERE userID = :userID");
            $pdo -> bindParam(":userID", $datos["userID"], PDO::PARAM_STR);
            $pdo -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $pdo -> bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
            $pdo -> bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
            $pdo -> bindParam(":tipoUsuario", $datos["tipoUsuario"], PDO::PARAM_STR);
            $pdo -> bindParam(":moduloID_FK", $datos["moduloID_FK"], PDO::PARAM_INT);
            if($pdo -> execute()){
                return true;    
            }
            $pdo -> close();
            $pdo = null;
        }
        //Eliminar Usuario
        public static function EliminarUsuariosM($tablaBD,$id){
            $pdo = Conexion::conexionBD() -> prepare ("DELETE FROM $tablaBD WHERE userID = :userID");
            $pdo -> bindParam(":userID", $id, PDO::PARAM_STR);
            if($pdo -> execute()){
                return true;    
            }
            $pdo -> close();
            $pdo = null;
        }
    }
?>