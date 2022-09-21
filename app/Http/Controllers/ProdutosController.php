<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutosFormRequest;
use App\Models\Categorias;
use App\Models\Lote;
use App\Models\Produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutosController extends Controller
{
    public function index(Request $request, Categorias $categoria)
    {
               
        $produtos = Produtos::all()->where('categoria',$categoria);
        
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');
        
        return view('produtos.index')
            ->with('produtos', $produtos)
            ->with('categoria',$categoria)
            ->with('mensagemSucesso',$mensagemSucesso);
    }

    public function create($categoria)
    {
     
        return view('produtos.create')->with('categoria', $categoria);
    }

    public function store(ProdutosFormRequest $request, $categoria)
    {
        
        Produtos::create($request->all());
        $request->session()->flash('mensagem.sucesso','Produto cadastrado com sucesso');

        return redirect(route('produtos.index',$categoria));
    }

    public function destroy(Produtos $id, Request $request)
    {
        $categoria = $id->categoria->id;
        $id->delete();

        $request->session()->flash('mensagem.sucesso',"Produto '{$id->nome}' removido com sucesso");

        return redirect(route('produtos.index',$categoria));
    }
       
}
