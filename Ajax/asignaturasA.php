<?php

require_once ('../Controllers/asignaturasC.php');
require_once ('../Models/asignaturasM.php');

class AsignaturasA{
    //Editar Asignaturas
    public $aID;
    public $mID;
    
    public function EditarAsignaturasA(){

        $columna = "asignaturaID";
        $valor = $this->aID;
        

        $result= AsignaturaC::MostrarAsignaturasC($columna, $valor);

        echo json_encode($result);
    }
    

}

if(isset($_POST["aID"])){

    $editarAsignatura = new AsignaturasA();
    $editarAsignatura -> aID = $_POST["aID"];
    $editarAsignatura -> mID = $_POST["mID"];
    $editarAsignatura -> EditarAsignaturasA();
}


?>