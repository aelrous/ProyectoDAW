
<div class="content">
   <section class="content-header">
        <?php
          $exp = explode("/", $_GET["url"]);
          $columna = "asignaturaID";
          $valor = $exp[1];
          $asignatura= AsignaturaC::MostrarAsignaturasC($columna, $valor);
          echo'<h2>Asignatura: '.$asignatura["nombre"].'</h2>';
        ?>
      <hr> 
   </section>
   <section class= "content-box">
        <div class= "box-header">
            <a href="/ProyectoCampus/asignaturas">
                <button class="btn btn-success"><i class='bx bx-left-arrow-alt'></i>Volver</button> 
            </a>
        </div>
        <br>
        <div class="box-body">
            <div class="col-md-3 col-xs-12">
                <ul class="list-group L">
                    <li class="list-group-item active">APUNTES
                        <?php
                        if($_SESSION["tipoUsuario"] !== "Alumno"){
                            echo '<button class="btn btn-success posicionDerecha" data-bs-toggle="modal" data-bs-target="#subirApuntes"><i class="bx '.('bx-upload').'"></i></button>';
                        }
                        ?>
                    </li>
                    <?php 
                        $columna = null;
                        $valor = null;
                        $result = RecursosC::mostrarArchivosC($columna,$valor);
                        foreach ($result as $key => $value){
                            echo'<li class="list-group-item"><a href="/ProyectoCampus/mostrarArchivo/'.$value["asignaturaID_FK"].'/'.$value["id_doc"].'">'.$value["nombre"].'</a>';
                            if($_SESSION["tipoUsuario"] !== "Alumno"){
                            echo'<button class="btn btn-danger posicionDerecha EliminarRecurso" rID="'.$value["id_doc"].'" aID="'.$exp[1].'"><i class="bx '.('bx-trash').'"></i></button>
                            </li>';
                            }
                        }
                    ?>                    
                </ul>
                    <br>
                <ul class="list-group L">
                  <li class="list-group-item active">RECURSOS
                    <?php
                        if($_SESSION["tipoUsuario"] !== "Alumno"){
                            echo '<button class="btn btn-success posicionDerecha" data-bs-toggle="modal" data-bs-target="#subirRecursos"><i class="bx '.('bx-upload').'"></i></button>';
                        }
                    ?>
                  </li>
                    <?php 
                        $columna = null;
                        $valor = null;
                        $result = RecursosC::mostrarEnlacesC($columna,$valor);
                        foreach ($result as $key => $value){
                            echo'<li class="list-group-item"><a href="'.$value["url"].'" target="_blank">'.$value["titulo"].'</a>';
                            if($_SESSION["tipoUsuario"] !== "Alumno"){
                             echo'<button class="btn btn-danger posicionDerecha EliminarEnlace" eID="'.$value["id_enlace"].'" aID="'.$exp[1].'"><i class="bx '.('bx-trash').'"></i></button>';
                            }
                            echo'</li>';
                        }
                    ?>           
                </ul>
            </div>
        </div>
    </section>
</div>
<!--Eliminar archivos/enlaces -->
<?php
    $eliminarArchivos = new RecursosC();
    $eliminarArchivos -> eliminarArchivosC();

    $eliminarEnlaces = new RecursosC();
    $eliminarEnlaces -> eliminarEnlacesC();
?>
<!--Modal Subir Apuntes-->
<div class="modal fade" id="subirApuntes">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" enctype= "multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Subir Archivo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <span>Nombre del archivo:</span>
                            <input type= "text" class="form-control" name ="nombre"> 
                        </div>
                        <div class="form-group">
                            <span>Selecciona un archivo:</span>
                            <input type= "file" class="form-control" name = "archivo" id= "archivo">
                        </div>
                        <div class="form-group">
                            <?php
                            echo'<input type= "hidden" class="form-control" name = "asignaturaID_FK" value = "'.$exp[1].'">';
                            ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-success" data-dismiss="modal">Subir Archivo</button>
                    </div>
                </div> 
            </form> 
            <?php
            $subirArchivo = new RecursosC();
            $subirArchivo -> subirArchivosC();
            ?>   
            
        </div>
    </div>
</div>
<!--Modal Subir Recursos-->
<div class="modal fade" id="subirRecursos">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" enctype= "multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Subir Enlace</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <span>Nombre del enlace:</span>
                            <input type= "text" class="form-control" name ="titulo"  id ="titulo"> 
                        </div>
                        <div class="form-group">
                            <span>Introduce el enlace:</span>
                            <input type= "text" class="form-control" name = "url" id= "url">
                        </div>
                        <div class="form-group">
                            <?php
                            echo'<input type= "hidden" class="form-control" name = "asignaturaID_FK" value = "'.$exp[1].'">';
                            ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submitEnlace" class="btn btn-success" data-dismiss="modal">Subir Enlace</button>
                    </div>
                </div> 
            </form> 
            <?php
            $subirEnlaces = new RecursosC();
            $subirEnlaces -> subirEnlacesC();
            ?>   
            
        </div>
    </div>
</div>