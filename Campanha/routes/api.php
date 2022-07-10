<?php
 /**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

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
Route::prefix('api')
->middleware('api')->group(function (\Illuminate\Routing\Router $route){
    Route::prefix('campanhas')->group(function (\Illuminate\Routing\Router $route){
        $route->get("andamento", [\Campanha\Http\Controllers\CampanhaAndamentoController::class,'index'])->name('api.campanhas.andameto');
        $route->get("midias/{id}/campanha", [\Campanha\Http\Controllers\CampanhaReactController::class,'index'])->name('api.campanhas.midias.react');
    });
});