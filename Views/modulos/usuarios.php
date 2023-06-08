
<?php 
    if($_SESSION["tipoUsuario"] == "Alumno"){
        echo'<script>
                window.location = "inicio";
             </script>';
      return;
    }
?>
<div class="content">
    <section class="content-header">
       <h2>Gestor de Usuarios</h2>
       <hr> 
    </section>
    <section class= "content-box">
        <div class= box>
            <div class= box-header>
                <?php
                //Restringimos la accion de añadir solo para el administrador
                if($_SESSION["tipoUsuario"] == "Admin"){
                  echo'<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AnadirUsuario">Añadir Usuario</button>';  
                }
                ?> 
        </div>
        <br>
        <div class="box-body">
            <div class="col-md-8 col-xs-12">
                <table class="table table-bordered table-hover T">
                    <thead>
                        <tr>
                            <th>DNI Usuario</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Correo Electrónico</th>
                            <th>Estudios</th>
                            <th>Tipo de Usuario</th>
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
                            $result = UsuariosC::MostrarUsuariosC($columna, $valor);
                            foreach($result as $key => $value){
                                echo '<tr>
                                        <td>'.$value["userID"].'</td>
                                        <td>'.$value["nombre"].'</td>
                                        <td>'.$value["apellidos"].'</td>
                                        <td>'.$value["correo"].'</td>';
                                        //Si la columna Estudios no tiene datos muestra por defecto "Usuario Administrador".
                                        //En el registro va a ser un dato requerido
                                        if($value["moduloID_FK"]== null){
                                            echo '<td>Usuario Administrador</td>';
                                        }else{
                                        //Asociamos el valor del ID de los estudios para mostrar el nombre de los estudios correspondientes.
                                        $columnaEstudios = "moduloID";
                                        $valorEstudios = $value["moduloID_FK"];
                                        $estudios= EstudiosC::ListadoEstudiosC($columnaEstudios, $valorEstudios);
                                
                                         echo   '<td>'.$estudios["nombre"].'</td>';
                                        }
                                echo '<td>'.$value["tipoUsuario"].'</td>';
                                //Restringimos las acciones de editar/eliminar solo para el administrador
                                if($_SESSION["tipoUsuario"] == "Admin"){
                                    echo'<td>
                                            <div class="btn-group">
                                                <a href="#">
                                                    <button class="btn btn-success EditarUsuario" uID="'.$value["userID"].'" data-bs-toggle="modal" data-bs-target="#EditarUsuario"><i class="bx '.('bxs-edit').'"></i></button>     
                                                </a>
                                                <a href="#">
                                                    <button class="btn btn-danger EliminarUsuario" uID="'.$value["userID"].'"><i class="bx '.('bxs-trash').'"></i></button>    
                                                </a>                                
                                            </div>
                                        </td>
                                    </tr>';
                                }
                            }
                        ?> 
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div> 
<!--Modal para añadir usuarios-->
<div class="modal fade" id="AnadirUsuario">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Añadir Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <span>DNI:</span>
                            <input type="text" class="form-control" name="userIDU" required>
                        </div>
                        <div class="form-group">
                            <span>Contraseña:</span>
                            <input type="password" class="form-control" name="contrasenaU" required>
                        </div>
                        <div class="form-group">
                            <span>Nombre:</span>
                            <input type="text" class="form-control" name="nombreU" required>
                        </div>
                        <div class="form-group">
                            <span>Apellidos:</span>
                            <input type="text" class="form-control" name="apellidosU" required>
                        </div>
                        <div class="form-group">
                            <span>Correo Electrónico:</span>
                            <input type="text" class="form-control" name="correoU" id ="correoU" required>
                        </div>
                        <div class="form-group" >
                            <span>Estudios:</span>
                            <select class="form-select" name="moduloIDU">
                                <?php 
                                    $estudios = EstudiosC::MostrarEstudiosC();
                                    foreach ( $estudios as $key => $value ){
                                        echo '<option value="'.$value["moduloID"].'">'.$value["nombre"].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <span>Tipo Usuario:</span>
                            <select class="form-select" name="tipoUsuarioU" required>
                                <option value="Alumno">Alumno</option>
                                <option value="Admin">Administrador</option>
                                <option value="Profesor">Profesor</option>     
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" data-dismiss="modal">Añadir</button>
                    </div>
                </div>
                <?php 
                    $crearUsuario = new UsuariosC();
                    $crearUsuario -> CrearUsuarioC();
                ?>
            </form>
        </div>
    </div>
</div>

<!--Modal para editar usuarios-->
<div class="modal fade" id="EditarUsuario">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="userIDEU" id="userIDEU">
                        </div>
                        <div class="form-group">
                            <span>Nombre:</span>
                            <input type="text" class="form-control" name="nombreEU" id="nombreEU">
                        </div>
                        <div class="form-group">
                            <span>Apellidos:</span>
                            <input type="text" class="form-control" name="apellidosEU" id="apellidosEU">
                        </div>
                        <div class="form-group">
                            <span>Correo Electrónico:</span>
                            <input type="text" class="form-control" name="correoEU" id="correoEU">
                        </div>
                        <div class="form-group" >
                            <span id="tituloEstudios">Estudios:</span>
                            <select class="form-select" name="moduloEU" id="moduloEU">
                                <?php 
                                    $estudios = EstudiosC::MostrarEstudiosC();
                                    foreach ( $estudios as $key => $value ){
                                        echo '<option value="'.$value["moduloID"].'">'.$value["nombre"].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <span>Tipo Usuario:</span>
                            <select class="form-select" name="tipoUsuarioEU" id="tipoUsuarioEU">
                                <option value="Alumno">Alumno</option>
                                <option value="Admin">Administrador</option>
                                <option value="Profesor">Profesor</option>                   
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" data-dismiss="modal">Guardar Cambios</button>
                    </div>
                </div>
                <?php 
                    $actualizarUsuario = new UsuariosC();
                    $actualizarUsuario -> ActualizarUsuarioC();
                ?>
            </form>
        </div>
    </div>
</div>
<!--Eliminar Usuario -->
<?php 
    $eliminarUsuario = new UsuariosC();
    $eliminarUsuario -> EliminarUsuarioC();
?>