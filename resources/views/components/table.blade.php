@if ($dataTable)
@section('styles')
<link href={{ asset("assets/css/dataTables.bootstrap4.min.css")}} rel="stylesheet">
@endsection
@endif


<div class="table-responsive">
    <table class="table table-bordered" id="{{$tableId}}" width="100%" cellspacing="0">
        <thead>
            {{ $header }}
        </thead>
        <tbody>
            {{ isset($body) ?  $body : $slot}}
        </tbody>
    </table>
</div>
@if ($dataTable)
@section('scripts')
<script src={{ asset("assets/js/datatables/jquery.dataTables.min.js")}}></script>
<script src={{ asset("assets/js/datatables/dataTables.bootstrap4.min.js")}}></script>
<script>
    $('#{{$tableId}}').DataTable({
                "language": {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
        "copy": "Copiar",
        "colvis": "Visibilidad"
    }
}
        });
</script>
@endsection
@endif