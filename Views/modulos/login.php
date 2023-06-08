<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!--Estilos CSS-->
    <link rel="stylesheet" href="Views/CSS/registro.css">
    <title>Inicio de sesión</title>
</head>

<body>
    <div class="container">
        <div class="row">
          <div class="col-lg-10 col-xl-9 mx-auto">
            <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
              <div class="card-body p-4 p-sm-5">
                <h3 class="card-title text-center mb-5 fw-light fs-5"><b>Iniciar Sesión</b></h3>
                <form method = "post">             
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="correo" placeholder="Correo Electrónico">
                    <label for="correo">Correo Electrónico</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="contrasena" placeholder="Contraseña">
                    <label for="contrasena">Contraseña</label>
                  </div>
                  <div class="d-grid mb-2">
                    <button class="btn btn-lg btn-login fw-bold text-uppercase" type="submit">Iniciar Sesión</button>
                  </div>
                  <a class="d-block text-center mt-2 small" href="/ProyectoCampus/registro">No tienes una cuenta? Regístrate</a>

                  <hr class="my-4">

                  <?php 
                    $login = new UsuariosC();
                    $login -> IniciarSesionC();             
                  ?>
                </form>
              </div>
            </div>
          </div>
        </div>
    <!--Scripts-->
    <!--Bootstrap5-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>  
    <!--JQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>   
</body>
</html>