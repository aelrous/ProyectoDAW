<?php

    class AsignaturaC{

        //Añadir asignaturas a los Modulos
        public function anadirAsignaturaC(){
            if(isset($_POST["moduloID_FKA"])){
                $tablaBD = "asignaturas";
                $moduloID_FK = $_POST["moduloID_FKA"];
                $datos= array("nombre"=>$_POST["nombreA"],
                              "curso"=>$_POST["cursoA"],
                              "semestre"=>$_POST["semestreA"], 
                              "moduloID_FK"=>$_POST["moduloID_FKA"]);  
                $result = AsignaturaM::anadirAsignaturaM($tablaBD,$datos);
                if($result==true){
                    echo '<script>
                            window.location = "/ProyectoCampus/anadirAsignaturas/'.$moduloID_FK.'";
                          </script>';
                }                 
            }
        }
        //Mostrar asignaturas según módulo
        public static function MostrarAsignaturasC($columna, $valor){

            $tablaBD = "asignaturas";
            $result = AsignaturaM::MostrarAsignaturasM($tablaBD, $columna, $valor);
            return $result;
        }
         //Mostrar asignaturas según Usuario
        public static function MostrarAsignaturasUserC($columna, $valor){

            $tablaBD = "asignaturas";
            $result = AsignaturaM::MostrarAsignaturasUserM($tablaBD, $columna, $valor);
            return $result;
        }
        //Eliminar asignaturas
        public function EliminarAsignaturaC(){
            if(isset($_GET["aID"])){
                $tablaBD = "asignaturas";
                $id = $_GET["aID"]; 
                $mID= $_GET["mID"];
                $result = AsignaturaM::EliminarAsignaturaM($tablaBD,$id);
                if($result== true){
                    echo '<script>
                            window.location = "/ProyectoCampus/anadirAsignaturas/'.$mID.'";
                          </script>';
                }
            }
        }
        //Editar Asignaturas
        public function editarAsignaturaC(){
            if(isset($_POST["asignaturaIDedit"])){
                $tablaBD = "asignaturas";
                $datos = array("asignaturaID" => $_POST["asignaturaIDedit"], 
                               "nombre" => $_POST["nombreEdit"], 
                               "curso" => $_POST["cursoEdit"], 
                               "semestre" => $_POST["semestreEdit"]);
                $moduloID_FK = $_POST["moduloID_FKedit"];
                $result = AsignaturaM::EditarAsignaturaM($tablaBD,$datos);
                if($result== true){
                    echo '<script>
                            window.location = "/ProyectoCampus/anadirAsignaturas/'.$moduloID_FK.'";
                          </script>';
                }
            }
        }
    }
?>