<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Campanha\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use SIGA\Models\AbstractModel;

class Coperat extends AbstractModel
{
    use HasFactory;

    protected $guarded = ['id'];

    public function produtos(){

        return $this->hasMany(ProdutosCampanha::class)->with(['imagens'])
        ->select([
            "id",
             "campanha_id",
            "produto_id",
            "coperat_id",
            "app as tipo",
            "descricao_comercial",
            "codigo_interno",
            "codigo_barras",
            "preco_normal as preco_normal_real",
            "preco_normal as preco_normal_centavos",
            "preco_promocional as preco_promocional_real",
            "preco_promocional as preco_promocional_centavos",
            "preco_desconto as preco_desconto_real",
            "preco_desconto as preco_desconto_centavos",
            "preco_app as preco_app_real",
            "preco_app as preco_app_centavos",
            "tipo_descricao",
            "template",
            "altura",
            "largura",
            "fundo",
            "borda_produto_lamina",
            "cor_borda_produto_lamina",
            "cor_fundo_produto_lamina",
            "arredondamento_produto_lamina",
            "storie_image_proprietes",
            "lamina_images_propriates",
            "card_images_propriates",
            "selo",
            "fracionado",
           // "tabloide",
            //"title_selo",
            //"subtitle_selo",
            "order",
            "selo_id",
        ]);
    }

    public function getProdutosAttribute($value){
        return $this->produtos()->where("campanha_id",$this->getOriginal('pivot_campanha_id'))->get();
    }

    public function produtos_campanha(){
        return $this->hasMany(ProdutosCampanha::class)->orderBy('order');
    }


}
