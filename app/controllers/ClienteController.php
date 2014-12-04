  <?php

class ClienteController extends \BaseController {

	protected $cliente;
	function __construct(Cliente $cliente){
		$this->beforeFilter('auth');
		$this->cliente = $cliente;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$cliente = $this->cliente->all();
		return View::make('clientes.index')->with('cliente', $cliente);

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('clientes.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$this->cliente->fill($input); 
		if(!$this->cliente->isValid($input)){
			return Redirect::back()->withInput()->withErrors($this->cliente->errors);
		}
		$this->cliente->save();
		return Redirect::route('clientes.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$this->cliente = $this->cliente->find($id);
		return View::make('clientes.edit')->withCliente($this->cliente);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$this->cliente = $this->cliente->find($id);

		$input = Input::all();

		$this->cliente->fill($input);

		if(!$this->cliente->isValid()) {
			return Redirect::back()->withInput()->withErrors($this->cliente->errors);
		}

		$this->cliente->save();
		return Redirect::route('clientes.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->cliente = $this->cliente->find($id);
		$this->cliente->delete();

		return Redirect::route('clientes.index');
	}


}
