<x-layout title="Quantidade">
    <h1>Retirada do Estoque</h1>
    <form action="{{ route('produtos.saidaUpdate', $produto->id) }}" method="post">
    @csrf
  
    <div class="mb-3">   
        <div class="row mt-3">
            <div class="col-md-6">
                <label for="quantidade" class="form-label">Quantidade:</label>
                <input type="number" 
                       id="quantidade"
                       name="quantidade"
                       class="form-control"
                       @isset($produto)value="{{$produto->quantidade}}"@endisset>
                       <input type="hidden" id="categoria_id" name="categoria_id" value="{{$categoria}}">
                      
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">SALVAR</button>
    <a href="{{ route('produtos.index', $categoria) }}" class="btn btn-warning mt-3">VOLTAR</a>
</form>
</x-layout>