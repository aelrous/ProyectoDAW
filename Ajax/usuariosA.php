<?php

require_once ('../Controllers/usuariosC.php');
require_once ('../Models/usuariosM.php');

class UsuariosA{
    //Editar Usuarios
    public $uID;
    
    public function EditarUsuariosA(){

        $columna = "userID";
        $valor = $this->uID;

        $result= UsuariosC::MostrarUsuariosC($columna, $valor);

        echo json_encode($result);
    }
    

}

if(isset($_POST["uID"])){

    $editarUsuario = new UsuariosA();
    $editarUsuario -> uID = $_POST["uID"];
    $editarUsuario -> EditarUsuariosA();
}


?>