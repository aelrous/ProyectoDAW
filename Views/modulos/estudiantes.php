<?php 
   if($_SESSION["tipoUsuario"] == "Alumno"){

    echo'<script>
            window.location = "/ProyectoCampus/inicio";
         </script>';

  return;
}                             

?>   
<div class="content">
    <section class="content-header">
        <?php
            $exp = explode("/", $_GET["url"]);
            $columnaEstudios = "moduloID";
            $valorEstudios = $exp[1];
            $estudios= EstudiosC::ListadoEstudiosC($columnaEstudios, $valorEstudios);
            echo'<h2>Estudiantes de: '.$estudios["nombre"].'</h2>';
        ?>
        <hr> 
        <a href= "/ProyectoCampus/estudios">
            <button class="btn btn-success"><i class='bx bx-left-arrow-alt'></i>Volver</button>    
        </a>
    </section>
    <section class= "content-box">
        <div class= box>
            <div class="box-body">                   
                <div class="col-md-6 col-xs-12">
                    <table class= "table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>DNI</th>
                                <th>Alumno</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $columna= null;
                                $valor= null;
                                $result = UsuariosC::MostrarUsuariosC($columna, $valor);
                                foreach($result as $key => $value){
                                    //Muestra la lista de usuarios "alumnos" que cursan el modulo específico
                                    if($value["tipoUsuario"]=="Alumno" && $value["moduloID_FK"]== $exp[1]){
                                        echo'<tr>
                                            <td>'.$value["userID"].'</td>
                                            <td>'.$value["apellidos"].', '.$value["nombre"].'</td>
                                            <td>
                                                <a href="/ProyectoCampus/expediente/'.$value["moduloID_FK"].'/'.$value["userID"].'">
                                                    <button class="btn btn-success">Expediente</button>
                                                </a>
                                            </td>     
                                         </tr>';
                                    }                                   
                                }
                            ?>                               
                        </tbody>
                    </table>
                </div>      
            </div>
        </div>
    </section>
</div>