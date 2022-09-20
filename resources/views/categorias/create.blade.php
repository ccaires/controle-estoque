<x-layout title="Cadastro Produto">
    <h1>Adicionar nova Categoria</h1>
    <form action="{{route('categorias.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <div class="row mt-3">
                <div class="col-md-4">
                    <label for="categoria" class="form-label">Categoria:</label>
                    <input type="text" id="categoria" name="categoria" class="form-control">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
        <a href="/categorias" class="btn btn-warning ">VOLTAR</a>
    </form>
</x-layout>