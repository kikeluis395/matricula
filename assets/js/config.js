function irAjax(baseURL){




   $.post( baseURL + "malla_curricular/Malla_curricular", function(response) {
      console.log(response);
      $("#contenedor-principal").html(response);

      $('#example').DataTable( {
        scrollY:        200,
        scrollCollapse: false,
        paging:         false,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No hay elementos encontrados!",
            "info": "Mostrando _TOTAL_ registros",
            "infoEmpty": "No hay elementos",
            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
        },
        "lengthChange": false,
        "searching": false
    } );
  })
   .fail(function(e) {
    console.log(e);
});
}

function VerHorariosDisponibles(baseURL, cod_curso){

  var cod = "" + cod_curso;

  var datos = {
    "cod_curso" : cod
  };

  $.post( baseURL + "horarios/Horarios/VerHorariosDisponibles", datos, function(response) {
    
    $("#contenedor-horarios-disponibles").html(response);

  $('#modalHorariosDisponibles').modal('show');
  $('[data-toggle="tooltip"]').tooltip();

  })
  .fail(function(e) {
    console.log(e);
  });

}

function VerHorariosDisponiblesTodosRectificacion(baseURL, cod_curso){

  var cod = "" + cod_curso;

  var datos = {
    "cod_curso" : cod
  };

  $.post( baseURL + "rectificacion/Rectificacion/VerHorariosDisponiblesTodosRectificacion", datos, function(response) {
    
    $("#contenedor-horarios-disponibles").html(response);

  $('#modalHorariosDisponibles').modal('show');
  $('[data-toggle="tooltip"]').tooltip();

  })
  .fail(function(e) {
    console.log(e);
  });

}

function RegistrarHorario(baseURL, cod_curso, seccion){


  var otro = {
    "cod_curso" : cod_curso,
    "seccion" : seccion
  };

  console.log(cod_curso);
  console.log(seccion);

  $.post( baseURL + "horarios/Horarios/RegistrarHorarios", otro, function(response) {

    $("#contenedor-horarios-matriculados").html(response);

    $('#modalHorariosDisponibles').modal('hide');
})
 .fail(function(e) {
  console.log(e);
});

}

function RegistrarHorarioRectificacion(baseURL, cod_curso, seccion){


  var otro = {
    "cod_curso" : cod_curso,
    "seccion" : seccion
  };

  console.log(cod_curso);
  console.log(seccion);

  $.post( baseURL + "rectificacion/Rectificacion/RegistrarHorarios", otro, function(response) {

    $("#contenedor-horarios-matriculados").html(response);
    ShowSuccess("Se registro el horario exitosamente!");
    $('#modalHorariosDisponibles').modal('hide');

})
 .fail(function(e) {
  console.log(e);
});

}

function RegistrarCursosLlevados(baseURL){



  $.post( baseURL + "pago_matricula/Pago_matricula", function(response) {

    $('#modalHorariosMatriculados').modal('hide');

    ShowSuccess("Se registraron los cursos exitosamente!");
})
 .fail(function(jqXHR, errorType, error) {
  //console.log(e);
  console.log(jqXHR);
  console.log(errorType + ": " + error);
  //ShowError("No se pueden registrar los cursos!");
});

}

function RegistrarCursosLlevadosRectificacion(baseURL){



  $.post( baseURL + "horarios/Horarios/RegistrarCursosLlevados", function(response) {

    $('#modalHorariosMatriculados').modal('hide');

    ShowSuccess("Se registraron los cursos exitosamente!");

    LlenarCursosPermitidos(baseURL);
})
 .fail(function(jqXHR, errorType, error) {
  //console.log(e);
  console.log(jqXHR);
  console.log(errorType + ": " + error);
  //ShowError("No se pueden registrar los cursos!");
});

}


function VerAsignaturas(baseURL){
  var periodo = $("#selectPeriodo option:selected").val();

  var datos = {
    "periodo" : periodo
  };

  $.post( baseURL + "asignaturas/Asignaturas/VerAsignaturas", datos, function(response) {

    $("#contenedor-asignaturas").html(response);

  })
  .fail(function(jqXHR, errorType, error) {
    console.log("No se listaron las asignaturas!")
  });
}

function ActualizarDiplomado(baseURL){
  var cod_carrera = $("#selectDiplomado option:selected").val();

  var datos = {
    "cod_carrera" : cod_carrera
  };

  $.post( baseURL + "horarios/Horarios/ActualizarDiplomado", datos, function(response) {

    $("#contenedor-cursospordiplomado").html(response);

  })
  .fail(function(jqXHR, errorType, error) {
    console.log("No se listaron los cursos!")
  });
}

function VerPDFAsignaturas(baseURL){
  var periodo = $("#selectPeriodo option:selected").val();

  var datos = {
    "periodo" : periodo
  };

  ShowSuccess("Descargando...");
  window.open(baseURL + 'reportes/Reportes/PdfAsignaturas?periodo=' + periodo, '_blank');
}

function VerPDFAlumnos(baseURL){
  var diplomado = $("#selectDiplomado option:selected").val();

  var datos = {
    "diplomado" : diplomado
  };

  ShowSuccess("Descargando...");
  window.open(baseURL + 'reportes/Reporte_alumnos/PdfAlumnos?diplomado=' + diplomado, '_blank');
}

function CambiarEstado(baseURL, estadoActual, ruta){

  var estado = 0;
  var periodo = '';

  

  if(estadoActual == '0'){
    estado = 1;
  }

  var datos;

  if(ruta != 'Pago'){
    datos = {
      "estado" : estado,
      "periodo" : $("#selectPeriodo option:selected").val()
    };
  }else{
    datos = {
      "estado" : estado
    };
  }

  $.post( baseURL + "activaciones/activar" + ruta + "/CambiarEstado", datos, function(response) {

    $("#contenedor-activaciones").html(response);
    ShowSuccess("Se cambio el estado");
  })
  .fail(function(jqXHR, errorType, error) {
    ShowSuccess("Ocurrio un error cambiando el estado");
  });

}

function VerHorariosDisponiblesRectificacion(baseURL, cod_curso, seccion){

  var cod = "" + cod_curso;
  var seccion = "" + seccion;

  var datos = {
    "cod_curso" : cod,
    "seccion" : seccion
  };

  $.post( baseURL + "rectificacion/Rectificacion/VerHorariosDisponiblesRectificacion", datos, function(response) {
    $('#modalHorariosMatriculados').modal('hide');
    $("#contenedor-horarios-disponibles").html(response);

  $('#modalHorariosDisponibles').modal('show');
  $('[data-toggle="tooltip"]').tooltip();

  })
  .fail(function(e) {
    console.log(e);
  });

}

function DejarCurso(baseURL, cod_curso, seccion){

  var cod = "" + cod_curso;
  var seccion = "" + seccion;

  var datos = {
    "cod_curso" : cod,
    "seccion" : seccion
  };

  $.post( baseURL + "rectificacion/Rectificacion/DejarCurso", datos, function(response) {
    $('#modalHorariosMatriculados').modal('hide');
    $("#contenedor-horarios-matriculados").html(response);
    ShowSuccess("Se dejo el curso");
    LlenarCursosPermitidos(baseURL);
    $('[data-toggle="tooltip"]').tooltip();

  })
  .fail(function(e) {
    console.log(e);
  });

}

function LlenarCursosPermitidos(baseURL){

  $.post( baseURL + "rectificacion/Rectificacion/VerCursosPermitidos", function(response) {
   
    $("#contenedor-horarios-permitidos").html(response);

  })
  .fail(function(e) {
    console.log(e);
  });

}

function DejarCurso(baseURL, cod_curso, seccion){

  var cod = "" + cod_curso;
  var seccion = "" + seccion;

  var datos = {
    "cod_curso" : cod,
    "seccion" : seccion
  };

  $.post( baseURL + "rectificacion/Rectificacion/DejarCurso", datos, function(response) {
    $('#modalHorariosMatriculados').modal('hide');
    $("#contenedor-horarios-matriculados").html(response);
    ShowSuccess("Se dejo el curso");
    LlenarCursosPermitidos(baseURL);
    $('[data-toggle="tooltip"]').tooltip();

  })
  .fail(function(e) {
    console.log(e);
  });

}

function RegistrarHorarioCambioRectificacion(baseURL, cod_curso, seccion){

  var seccionAnterior = "" + $('#inputseccion').val();

var cod = "" + cod_curso;
  var seccion = "" + seccion;

  var datosCambio = {
    "cod_curso" : cod_curso,
    "seccion" : seccion,
    "seccion_anterior" : seccionAnterior
  };

console.log(cod_curso);
console.log(seccion);
console.log(seccionAnterior);

  $.post( baseURL + "rectificacion/Rectificacion/RegistrarHorariosCambio", datosCambio, function(response) {

    $("#contenedor-horarios-matriculados").html(response);
    ShowSuccess("Se cambio el horario exitosamente!");
    $('#modalHorariosDisponibles').modal('hide');
})
 .fail(function(e) {
  console.log(e);
});

}

function RegistrarHorarioAdmin(baseURL){
  
  if(validarAgregarHorario()){

    var tiempoEntrada = $("#timeEntrada").val().trim().slice(-2);
    var tiempoSalida = $("#timeSalida").val().trim().slice(-2);
    var hora_entrada = "";
    var hora_salida = "";
    var horaIntEntrada;
    var horaIntSalida;

    if(tiempoEntrada.trim() == "PM"){

      horaIntEntrada = 12 + parseInt($("#timeEntrada").val().trim().slice(0, 2));
      

    }else{

      horaIntEntrada = parseInt($("#timeEntrada").val().trim().slice(0, 2));

    }

    var minutoEntrada = $("#timeEntrada").val().trim().slice(3, 5);
    hora_entrada = "" + horaIntEntrada + ":" + minutoEntrada + ":00"; 

    if(tiempoSalida.trim() == "PM"){

      horaIntSalida = 12 + parseInt($("#timeSalida").val().trim().slice(0, 2));
      

    }else{

      horaIntSalida = parseInt($("#timeSalida").val().trim().slice(0, 2));

    }

    var minutoSalida = $("#timeSalida").val().trim().slice(3, 5);
    hora_salida = "" + horaIntSalida + ":" + minutoSalida + ":00"; 

    var datos = {
      "cod_docente" : $("#selectDocente option:selected").val(),
      "cod_curso" : $("#selectCurso option:selected").val(),
      "cod_aula" : $("#selectAula option:selected").val(),
      "seccion" : $("#inputSeccion").val(),
      "cod_dia" : parseInt($("#selectDia option:selected").val()),
      "hora_entrada" : hora_entrada,
      "hora_salida" : hora_salida,
      "turno" : $("#selectTurno option:selected").val(),
      "cupos" : parseInt($("#inputCupos").val())
    };
  
    $.post( baseURL + "horarios_admin/Horarios_admin/RegistrarHorarioAdmin", datos, function(response) {
  
      $("#contenedor-horarios-admin").html(response);
  
      $('#modalAgregarHorarioAdmin').modal('hide');

      $('#timeEntrada').timepicker({
        timeFormat: 'hh:mm p',
        interval: 50,
        minTime: '07:10',
        maxTime: '09:20pm',
        defaultTime: '07:10',
        startTime: '07:10',
        dynamic: false,
        dropdown: true,
        scrollbar: true
    });
    $('#timeSalida').timepicker({
        timeFormat: 'hh:mm p',
        interval: 50,
        minTime: '08:00',
        maxTime: '10:10pm',
        defaultTime: '08',
        startTime: '08:00',
        dynamic: false,
        dropdown: true,
        scrollbar: true
    });
    $('#tableHorariosAdmin').DataTable({
        scrollY: 250,
        scrollCollapse: true,
        paging: true,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No hay elementos encontrados!",
            "info": "Mostrando _TOTAL_ registros",
            "infoEmpty": "No hay elementos",
            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
        },
        "lengthChange": false,
        "searching": false,
        "responsive": true,
        "info": false
    });
    })
    .fail(function(e) {
      console.log(e);
    });

  }else{

    ShowWarning("Por favor, rellenar los datos.");

  }

  

}

function validarAgregarHorario(){

  if($("#inputSeccion").val().trim().length == 0 || $("#timeEntrada").val().trim().length == 0 || $("#timeSalida").val().trim().length == 0
  || $("#inputCupos").val().trim().length == 0){

    return false;

  }else{

    return true;

  }

}