@section('styles')
<link href={{ asset("assets/theme/vendor/datatables/dataTables.bootstrap4.min.css")}} rel="stylesheet">
@endsection
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            @foreach($columns as $column)
            <th>{{ucfirst($column)}}</th>
            @endforeach         
            <th>Accion</th>   
        </tr>
    </thead>
    <tbody>
        @foreach($collection as $item)
        <tr>
            @foreach($columns as $column)
                <td>{{$item->$column}}</td>
            @endforeach
            <td></td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
@section('scripts')
<script src={{ asset("assets/theme/vendor/datatables/jquery.dataTables.min.js")}}></script>
<script src={{ asset("assets/theme/vendor/datatables/dataTables.bootstrap4.min.js")}}></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#dataTable').DataTable();
});
</script>
@endsection

