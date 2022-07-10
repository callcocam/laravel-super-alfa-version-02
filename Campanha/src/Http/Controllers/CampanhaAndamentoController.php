<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Campanha\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Midia;
use Campanha\Models\BgCartaz;
use Campanha\Models\API\Campanha;
use Campanha\Models\API\ProdutosCampanha;
use Illuminate\Http\Request;
//use \Bkwld\Cloner\Cloneable;



class CampanhaAndamentoController extends Controller
{
    public function index(Request $request)
    {
        $campanhas = Campanha::query()
         ->select([
            "id",
            "nome",
            //"slug",
           // "cover",
            //"quantidade",
           // "quantidade_estimada",
            "data_inicio",
            "data_fim",
            //"bg_lamina",
           // "selo_mais_desconto",
            //"cor_fonte_promo",
            //"cor_fonte_app",
            //"bg_card",
            //"bg_stories",
            //"bg_encarte",
            "status",
            //"user_id",
            //"created_at",
            //"updated_at",
            //"deleted_at",
            "type",
            //"exibir_borda_produto_lamina",
            //"tamanho_borda_produto_lamina",
            //"tamanho_arredondamento_produto_lamina",
         ])
        ->where('status', 'published')
           ->with(['parent', 'categorias_coperat','loja_campanha']);
           
          // $campanhas;

    return response()->json($campanhas->paginate()->toArray());
    }
}