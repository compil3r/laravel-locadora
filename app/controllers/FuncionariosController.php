<?php

class FuncionariosController extends \BaseController {

	protected $user;

	function __construct(User $user){
		$this->beforeFilter('auth');
		$this->user = $user;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = $this->user->all();
		return View::make('funcionarios.index')->with('users', $users);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('funcionarios.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$this->user->fill($input); 
		if(!$this->user->isValid($input)){
			return Redirect::back()->withInput()->withErrors($this->user->errors);
		}
		$this->user->password = Hash::make($input['password']);
		$this->user->save();
		return Redirect::route('funcionarios.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id);
		return View::make('funcionarios.show')->with('user', $user);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$this->user = $this->user->find($id);
		return View::make('funcionarios.edit')->withUser($this->user);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$this->user = $this->user->find($id);

		$input = Input::all();

		$password = $this->user->password;

		$this->user->fill($input);

		if(!$input['password']) {
			$this->user->password = $password;
		} else {
			$this->user->password = Hash::make($input['password']);
		
		}

		if(!$this->user->isValid()) {
			return Redirect::back()->withInput()->withErrors($this->user->errors);
		}

		$this->user->save();
		return Redirect::route('funcionarios.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->user = $this->user->find($id);
		$this->user->delete();

		return Redirect::route('funcionarios.index');
	}


}
