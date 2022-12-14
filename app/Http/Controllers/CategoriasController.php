<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriasFormRequest;
use App\Models\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriasController extends Controller
{
    public function index(Request $request)
    {
        //dd($categoria->all());
        //$categorias = Categorias::all();
        $categorias = DB::table('categorias')->paginate(10);
        $index = Categorias::paginate(1);
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        return view('categorias.index',compact('index'))->with('categorias', $categorias)->with('mensagemSucesso',$mensagemSucesso);
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

    public function edit(Categorias $categoria)
    {
        //dd($categoria->categoria);
        return view('categorias.edit')->with('categoria',$categoria);
    }

    public function update(Categorias $categoria, Request $request )
    {
        $categoria->categoria = $request->categoria;
        $categoria->save();

        return redirect(route('categorias.index'))
            ->with('mensagem.sucesso', "Produto '$categoria->categoria' atualizado");
    }
}
