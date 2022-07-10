<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Models;


use App\Models\Arquivo;
use App\Models\Coperat;
use App\Models\Produto;
use App\Models\Selo;
use Illuminate\Database\Eloquent\SoftDeletes;
use SIGA\Models\AbstractModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProdutosCampanha extends AbstractModel
{
    use HasFactory, SoftDeletes;

    protected $guarded = ["id"];

    protected $table = "produtos_campanhas";

    protected $appends = ["grupos","selo"];
    
    protected $width = ["grupos",'coperat'];


    protected function slugFrom()
    {
        return 'descricao_comercial';
    }



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
    public function selolink()    {

        return $this->belongsTo(Selo::class, 'selo_id');
    }

    public function selos()    {

        return $this->belongsToMany(Selo::class);
    }

    
    public function getSeloAttribute()    {

        return $this->belongsToMany(Selo::class)->pluck('id','id');
    }

    public function grupos()
    {
        return $this->hasMany(GrupoProduto::class);
    }

    public function grupos_produtos()
    {
        return $this->hasMany(GrupoProduto::class)->where('type','parceiros');
    }

    public function grupos_produtos_familia()
    {
        return $this->hasMany(GrupoProduto::class)->where('type','familia')->orderBy('order');
    }

    public function grupos_produtos_campanha()
    {
        return $this->hasMany(GrupoProduto::class)
        ->select([
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
        ])
        ->where('type','parceiros');
    }

    public function grupos_produtos_familia_campanha()
    {
        return $this->hasMany(GrupoProduto::class)
        ->select([
           // "id",
            //"produto_id",
            "descricao",
            "status",
            //"user_id",
           // "created_at",
           // "updated_at",
           // "deleted_at",
           // "campanha_id",
            //"produtos_campanha_id",
            "type",
        ])
        ->where('type','familia');
    }
    public function grupo()
    {
        return $this->hasMany(GrupoProduto::class);
    }

    public function getGruposAttribute()
    {
        return $this->hasMany(GrupoProduto::class,'produtos_campanha_id')->where('type','parceiros')->pluck('produto_id', 'produto_id');
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($model){
            $model->grupos()->delete();
        });
    }
}
