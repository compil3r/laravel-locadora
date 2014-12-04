<?php

class Endereco extends Eloquent {
	
	protected $table = 'endereco';

	public function users() {
		return $this->hasOn('User');
	}
}
?>