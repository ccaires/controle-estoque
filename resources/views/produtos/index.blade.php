<x-layout title="Controle de Produtos">
    <h1>Lista de Produtos</h1>
    <div class="container">
        <div class="row">
            <div class="col-3 mb-3">
                <a href="{{ route('produtos.create', $categoria->id) }}" class="btn btn-dark mb-2">Adicionar</a>
            </div>

            <div class="col-3 mb-3">
                <a href="/categorias" class="btn btn-warning">VOLTAR</a>
            </div>
        </div>
    </div>

    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{$mensagemSucesso}}
    </div>
    @endisset

    <ul class="list-group">
        @foreach($produtos as $produto)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{$produto->nome}}


            <span class="badge bg-secondary">
                {{$produto->quantidade}}
            </span>

            <form action="{{ route('produtos.destroy', $produto->id) }}" method="post">
                @csrf
                <button class="btn btn-danger btn-sm">Excluir</button>
            </form>


        </li>
        @endforeach
    </ul>
</x-layout>