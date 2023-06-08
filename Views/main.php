<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="campus virtual, estudios en linea, formacion online, formacion a distancia">
    <!--Bootstrap5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Boxicons-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!--FullCalendar-->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/moment@2.27.0/min/moment.min.js'></script>
    <!--FullCalendar en Español-->
    <script type="text/javascript" src="/ProyectoCampus/Views/js/es.global.js"></script> 
    <!-- hoja de estilos CSS-->
    <link rel="stylesheet" href="/ProyectoCampus/Views/CSS/style.css"> 
    <title>Campus Virtual</title>
</head>
<body> 
    <?php
        if(isset($_SESSION["IniciarSesion"]) && $_SESSION["IniciarSesion"] == true){
 
            include "Views/modulos/sidebar.php";
            
            $url = array();
            if(isset($_GET["url"])){
                $url = explode("/", $_GET["url"]); //para separar con "/" lo que viene en la variable url
                
                if($url[0]=="inicio" || $url[0]=="cerrarSesion" || $url[0]=="perfil"|| $url[0]=="usuarios" || $url[0]=="estudios" || 
                $url[0]=="editarEstudios"|| $url[0]=="asignaturas" || $url[0]=="calendario" || $url[0]=="expediente" || $url[0]=="mensajes" ||
                $url[0]=="estudiantes"|| $url[0]=="anadirAsignaturas" || $url[0]=="contenidoAsignatura" || $url[0]=="mostrarMensaje" || $url[0]=="expedienteAlumno"|| 
                $url[0]=="mostrarArchivo"){
                    
                    include "modulos/".$url[0].".php";
                }
            }else{
                include "modulos/inicio.php";
            }
            
        }else if(isset($_GET["url"])){
            if($_GET["url"]== "login"){
                include "modulos/login.php";
            }
            if($_GET["url"]== "registro"){
                include "modulos/registro.php";
            }
        }else{
            include "modulos/login.php";
            
        }
        
    ?> 

    <!--Scripts-->
    <!--Bootstrap5-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> 
    <!--JQuery--> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!--Scripts propios-->
    <script type="text/javascript" src="/ProyectoCampus/Views/js/script.js"></script>
    
</body>
</html>