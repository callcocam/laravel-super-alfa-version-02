<?php

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
Route::group(['middleware' => ['verified']], function () {
    // User & Profile...
    Route::get('profile', \App\Http\Livewire\App\Profile::class)
        ->name('profile.show');
});

Route::get('dashboard', \App\Http\Livewire\App\Dashboard::class)->name('dashboard');
Route::get('produtos/processo', \App\Http\Livewire\App\Produtos\ListComponent::class)->name('produtos');
Route::get('produtos/processo/cadastrar', \App\Http\Livewire\App\Produtos\CreateComponent::class)->name('produtos.cadastrar');
Route::get('produtos/processo/{model}/editar', \App\Http\Livewire\App\Produtos\EditComponent::class)->name('produtos.editar');
Route::get('produtos/aprovados', \App\Http\Livewire\App\Produtos\Aprovados\ListComponent::class)->name('produtos.aprovados');

Route::get('', function (){
    return redirect()->route('app.dashboard');
})->name('inicio');
