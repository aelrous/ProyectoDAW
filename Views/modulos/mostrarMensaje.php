<div class="content">
    <section class="content-header">
        <h2>Mensajes</h2>
        <hr>    
    </section>   
    <section class= "content-box">
        <div class= box>
            <div class="box-header"> 
            <div class="col-md-7 col-xs-12"> 
                <a href= "../mensajes">
                    <button class="btn btn-success"><i class='bx bx-left-arrow-alt'></i>Volver</button>    
                </a>
                <button class="btn btn-success posicionDerecha2" data-bs-toggle="modal" data-bs-target="#ResponderMensaje">Responder</button>    
            </div>
            </div>
            <div class="box-body">
                <div class="col-md-7 col-xs-12">
                    <div class="container-fluid p-2 my-2 bg-white border">
                        <?php
                            $exp = explode("/", $_GET["url"]);
                            $columna = "id";
                            $valor = $exp[1];
                            $mensaje = MensajesC::verMensajeC($columna, $valor);
                        echo   '<h5>'.$mensaje["titulo"].'</h5>
                                <hr>
                                <div>';
                                    $columna = "userID";
                                    $valor = $mensaje["remitente"];
                                    $remitente= UsuariosC::MostrarUsuariosC($columna, $valor);
                                    echo'<span><b>De:</b>'.$remitente["nombre"].' '.$remitente["apellidos"].'</span>
                                    <br><br>
                                    <span>'.$mensaje["mensaje"].'</span>
                                </div>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> 
<?php
    $mensajeLeido= new MensajesC();
    $mensajeLeido -> mensajeLeidoC();
?>
<!-- Modal REsponder Mensaje -->
<div class="modal fade" id="ResponderMensaje">
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
                            <?php
                            echo'<span>Para: '.$remitente["nombre"].' '.$remitente["apellidos"].'</span>
                            <input type="hidden" class="form-control" name="destinatario" value="'.$remitente["userID"].'"></input>';
                            ?>
                        </div>
                        <div class="form-group">
                            <span>Titulo:</span>
                            <input type="text" class="form-control" name="titulo"></input>
                        </div>
                        <div class="form-group">
                            <span>Mensaje:</span>
                            <textarea class="form-control" name="mensaje"></textarea>
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