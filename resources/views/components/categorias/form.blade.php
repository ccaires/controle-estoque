<form action="{{ $action }}" method="post">
    @csrf
    @isset($categoria)
    @method('PUT')
    @endisset
    <div class="mb-3">
        <div class="row mt-3">
            <div class="col-md-4">
                <label for="categoria" class="form-label">Categoria:</label>
                <input type="text" 
                        id="categoria" 
                        name="categoria" 
                        class="form-control"
                        @isset($categoria)value="{{$categoria}}"@endisset>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Adicionar</button>
    <a href="/categorias" class="btn btn-warning ">VOLTAR</a>
</form>