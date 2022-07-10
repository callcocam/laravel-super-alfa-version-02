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
    Route::get('profile', \App\Http\Livewire\Admin\Profile::class)
        ->name('profile.show');
});

Route::get('produtos/{model}/download', [\App\Http\Controllers\ArquivoController::class, 'store'])->name('produtos.download');

Route::get('dashboard', \App\Http\Livewire\Admin\Dashboard::class)->name('dashboard');
Route::get('users', \App\Http\Livewire\Admin\Users\ListComponent::class)->name('users');
Route::get('fornecedores', \App\Http\Livewire\Admin\Fornecedores\ListComponent::class)->name('fornecedores');
Route::get('roles', \App\Http\Livewire\Admin\Roles\ListComponent::class)->name('roles');
Route::get('permissions', \App\Http\Livewire\Admin\Permissions\ListComponent::class)->name('permissions');
Route::get('produtos', \App\Http\Livewire\Admin\Produtos\ListComponent::class)->name('produtos');
Route::get('produtos/atualizar/status', \App\Http\Livewire\Admin\Produtos\Status\ListComponent::class)->name('produtos.status');
Route::get('produtos/atualizar/imagens', \App\Http\Livewire\Admin\Produtos\Imagens\ListComponent::class)->name('produtos.imagens');
Route::get('produtos/medidas/imports', \App\Http\Livewire\Admin\Produtos\Imports\MedidasImportComponent::class)->name('produtos.medidas.imports');
Route::get('produtos/arquivados', \App\Http\Livewire\Admin\Produtos\Arquivados\ListComponent::class)->name('produtos.arquivados');
Route::get('compras', \App\Http\Livewire\Admin\Compras\ListComponent::class)->name('compras');
Route::get('compras/aprovados', \App\Http\Livewire\Admin\Compras\Aprovados\ListComponent::class)->name('compras.aprovados');
Route::get('concluidos', \App\Http\Livewire\Admin\Concluidos\ListComponent::class)->name('concluidos');
Route::get('marketing', \App\Http\Livewire\Admin\Marketing\ListComponent::class)->name('marketing');
Route::get('cadastros', \App\Http\Livewire\Admin\Cadastros\ListComponent::class)->name('cadastros');
Route::get('estoques', \App\Http\Livewire\Admin\Estoques\ListComponent::class)->name('estoques');
Route::get('arquivos', \App\Http\Livewire\Admin\Arquivos\ListComponent::class)->name('arquivos');
Route::get('fotos', \App\Http\Livewire\Admin\Arquivos\Fotos\ListComponent::class)->name('fotos');
Route::get('coperats', \App\Http\Livewire\Admin\Coperats\ListComponent::class)->name('coperats');
Route::get('bc', \App\Http\Livewire\Admin\Bcs\ListComponent::class)->name('bc');
Route::get('segmentos', \App\Http\Livewire\Admin\Segmentos\ListComponent::class)->name('segmentos');
Route::get('sub-segmentos', \App\Http\Livewire\Admin\SubSegmentos\ListComponent::class)->name('sub-segmentos');
Route::get('medidas', \App\Http\Livewire\Admin\Medidas\ListComponent::class)->name('medidas');
Route::get('logs', \App\Http\Livewire\Admin\Logs\ListComponent::class)->name('logs');
Route::get('lojas', \App\Http\Livewire\Admin\Lojas\ListComponent::class)->name('lojas');
Route::get('clusters', \App\Http\Livewire\Admin\Clusters\ListComponent::class)->name('clusters');
Route::get('produtos/descricao/para/encarte', \App\Http\Livewire\Admin\Produtos\Description\ListComponent::class)->name('produtos.descriptions');
Route::get('produtos/cadastro/erp', \App\Http\Livewire\Admin\Produtos\ERP\CreateComponent::class)->name('produtos.erp.create');
Route::get('produtos/cadastro/api', \App\Http\Livewire\Admin\Produtos\Api\CreateComponent::class)->name('produtos.api.create');
Route::get('midias/cadastro', \App\Http\Livewire\Admin\Midias\CreateComponent::class)->name('midias.create');

Route::get('/verendpoint', function () {
  return redirect(url('/api/produto/7908216108233'));
})->name('verendpoint');

Route::get('/generate-permissions', function () {
    \SIGA\Acl\Helpers\LoadRouterHelper::save();
    return redirect()->back();
})->name('generate-permissions');


Route::get('/update-produtos', function () {
    $produtos = \App\Models\Produto::query()->get();
    foreach ($produtos as $produto) {
        $segmento_name = \App\Models\TipoEmbalagem::query()->where('name', $produto->tipo_de_embalagem)->first();
        if ($segmento_name){
            $produto->tipo_de_embalagem = $segmento_name->id;
            $produto->update();
        }
//        if (!$produto->subsegmento_name) {
//            $volume_de_embalagem = \App\Models\VolumeEmbalagem::query()->where('name', $produto->subsegmento_name)->first();
//            if ($volume_de_embalagem){
//                $produto->volume_de_embalagem = $volume_de_embalagem->id;
//                $produto->update();
//            }
//        }

    }

    $produtos = \App\Models\Produto::query()->whereNull('medida_name')->get();
    foreach ($produtos as $produto) {

//        if (!$produto->subsegmento_name) {
//            $volume_de_embalagem = \App\Models\VolumeEmbalagem::query()->where('name', $produto->subsegmento_name)->first();
//            if ($volume_de_embalagem){
//                $produto->volume_de_embalagem = $volume_de_embalagem->id;
//                $produto->update();
//            }
//        }

        $unidade = \App\Models\Medida::query()->where('name', $produto->unidade_medida)->first();
        if ($unidade){
            $produto->unidade_medida = $unidade->id;
            $produto->update();
        }
    }
    return redirect()->back();
})->name('generate-permissions');


Route::middleware(['auth:sanctum', 'verified'])->get('/simplus/login', function (\Illuminate\Http\Request $request){
    \App\Services\SimplusService::make()->auth();
      return ;
  })->name('simplus.login');


Route::middleware(['auth:sanctum', 'verified'])->get('/simplus/produtos', function (\Illuminate\Http\Request $request){
    \App\Services\ProductsService::make()->get();
      return ;
  })->name('simplus.login');


  
Route::middleware(['auth:sanctum', 'verified'])->get('/produtos/concluído/expots', [App\Http\Controllers\ProdutosExportsController::class, 'export'])->name('produtos.concluído.expots');
