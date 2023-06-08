
<!--Body Calendario-->
<div class="content">
   <section class="content-header">
      <h2>Calendario</h2>
      <hr> 
   </section>
   <section class= "content-box">
        <div class="col-md-9 col-xs-12">
            <div id='calendar'>                                
            </div>         
        </div>
   </section>
</div>
<?php 
if($_SESSION["tipoUsuario"] == "Admin"||$_SESSION["tipoUsuario"] == "Profesor"){
    //Modal ver/editar/añadir Evento para Administador y profesores
    echo'<div class="modal fade" id="verEvento">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="eventoID" name="eventoID"></input>              
                            </div> 
                           
                            <div class="form-group">
                                <span>Titulo:</span><br>
                                <input type="text" class="form-control" id="titulo" name="titulo"></input>               
                            </div> 
                            <div class="form-group">
                                <span>Fecha Inicio:</span><br>
                                <input type="date" class="form-control" id="fInicio" name="fInicio"></input>    
                            </div>
                            <div class="form-group">
                                <span>Fecha Fin:</span><br>
                                <input type="date" class="form-control" id="fFin" name="fFin"></input>
                                
                            </div> 
                            <div class="form-group">
                                <span>Descripción:</span><br>
                                <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                            </div> 
                            <div class="form-group">
                               <input type="hidden" class="form-control" id="autor" name="autor" value="'.$_SESSION["userID"].'"></input> 
                            </div> 
                        </div>
                        <div class="modal-footer">  
                            <button type="submit" class="btn btn-success" data-dismiss="modal" id="botonAgregar">Añadir</button>
                            <button type="submit" class="btn btn-success" data-dismiss="modal" id="botonEditar">Editar</button>
                            <button class="btn btn-danger" id="botonEliminar">Eliminar</button>
                        </div>
                    </div>              
                </form>
            </div>
        </div>
    </div>';
}else{
    //Modal ver Evento para el alumno
    echo' <div class="modal fade" id="verEvento">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="eventoID" name="eventoID"></input>              
                            </div> 
                        
                            <div class="form-group">
                                <span>Titulo:</span><br>
                                <input type="text" class="form-control" id="titulo" name="titulo" disabled></input>               
                            </div> 
                            <div class="form-group">
                                <span>Fecha Inicio:</span><br>
                                <input type="date" class="form-control" id="fInicio" name="fInicio" disabled></input>    
                            </div>
                            <div class="form-group">
                                <span>Fecha Fin:</span><br>
                                <input type="date" class="form-control" id="fFin" name="fFin" disabled></input>
                                
                            </div> 
                            <div class="form-group">
                                <span>Descripción:</span><br>
                                <textarea class="form-control" id="descripcion" name="descripcion" disabled></textarea>
                            </div> 
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="autor" name="autor" value="'.$_SESSION["userID"].'"></input>
                            </div> 
                        </div>
                    </div>              
                </form>
            </div>
        </div>
    </div>';
}
?>
<!--Script FullCalendar-->
<script type="text/javascript" src="/ProyectoCampus/Views/js/fullCalendar.js"></script>
