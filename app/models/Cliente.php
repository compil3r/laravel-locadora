<?php

class Cliente extends Eloquent {
	
	protected $table = 'clientes';

	protected $fillable = ['nome', 'email', 'cpf'];

	public $rules = [
			'nome' => 'required',
			'email' => 'required|email',
			'cpf' => 'required'
		];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public $errors;

	public function isValid(){
		$validation= Validator::make($this->attributes, $this->rules);
		if($validation->passes()) return true;

		$this->errors = $validation->messages();
		return false; 
	}

}
?>