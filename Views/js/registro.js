$(document).ready(function() {
// ###### REGISTRO ######
    //Datos del formulario Registro
    const form = document.getElementById('form'),
          userDNI = document.getElementById('userDNI'),
          errorUser = document.getElementById('errorDni'),
          reg_mail = document.getElementById('reg_mail'),
          errorCorreo = document.getElementById('errorMail'),
          pass = document.getElementById('pass'),
          errorPass = document.getElementById('errorPass'),
          pass2 = document.getElementById('pass2'),
          errorPass2 = document.getElementById('errorPass2');
            
    //Expresiones Regulares
         //DNI 8 numeros + 1 letra mayus/minus
    const expRegUsuario = /^\d{8}[a-zA-Z]$/,
          expRegCorreo = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/,
         //min 5 carac. max.10, acepta mayus,minus,numeros,caracteres especiales y sin espacios
          expRegPass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([^ ]){5,10}$/;
    
    //Llamamos a las funciones al enviar el formulario
    form.addEventListener('submit', event => {
        event.preventDefault();//evitar que se envie el formulario
        let validar = false;
        errorUser.innerHTML ="";
        errorCorreo.innerHTML ="";
        errorPass.innerHTML ="";
        errorPass2.innerHTML =""; 
        if(!userDNI.value.match(expRegUsuario)){
            errorUser.innerHTML = "Introduce al menos 8 dígitos y una letra.";
            validar = true;
        }
        if(!reg_mail.value.match(expRegCorreo)){
            errorCorreo.innerHTML = "Introduce un correo válido."
            validar = true;
        }
        if(!pass.value.match(expRegPass)){
            errorPass.innerHTML = "De 5 a 10 caracteres, al menos una mayuscula, una minuscula, un número, un caracter especial y sin espacios en blanco.";
            validar = true;
        }
        if(pass.value !== pass2.value || pass2.value === ""){
            errorPass2.innerHTML = "Las contraseñas no coinciden."  
            validar = true;
        }  
        if(!validar){
            form.submit();
        }      
    });
});