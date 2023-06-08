document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es',
        headerToolbar: {right:'dayGridMonth,timeGridWeek,timeGridDay',
                        center: 'title',
                        left: 'prev,next,today'},
        
        height: 650,
        //Llamamos a los eventos de la BBDD mediante un array en formato JSON
        events: 'Controllers/eventosC.php?accion=listar',

        //función para tomar la fecha donde hagamos click en el calendario
        dateClick: function(info){

            //funcion para limpiar el modal 
            limpiarModal(); 

            //Mostramos boton añadir/ocultamos editar/eliminar
            $('#botonAgregar').show();
            $('#botonEditar').hide();
            $('#botonEliminar').hide();

            //Que la fecha inicio y final sea por defecto el dia donde clickamos
            if(info.allDay){
                $('#fInicio').val(info.dateStr);
                $('#fFin').val(info.dateStr);
            };
            //mostar el modal para Crear el evento
            $('#verEvento').modal('show');    
        },
        eventColor: '#2E9959',

        //Funcion para mostrar el evento cuando clickamos sobre él
        eventClick: function(info){  
            //mostramos la info del evento en el modal
            $('#eventoID').val(info.event.id);
            $('#titulo').val(info.event.title);
            $('#fInicio').val(moment(info.event.start).format("YYYY-MM-DD"));
            $('#fFin').val(moment(info.event.end).format("YYYY-MM-DD"));
            $('#descripcion').val(info.event.extendedProps.descripcion);
            $('#autor').val(info.event.extendedProps.autor);
            
            //mostramos el modal/ ocultamos el boton añadir
            $('#botonAgregar').hide();
            $('#verEvento').modal('show');
        }
    });
    //Renderizamos el calendario
    calendar.render();
//Eventos de botón
    //Al pulsar "añadir"
    $('#botonAgregar').click(function(){
        let registro = agregarDatosForm();
        agregarEvento(registro);     
    });
    //Al pulsar "editar"
    $('#botonEditar').click(function(){
        let registro = agregarDatosForm();
        editarEvento(registro);     
    });
    //Al pulsar "eliminar"
    $('#botonEliminar').click(function(){
        let registro = agregarDatosForm();
        eliminarEvento(registro);       
    });
});
//FUNCIONES
//Funciones ajax
function agregarEvento(registro) {
    $.ajax({
        type: "POST",
        url: 'Controllers/eventosC.php?accion=insertar',
        data: registro,
        success: function(msg){
            calendar.refetchEvents();
        },
        error: function(error){
            alert("Error al agregar un evento: " + error);
        }
    });
}
function editarEvento(registro) {
    $.ajax({
        type: "POST",
        url: 'Controllers/eventosC.php?accion=editar',
        data: registro,
        success: function(msg){
            calendar.refetchEvents();
        },
        error: function(error){
            alert("Error al editar el evento: " + error);
        }
    });
}
function eliminarEvento(registro) {
    $.ajax({
        type: "POST",
        url: 'Controllers/eventosC.php?accion=eliminar',
        data: registro,
        success: function(msg){
            calendar.refetchEvents();
        },
        error: function(error){
            alert("Error al eliminar el evento: " + error);
        }

    });
}
//funcion para limpiar el contenido del modal al salir
function limpiarModal(){
    $('#eventoID').val('');
    $('#titulo').val('');
    $('#fInicio').val('');
    $('#fFin').val('');
    $('#descripcion').val('');
};
//Funcion para agregar datos del formulario al registro
function agregarDatosForm(){
    let registro = {
        eventoID: $('#eventoID').val(),
        titulo: $('#titulo').val(),
        fInicio: $('#fInicio').val(),
        fFin: $('#fFin').val(),
        descripcion: $('#descripcion').val(),
        autor: $('#autor').val()
    }
    return registro;
}