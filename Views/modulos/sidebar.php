<nav class="sidebar">
            <div class= header>
                <div class="image-text">
                    <span class="menu-header icon">
                        <i class='bx bx-menu'></i>
                    </span>
                    <div class ="text header-text">
                        <span class="name">Mi Campus</span>
                    </div>
                </div>
            </div>

            <div class="menu-bar">
                <div class="menu">

                    <li class="nav-link">
                        <a href="/ProyectoCampus/inicio">
                            <i class='bx bx-home icon'></i>
                            <span class="text nav-text">Inicio</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="/ProyectoCampus/perfil">
                            <i class='bx bx-user icon'></i>
                            <span class="text nav-text">Perfil</span>
                        </a>
                    </li>
                    <?php   
                    if($_SESSION["tipoUsuario"] != "Alumno"){
                echo'<li class="nav-link">
                        <a href="/ProyectoCampus/usuarios">
                            <i class="bx '.('bxs-user icon').'"></i>
                            <span class="text nav-text">Usuarios</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="/ProyectoCampus/estudios">
                            <i class="bx '.('bxs-book icon').'"></i>
                            <span class="text nav-text">Estudios</span>
                        </a>      
                    </li>';
                    } 
                    ?>
                    <li class="nav-link">
                        <a href="/ProyectoCampus/asignaturas">
                            <i class='bx bx-book icon'></i>
                            <span class="text nav-text">Asignaturas</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="/ProyectoCampus/mensajes">
                            <i class='bx bx-envelope icon'></i>
                            <span class="text nav-text">Mensajes</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="/ProyectoCampus/calendario">
                            <i class='bx bx-calendar icon'></i>
                            <span class="text nav-text">Calendario</span>
                        </a>
                    </li>
                    <li class="nav-link">
                    <?php
                        if($_SESSION["tipoUsuario"] == "Alumno"){
                        echo'<a href="/ProyectoCampus/expedienteAlumno/'.$_SESSION["userID"].'">
                            <i class="bx '.('bx-trophy icon').'"></i>
                            <span class="text nav-text">Expediente</span>
                        </a>';
                        }
                    ?>
                    </li>  
                </div>
                <div class="bottom-content">
                    <li class="">
                        <a href="/ProyectoCampus/cerrarSesion">
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