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

Route::middleware(['web', 'auth', 'verified'])
    ->prefix("admin")
    ->group(function (\Illuminate\Routing\Router $route) {
        $route->get("campanhas", \Campanha\Http\Livewire\Admin\Campanhas\ListComponent::class)->name('admin.campanhas');
        $route->get("campanhas/produtos/{model}/show", \Campanha\Http\Livewire\Admin\Campanhas\ShowComponent::class)->name('admin.campanhas.produtos.show');

        //ROTA PARA ORDERNAR PRDUTOS DA CAMPANHA
        $route->get("campanhas/produtos/{model}/order", \Campanha\Http\Livewire\Admin\Campanhas\OrderComponent::class)->name('admin.campanhas.produtos.order');
        $route->get("campanhas/produtos/{model}/order/categoria", \Campanha\Http\Livewire\Admin\Campanhas\OrderCategoryComponent::class)->name('admin.campanhas.produtos.order.categoria');


        $route->get('grupos-produtos',  \Campanha\Http\Livewire\Admin\Grupos\ListComponent::class)->name('grupos.produtos');
        $route->get('cartaz/bg',  \Campanha\Http\Livewire\Admin\Cartaz\Bg\ListComponent::class)->name('admin.cartaz.bg');
        $route->get('familia-produtos',  \Campanha\Http\Livewire\Admin\Familias\ListComponent::class)->name('admin.familia-produtos');
        $route->get('familia-produtos/{model}/show',  \Campanha\Http\Livewire\Admin\Familias\ShowComponent::class)->name('admin.familia-produtos.show');
        $route->get('familia-produtos/imports/familia',  \Campanha\Http\Livewire\Admin\Familias\ImportComponent::class)->name('admin.familia-produtos.import');


        $route->get('cards/individual',  \Campanha\Http\Livewire\Admin\Cards\Individual\ListComponent::class)->name('admin.cards.individual');
        $route->get('cards/individual/cadastrar',  \Campanha\Http\Livewire\Admin\Cards\Individual\CreateComponent::class)->name('admin.cards.individual.create');
        $route->get('cards/individual/{model}/editar',  \Campanha\Http\Livewire\Admin\Cards\Individual\EditComponent::class)->name('admin.cards.individual.edit');
        $route->get('cards/individual/{model}/generate',  [\Campanha\Http\Controllers\CardsIndividualController::class,'generate'])->name('admin.cards.individual.generate');


        $route->get('imprimir/{model}/cartazhorizontal',  [\Campanha\Http\Controllers\CampnhaController::class,'horizontal'])->name('admin.campanha.horizontal');
        $route->get('imprimir/{model}/cartazvertical',  [\Campanha\Http\Controllers\CampnhaController::class,'vertical'])->name('admin.campanha.vertical');
        $route->get('campanhas/{model}/laminas', \Campanha\Http\Livewire\Admin\Laminas\EditComponent::class)->name('campanhas.laminas.produtos');
        $route->get('campanhas/{model}/encartes', \Campanha\Http\Livewire\Admin\Encartes\EditComponent::class)->name('campanhas.encartes.produtos');
        $route->get('campanhas/{model}/cards', [\Campanha\Http\Controllers\CampnhaController::class,'cards'])->name('admin.campanha.cards');
        $route->get('campanhas/{model}/stories', [\Campanha\Http\Controllers\CampnhaController::class,'stories'])->name('admin.campanha.stories');
        $route->get('campanhas/{model}/banners', [\Campanha\Http\Controllers\CampnhaController::class,'banners'])->name('admin.campanha.banners');
//        $route->get('campanhas/{model}/laminas', [\Campanha\Http\Controllers\CampnhaController::class,'laminas'])->name('admin.campanha.laminas');
        $route->get('campanhas/{model}/regua', [\Campanha\Http\Controllers\CampnhaController::class,'regua'])->name('admin.campanha.regua');
      //  $route->get('cartaz',  [\Campanha\Http\Controllers\CampnhaController::class,'cartazForm'])->name('admin.cartaz');
        $route->get('cartaz', \Campanha\Http\Livewire\Admin\Cartaz\CreateComponent::class)->name('admin.cartaz');
        $route->post('imprimir/cartaz/individual',  [\Campanha\Http\Controllers\CartazesIndividuaisController::class,'cartaz'])->name('admin.cartaz.imprimir');
        $route->get('duplicar/campanha/{model}',  [\Campanha\Http\Controllers\CampnhaController::class,'duplicarCampanha'])->name('admin.campanhas.duplicar');

        $route->post('imprimir/regua/individual/promo',  [\Campanha\Http\Controllers\ReguasIndividuaisController::class,'reguaPromo'])->name('admin.campanhas.reguapromoindividual');
        $route->post('imprimir/regua/individual/app',  [\Campanha\Http\Controllers\ReguasIndividuaisController::class,'reguaApp'])->name('admin.campanhas.reguaappindividual');
    });


