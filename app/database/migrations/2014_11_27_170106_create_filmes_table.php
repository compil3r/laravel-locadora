<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('filmes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('filmes');
			$table->integer('categoriaid')->unsigned()->index();
			$table->foreign('categoriaid')->references('id')->on('categoria')->onDelete('cascade');
			$table->integer('lancamento');
			$table->integer('classificacao');
			$table->string('imagem');
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
		Schema::drop('filmes');
	}

}
