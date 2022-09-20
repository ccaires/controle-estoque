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
    public function index(Request $request,Categorias $categoria)
    {
        $produtos = Produtos::all()->where('categoria',$categoria);
        //dd($produtos->all());

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

    public function store(ProdutosFormRequest $request)
    {
        $categoria = $request->categoria_id;

        // $categoria = DB::table('categorias')->get();
        // dd($categoria->id);

        Produtos::create($request->all());
     
        $request->session()->flash('mensagem.sucesso','Produto cadastrado com sucesso');

        // return redirect()->action([ProdutosController::class,'index']);
        //return redirect(route('produtos.index'))->with('categoria', $categoria);
        return redirect("http://localhost:8000/categorias/$categoria/produtos");
    }

    public function destroy(Produtos $id, Request $request)
    {
        $id->delete();
        //dd($id);
        $categoria = $id->categoria_id;
        // dd($categoria);

        //dd($request->id);
        //Produtos::destroy($request->id);
        $request->session()->flash('mensagem.sucesso',"Produto '{$id->nome}' removido com sucesso");

        // return redirect(route('produtos.index'))->with('categoria', $categoria);
        return redirect("http://localhost:8000/categorias/$categoria/produtos");
    }

       
}
