<?php 
    
    class EventosC{
        
        //Mostrar eventos y lo almacenamos en un array en formato JSON
        public function MostrarEventoC(){
        
            $tablaBD = "eventos";
            $datos = array();
            $result = EventosM::MostrarEventoM($tablaBD);
            foreach($result as $fila){
                $datos[]= array("id" => $fila["eventoID"], 
                                "title" => $fila["titulo"],
                                "start" => $fila["fInicio"],
                                "end" => $fila["fFin"],
                                "descripcion" => $fila["descripcion"],
                                "autor" => $fila["autor"]);
            }
            echo json_encode($datos);     
        }
        //Crear Evento
        public function crearEventoC(){
            if(isset($_POST["titulo"])){
                $tablaBD = "eventos";
                $datos = array("titulo" => $_POST["titulo"],
                               "fInicio" => $_POST["fInicio"],
                               "fFin" => $_POST["fFin"],
                               "descripcion" => $_POST["descripcion"],
                               "autor" => $_POST["autor"]);
                $result = EventosM::crearEventoM($tablaBD,$datos);
                echo json_encode($result);
            }
        }
        //editar Evento
        public function editarEventoC(){
            if(isset($_POST["eventoID"])){
                $tablaBD = "eventos";
                $datos = array("eventoID" => $_POST["eventoID"],
                               "titulo" => $_POST["titulo"],
                               "fInicio" => $_POST["fInicio"],
                               "fFin" => $_POST["fFin"],
                               "descripcion" => $_POST["descripcion"]);
                $result = EventosM::editarEventoM($tablaBD,$datos);  
                echo json_encode($result);              
            }
        }
        //eliminar Evento
        public function eliminarEventoC(){
            if(isset($_POST["eventoID"])){

                $tablaBD = "eventos";
                $id = $_POST["eventoID"];
                $result = EventosM::eliminarEventoM($tablaBD,$id); 
                echo json_encode($result);                
            }
        }    
    }
?>
<?php

require_once '../Models/eventosM.php';
//Switch para llamar a las funciones desde AJAX
    if(isset($_GET["accion"])){
        switch($_GET['accion']){
             
             case "listar":
                 $datos = new EventosC();
                 $datos -> MostrarEventoC();  
             break;
             case "insertar":
                 $datos = new EventosC();
                 $datos -> crearEventoC();
             break;
             case "editar":
                 $datos = new EventosC();
                 $datos -> editarEventoC();
             break;
             case "eliminar":
                 $datos = new EventosC();
                 $datos -> eliminarEventoC();
             break;
         }
     }
    
?>