<!-- Data Table Initialize -->
<script>
$(document).ready(function() {
  $('#example1').DataTable( {
      "language": {
          "lengthMenu": "Mostrar _MENU_ registros por página",
          "zeroRecords": "No hay resultados - lo sentimos",
          "info": "Página _PAGE_ de _PAGES_",
          "infoEmpty": "No hay registros disponibles",
          "infoFiltered": "(filtrado de _MAX_ registros totales)",
          "search": "Buscar:",
          "paginate": {
            "next": "Siguiente",
            "previous": "Anterior"
          }
      },
      "lengthMenu": [[25, 50, 80, -1], [25, 50, 80, "Todos"]]
  });
});

</script>