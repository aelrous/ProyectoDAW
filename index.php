<?php 
    //Plantilla
    require_once "Controllers/templateC.php";
    //Usuarios
    require_once "Controllers/usuariosC.php";
    require_once "Models/usuariosM.php";
    //Estudios
    require_once "Controllers/estudiosC.php";
    require_once "Models/estudiosM.php";
    //Asignaturas
    require_once "Controllers/asignaturasC.php";
    require_once "Models/asignaturasM.php";
    //Mensajes
    require_once "Controllers/mensajesC.php";
    require_once "Models/mensajesM.php";
    //Expediente
    require_once "Controllers/expedienteC.php";
    require_once "Models/expedienteM.php";
    //Recursos
    require_once "Controllers/recursosC.php";
    require_once "Models/recursosM.php";

   
    $template = new Template();
    $template -> LlamarTemplate();

?>
