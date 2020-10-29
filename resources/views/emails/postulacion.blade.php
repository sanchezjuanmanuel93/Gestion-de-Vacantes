Estimadx {{$usuario->nombre}} {{$usuario->apellido}}, su postulacion fue registrada con éxito.<br><br>
Materia: {{$vacante->materia->nombre}} <br>
Nombre Puesto: {{$vacante->nombre_puesto}} <br>
Descripción Puesto: {{$vacante->descripcion_puesto}} <br>  
Fecha Apertura: {{\Carbon\Carbon::parse($vacante->fecha_apertura)->format('d-m-Y')}}    <br>    
Fecha Cierre Estipulada: {{\Carbon\Carbon::parse($vacante->fecha_cierre_estipulada)->format('d-m-Y')}} <br>
<a href="{{route('vacante.show', $vacante->id)}}">Link</a><br>