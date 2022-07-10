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

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/exportarprodutos', function () {
    return Excel::download(new \App\Exports\ProdutosExport(), 'produtos.xlsx');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function (\Illuminate\Http\Request $request){
    $type = $request->user()->type;
    return redirect(sprintf("%s/dashboard", $type));
})->name('dashboard');



Route::middleware(['auth:sanctum', 'verified'])->get('/atualizar/roles', function (\Illuminate\Http\Request $request){
   $roles = \App\Models\Role::all();
   foreach($roles as $role){
       $role->slug = trim($role->slug);
       $role->update();
   }
    return redirect()->back();
})->name('atualizar.roles');



Route::middleware(['auth:sanctum', 'verified'])->get('/atualizar/produto', function (\Illuminate\Http\Request $request){
    //descricao_completa

    $arquivos = \App\Models\Arquivo::query()->limit( request()->query('limit',100))->whereNull('atualizado')->get();
    // $produtos = \App\Models\Produto::query()->limit( request()->query('limit',100))->whereNull('search')->get();
    $i = request()->query('count',0);
    foreach($arquivos as $arquivo){
        $i++;
        if ($file = \App\Models\Produto::query()->where('cod_barras', $arquivo->name)->first()) {
            $arquivo->produto_id = $file->id;
            $arquivo->atualizado = $i;
            $arquivo->update();
            echo $i.'-';
        }
    }
    if($count = \App\Models\Arquivo::query()->whereNull('atualizado')->count()){
        return '<br><a href="/atualizar/produto?count='.$i.'&limit='.request()->query('limit',1000).'">'.$count.' para atualizar</a>';
    }
    return redirect()->route('dashboard');

})->name('atualizar.imagem.produto');




Route::middleware(['auth:sanctum', 'verified'])->get('/atualizar/search', function (\Illuminate\Http\Request $request){
    //descricao_completa
    if(request()->query('clear')){
        \App\Models\Produto::query()->whereNotNull('search')->update([
            'search'=>null
        ]);
    }
    $produtos = \App\Models\Produto::query()->limit( request()->query('limit',100))->whereIn('status',['compras-concluido'])->get();
    // $produtos = \App\Models\Produto::query()->limit( request()->query('limit',100))->whereNull('search')->get();
    $i = request()->query('count',0);
    foreach($produtos as $produto){
        $i++;
        $description =  $produto->cod_barras.' '
            .$produto->compra->codigo_interno.' '
            .$produto->marketing->descricao_comercial.' '
            .$produto->marketing->descricao_para_encarte.' ';
        $produto->search = $description;
        $produto->update();
        echo $i.'-';
    }
    if($count = \App\Models\Produto::query()->whereNull('search')->count()){
        return '<a href="/atualizar/search?count='.$i.'&limit='.request()->query('limit',3000).'">'.$count.' para atualizar</a>';
    }
    return redirect()->route('dashboard');

})->name('atualizar.search');



Route::middleware(['auth:sanctum', 'verified'])->get('/atualizar/unidade/medidas', function (\Illuminate\Http\Request $request){
    $medidas = \App\Models\Medida::query()->get();
    $i = request()->query('count',0);
    foreach($medidas as $medida){
        $i++;
      $produtos =   \App\Models\Produto::query()->where('unidade_medida', $medida->name)->whereNull('medida_name')->get();
        if($produtos->count()){
            foreach($produtos as $produto){
                $produto->medida_name = $produto->unidade_medida;
                $produto->unidade_medida = $medida->id;
                $produto->medida_id = $medida->id;
                $produto->update();
                echo $i.'-'.$produto->medida_name.'<br>';
            }
        }else{
            $produtos =   \App\Models\Produto::query()->where('unidade_medida', $medida->id)->whereNull('medida_name')->get();

            if($produtos->count()){
                foreach($produtos as $produto){
                    $produto->medida_name = $medida->name;
                    $produto->unidade_medida = $medida->id;
                    $produto->medida_id = $medida->id;
                    $produto->update();
                    echo $i.'-'.$produto->medida_name.'<br>';
                }
            }
        }
    }
    return ;

})->name('atualizar.unidade.medidas');





Route::middleware(['auth:sanctum', 'verified'])->get('/atualizar/codigo/interno', function (\Illuminate\Http\Request $request){
    $i = request()->query('count',0);
    $compras =   \App\Models\Compra::query()->where('codigo_interno', 'LIKE','%.%')->whereNotNull('codigo_interno')->get();
    if($compras->count()){
        foreach($compras as $compra){
            $compra->codigo_interno = str_replace(".","",$compra->codigo_interno);
//            dd($compra->codigo_interno);
            $compra->update();
            echo $i.'-'.$compra->medida_name.'<br>';
        }
    }
    return ;

})->name('atualizar.codigo-interno');




Route::middleware(['auth:sanctum', 'verified'])->get('/atualizar/tipo/embalagem', function (\Illuminate\Http\Request $request){
    $count = request()->query('count',0);
    $i = 0;
    $produtos =   \App\Models\Produto::query()->whereIn('status', ['marketing','criado','compras'])->get();
    if($produtos->count()){
        foreach($produtos as $produto){
            $tipo =  \App\Models\TipoEmbalagem::query()->find(data_get($produto, 'tipo_de_embalagem'));
            if($tipo){
                $i++;
                $produto->tipo_de_embalagem = $tipo->id;
                $produto->update();
                echo $tipo->name.' - <b>DE</b> '.data_get($produto, 'tipo_de_embalagem').' <b>PARA</b> '.$tipo->id.' '.$i.'<br>';
            }
        }
    }
    return ;

})->name('atualizar.tipo.embalagem');



 Route::middleware(['auth:sanctum', 'verified'])->get('/bcs/atualizar/unidade/medidas', [\App\Http\Controllers\BcImportController::class,'show'])->name('atualizar.unidade.medidas.bcs');
 Route::middleware(['auth:sanctum', 'verified'])->post('/bcs/atualizar/unidade/store', [\App\Http\Controllers\BcImportController::class,'store'])->name('atualizar.unidade.medidas.bcs.store');
//Route::get('/produtos/importar', [\App\Http\Controllers\ProdutosImportController::class,'show']);
//Route::post('/produtos/importar/salvar', [\App\Http\Controllers\ProdutosImportController::class,'store']);



Route::middleware(['auth:sanctum', 'verified'])->get('/atualizar-cod-barras-por-cod-interno', function (\Illuminate\Http\Request $request){
    //descricao_completa

    $produtos =   \App\Models\Produto::query()->limit( request()->query('limit',100))->where('cod_barras', 'sem codigo')->get();
    $i = request()->query('count',0);

//    dd(count($produtos));
    foreach($produtos as $produto){
        $i++;
        if($produto->compra->codigo_interno){
            $produto->cod_barras =  $produto->compra->codigo_interno;
            $produto->update();
//            dd($produto->cod_barras);
        }
    }
    if($count = \App\Models\Produto::query()->where('cod_barras', 'sem codigo')->count()){
        return '<br><a href="/atualizar-cod-barras-por-cod-interno?count='.$i.'&limit='.request()->query('limit',1000).'">'.$count.' para atualizar</a>';
    }
    return redirect()->route('dashboard');

});

Route::get('/listacoperates', function () {

    $coperats = \App\Models\Coperat::all();
    if($coperats){
        foreach($coperats as $coperat){
            echo $coperat->name .' - '. $coperat->produtos->count().'<br/>';
        }
    }
});




////////////////////////ID DA CATEGORIA COOPERAT//////////////////
//////////////////////////////// | //////////////////////////////////
//////////////////////////////// V //////////////////////////////////
// atualizar-categorias/6C4C77FB-2FF1-4F75-A339-7CF0B75E035F/cooperat
Route::get('/atualizar-categorias/{coperat_id}/cooperat', function ($coperat_id) {


    $categoriaCoperat= \App\Models\Coperat::find($coperat_id);
    $importBcs = \Excel::toArray(new \App\Imports\CoperatImport, \Storage::path( 'csv/produtos-bebidas-alcoolicas.xlsx'));
    $dataUpdated=[];
    if($categoriaCoperat){
        if(request()->query('confirm',false)){
            if($imports = data_get($importBcs,0)){
                foreach($imports as $coperat){
                    if($product = \App\Models\Produto::query()->where('cod_barras',data_get($coperat,1))->first()){
                        $product->coperat_id  = $categoriaCoperat->id;
                        $product->coperat_name  =data_get($coperat,2);
                        $dataUpdated[] = $product->update();
                    }
                    else{
                        if($compra = \App\Models\Compra::query()->where('codigo_interno',data_get($coperat,0))->first()){
                            if($product = $compra->produto){
                                $product->coperat_id  = $categoriaCoperat->id;
                                $product->coperat_name  =data_get($coperat,2);
                                $dataUpdated[] = $product->update();
                            }
                        }
                    }
                    
                }
                echo  sprintf("Atualizou %s produtos.<br/>", collect($dataUpdated)->count());
            }
        }
        else{
            $count = \App\Models\Produto::query()->where('coperat_id',$coperat_id)->count();
            echo "<a href='/atualizar-categorias/{$categoriaCoperat->id}/cooperat?confirm=1'>Tem certeza que deseja atualizar {$count} produtos com a categoria {$categoriaCoperat->name}</a><br/><br/>";
        }        
    }
    else{
        echo  sprintf("O ID %s da categoria não e valido", $coperat_id);
    }
  echo "para editar esse arquivo acesse routes\web.php";
});


