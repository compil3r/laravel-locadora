<?php

class Locacao extends Eloquent {
	
	protected $table = 'locacao';

	protected $fillable = ['clienteid', 'funcionarioid', 'filmesid', 'datalocacao', 
	'datadevolucao', 'total'];

	public $rules = [
			'cliente' => 'required',
			'funcionario' => 'required',
			'filmes' => 'required'
		];

	public function filmes() {
		return $this->hasOne('Filme');
	}
}