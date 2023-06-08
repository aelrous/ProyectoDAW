<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!--Boxicons-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!--Estilo CSS--> 
    <link rel="stylesheet" href="Views/CSS/registro.css">
    <title>Registro</title>
</head>
<body>
    <div class="container">
        <div class="row">
          <div class="col-lg-12 col-xl-12 mx-auto">
            <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
              <div class="card-body p-4 p-sm-5">
                <h3 class="card-title text-center mb-5 fw-light fs-5"><b>Registro</b></h3>
                <form method= "post" id= "form" novalidate>
                  <!--Usuario ID-->
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control userID" name="userID" id="userDNI" placeholder="DNI">
                    <label for="userID">DNI</label>
                    <div class="error error-user">
                      <p id= "errorDni"></p>
                    </div>   
                  </div>
                  <!--Nombre-->
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                    <label for="nombre">Nombre</label>
                  </div>
                  <!--Apellidos-->
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="apellidos" placeholder="Apellido">
                    <label for="apellido">Apellidos</label>
                  </div>
                  <!--Correo-->
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control correo" name="correo" id= "reg_mail" placeholder="Correo Electrónico">
                    <label for="correo">Correo Electrónico</label>
                    <div class="error error-mail">
                      <p id= "errorMail"></p>
                    </div>
                  </div>
                  <hr>
                  <!--Contraseña-->
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control contrasena" name="contrasena" id= "pass" placeholder="Contraseña">
                    <label for="pass">Contraseña</label>
                    <div class="error error-pass">
                    <p id= "errorPass"></p>
                    </div>
                  </div>
                  <!--Contraseña2-->
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control contrasena2" name="" id= "pass2" placeholder="Confirmar Contraseña">
                    <label for="contrasena2">Confirmar Contraseña</label>
                    <div class="error error-pass2">
                      <p id= "errorPass2"></p>
                    </div>
                  </div>
                  <!--Estudios-->
                  <div class="form-group" >
                      <span>Qué vas a cursar?</span>
                        <select class="form-select" name="moduloID">
                          <?php 
                            $estudios = EstudiosC::MostrarEstudiosC();
                            foreach ( $estudios as $key => $value ){
                              echo '<option value="'.$value["moduloID"].'">'.$value["nombre"].'</option>';
                            }
                          ?>
                        </select>
                  </div>
                  <br>
                  <!--Tipo Usuario-->
                  <div class="form-group" >
                  <span>Qué tipo de usuario eres?</span>
                  <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio1" name="tipoUsuario" value="Alumno" checked>
                    <label class="form-check-label" for="radio1">Alumno</label>
                  </div>
                  <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio2" name="tipoUsuario" value="Profesor">
                    <label class="form-check-label" for="radio2">Profesor</label>
                  </div>
                  <br>
                  <!--Botón Enviar-->
                  <div class="d-grid mb-2">
                    <button class="btn btn-lg btn-login fw-bold text-uppercase" type="submit">Registrar</button>
                  </div>
    
                  <a class="d-block text-center mt-2 small" href="/ProyectoCampus/login">Ya tienes una cuenta? Inicia Sesión</a>
                  <hr class="my-4">
                  <?php 
                    $registro = new UsuariosC();
                    $registro -> RegistrarUsuarioC(); 
                  ?>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!--Scripts-->
    <!--Bootstrap5-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> 
    <!--JQuery--> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!--Scripts propios-->
    <script type="text/javascript" src="/ProyectoCampus/Views/js/registro.js"></script>

</body>
</html>