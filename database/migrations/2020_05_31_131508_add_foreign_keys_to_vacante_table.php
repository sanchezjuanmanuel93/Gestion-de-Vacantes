<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class AddForeignKeysToVacanteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vacante', function(Blueprint $table)
		{
			$table->foreign('id_materia', 'fk_vacante_materia')->references('id')->on('materia')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vacante', function(Blueprint $table)
		{
			$table->dropForeign('fk_vacante_materia');
		});
	}

}
