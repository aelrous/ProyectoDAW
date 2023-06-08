<?php 

    class UsuariosC{
        //Iniciar Sesion
        public function IniciarSesionC(){
            if(isset($_POST['correo'])){

                $tablaBD = "usuario";
                $datos = $_POST["correo"];
                               
                $result = UsuariosM::IniciarSesionM($tablaBD, $datos);

                if($result["correo"] == $_POST["correo"] && password_verify($_POST["contrasena"],$result["contrasena"])){
                    $_SESSION["IniciarSesion"] = true;
                    $_SESSION["tipoUsuario"] = $result ["tipoUsuario"];
                    $_SESSION["userID"] = $result ["userID"];
                    $_SESSION["nombre"] = $result ["nombre"];
                    $_SESSION["apellidos"] = $result ["apellidos"];
                    $_SESSION["correo"] = $result ["correo"];
                    $_SESSION["contrasena"] = $result ["contrasena"];
                    $_SESSION["moduloID_FK"] = $result ["moduloID_FK"];
                    echo '<script>
                            window.location = "../ProyectoCampus/inicio";
                          </script>';
                }else{
                    echo'El correo o la contraseña con incorrectos';
                }
            }
        }
        //Registrar usuario
        public function RegistrarUsuarioC(){
            if(isset($_POST["userID"])){
                //Encriptamos la contraseña mediante la funcion de PHP password_hash
                $pass = $_POST["contrasena"];
                $hash = password_hash($pass, PASSWORD_DEFAULT);
                $tablaBD = "usuario";
                $datos = array("userID" => $_POST["userID"], 
                               "contrasena"=> $hash,
                               "nombre" => $_POST["nombre"], 
                               "apellidos" => $_POST["apellidos"], 
                               "correo" => $_POST["correo"],
                               "moduloID_FK" => $_POST["moduloID"],
                               "tipoUsuario" => $_POST["tipoUsuario"]);
                $result = UsuariosM::RegistrarUsuarioM($tablaBD,$datos); 

                if($result == true){
                    echo '<script>
                            window.location = "/ProyectoCampus/login";
                          </script>';
                }
            }
        }
        //Mostrar datos usuario
        public function MostrarDatosC(){
            $tablaBD = "usuario";
            $userID = $_SESSION["userID"];
            $result = UsuariosM::MostrarDatosM($tablaBD, $userID);

            echo '<form method=post>
                    <div class= row>
                        <div class="col-md-6 col-xs-12">
                            <input type="hidden" class="form-control" name="userID" value="'.$result["userID"].'">

                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" value="'.$result["nombre"].'">
                            
                            <label for="apellido">Apellidos:</label>
                            <input type="text" class="form-control" name="apellidos" value="'.$result["apellidos"].'">
                            
                            <label for="correo">Correo Electrónico</label>
                            <input type="email" class="form-control" name="correo" value="'.$result["correo"].'">
                            
                            <label for="contrasena">Nueva Contraseña</label>
                            <input type="text" class="form-control" name="contrasena">
                            <br>
                            <button type= "submit" class="btn btn-success">Guardar Cambios</button>
                        </div>
                    </div>
                </form>';
        }
        //Actualizar datos usuario
        public function ActualizarDatosC(){
            if(isset($_POST['userID'])){
                //Encriptamos la contraseña mediante la funcion de PHP password_hash
                $pass = $_POST["contrasena"];
                $hash = password_hash($pass, PASSWORD_DEFAULT);
                $tablaBD = "usuario";
                $datos = array( "userID" => $_POST["userID"], 
                                "nombre"=> $_POST["nombre"], 
                                "apellidos"=> $_POST["apellidos"],
                                "correo"=> $_POST["correo"],
                                "contrasena"=> $hash); 
                $result = UsuariosM::ActualizarDatosM($tablaBD, $datos);
                if($result == true){

                    echo '<script>
                            window.location = "/ProyectoCampus/perfil";
                          </script>';   
                }
            }
        }
        //Crear nuevo Usuario
        public function CrearUsuarioC(){
            if(isset($_POST["userIDU"])){
                //Encriptamos la contraseña mediante la funcion de PHP password_hash
                $pass = $_POST["contrasena"];
                $hash = password_hash($pass, PASSWORD_DEFAULT);
                $tablaBD = "usuario";
                $datos = array("userID" => $_POST["userIDU"], 
                               "contrasena"=> $hash,
                               "nombre" => $_POST["nombreU"], 
                               "apellidos" => $_POST["apellidosU"], 
                               "correo" => $_POST["correoU"],
                               "moduloID_FK" => $_POST["moduloIDU"],
                               "tipoUsuario" => $_POST["tipoUsuarioU"]);
                $result = UsuariosM::CrearUsuarioM($tablaBD,$datos); 
                if($result== true){
                    echo '<script>
                            window.location = "/ProyectoCampus/usuarios";
                          </script>';
                }
            }
        }
        //Mostrar Usuarios
        public static function MostrarUsuariosC($columna, $valor){

            $tablaBD = "usuario";
            $result = UsuariosM::MostrarUsuariosM($tablaBD, $columna, $valor);
            return $result;
        }
        //Actualizar Datos Usuario
        public function ActualizarUsuarioC(){
            if(isset($_POST["userIDEU"])){

                $tablaBD = "usuario";
                $datos = array("userID" => $_POST["userIDEU"], 
                              "nombre" => $_POST["nombreEU"], 
                              "apellidos" => $_POST["apellidosEU"], 
                              "correo" => $_POST["correoEU"],
                              "moduloID_FK" => $_POST["moduloEU"],
                              "tipoUsuario" => $_POST["tipoUsuarioEU"]);
                $result = UsuariosM::ActualizarUsuariosM($tablaBD,$datos);
                if($result== true){
                    echo '<script>
                            window.location = "/ProyectoCampus/usuarios";
                          </script>';
                }
            }
        }
        //Eliminar Usuario
        public function EliminarUsuarioC(){
            if(isset($_GET["uID"])){

                $tablaBD = "usuario";
                $id = $_GET["uID"];
                $result = UsuariosM::EliminarUsuariosM($tablaBD,$id);
                if($result== true){
                    echo '<script>
                            window.location = "/ProyectoCampus/usuarios";
                          </script>';
                }
            }
        }
    }

?>