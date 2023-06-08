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
            $columna = "moduloID";
            $valor = $exp[1];
            $estudios= EstudiosC::ListadoEstudiosC($columna, $valor);
            echo'<h2>Gestor de Asignaturas de: '.$estudios["nombre"].'</h2>';
        ?>  
        <hr>      
    </section>   
    <section class= "content-box">
        <div class= box>
            <div class="box-header">
                <?php
                if($_SESSION["tipoUsuario"] == "Admin"){
                    echo'<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#anadirAsignatura">Añadir Asignatura</button>';
                }
                ?>
                <a href= "../estudios">
                    <button class="btn btn-success"><i class='bx bx-left-arrow-alt'></i>Volver</button>    
                </a>    
            </div>
            <br>
            <div class="box-body">
                <div class="col-md-8 col-xs-12">
                    <table class="table table-bordered table-hover T">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Curso</th>
                                <th>Semestre</th>
                                <?php
                                if($_SESSION["tipoUsuario"] == "Admin"){
                                    echo'<th>Acciones</th>';
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $columna= null;
                            $valor= null; 
                            $result = AsignaturaC::MostrarAsignaturasC($columna, $valor);
                            foreach($result as $key => $value){

                                if($value["moduloID_FK"]== $exp[1]){
                                    
                                    echo '<tr>
                                        <td>'.$value["asignaturaID"].'</td>
                                        <td>'.$value["nombre"].'</td>
                                        <td>'.$value["curso"].'</td>
                                        <td>'.$value["semestre"].'</td>';
                                        if($_SESSION["tipoUsuario"] == "Admin"){
                                            echo'<td>
                                                    <div class="btn-group">                                               
                                                        <a href="#">
                                                        <button class="btn btn-success EditarAsignatura" aID="'.$value["asignaturaID"].'" mID="'.$value["moduloID_FK"].'" data-bs-toggle="modal" data-bs-target="#editarAsignatura""><i class="bx '.('bxs-edit').'"></i></button>    
                                                        </a> 
                                                        <a href="#">
                                                        <button class="btn btn-danger EliminarAsignatura" aID="'.$value["asignaturaID"].'"mID="'.$value["moduloID_FK"].'"><i class="bx '.('bx-trash').'"></i></button>    
                                                        </a>                              
                                                    </div>
                                                </td>';
                                        }
                                        
                                    echo'</tr> ';
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

<!--Eliminar asignaturas -->
<?php
    $eliminarAsignatura = new AsignaturaC();
    $eliminarAsignatura -> EliminarAsignaturaC();
?>

<!--Modal añadir asignaturas-->
<div class="modal fade" id="anadirAsignatura">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Añadir Asignatura</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <?php
                            echo '<input type="hidden" class="form-control" name="moduloID_FKA" value = "'.$exp[1].'">';
                            ?>     
                        </div>
                        
                        <div class="form-group">
                            <span>Nombre:</span>
                            <input type="text" class="form-control" name="nombreA" required>
                        </div>
                        <div class="form-group">
                            <span>Curso:</span>
                            <select class="form-select" name="cursoA" required>
                                <option value="1C">1º Curso</option>
                                <option value="2C">2º Curso</option>     
                            </select>
                        </div>
                        <div class="form-group">
                            <span>Semestre:</span>
                            <select class="form-select" name="semestreA" required>
                                <option value="Anual">Anual</option>
                                <option value="1S">1º Semestre</option>
                                <option value="2S">2º Semestre</option>     
                            </select>
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" data-dismiss="modal">Añadir</button>
                    </div>
                </div>
                <?php
                    $crearAsignaturas= new AsignaturaC();
                    $crearAsignaturas -> anadirAsignaturaC();  
                ?>               
            </form>
        </div>
    </div>
</div>

<!--Modal editar asignaturas-->
<div class="modal fade" id="editarAsignatura">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Asignatura</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <?php
                            echo '<input type="hidden" class="form-control" name="moduloID_FKedit" value = "'.$exp[1].'">';
                            ?>     
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="asignaturaIDedit" id="asignaturaIDedit">
                        </div>
                        
                        <div class="form-group">
                            <span>Nombre:</span>
                            <input type="text" class="form-control" name="nombreEdit" id= "nombreEdit">
                        </div>
                        <div class="form-group">
                            <span>Curso:</span>
                            <select class="form-select" name="cursoEdit" id= "cursoEdit">
                                <option value="1C">1º Curso</option>
                                <option value="2C">2º Curso</option>     
                            </select>
                        </div>
                        <div class="form-group">
                            <span>Semestre:</span>
                            <select class="form-select" name="semestreEdit" id= "semestreEdit">
                                <option value="Anual">Anual</option>
                                <option value="1S">1º Semestre</option>
                                <option value="2S">2º Semestre</option>     
                            </select>
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" data-dismiss="modal">Guardar Cambios</button>
                    </div>
                </div>
                <?php
                    $editarAsignaturas= new AsignaturaC();
                    $editarAsignaturas -> editarAsignaturaC();               
                ?>  
            </form>
        </div>
    </div>
</div>

