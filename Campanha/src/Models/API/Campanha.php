<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Models\API;

use App\Models\Loja;
use SIGA\Models\AbstractModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Campanha extends AbstractModel
{
    use \Bkwld\Cloner\Cloneable, HasFactory;

    //protected $with = ['parent', 'categorias_coperat'];
    protected $table = "campanhas";

    protected $guarded = ["id"];


    protected $dates = ['data_inicio:Y-m-d', 'data_fim:Y-m-d'];

    public function parent()
    {
        return $this->hasMany(ProdutosCampanha::class)->select([
            "id",
            "descricao_comercial",
           // "slug",
            "codigo_interno",
            "codigo_barras",
            "produto_id",
            //"coperat_id",
           // "descricao_auxiliar",
           // "quantidade_parcelas",
           // "qde_por_cx",
           // "tipo_embalagem",
            "preco_custo",
            "preco_normal",
            "preco_promocional",
            "preco_desconto",
            "preco_caixa",
            "preco_app",
           // "app",
            "status",
           // "user_id",
            "campanha_id",
           // "created_at",
            //"updated_at",
            //"deleted_at",
            //"card_images_propriates",
            //"tipo_descricao",
           // "lamina_images_propriates",
           // "template",
            //"altura",
            //"largura",
            //"fundo",
            //"borda_produto_lamina",
            //"cor_borda_produto_lamina",
            //"cor_fundo_produto_lamina",
            //"arredondamento_produto_lamina",
            //"storie_image_proprietes",
            //"selo",
            //"fracionado",
            //"tabloide",
            //"title_selo",
            //"subtitle_selo",
            //"order",
            //"selo_id",
        ])->whereNotNull('produto_id')->with('parceiros','familias');
    }

    public function produtos_campanha()
    {
        return $this->hasMany(ProdutosCampanha::class)
    ->select([
         //   "id",
            "descricao_comercial",
          //  "slug",
            "codigo_interno",
            "codigo_barras",
          //  "produto_id",
           // "coperat_id",
            "descricao_auxiliar",
            "quantidade_parcelas",
           // "qde_por_cx",
           // "tipo_embalagem",
            "preco_custo",
            "preco_normal",
            "preco_promocional",
            "preco_desconto",
            "preco_caixa",
            "preco_app",
            "app",
            "status",
           // "user_id",
           // "campanha_id",
           // "created_at",
           // "updated_at",
           // "deleted_at",
            //"card_images_propriates",
           // "tipo_descricao",
           // "lamina_images_propriates",
           // "template",
           // "altura",
            //"largura",
            //"fundo",
            //"borda_produto_lamina",
            //"cor_borda_produto_lamina",
            //"cor_fundo_produto_lamina",
            //"arredondamento_produto_lamina",
            //"storie_image_proprietes",
            //"selo",
            //"fracionado",
            //"tabloide",
            //"title_selo",
            //"subtitle_selo",
            //"order",
            //"selo_id",
    ])->with(['grupos_produtos_campanha','grupos_produtos_familia_campanha']);
    }


    public function categorias_coperat()
    {
        return $this->belongsToMany(Coperat::class)->select([
            "id",
            //"user_id",
            "name",
            //"slug",
            "codigo",
            //"access",
            "status",
            "description",
            //"created_at",
            //"updated_at",
            //"deleted_at"
        ]);
    }


    public function categorias()
    {
        return $this->belongsToMany(Coperat::class)->select([
            "id",
            //"user_id",
            "name",
            //"slug",
            "codigo",
            //"access",
            "status",
            "description",
            //"created_at",
            //"updated_at",
            //"deleted_at"
        ]);
    }

    public function loja_campanha(){
        return $this->belongsToMany(Loja::class)->select([
            "id",
            "nome",
            //"slug",
            "codigo",
            //"status",
            //"user_id",
            //"created_at",
            //"updated_at",
            //"deleted_at",
            "cnpj",
        ]);
    }

    public function lojas(){
        return $this->belongsToMany(Loja::class)->select([
            "id",
            "nome"
        ]);
    }
}
