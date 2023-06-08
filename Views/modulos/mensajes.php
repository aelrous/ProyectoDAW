<div class="content">
   <section class="content-header">
      <h2>Mensajes</h2>
      <hr> 
   </section>
   <section class= "content-box">
       <div class= box>
           <div class= box-header>
               <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#NuevoMensaje">Nuevo mensaje</button> 
       </div>
           <br>
           <div class="box-body">
               <div class="col-md-8 col-xs-12">
                   <table class="table table-bordered table-hover T">
                       <thead>
                            <tr>
                                <th>Leído</th>  
                                <th>Remitente</th>
                                <th>Título</th>
                                <th>Fecha y Hora</th>
                                <th>Acción</th>
                           </tr>
                       </thead>
                       <tbody>
                            <?php
                                $result = MensajesC::MostrarMensajesC();

                                foreach($result as $key => $value){
                                    echo '<tr>
                                            <td class="bell-check">';
                                                if($value["leido"] == '0'){
                                                    echo'<i class="bx '.('bxs-bell bx-sm bx-tada bell').'"></i> ';
                                                }else{
                                                    echo'<i class="bx '.('bx-check-double bx-sm check').'"></i>';
                                                }
                                    echo        '</td>';
                                            $columna = "userID";
                                            $valor = $value["remitente"];
                                            $remitente= UsuariosC::MostrarUsuariosC($columna, $valor);
                                    echo   '<td>'.$remitente["nombre"].' '.$remitente["apellidos"].'</td>';
                                    echo   '<td>'.$value["titulo"].'</td>
                                            <td>'.$value["fecha"].'</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href= "/ProyectoCampus/mostrarMensaje/'.$value["id"].'">
                                                        <button class="btn btn-success"><i class="bx '.('bx-show').'"></i></button>    
                                                    </a>
                                                    <a href= "#">
                                                        <button class="btn btn-danger EliminarMensaje" mensajeID= "'.$value["id"].'"><i class="bx '.('bx-trash').'"></i></button>    
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

<!-- Modal Nuevo Mensaje -->
<div class="modal fade" id="NuevoMensaje">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="">
                <div class="modal-header">
                    <h5 class="modal-title">Nuevo Mensaje</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <?php
                            echo'<input type="hidden" class="form-control" value="'.$_SESSION["userID"].'" name="remitente">'  
                            ?>
                        </div>
                        <div class="form-group">
                            <span>Para:</span>
                            <select class="form-select" name="destinatario">
                                <?php 
                                    $columna = null;
                                    $valor = null;
                                    $usuarios = UsuariosC::MostrarUsuariosC($columna, $valor);
                                    foreach ( $usuarios as $key => $value ){
                                    echo '<option value="'.$value["userID"].'">'.$value["nombre"].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <span>Titulo:</span>
                            <input type="text" class="form-control" name="titulo" required></input>
                        </div>
                        <div class="form-group">
                            <span>Mensaje:</span>
                            <textarea class="form-control" name="mensaje" required></textarea>
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" data-dismiss="modal" name="enviar">Enviar</button>
                    </div>
                </div>
                <?php
                    $enviarMensaje= new MensajesC();
                    $enviarMensaje -> enviarMensajeC();
                ?>  
            </form>
        </div>
    </div>
</div>
<!--Eliminar Mensaje-->
<?php 
    $eliminarMensaje = new MensajesC();
    $eliminarMensaje -> EliminarMensajeC();
?>