<x-layout title="Atualizar Produto">
    <h1>Atualizar Produto</h1>
    <form action="{{ route('produtos.update', $produto->id) }}" method="post">
    @csrf
    @isset($produto)
    @method('PUT')
    @endisset
    <div class="mb-3">
        <div class="row mt-3">
            <div class="col-md-8">
                <label for="produto" class="form-label">Produto: </label>
                <input type="text" 
                       id="produto"
                       name="produto"
                       class="form-control"
                       @isset($produto)value="{{$produto->nome}}"@endisset>
                <input type="hidden" id="categoria_id" name="categoria_id" value="{{$categoria}}">
            </div>
   
            <div class="col-md-4">
                <label for="lote_id" class="form-label">Lote:</label>
                <input type="text" 
                       id="lote_id"
                       name="lote_id"
                       class="form-control"
                       @isset($produto)value="{{$produto->lote_id}}"@endisset>
            </div>
        </div>
    
        <div class="row mt-3">
            <div class="col-md-6">
                <label for="quantidade" class="form-label">Quantidade:</label>
                <input type="number" 
                       id="quantidade"
                       name="quantidade"
                       class="form-control"
                       @isset($produto)value="{{$produto->quantidade}}"@endisset>
            </div>
   
            <div class="col-md-6">
                <label for="vencimento" class="form-label">Vencimento: {{$produto->vencimento}}</label>
                <input type="date" 
                       id="vencimento"
                       name="vencimento"
                       class="form-control"
                       @isset($produto) value="{{$produto->vencimento->format('Y-m-d')}}"@endisset>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Adicionar</button>
    <a href="{{ route('produtos.index', $categoria) }}" class="btn btn-warning mt-3">VOLTAR</a>
</form>
</x-layout>