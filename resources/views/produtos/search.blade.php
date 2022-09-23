<x-layout title="Controle de Produtos">
    <h1>Lista de Produtos</h1>
    
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
            <form action="{{ route('produtos.destroy', $produto->id) }}" method="post">
                @csrf
                <button class="btn btn-danger btn-sm">Excluir</button>
            </form>
        </li>
        @endforeach
    </ul>
</x-layout>