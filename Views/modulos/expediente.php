<div class="content">
   <section class="content-header">
      <div class="text">
         <?php
         $exp = explode("/", $_GET["url"]);
         $columna = "userID";
         $valor = $exp[2];
         $usuario= UsuariosC::MostrarUsuariosC($columna, $valor);
         echo'<h2>Expediente Académico de: '.$usuario["nombre"].' '.$usuario["apellidos"].'</h2>
        <hr>
         <a href= "/ProyectoCampus/estudiantes/'.$exp[1].'">
            <button class="btn btn-success"><i class="bx '.('bx-left-arrow-alt').'"></i>Volver</button>    
        </a>';
        ?>
      </div>   
   </section>
   <section class="content-box">
      <div class= "box">
         <div class= "box-body">
            <div class="col-md-8 col-xs-12">
               <table class= "table table-bordered table-hover T">
                  <thead>
                     <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Curso</th>
                        <th>Semestre</th>
                        <th>Nota</th>
                        <th>Acción</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $columnaA = "moduloID_FK";
                        $valorA = $exp[1];
                        $asignaturas = AsignaturaC::MostrarAsignaturasUserC($columnaA,$valorA);
                        //Mostramos las asignaturas segun usuario
                        foreach ( $asignaturas as $key => $value ){
                            echo'<tr>
                                  <td>'.$value["asignaturaID"].'</td>
                                  <td>'.$value["nombre"].'</td>
                                  <td>'.$value["curso"].'</td>
                                  <td>'.$value["semestre"].'</td>';
                            $columna = "asignaturaID_FK";
                            $valor = $value["asignaturaID"];
                            $usuario = $exp[2];
                            $nota = ExpedienteC::MostrarExpedienteAlumnoC($columna, $valor, $usuario);
                            //Mostramos las notas, si hay registros mostrará el boton editar, si no exiten registros mostrará el boton añadir
                            if($nota->rowCount() > 0){
                                foreach($nota as $row){
                                    if($_SESSION["tipoUsuario"] !== "Alumno"){
                                        echo '<td>'.$row["nota"].'</td>
                                              <td>
                                                <button class="btn btn-success btnEditarNota" asignaturaIDNotas="'.$row["asignaturaID_FK"].'" data-bs-toggle="modal" data-bs-target="#EditarNota"><i class="bx '.('bxs-edit').'"></i></button>
                                              </td>';
                                    }
                                }
                            }else{
                                if($_SESSION["tipoUsuario"] !== "Alumno"){
                                    echo'<td>No evaluado</td>
                                         <td>
                                            <button class="btn btn-success btnAnadirNota" asignaturaIDNotas="'.$value["asignaturaID"].'" data-bs-toggle="modal" data-bs-target="#AnadirNota"><i class="bx '.('bx-plus').'"></i></button>
                                         </td>';
                                }
                            }    
                            echo'</tr>';                                          
                        }              
                     ?>  
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </section>
</div>
<!--Modal añadir notas-->
<div class="modal fade" id="AnadirNota">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">    
                <div class="modal-header">
                    <h5 class="modal-title">Añadir Nota</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                           <input type= "hidden" class="form-control" name = "asignaturaID_FK" id = "asignaturaID_FK_anadir">
                        </div>
                        <div class="form-group">
                            <span>Nota:</span>
                            <select class="form-select" name="nota" id="nota_anadir">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option> 
                                <option value="10">10</option>      
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" data-dismiss="modal">Añadir Nota</button>
                    </div>
                </div> 
                <?php
                  $añadir = new ExpedienteC();
                  $añadir -> anadirNotaC();
                ?> 
            </form>    
        </div>
    </div>
</div>
<!--Modal editar notas-->
<div class="modal fade" id="EditarNota">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
               
                <div class="modal-header">
                    <h5 class="modal-title">Cambiar Nota</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                           <input type= "hidden" class="form-control" name = "asignaturaID_FK_editar" id = "asignaturaID_FK_editar">
                        </div>
                        <div class="form-group">
                            <span>Nota:</span>
                            <select class="form-select" name="nota_editar" id="nota_editar">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option> 
                                <option value="10">10</option>      
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" data-dismiss="modal">Cambiar Nota</button>
                    </div>
                </div> 
                <?php
                  $editar = new ExpedienteC();
                  $editar -> editarNotaC();
                ?> 
            </form>    
        </div>
    </div>
</div>