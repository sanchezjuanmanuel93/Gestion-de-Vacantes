Estimadx {{$usuario->nombre}} {{$usuario->apellido}}, su postulacion fue registrada con éxito.<br><br>
Materia: {{$vacante->materia->nombre}} <br>
Nombre Puesto: {{$vacante->nombre_puesto}} <br>
Descripción Puesto: {{$vacante->descripcion_puesto}} <br>     
Fecha Apertura: {{$vacante->fecha_apertura}} <br>    
Fecha Cierre Estipulada: {{$vacante->fecha_cierre_estipulada}} <br>
<a href="{{route('vacante.show', $vacante->id)}}">Link</a><br>