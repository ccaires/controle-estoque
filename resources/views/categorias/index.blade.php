<x-layout title="Controle de Produtos">
    <h1>Lista de Categorias</h1>
    <a href="{{route('categorias.create')}}" class="btn btn-dark mb-2">Adicionar</a>

    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{$mensagemSucesso}}
    </div>
    @endisset

    <ul class="list-group">
        @foreach($categorias as $categoria)
        <a href="{{route('produtos.index', $categoria->id)}}">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{$categoria->categoria}}

                <form action="{{ route('categorias.destroy',$categoria->id) }}" method="post">
                    @csrf
                    <button class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </li>
        </a>


        @endforeach
    </ul>
</x-layout>