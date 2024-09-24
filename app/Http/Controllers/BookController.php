<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivroRequest;
use Illuminate\Http\Request;
use App\Models\ModelLivro;
use App\Models\User;

class BookController extends Controller
{
    
    private $objUser; //criamos para testar os objectos das tabelas
    private $objLivro;

    public function __construct()
    {
      $this->objUser = new User(); //objectos que venhem da model p trabalhar n BD
      $this->objLivro = new ModelLivro();  
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livro = ModelLivro::all();  //$livro recebe todos os registos da tabela livros 
        return view('index', compact('livro')); //compact onde passamos a variavel $livro
        //$livro = ModelLivro::all()->sortByDesc('id');//ordenar pelo id de forma decrescente
        //$livro = ModelLivro::all()->sortBy('titulo'); //ordenar os livros por titulo
        //dd($this->objUser->find(2)->relLivros);
        //dd($this->objLivro->find(4)->relUsers);
        //dd($this->objUser->all()); apresenta tudo que esta na tabela Users
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        return view('create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LivroRequest $request)
    {
        
        $cadastro=$this->objLivro->create([
            'titulo'=>$request->titulo,
            'pagina'=>$request->pagina,
            'preco'=>$request->preco,
             'user_id'=>$request->user_id
        ]);
        if($cadastro){
            return redirect('livros');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //echo $id; //para testar se esta pegar o id da visualicação
        $livro=ModelLivro::find($id);
        return view('show', compact('livro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $livro=ModelLivro::find($id); //encontra o id procurado ou selecionado
        $users=User::all();         //mostra todos os user ou actores
        return view('create', compact('livro', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LivroRequest $request, $id)
    {
        $this->objLivro->where(['id'=>$id])->update([
            'titulo'=>$request->titulo,
            'pagina'=>$request->pagina,
            'preco'=>$request->preco,
             'user_id'=>$request->user_id
        ]);
        return redirect('livros');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=$this->objLivro->destroy($id);
        return($del)?"sim":"não";//return del se sim ou não
    }
}
