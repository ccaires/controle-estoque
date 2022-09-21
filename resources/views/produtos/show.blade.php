<x-layout title="Controle de Produtos">
    <h1>Lista de Produtos</h1>
    <div class="container">
        <div class="row">
            <div class="col-3 mb-3">
                <a href="{{route('produtos.index')}}" class="btn btn-warning">VOLTAR</a>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center">
        <h5>Produto</h5>
        <h5>Quantidade</h5>
        <h5>Vencimento</h5>
        <h5>Ação</h5>
    </div>

    <ul class="list-group">
        @foreach($produtos as $produto)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{$produto->nome}}
            <div class="d-flex justify-content-between">
                <span>
                    {{$produto->quantidade}}
                </span>
            </div>
            <div class="d-flex">
                <span>
                    {{$produto->vencimento}}
                </span>
            </div>
            <form action="{{ route('produtos.destroy', $produto->id) }}" method="post">
                @csrf
                <button class="btn btn-danger btn-sm">Excluir</button>
            </form>
        </li>
        @endforeach
    </ul>
</x-layout>