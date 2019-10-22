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

function RegistrarCursosLlevados(baseURL){



  $.post( baseURL + "horarios/Horarios/RegistrarCursosLlevados", function(response) {

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

function VerPDFAsignaturas(baseURL){
  var periodo = $("#selectPeriodo option:selected").val();

  var datos = {
    "periodo" : periodo
  };

  ShowSuccess("Descargando...");
  window.open(baseURL + 'reportes/Reportes/PdfAsignaturas?periodo=' + periodo, '_blank');
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