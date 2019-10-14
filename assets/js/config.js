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

  //   $('#tableHorariosElegidos').DataTable( {
  //     scrollY:        300,
  //     scrollCollapse: true,
  //     paging:         false,
  //     "language": {
  //         "lengthMenu": "Mostrar _MENU_ registros por página",
  //         "zeroRecords": "No hay elementos encontrados!",
  //         "info": "Mostrando _TOTAL_ registros",
  //         "infoEmpty": "No hay elementos",
  //         "infoFiltered": "(Filtrado de _MAX_ registros totales)",
  //         "search": "Buscar:",
  //     },
  //     "lengthChange": false,
  //     "searching": false,
  //     "responsive": true,
  //     "info":     false
  // });
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
 .fail(function(e) {
  console.log(e);
  ShowError("No se pueden registrar los cursos!");
});

}