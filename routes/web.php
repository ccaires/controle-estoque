<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\Pesquisar;
use App\Http\Controllers\PesquisarController;
use App\Http\Controllers\ProdutosController;
use App\Models\Produtos;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/categorias');
});


Route::resource('/categorias', CategoriasController::class)
    ->only(['index', 'create', 'store', 'edit', 'update']);

Route::post('/categorias/destroy/{id}', [CategoriasController::class, 'destroy'])
    ->name('categorias.destroy');

Route::resource('/categorias/{categoria}/produtos', ProdutosController::class)
    ->only(['index', 'create', 'store']);

Route::resource('/categorias/produtos', ProdutosController::class)
    ->only(['edit', 'update', 'search']);

Route::post('/categorias/produtos/destroy/{id}', [ProdutosController::class, 'destroy'])
    ->name('produtos.destroy');

Route::get('/categorias/produtos/{id}/saida', [ProdutosController::class, 'saida'])
    ->name('produtos.saida');

Route::post('/categorias/produtos/{id}/saidaUpdate', [ProdutosController::class, 'saidaUpdate'])
    ->name('produtos.saidaUpdate');
