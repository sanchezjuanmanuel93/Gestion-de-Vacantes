Se realizó un cierre de vacantes<br>
Fecha de cierre: {{$fechaHora}}<br><br>
Vacantes<br><br>
@forelse($vacantes as $vacante)
Materia: {{$vacante->materia->nombre}} <br>
Nombre Puesto: {{$vacante->nombre_puesto}} <br>
Descripción Puesto: {{$vacante->descripcion_puesto}} <br>     
Fecha Apertura:  {{\Carbon\Carbon::parse($vacante->fecha_apertura)->format('d-m-Y')}} <br>    
Fecha Cierre Estipulada: {{\Carbon\Carbon::parse($vacante->fecha_cierre_estipulada)->format('d-m-Y')}} <br>
<a href="{{route('vacante.show', $vacante->id)}}">Link</a><br>
Postulaciones: <br>
@forelse($vacante->postulaciones as $postulacion)
@if ($loop->first)
<table>
    <tr>
        <th>Fecha postulación</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Telefono</th>
        <th>Email</th>
    </tr>
@endif
    <tr>
        <td>{{$postulacion->fecha_postulacion}} </td>
        <td>{{$postulacion->usuario->nombre}} </td>
        <td>{{$postulacion->usuario->apellido}} </td>
        <td>{{$postulacion->usuario->telefono}} </td>
        <td>{{$postulacion->usuario->email}} </td>
    </tr>
@if ($loop->last)
</table>
@endif
@empty
No hay postulaciones para este vacante <br><br>
@endforelse
<br><br>  
@if (!$loop->last)
----------------------------------------------------------
<br><br>  
@endif                    
@empty
No hay materias para cerrar en la fecha.
@endforelse