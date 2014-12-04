<?php

class LocacaoController extends \BaseController {


	protected $user;
	protected $cliente;
	protected $filme;
	protected $locacao;
	protected $categoria;

	function __construct(Categoria $categoria, User $user, Cliente $cliente, Filme $filme, Locacao $locacao) {
		$this->beforeFilter('auth');
		$this->user = $user;
		$this->cliente = $cliente;
		$this->filme = $filme;
		$this->locacao = $locacao;
		$this->categoria = $categoria;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$filme = $this->filme->all();
		$cliente = $this->cliente->all();
		$user = $this->user->all();
		$locacao = $this->locacao->all();
		$categoria=$this->categoria->all();
		return View::make('locacao.index')->with('categoria', $categoria)->with('filme', $filme)->with('cliente', $cliente)->with('funcionario', $user)->with('locacao', $locacao);

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$cliente = Cliente::lists('nome', 'id');
		$filme = $this->filme->all();
		return View::make('locacao.create')->with('cliente', $cliente)->with('filme', $filme);

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$this->locacao->fill($input);
		$this->locacao->clienteid = $input['cliente'];
		$this->locacao->funcionarioid = Auth::user()->id; 
		$this->locacao->datalocacao = date('Y-m-d');
		$this->locacao->datadevolucao= date('Y-m-d', strtotime("+ 7 days"));

		$this->locacao->filmesid = $input['filme'];
		$this->filme = Filme::find($this->locacao->filmesid);
		$this->filme->locar();
		$this->locacao->save();

		return Redirect::route('locacao.index');


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
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$this->filme = Filme::find($id);
		$this->filme->devolver();

		return Redirect::route('locacao.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}



}
