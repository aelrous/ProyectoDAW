
<div class="content">
   <section class="content-header">
      <?php
         if($_SESSION["tipoUsuario"] == "Admin"){
            
            echo'<h2>Asignaturas</h2>';
         }else{
            $columna = "moduloID";
            $valor = $_SESSION["moduloID_FK"];
            $estudios= EstudiosC::MostrarEstudiosUserC($columna, $valor);
            echo'<h2>Asignaturas de '.$estudios["nombre"].'</h2> ';
         }    
      ?>
      <hr> 
   </section> 
   <section class= "content-box">
      <div class="box-body">
         <div class="col-md-3 col-xs-12">
               <ul class="list-group">
                  <li class="list-group-item active">Primer Semeste</li>
                  <?php
                     if($_SESSION["tipoUsuario"] == "Admin"){
                        $columna= null;
                        $valor= null;
                        $result = AsignaturaC::MostrarAsignaturasC($columna, $valor);
                        
                        foreach($result as $key => $value){
                           if($value["semestre"]== "1S" && $value["curso"]== "1C" || $value["semestre"]== "Anual" && $value["curso"]== "1C"){
                              echo'<li class="list-group-item"><a href="/ProyectoCampus/contenidoAsignatura/'.$value["asignaturaID"].'">'.$value["nombre"].'</a></li>';
                           }                          
                        }
                     }else{
                        $columna= "moduloID_FK";
                        $valor= $_SESSION["moduloID_FK"] ;
                        $result = AsignaturaC::MostrarAsignaturasUserC($columna, $valor);
                        
                        foreach($result as $key => $value){
                           if($value["semestre"]== "1S" && $value["curso"]== "1C" || $value["semestre"]== "Anual" && $value["curso"]== "1C"){
                              echo'<li class="list-group-item"><a href="/ProyectoCampus/contenidoAsignatura/'.$value["asignaturaID"].'">'.$value["nombre"].'</a></li>';
                           }                       
                        }
                     }
                  ?>
               </ul>
               <br>
               <ul class="list-group">
                  <li class="list-group-item active">Segundo Semeste</li>
                  <?php
                     if($_SESSION["tipoUsuario"] == "Admin"){
                        $columna= null;
                        $valor= null;
                        $result = AsignaturaC::MostrarAsignaturasC($columna, $valor);
                        
                        foreach($result as $key => $value){ 
                           if($value["semestre"]== "2S" && $value["curso"]== "1C" || $value["semestre"]== "Anual" && $value["curso"]== "1C"){
                              echo'<li class="list-group-item"><a href="/ProyectoCampus/contenidoAsignatura/'.$value["asignaturaID"].'">'.$value["nombre"].'</a></li>';
                           }   
                        }
                     }else{
                        $columna= "moduloID_FK";
                        $valor= $_SESSION["moduloID_FK"];
                        $result = AsignaturaC::MostrarAsignaturasUserC($columna, $valor);
                        
                        foreach($result as $key => $value){ 
                           if($value["semestre"]== "2S" && $value["curso"]== "1C" || $value["semestre"]== "Anual" && $value["curso"]== "1C"){
                              echo'<li class="list-group-item"><a href="/ProyectoCampus/contenidoAsignatura/'.$value["asignaturaID"].'">'.$value["nombre"].'</a></li>';
                           }    
                        }
                     }
                     ?>
               </ul>
               <br>
               <ul class="list-group">
                  <li class="list-group-item active">Tercer Semeste</li>
                  <?php
                     if($_SESSION["tipoUsuario"] == "Admin"){
                        $columna= null;
                        $valor= null;
                        $result = AsignaturaC::MostrarAsignaturasC($columna, $valor);
                        
                        foreach($result as $key => $value){
                           if($value["semestre"]== "1S" && $value["curso"]== "2C" || $value["semestre"]== "Anual" && $value["curso"]== "2C"){
                              echo'<li class="list-group-item"><a href="/ProyectoCampus/contenidoAsignatura/'.$value["asignaturaID"].'">'.$value["nombre"].'</a></li>';
                           }                             
                        }
                     }else{
                        $columna= "moduloID_FK";
                        $valor= $_SESSION["moduloID_FK"] ;
                        $result = AsignaturaC::MostrarAsignaturasUserC($columna, $valor);
                        
                        foreach($result as $key => $value){
                           if($value["semestre"]== "1S" && $value["curso"]== "2C" || $value["semestre"]== "Anual" && $value["curso"]== "2C"){
                              echo'<li class="list-group-item"><a href="/ProyectoCampus/contenidoAsignatura/'.$value["asignaturaID"].'">'.$value["nombre"].'</a></li>';
                           }                          
                        }
                  }
                  ?>
               </ul>
               <br>
               <ul class="list-group">
                  <li class="list-group-item active">Cuarto Semeste</li>
                  <?php
                     if($_SESSION["tipoUsuario"] == "Admin"){
                        $columna= null;
                        $valor= null;
                        $result = AsignaturaC::MostrarAsignaturasC($columna, $valor);
    
                        foreach($result as $key => $value){
                           if($value["semestre"]== "2S" && $value["curso"]== "2C"|| $value["semestre"]== "Anual" && $value["curso"]== "2C"){
                              echo'<li class="list-group-item"><a href="/ProyectoCampus/contenidoAsignatura/'.$value["asignaturaID"].'">'.$value["nombre"].'</a></li>';
                           }                           
                        }
                     }else{
                        $columna= "moduloID_FK";
                        $valor= $_SESSION["moduloID_FK"] ;
                        $result = AsignaturaC::MostrarAsignaturasUserC($columna, $valor);
                        
                        foreach($result as $key => $value){
                           if($value["semestre"]== "2S" && $value["curso"]== "2C"|| $value["semestre"]== "Anual" && $value["curso"]== "2C"){
                              echo'<li class="list-group-item"><a href="/ProyectoCampus/contenidoAsignatura/'.$value["asignaturaID"].'">'.$value["nombre"].'</a></li>';
                           }                           
                        }
                     }
                  ?>  
               </ul>
         </div>
      </div>
   </section>
</div> 

      

