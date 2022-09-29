<x-layout title="Controle de Produtos">
    <h1>Lista de Produtos</h1>
    <div class="container">
        <div class="row">
            <div class="col-3 mb-3">
                <a href="{{ route('produtos.create', $categoria->id) }}" class="btn btn-dark mb-2">Adicionar</a>
            </div>

            <div class="col-3 mb-3">
                <a href="{{route('categorias.index', $categoria)}}" class="btn btn-warning">VOLTAR</a>
            </div>
        </div>
    </div>

    <form action="{{route('produtos.index', $categoria->id)}}" method="get">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <input type="text" class="form-control" name="p_produto" value="{{$p_produto}}" placeholder="Pesquisar...">
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-info">Pesquisar</button>
                </div>
            </div>
        </div>
    </form>

    @isset($mensagemSucesso)
    <div class="alert alert-success mt-2">
        {{$mensagemSucesso}}
    </div>
    @endisset


    <div class="d-flex justify-content-between">
        <h5>Produto</h5>
        <h5>Quantidade</h5>
        <h5>Vencimento</h5>
        <h5>Ação</h5>
    </div>


    <ul class="list-group">
        @foreach($produtos as $produto)
        <li class="list-group-item d-flex justify-content-between align-items-center btn-sm">
            <div class="d-flex">
            {{$produto->nome}}
            </div>

            <div class="d-flex justify-content-between">
                    {{$produto->quantidade}}
            </div>
            <div class="d-flex justify-content-between">
                    {{$produto->vencimento}}
            </div>

    <span>
        <div class="d-flex justify-content-between">
            <a href="{{ route('produtos.saida', $produto->id) }}" class="btn btn-primary btn-sm mb-10 ms-2">Saída Estoque</a>
            <a href="{{route('produtos.edit', $produto->id) }}" class="btn btn-primary btn-sm mb-10 ms-2">Editar Produto</a>
            <form action="{{ route('produtos.destroy', $produto->id) }}" method="post">
                @csrf
                <button class="btn btn-danger btn-sm ms-2">Excluir</button>
            </form>
        </div>
    </span>

    </li>
    @endforeach
    {{ $paginacao->links() }}
    </ul>
</x-layout>