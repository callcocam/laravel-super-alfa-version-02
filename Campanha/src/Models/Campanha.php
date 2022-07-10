<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Models;


use App\Models\Coperat;
use App\Models\Loja;
use Illuminate\Database\Eloquent\SoftDeletes;
use SIGA\Models\AbstractModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Campanha extends AbstractModel
{
    use \Bkwld\Cloner\Cloneable, HasFactory, SoftDeletes;

    protected $cloneable_relations = ['produtos', 'countcoperats', 'loja'];
    protected $table = "campanhas";

    protected $guarded = ["id"];

    protected $appends = ["coperats","lojas"];

    protected $dates = ['data_inicio:Y-m-d', 'data_fim:Y-m-d'];

    public function produtos()
    {
        return $this->hasMany(ProdutosCampanha::class);
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
    ])
        ->with(['grupos_produtos_campanha','grupos_produtos_familia_campanha']);
    }


    public function coperat()
    {
        if (auth()->user()->hasRole('compras')) {
            $coperats = auth()->user()->coperats()->pluck('name', 'id')->toArray();
            return $this->belongsToMany(Coperat::class)->whereIn('id', array_keys($coperats));
        } else {
            return $this->belongsToMany(Coperat::class);
        }
    }

    public function loja(){
        return $this->belongsToMany(Loja::class);
    }

    public function loja_campanha(){
        return $this->belongsToMany(Loja::class);
    }

    public function getLojasAttribute()
    {
        return $this->loja()->pluck('nome', 'id');
    }

    public function countcoperats()
    {
        return $this->belongsToMany(Coperat::class);
    }

    public function getCoperatsAttribute()
    {
        if(auth()->user()){
            return $this->coperat()->pluck('name', 'id');
        } else {
            return $this->belongsToMany(Coperat::class)->get();
        }

    }

    protected function slugFrom()
    {
        return "nome";
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            $model->produtos()->delete();
        });
    }


}
