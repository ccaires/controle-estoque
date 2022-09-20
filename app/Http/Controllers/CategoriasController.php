<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriasFormRequest;
use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function index(Request $request)
    {
        //dd($request->all());
        $categorias = Categorias::all();
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        return view('categorias.index')->with('categorias', $categorias)->with('mensagemSucesso',$mensagemSucesso);
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(CategoriasFormRequest $request)
    {
       // dd($request->all());

        Categorias::create($request->all());

        $request->session()->flash('mensagem.sucesso','Categoria cadastrada com sucesso');

        return redirect(route('categorias.index'));
    }

    public function destroy(Categorias $id, Request $request)
    {
        //dd($categoria->all());
        $id->delete();
        $categoria = $id->categoria;
        // dd($categoria);

        //dd($request->id);
        //Produtos::destroy($request->id);
        $request->session()->flash('mensagem.sucesso',"Categoria '{$categoria}' removido com sucesso");

        return redirect(route('categorias.index'));
    }
}
