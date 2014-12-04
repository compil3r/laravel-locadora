<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocacaoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('locacao', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('clienteid')->unsigned()->index();
			$table->foreign('clienteid')->references('id')->on('clientes')->onDelete('cascade');
			$table->integer('funcionarioid')->unsigned()->index();
			$table->foreign('funcionarioid')->references('id')->on('funcionarios')->onDelete('cascade');
			$table->integer('filmesid')->unsigned()->index();
			$table->foreign('filmesid')->references('id')->on('filmes')->onDelete('cascade');
			$table->date('datalocacao');
			$table->date('datadevolucao');
			$table->decimal('total');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('locacao');
	}

}
