<?php 

    class RecursosC{

        ///ARCHIVOS///
        //Mostrar archivos
        public static function mostrarArchivosC($columna,$valor){
            $exp = explode("/", $_GET["url"]);
            $tablaBD = "archivos";
            $asignaturaID = $exp[1];
            $result = RecursosM::mostrarArchivosM($tablaBD,$asignaturaID,$columna,$valor);
            return $result;
        }
        //Subir archivos
        public function subirArchivosC(){
            //variables para tomar el id de la asignatura por URL
            $exp = explode("/", $_GET["url"]);
            $aID = $exp[1];
            //Comprobamos si pulsamos "submit"
            if(isset($_POST["submit"])){ 
                //variable con la ruta y nombre del archivo destino
                $file = "Views/resources/".$_FILES['archivo']['name'];
                //verificamos para solo permitir archivos en PDF
                $verificaPdf = ['application/pdf'];
                if(!in_array($_FILES['archivo']['type'], $verificaPdf)){
                    echo '<script>
                    alert("Solo se permiten archivos PDF.");
                    </script>';
                    return;
                }
                //Movemos el archivo temporal a la ruta destino
                move_uploaded_file($_FILES['archivo']['tmp_name'],$file); 
                echo '<script>
                     alert("archivo subido");
                    </script>';
                //Subimos los datos a la base de datos
                $tablaBD = "archivos";
                $datos = array("nombre" => $_POST["nombre"], 
                               "size" => $_FILES['archivo']['size'], 
                               "tipo" => $_FILES['archivo']['type'], 
                               "archivo" => $_FILES['archivo']['name'],
                               "asignaturaID_FK" => $_POST["asignaturaID_FK"]);  
                $result = RecursosM::subirArchivosM($tablaBD,$datos);
                if($result==true){
                    echo'<script>
                            window.location = "/ProyectoCampus/contenidoAsignatura/'.$aID.'";
                          </script>';
                }
            }
        }
        //Eliminar archivos
        public function eliminarArchivosC(){
            if(isset($_GET["rID"])){
                //variables para tomar el id de la asignatura por URL
                $exp = explode("/", $_GET["url"]);
                $aID = $exp[1];

                $tablaBD = "archivos";
                $id = $_GET["rID"];
                $result = RecursosM::eliminarArchivosM($tablaBD,$id);
                if($result== true){
                    echo '<script>
                            window.location = "/ProyectoCampus/contenidoAsignatura/'.$aID.'";
                          </script>';
                }     
            }
        }
 
        ///ENLACES///
        //Mostrar enlaces
        public static function mostrarEnlacesC($columna,$valor){
            $exp = explode("/", $_GET["url"]);
            $tablaBD = "enlaces";
            $asignaturaID = $exp[1];
            $result = RecursosM::mostrarEnlacesM($tablaBD,$asignaturaID,$columna,$valor);
            return $result;
        }
        //Subir enlaces
        public function subirEnlacesC(){
            //variables para tomar el id de la asignatura por URL
            $exp = explode("/", $_GET["url"]);
            $aID = $exp[1];
            //Comprobamos si pulsamos "submit"
            if(isset($_POST["submitEnlace"])){ 
                //Subimos los datos a la base de datos
                $tablaBD = "enlaces";
                $datos = array("titulo" => $_POST["titulo"], 
                               "url" => $_POST["url"],
                               "asignaturaID_FK" => $_POST["asignaturaID_FK"]);    
                $result = RecursosM::subirEnlacesM($tablaBD,$datos);
                if($result==true){
                    echo'<script>
                            window.location = "/ProyectoCampus/contenidoAsignatura/'.$aID.'";
                          </script>';
                }
            }
        }
        //Eliminar enlaces
        public function eliminarEnlacesC(){
            if(isset($_GET["eID"])){
                //variables para tomar el id de la asignatura por URL
                $exp = explode("/", $_GET["url"]);
                $aID = $exp[1];

                $tablaBD = "enlaces";
                $id = $_GET["eID"];
                $result = RecursosM::eliminarEnlacesM($tablaBD,$id);
                if($result== true){
                    echo '<script>
                            window.location = "/ProyectoCampus/contenidoAsignatura/'.$aID.'";
                          </script>';
                }    
            }
        }
    }
?>