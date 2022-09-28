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
        
        $p_produto = $request['p_produto'];
        if($p_produto != ""){
        $produtos = Produtos::where('nome','like',"%$p_produto%")
                ->get();

            return view('produtos.index')
            ->with('categoria',$categoria)
            ->with('p_produto',$p_produto)
            ->with('produtos',$produtos);
        } else {
        $p_produto = "";

        $produtos = Produtos::all()->where('categoria',$categoria);
        
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');
        
        return view('produtos.index')
            ->with('produtos', $produtos)
            ->with('categoria',$categoria)
            ->with('p_produto',$p_produto)
            ->with('mensagemSucesso',$mensagemSucesso);
        }      
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

    public function search(Request $request)
    {
                            
        $p_produto = $request->query('p_produto');

        $produtos = DB::table('produtos')
            ->where('nome','like',"%".$p_produto."%")->get();

        return view('produtos.search')
            ->with('produtos',$produtos);
    }

    public function edit(Produtos $produto)
    {
        $categoria = $produto->categoria_id;
        return view('produtos.edit')->with('produto',$produto)->with('categoria',$categoria);
    }

    public function update(Produtos $produto, Request $request)
    {
        $categoria = $produto->categoria_id;
        $produto->nome = $request->produto;
        $produto->lote_id = $request->lote_id;
        $produto->quantidade = $request->quantidade;
        $produto->vencimento = $request->vencimento;
        $produto->save();

        return redirect(route('produtos.index',$categoria))
            ->with('mensagem.sucesso', "Produto '$produto->nome' atualizado");
    }

    public function saida(Produtos $id, Categorias $categoria)
    {
        $categoria = $id->categoria_id;
        $produto = $id;
        return view('produtos.saida')
                ->with('produto', $produto)
                ->with('categoria',$categoria);
    }

    public function saidaUpdate(Produtos $id, Request $request)
    {
        $categoria = $id->categoria_id;
        
        DB::table('produtos')
                ->where('nome',$id->nome)
                ->decrement('quantidade',$request->quantidade);
        
        return redirect(route('produtos.index', $categoria))
                ->with('mensagem.sucesso',"Retirada do estoque realizada com êxito");
    }
}
