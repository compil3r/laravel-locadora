  <?php

class FilmeController extends \BaseController {

	protected $categoria;
	protected $filme;

	function __construct(Categoria $categoria, Filme $filme) {
		$this->beforeFilter('auth');
		$this->categoria = $categoria;
		$this->filme = $filme;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$filme = $this->filme->all();
		$categoria = $this->categoria->all();
		return View::make('filme.index')->with('filme', $filme)->with('categoria', $categoria);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categoria = Categoria::lists('nome', 'id');
		return View::make('filme.create')->with('categoria', $categoria);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$this->filme->fill($input);
		$this->filme->categoriaid = $input['categoria']; 

		$name =  Input::file('imagem')->getClientOriginalName(); //imagem!!!! \o/
		Input::file('imagem')->move('public/arquivos', $name);
		$this->filme->imagem = $name;

		$this->filme->save();
		
		return Redirect::route('filmes.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$filme = Filme::find($id);
		$categoria = Categoria::find($filme->categoriaid);
		return View::make('filme.show')->with('filme', $filme)->with('categoria', $categoria);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{	
		$categoria = Categoria::lists('nome', 'id');
		$this->filme = $this->filme->find($id);
		return View::make('filme.edit')->with('categoria', $categoria)->withFilme($this->filme);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$this->filme = $this->filme->find($id);

		$this->filme->nome = Input::get('nome');
		$this->filme->categoriaid = Input::get('categoria');
		$this->filme->sinopse = Input::get('sinopse');
		$this->filme->lancamento = Input::get('lancamento');
	
		if (!is_null(Input::get('imagem'))) {
		$name =  Input::file('imagem')->getClientOriginalName(); //imagem!!!! \o/
		Input::file('imagem')->move('public/arquivos', $name);
		$this->filme->imagem = $name;
	
	}
		$this->filme->save();

		return Redirect::route('filmes.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->filme = $this->filme->find($id);
		$this->filme->delete();

		return Redirect::route('filmes.index');
	}


}
