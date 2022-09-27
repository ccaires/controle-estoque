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
<<<<<<< HEAD
    ->only(['index', 'create', 'store']);

Route::post('/categorias/produtos/destroy/{id}', [ProdutosController::class, 'destroy'])
    ->name('produtos.destroy');

// Route::post('/categorias/{categoria}/produtos', [ProdutosController::class, 'search'])
//     ->name('produtos.search');


// Route::post('/produtos/destroy/{id}',[ProdutosController::class, 'destroy'])
//     ->name('produtos.destroy');
=======
    ->only(['index', 'create', 'store','retirar']);

Route::get('/categorias/produtos/', [ProdutosController::class, 'search'])
    ->name('search');


Route::post('/categorias/produtos/destroy/{id}', [ProdutosController::class, 'destroy'])
    ->name('produtos.destroy');
>>>>>>> 76b306fe62708ea4c64dd87b3cb9e0781a7d42e4
