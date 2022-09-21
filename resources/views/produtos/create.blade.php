<x-layout title="Cadastro Produto">
    <h1>Adicionar novo Produto</h1>
    <form action="{{route('produtos.store', $categoria)}}" method="post">
        @csrf
        <div class="mb-3">
            <div class="row mt-3">
                <div class="col-md-8">
                    <label for="nome" class="form-label">Produto: </label>
                    <input type="text" id="nome" name="nome" class="form-control">
                    <input type="hidden" id="categoria_id" name="categoria_id" value="{{$categoria}}">
                </div>

                <div class="col-md-4">
                    <label for="lote_id" class="form-label">Lote:</label>
                    <input type="text" id="lote_id" name="lote_id" class="form-control">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="quantidade" class="form-label">Quantidade:</label>
                    <input type="number" id="quantidade" name="quantidade" class="form-control">
                </div>

                <div class="col-md-6">
                    <label for="vencimento" class="form-label">Vencimento:</label>
                    <input type="date" id="vencimento" name="vencimento" class="form-control">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Adicionar</button>
        <a href="{{route('produtos.index', $categoria)}}" class="btn btn-warning mt-3">VOLTAR</a>
    </form>
</x-layout>