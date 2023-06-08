<?php

    class ExpedienteC{

        //Mostar notas
        public static function MostrarExpedienteC($columna, $valor){
            $tablaBD = "notas";
            $result = ExpedienteM::MostrarExpedienteM($tablaBD, $columna, $valor);
            return $result;
        }
        //Mostar notas expediente Alumno
        public static function MostrarExpedienteAlumnoC($columna, $valor, $usuario){
            $tablaBD = "notas";
            $result = ExpedienteM::MostrarExpedienteAlumnoM($tablaBD, $columna, $valor, $usuario);
            return $result;
        }
        //Añadir notas 
        public function anadirNotaC(){
            if(isset($_POST["nota"])){  
                $tablaBD = "notas";
                $exp = explode("/", $_GET["url"]);
                $moduloID = $exp[1];
                $userID = $exp[2];
                $datos = array("alumnoID_FK" => $userID,
                               "asignaturaID_FK"=> $_POST["asignaturaID_FK"],
                               "nota"=> $_POST["nota"]);
                $result = ExpedienteM::anadirNotaM($tablaBD,$datos);
                if($result==true){
                    echo '<script>
                            window.location = "/ProyectoCampus/expediente/'.$moduloID.'/'.$userID.'";
                          </script>';
                }
            }
        }
        //Editar notas
        public function editarNotaC(){
            if(isset($_POST["asignaturaID_FK_editar"])){  
                $tablaBD = "notas";
                $exp = explode("/", $_GET["url"]);
                $moduloID = $exp[1];
                $userID = $exp[2];
                $datos = array("asignaturaID_FK"=> $_POST["asignaturaID_FK_editar"],
                               "nota"=> $_POST["nota_editar"]);
                $result = ExpedienteM::editarNotaM($tablaBD,$datos);
                if($result==true){
                    echo '<script>
                            window.location = "/ProyectoCampus/expediente/'.$moduloID.'/'.$userID.'";
                          </script>';
                }
            }
        }
    }
?>