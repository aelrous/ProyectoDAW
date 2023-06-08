<?php

    class EstudiosC{

        //Crear Estudios
        public function CrearEstudiosC(){
            if(isset($_POST["modulo"])) {
                $tablaBD = "modulos";
                $datos = $_POST["modulo"];
                $result = EstudiosM::CrearEstudiosM($tablaBD, $datos);
                if($result == true) {
                    echo '<script>
                            window.location = "/ProyectoCampus/estudios";
                          </script>';
                }
            }
        }
        //Mostrar datos de Estudios Administrador
        public static function MostrarEstudiosC(){

            $tablaBD = "modulos";
            $result = EstudiosM::MostrarEstudiosM($tablaBD);
            return $result;
        }
        //Mostrar datos de Estudios Alumnos/profesores
        public static function MostrarEstudiosUserC($columna, $valor){

            $tablaBD = "modulos";
            $result = EstudiosM::MostrarEstudiosUserM($tablaBD,$columna, $valor);
            return $result;
        }
        //Editar nombre de Estudios
        public function EditarEstudiosC(){

            $tablaBD = "modulos";
            $exp = explode("/", $_GET["url"]);
            $moduloID = $exp[1];
            $result = EstudiosM::EditarEstudiosM($tablaBD, $moduloID);
            echo '<div class="col-md-8 col-xs-12">             
                    <input type="text" name = "estudios" class = "form-control" value="'.$result["nombre"].'" required>  
                    <input type="hidden" name= "moduloID" value= "'.$result["moduloID"].'">
                    <br>
                    <a href= "/ProyectoCampus/estudios">
                        <button class="btn btn-success"><i class="bx '.('bx-left-arrow-alt').'"></i>Volver</button>    
                    </a>
                    <button type= "submit" class="btn btn-success">Guardar Cambios</button>        
                 </div>';
        }
        //Guardar Cambios para Estudios
        public function ActualizarEstudiosC(){
            if(isset($_POST["estudios"])){
                $tablaBD = "modulos";
                $datos= array("moduloID" =>$_POST["moduloID"], 
                              "estudios" =>$_POST["estudios"]);
                $result = EstudiosM::ActualizarEstudiosM($tablaBD,$datos);
                if($result == true){
                    echo '<script>
                            window.location = "/ProyectoCampus/estudios";
                          </script>';
                }
            }
        }
        //Eliminar Estudios
        public function EliminarEstudiosC(){
            if(isset($_GET["mID"])){
                $tablaBD = "modulos";
                $moduloID = $_GET["mID"];
                $result= EstudiosM::EliminarEstudiosM($tablaBD, $moduloID);
                if($result== true){
                    echo '<script>
                            window.location = "/ProyectoCampus/estudios";
                          </script>';
                }
            }  
        }
        //Mostrar Estudios desde el Gestor de Usuarios
        public static function ListadoEstudiosC($columna, $valor){
            
            $tablaBD = "modulos";
            $result = EstudiosM::ListadoEstudiosM($tablaBD, $columna, $valor);
            return $result;
        }
    }
?>