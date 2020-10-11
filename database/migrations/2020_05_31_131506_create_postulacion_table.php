<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class CreatePostulacionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('postulacion', function(Blueprint $table)
		{
            $table->id();
			$table->timestamp('fecha_postulacion')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('puntaje')->nullable();
			$table->bigInteger('id_usuario')->unsigned();
			$table->integer('id_vacante')->index('fk_postulacion_vacante_idx');
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
		Schema::drop('postulacion');
	}

}
