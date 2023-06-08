<?php 

    if(isset($_SESSION["tipoUsuario"])!= "Admin"){
        echo'<script>
                window.location = "/ProyectoCampus/inicio";
             </script>';

      return;
    }
?>

<div class="content">
    <section class="content-header">
       <h2>Editor de Estudios</h2>
       <hr> 
    </section>
    <section class= "content-box">
        <div class= box>
            <div class="box-header">
                <form method = post>
                <div class="col-md-6 col-xs-12">               
                        <?php 
                            $editarEstudios = new EstudiosC();
                            $editarEstudios -> EditarEstudiosC();
                            $editarEstudios -> ActualizarEstudiosC();
                        ?>           
                     </div>  
                </form>
            </div>
        </div>
    </section>
</div>