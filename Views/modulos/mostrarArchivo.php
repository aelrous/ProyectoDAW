<div class="content">
   <section class="content-header">
        <?php
          $exp = explode("/", $_GET["url"]);
          $columna = "id_doc";
          $valor = $exp[2];
          $result= RecursosC::mostrarArchivosC($columna,$valor); 
          echo'<h2>'.$result["nombre"].'</h2>'; 
        ?>
      <hr> 
   </section>
   <section class= "content-box">
        <div class= "box-header">
            <a href="/ProyectoCampus/contenidoAsignatura/<?php echo $result["asignaturaID_FK"]?>">
                <button class="btn btn-success"><i class='bx bx-left-arrow-alt'></i>Volver</button> 
            </a>
        </div>
        <br>
        <div class="box-body">
            <div class="col-md-8 col-xs-12">    
                <embed src="/ProyectoCampus/Views/resources/<?php echo $result["archivo"]?>" type="application/pdf" width="900" height="947">   
            </div>
        </div>
    </section>
</div>