<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateVacanteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vacante', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nombre_puesto', 100)->nullable();
			$table->text('descripcion_puesto', 65535)->nullable();
			$table->dateTime('fecha_apertura');
			$table->dateTime('fecha_cierre_estipulada')->nullable();
			$table->dateTime('fecha_cierre')->nullable();
			$table->dateTime('fecha_orden_merito')->nullable();
			$table->integer('id_materia')->index('fk_vacante_materia_idx');
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vacante');
	}

}
