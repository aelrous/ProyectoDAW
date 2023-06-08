<div class="content">
   <section class="content-header">
      <div class="text">
         <?php
         $exp = explode("/", $_GET["url"]);
         $columna = "userID";
         $valor = $exp[1];
         $usuario= UsuariosC::MostrarUsuariosC($columna, $valor);
         echo'<h2>Expediente Académico de: '.$usuario["nombre"].' '.$usuario["apellidos"].'</h2>';
         ?>
         <hr>
      </div>   
   </section>  
   <section class="content-box">
      <div class= "box">
         <div class= "box-body">
            <div class="col-md-3 col-xs-12">
               <ul class="list-group">
                  <li class="list-group-item active">Primer Semestre</li>
                     <?php
                        $columna= "moduloID_FK";
                        $valor= $_SESSION["moduloID_FK"];
                        $result = AsignaturaC::MostrarAsignaturasUserC($columna, $valor);

                        foreach($result as $key => $value){ 
                           if($value["semestre"]== "1S" && $value["curso"]== "1C" || $value["semestre"]== "Anual" && $value["curso"]== "1C"){
                              echo'<li class="list-group-item">
                              <span><b>'.$value["asignaturaID"].'-</b> '.$value["nombre"].'</span>';
                              $columna = "asignaturaID_FK";
                              $valor = $value["asignaturaID"];
                              $usuario = $_SESSION["userID"];
                              $nota = ExpedienteC::MostrarExpedienteAlumnoC($columna, $valor,$usuario);
                              if($nota->rowCount()>0){
                                 foreach($nota as $row){
                                    echo'<span class="posicionDerecha">'.$row["nota"].'</span>
                                 </li>';
                                 }
                              }else{
                                 echo'<span class="posicionDerecha">No Evaluado</span>
                                 </li>';
                              
                              }
                           }    
                        }
                     ?>
               </ul>
               <br>
               <ul class="list-group">
                  <li class="list-group-item active">Segundo Semestre</li>
                     <?php
                        $columna= "moduloID_FK";
                        $valor= $_SESSION["moduloID_FK"];
                        $result = AsignaturaC::MostrarAsignaturasUserC($columna, $valor);

                        foreach($result as $key => $value){ 
                           if($value["semestre"]== "2S" && $value["curso"]== "1C" || $value["semestre"]== "Anual" && $value["curso"]== "1C"){
                              echo'<li class="list-group-item">
                              <span><b>'.$value["asignaturaID"].'-</b> '.$value["nombre"].'</span>';
                              $columna = "asignaturaID_FK";
                              $valor = $value["asignaturaID"];
                              $usuario = $_SESSION["userID"];
                              $nota = ExpedienteC::MostrarExpedienteAlumnoC($columna, $valor,$usuario);
                              if($nota->rowCount()>0){
                                 foreach($nota as $row){
                                    echo'<span class="posicionDerecha">'.$row["nota"].'</span>
                                 </li>';
                                 }
                              }else{
                                 echo'<span class="posicionDerecha">No Evaluado</span>
                                 </li>';
                              
                              }
                           }    
                        }
                     ?>
               </ul>
               <br>
               <ul class="list-group">
                  <li class="list-group-item active">Tercer Semestre</li>
                     <?php
                        $columna= "moduloID_FK";
                        $valor= $_SESSION["moduloID_FK"];
                        $result = AsignaturaC::MostrarAsignaturasUserC($columna, $valor);

                        foreach($result as $key => $value){ 
                           if($value["semestre"]== "1S" && $value["curso"]== "2C" || $value["semestre"]== "Anual" && $value["curso"]== "2C"){
                              echo'<li class="list-group-item">
                              <span><b>'.$value["asignaturaID"].'-</b>  '.$value["nombre"].'</span>';
                              $columna = "asignaturaID_FK";
                              $valor = $value["asignaturaID"];
                              $usuario = $_SESSION["userID"];
                              $nota = ExpedienteC::MostrarExpedienteAlumnoC($columna, $valor,$usuario);
                              if($nota->rowCount()>0){
                                 foreach($nota as $row){
                                    echo'<span class="posicionDerecha">'.$row["nota"].'</span>
                                 </li>';
                                 }
                              }else{
                                 echo'<span class="posicionDerecha">No Evaluado</span>
                                 </li>';
                              
                              }
                           }    
                        }
                     ?>
               </ul>
               <br>
               <ul class="list-group">
                  <li class="list-group-item active">Cuarto Semestre</li>
                     <?php
                        $columna= "moduloID_FK";
                        $valor= $_SESSION["moduloID_FK"];
                        $result = AsignaturaC::MostrarAsignaturasUserC($columna, $valor);

                        foreach($result as $key => $value){ 
                           if($value["semestre"]== "2S" && $value["curso"]== "2C"|| $value["semestre"]== "Anual" && $value["curso"]== "2C"){
                              echo'<li class="list-group-item">
                              <span><b>'.$value["asignaturaID"].'-</b> '.$value["nombre"].'</span>';
                              $columna = "asignaturaID_FK";
                              $valor = $value["asignaturaID"];
                              $usuario = $_SESSION["userID"];
                              $nota = ExpedienteC::MostrarExpedienteAlumnoC($columna, $valor,$usuario);                              
                                 if($nota->rowCount()>0){
                                    foreach($nota as $row){
                                       echo'<span class="posicionDerecha">'.$row["nota"].'</span>
                                    </li>';
                                    }  
                                 }else{
                                    echo'<span class="posicionDerecha">No Evaluado</span>
                                    </li>';
                                 } 
                           }    
                        }
                     ?>
               </ul>
            </div>
         </div>
      </div>
   </section>
</div> 