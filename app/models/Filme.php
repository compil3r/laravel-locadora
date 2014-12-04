<?php

class Filme extends Eloquent {
	
	protected $table = 'filmes';

	protected $fillable = ['nome', 'sinopse', 'categoriaid', 'lancamento', 'classificacao', 'imagem', 'status'];

	public $rules = [
			'nome' => 'required',
			'categoria' => 'required'
		];

	public function devolver() {
		$this->status = 0;
		$this->save();
	}

	public function locar() {
		$this->status = 1;
		$this->save();
	}


}