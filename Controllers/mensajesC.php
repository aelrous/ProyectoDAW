<?php 

    class MensajesC{
        //Enviar Mensajes
        public function enviarMensajeC(){
            if(isset($_POST["enviar"])){
                $tablaBD = "mensajes";
                $datos= array("titulo"=>$_POST["titulo"],
                            "mensaje"=>$_POST["mensaje"],
                            "remitente"=>$_POST["remitente"],
                            "destinatario"=>$_POST["destinatario"]);
                $result = MensajesM::enviarMensajeM($tablaBD,$datos);
                if($result){
                    echo '<script>
                            window.location = "/ProyectoCampus/mensajes";
                          </script>';
                }
            }
        }
        //Mostar listado de mensajes
        public static function mostrarMensajesC(){

            $tablaBD = "mensajes";
            $usuario = $_SESSION["userID"];
            $result = MensajesM::mostrarMensajesM($tablaBD,$usuario);
            return $result;
        }
        //Eliminar Mensajes
        public function eliminarMensajeC(){  
            if(isset($_GET["mensajeID"])){
                $tablaBD = "mensajes";
                $mensajeID = $_GET["mensajeID"];
                $result = MensajesM::eliminarMensajeM($tablaBD,$mensajeID);
                if($result== true){
                    echo '<script>
                            window.location = "/ProyectoCampus/mensajes";
                        </script>';
                }
            }  
        }
        //Ver el contenido del mensaje
        public static function verMensajeC($columna, $valor){

            $tablaBD= "mensajes";
            $result = MensajesM::verMensajeM($tablaBD, $columna, $valor);
            return $result;
        }
        //Mensaje Leido
        public function mensajeLeidoC(){
            
            $exp = explode("/", $_GET["url"]);
            $tablaBD = "mensajes";
            $id = $exp[1];
            $result = MensajesM::mensajeLeidoM($tablaBD, $id);
            return $result;
        }
    }
?>