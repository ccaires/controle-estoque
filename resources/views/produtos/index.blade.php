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

<<<<<<< HEAD
    <form action="{{route('produtos.index', $categoria->id)}}" method="get">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-4 mb-3">
                    <input type="text" class="form-control" name="p_produto" value="{{$p_produto}}" placeholder="Pesquisar...">
=======
    <form action="" method="GET">
        <div class="container mb-4">
            <div class="row">
                <div class="col-4">
                    <input type="search" id="p_produto" name="p_produto" class="form-control" value="{{$p_produto}}">
>>>>>>> 76b306fe62708ea4c64dd87b3cb9e0781a7d42e4
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-info">Pesquisar</button>
                </div>
            </div>
        </div>
    </form>

    @isset($mensagemSucesso)
    <div class="alert alert-success">
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
                <button class="btn btn-primary btn-sm">Editar</button>
            </form>

            <form action="{{ route('produtos.destroy', $produto->id) }}" method="post">
                @csrf
                <button class="btn btn-danger btn-sm">Excluir</button>
            </form>

            <form action="" method="post">
                @csrf
                <button class="btn btn-danger btn-sm bi bi-cart-dash"></button>
            </form>

        </li>
        @endforeach
    </ul>
</x-layout>