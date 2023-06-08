$(document).ready(function() {

// ###### SIDEBAR ######
    //Tomamos variables de los elementos del sidebar
    const   body= document.querySelector('body'),
            sidebar= body.querySelector('.sidebar'),
            toggle= body.querySelector('.menu-header'),
            modeSwitch= body.querySelector('.switch'),
            modeText= body.querySelector('.mode-text');
            
    //Desplegar menu al hacer click sobre el icono
    toggle.addEventListener('click',()=>{
        sidebar.classList.toggle('close');
    });

    //Interruptor modo oscuro/claro
    //Almacenamos en localStorage la clase "dark" para que conserve el modo oscuro 
    let getModo = localStorage.getItem('modo');
    if(getModo=='oscuro'){
        body.classList.toggle('dark');
        modeSwitch.classList.toggle('active');
    }
    modeSwitch.addEventListener('click',()=>{
        body.classList.toggle('dark');
        //Al hacer click en el switch introducimos la clase "dark" 
        //Si tiene la clase "dark" aparece el texto "modo claro" y almacenamos en el localstorage el modo oscuro
        if(body.classList.contains('dark')){
            modeText.innerHTML='Modo Claro';
            localStorage.setItem('modo', 'oscuro');
        }else{
        //Si no aparece el texto "modo oscuro" y almacenamos en el localstorage el modo claro
            modeText.innerHTML='Modo Oscuro';
            localStorage.setItem('modo', 'claro');
        }         
    });
    modeSwitch.addEventListener('click', () =>{
        modeSwitch.classList.toggle('active');
    });

//##### USUARIOS #####
    //Mostrar Datos Usuario modal edicion mediante AJAX
        $(".T").on("click", ".EditarUsuario", function(){
            var uID = $(this).attr("uID");
            var datos = new FormData();
            datos.append("uID", uID);
            $.ajax({
                url: "Ajax/usuariosA.php",
                method: "POST",
                data: datos,
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,
    
                success: function(result){
                    //valores de los inputs del modal
                    $("#userIDEU").val(result["userID"]);
                    $("#nombreEU").val(result["nombre"]);
                    $("#apellidosEU").val(result["apellidos"]);
                    $("#correoEU").val(result["correo"]);
                    $("#tipoUsuarioEU").val(result["tipoUsuario"]);
                    $("#moduloEU").val(result["moduloID_FK"]);
                    //Si es administrador no puede editar estudios
                    if(result["tipoUsuario"]=="Admin"){
                        $("#moduloEU").hide();
                        $("#tituloEstudios").hide();
                    }else{
                        $("#moduloEU").show();
                        $("#tituloEstudios").show();
                    }       
                }
            });
        });
    //Eliminar datos usuario
        $(".T").on("click", ".EliminarUsuario", function(){
            let uID = $(this).attr("uID");
        
            window.location = "index.php?url=usuarios&uID="+ uID;
        });

//##### ESTUDIOS #####       
    //Eliminar Modulos
        $(".T").on("click", ".EliminarEstudios", function(){
            let mID = $(this).attr("mID");
             
            window.location = "/ProyectoCampus/index.php?url=estudios&mID="+ mID;
        });

//##### ASIGNATURAS #####   
    //Eliminar Asignatura
        $(".T").on("click", ".EliminarAsignatura", function(){
            let aID = $(this).attr("aID");
            let mID = $(this).attr("mID");
            
            window.location = "/ProyectoCampus/index.php?url=anadirAsignaturas/"+mID+"&aID="+aID+"&mID="+mID;     
        });
    //Mostrar Datos Asignatura modal edicion mediante AJAX
        $(".T").on("click", ".EditarAsignatura", function(){
            var aID = $(this).attr("aID");
            var mID = $(this).attr("mID");
            var datos = new FormData();
            datos.append("aID", aID);
            datos.append("mID", mID);
            $.ajax({
                url: "/ProyectoCampus/Ajax/asignaturasA.php",
                method: "POST",
                data: datos,
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,

                success: function(result){
                    //valores en los inputs del modal
                    $("#asignaturaIDedit").val(result["asignaturaID"]);
                    $("#nombreEdit").val(result["nombre"]);
                    $("#cursoEdit").val(result["curso"]);
                    $("#semestreEdit").val(result["semestre"]);      
                }
            });
        });

//##### MENSAJES ##### 
    //Eliminar mensaje
    $(".T").on("click", ".EliminarMensaje", function(){
        let mensajeID = $(this).attr("mensajeID");
        
        window.location = "/ProyectoCampus/index.php?url=mensajes&mensajeID="+ mensajeID;
    });

//##### EXPEDIENTE ##### 
    //Datos del modal para añadir/editar notas
    $(".T").on("click", ".btnEditarNota", function(){
        let aID = $(this).attr("asignaturaIDNotas"); 
        $("#asignaturaID_FK_editar").val(aID);
    });
    $(".T").on("click", ".btnAnadirNota", function(){
        let aID = $(this).attr("asignaturaIDNotas"); 
        $("#asignaturaID_FK_anadir").val(aID);
    });   
});
//##### RECURSOS ##### 
    //Eliminar archivos
    $(".L").on("click", ".EliminarRecurso", function(){ 
        let rID = $(this).attr("rID");
        let aID = $(this).attr("aID");
        console.log(aID);
        
        window.location = "/ProyectoCampus/index.php?url=contenidoAsignatura/"+aID+"&aID="+aID+"&rID="+rID;    
    });
    //Eliminar enlaces
    $(".L").on("click", ".EliminarEnlace", function(){
        let eID = $(this).attr("eID");
        let aID = $(this).attr("aID");
        
        window.location = "/ProyectoCampus/index.php?url=contenidoAsignatura/"+aID+"&aID="+aID+"&eID="+eID;    
    });



   
    