<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Boxicons-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="Views/CSS/style.css">

    <title>Campus Virtual</title>
</head>
<body>
    <div class="main-container d-flex">
        <nav class="sidebar close">
            <header>
                <div class="image-text">
                    <span class="menu-icon">
                        <i class='bx bx-menu'></i>
                    </span>
                    <div class ="text header-text">
                        <span class="name">Mi Campus</span>
                    </div>
                </div>
            </header>

            <div class="menu-bar">
                <div class="menu">
               
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-user icon'></i>
                            <span class="text nav-text">Perfil</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-book icon'></i>
                            <span class="text nav-text">Asignaturas</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-envelope icon'></i>
                            <span class="text nav-text">Mensajes</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-calendar icon'></i>
                            <span class="text nav-text">Calendario</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-trophy icon'></i>
                            <span class="text nav-text">Expediente</span>
                        </a>
                    </li>  
                </div>
            
                <div class="bottom-content">
                    <li class="">
                        <a href="login.html">
                            <i class='bx bx-log-out icon'></i>
                            <span class="text nav-text">Cerrar Sesión</span>
                        </a>
                    </li>
                    <li class="modo">
                        <div class="oscuro-claro">
                            <i class='bx bx-moon icon moon'></i>
                            <i class='bx bx-sun icon sun'></i>
                        </div>
                        <span class="mode-text text">Modo Oscuro</span>
                        <div class="toggle-switch">
                            <span class="switch"></span>
                        </div>
                    </li>
                </div>
            </div>
        </nav>

        <div class="content">

        </div>
    </div>








    <!--Scripts-->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script type="text/javascript" src="Views/js/script.js"></script>
</body>
</html>