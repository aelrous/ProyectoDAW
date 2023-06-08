
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
       <h2>Gestor de Estudios</h2>
       <hr> 
    </section>
    <section class= "content-box">
        <div class= box>
            <div class="box-header">
                <form method = post>
                    <div class="col-md-6 col-xs-12">
                        <?php
                        if($_SESSION["tipoUsuario"] == "Admin"){
                            echo'<div class="input-group mb-3">
                            <input type="text" name = "modulo" class = "form-control" placeholder="Ingresar Estudio" required>
                            <button type= "submit" class="btn btn-success"><i class="bx '.('bx-plus').'"></i></button>      
                            </div>';
                        }
                        ?>           
                    </div>
                </form>
                <?php                   
                    $estudios = new EstudiosC();
                    $estudios -> CrearEstudiosC();
                ?>
            </div>
            <br>
            <div class="box-body">
                <div class="col-md-6 col-xs-12">
                    <table class="table table-bordered table-hover T">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $result = EstudiosC::MostrarEstudiosC();
                                foreach($result as $key => $value){
                                echo '<tr>
                                        <td>'.$value["moduloID"].'</td>
                                        <td>'.$value["nombre"].'</td>
                                        <td>
                                            <div class="btn-group">';
                                            //Restringimos las acciones de editar/eliminar solo para el administrador
                                            if($_SESSION["tipoUsuario"] == "Admin"){
                                            echo'<a href= "editarEstudios/'.$value["moduloID"].'">
                                                    <button class="btn btn-success"><i class="bx '.('bxs-edit').'"></i></button>    
                                                </a>
                                                <a href= "#">
                                                    <button class="btn btn-danger EliminarEstudios" mID= "'.$value["moduloID"].'"><i class="bx '.('bx-trash').'"></i></button>    
                                                </a>';
                                            }                                               
                                            echo'<a href= "anadirAsignaturas/'.$value["moduloID"].'">
                                                    <button class="btn btn-success">Asignaturas</button>    
                                                </a>
                                                <a href= "estudiantes/'.$value["moduloID"].'">
                                                    <button class="btn btn-success">Estudiantes</button>    
                                                </a>
                                            </div>
                
                                        </td>
                                    </tr>';
                                }        
                            ?>                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div> 
<!--Eliminar Modulos-->
<?php 
    $eliminarEstudios = new EstudiosC();
    $eliminarEstudios -> EliminarEstudiosC();
?>