<x-layout title="Editar Categoria">
    <h1>Adicionar nova Categoria</h1>
    <x-categorias.form action="{{ route('categorias.update', $categoria->id) }}" :categoria="$categoria->categoria" />
</x-layout>