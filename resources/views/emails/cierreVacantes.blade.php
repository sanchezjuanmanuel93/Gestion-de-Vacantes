Se realizó un cierre de vacantes<br>
Fecha de cierre: {{$fechaHora}}<br><br>
Materias<br><br>
@forelse($vacantes as $vacante)
Nombre Puesto: {{$vacante->nombre_puesto}} <br>
Descripción Puesto: {{$vacante->descripcion_puesto}} <br>     
Fecha Apertura: {{$vacante->fecha_apertura}} <br>    
Fecha Cierre Estipulada: {{$vacante->fecha_cierre_estipulada}} <br>    
<br><br>                      
@empty
No hay materias para cerrar en la fecha.
@endforelse