
<section class="content">
    <div class="text">   
        <h2>Perfil del usuario:</h2>
        <hr>      
        <?php            
            $datos = new UsuariosC();
            $datos -> MostrarDatosC();
        ?>
        <?php        
            $actualizar = new UsuariosC();
            $actualizar -> ActualizarDatosC();
        ?>
    </div>
</section>
