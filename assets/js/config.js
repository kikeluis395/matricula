function irAjax(baseURL){




   $.post( baseURL + "malla_curricular/Malla_curricular", function(response) {
      console.log(response);
      $("#contenedor-principal").html(response);

      $('#example').DataTable( {
        scrollY:        300,
        scrollCollapse: true,
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