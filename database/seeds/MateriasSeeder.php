<?php

use Illuminate\Database\Seeder;
use App\Materia;

class MateriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Materia::create(
            ['nombre' => "Entornos Gráficos", 'descripcion' => "En esta asignatura el alumno se enfrentará a las distintas etapas necesarias para llevar a cabo el desarrollo y puesta en funcionamiento de un sitio web. Desde la planificación del mismo y su diseño visual hasta la definición de su estructura funcional con su programación y puesta en marcha en la web, se irán tratando todos los conceptos fundamentales y las herramientas más utilizadas para realizar el proceso. Ajustándose al cumplimiento de las normas y estándares internacionales, se hará hincapié en las cuestiones de accesibilidad y usabilidad del sitio así como en la utilización de los Tests de validación de estándares, la presencia en Internet y la indexación en buscadores. Se utilizarán los lenguajes HTML y XHTML para la publicación de contenidos en la Web, CSS para la presentación de los mismos, y JavaScript y PHP para la programación de páginas dinámicas."]
        );

        Materia::create(
            ['nombre' => "Análisis y Diseño de Datos e información", 'descripcion' => "En esta electiva te proponemos centrarnos, dentro del modelado de sistemas, en las entradas y salidas del mismo.
            Sólo con casos de uso, pero sin entradas y salidas especificadas correctamente, el modelo del sistema estaria incompleto, sería una obra sin terminar ... Asi como cuando leemos un libro es mucho mejor tener un diccionario al lado, como analistas, al modelar un sistema, si especificamos entradas y salidas a través del diccionario de datos, ayudará a los arquitectos y desarrolladores de software a comprender exactamente que se debe ingresar o mostrar en cada requerimiento y cómo preparar las pruebas para validar los datos y sus tipos.\n Paralelamente, complementaremos al diccionario de datos con prototipos o bosquejos de interfaces. Estos bosquejos nos ayudan a los analistas a asegurarnos de que entendimos lo que el usuario quiere que el sistema haga, y a los usuarios asegurarse de que se entendió lo que ellos quieren que el sistema haga. Este entendimiento comun lo podemos lograr entre analistas y usuarios trabajando en conjunto con los bosquejos o prototipos de entradas y salidas, utilizando herramientas automatizadas como Invision. Esto nos permite validar los requerimientos y detectar nuevos. Es la forma de 'introducir' e 'involucrar' al usuario en el proyecto, ya que el prototipo inicia el diálogo hombre-máquina. \n            Por último vas a poder aprender y expermientar como es la orquestación de un manual de uso o ayuda en linea de un sistema, que facilitará la comprensión de las tareas que el usuario podrá realizar en el sistema para alcanzar sus metas."]
        );

        Materia::create(
            ['nombre' => "Minería de Datos", 'descripcion' => "La explosión de datos derivada de los avances tecnológicos y de la globalización, hace necesaria la administración de los mismos y su organización para que sirvan como input para la toma de decisiones. Dentro de las herramientas que contribuyen al Sistema de Soporte a la Toma de Decisiones en una empresa, encontramos las soluciones OLAP y de Minería de Datos. \n Las herramientas de Minería de Datos predicen futuras tendencias y comportamientos, permitiendo en los negocios tomar decisiones proactivas y conducidas por un conocimiento acabado de la información. Los análisis prospectivos automatizados ofrecidos por un producto así van más allá de los eventos pasados provistos por herramientas retrospectivas típicas de Sistemas de Soporte a las Decisiones. Las herramientas de Minería de Datos pueden responder a preguntas de negocios que tradicionalmente consumen demasiado tiempo para poder ser resueltas. Estas herramientas exploran las bases de datos en busca de patrones ocultos, encontrando información predecible que un experto no puede llegar a encontrar porque se encuentra fuera de sus expectativas."]
        );
    }
}
