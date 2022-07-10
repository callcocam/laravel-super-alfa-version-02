<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Models\API;


use App\Models\Arquivo;
use App\Models\Coperat;
use App\Models\Produto;
use App\Models\Selo;
use SIGA\Models\AbstractModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProdutosCampanha extends AbstractModel
{
    use HasFactory;

    protected $guarded = ["id"];

    protected $table = "produtos_campanhas";

    public function coperat()
    {
        return $this->belongsTo(Coperat::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function imagem()    {

        return $this->hasOne(Arquivo::class, 'name','codigo_barras');
    }

    public function imagens()    {

        return $this->hasMany(Arquivo::class, 'name','codigo_barras')->select([
            "id",
            "name",
            "produto_id",
            "archive as link"
        ]);
    }

    public function selolink()    {

        return $this->belongsTo(Selo::class, 'selo_id');
    }
    public function grupos()
    {
        return $this->hasMany(GrupoProduto::class);
    }

    public function parceiros()
    {
        return $this->hasMany(GrupoProduto::class) ->select([
            "id",
            "produto_id",
            "descricao",
            "status",
            //"user_id",
           // "created_at",
           // "updated_at",
           // "deleted_at",
            "campanha_id",
            "produtos_campanha_id",
            "type",
        ])->where('type','parceiros');
    }

    public function familias()
    {
        return $this->hasMany(GrupoProduto::class)->select([
             "id",
             "produto_id",
             //"descricao",
            // "status",
             //"user_id",
            // "created_at",
            // "updated_at",
            // "deleted_at",
            // "campanha_id",
             "produtos_campanha_id",
             "type",
         ])->with(['produto'])->where('type','familia');
    }

    public function getPrecoNormalRealAttribute($value)
    {
        return \Str::beforeLast($value,',');
    }

    public function getPrecoNormalCentavosAttribute($value)
    {
       return \Str::afterLast($value,',');
    }

    public function getPrecoPromocionalRealAttribute($value)
    {
        return \Str::beforeLast($value,',');
    }

    public function getPrecoPromocionalCentavosAttribute($value)
    {
       return \Str::afterLast($value,',');
    }

    public function getPrecoDescontoRealAttribute($value)
    {
        return \Str::beforeLast($value,',');
    }

    public function getPrecoDescontoCentavosAttribute($value)
    {
       return \Str::afterLast($value,',');
    }

    public function getPrecoAppRealAttribute($value)
    {
        return \Str::beforeLast($value,',');
    }

    public function getPrecoAppCentavosAttribute($value)
    {
       return \Str::afterLast($value,',');
    }

    public function getTipoAttribute($value)
    {
       return  $value == "sim" ? 'app':'promo';
    }

}
