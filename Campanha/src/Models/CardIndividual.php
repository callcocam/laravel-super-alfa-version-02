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
use App\Models\Loja;
use App\Models\Selo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use SIGA\Models\AbstractModel;

class CardIndividual extends AbstractModel
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $appends = ["grupos","lojas"];
    protected $with = ['familia','parceiros'];


    protected function slugFrom()
    {
        return "descricao_auxiliar";
    }
    

    public function getLojasAttribute()
    {
        return $this->loja()->pluck('nome', 'id');
    }
    
    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function grupo()
    {
        return $this->hasMany(CardGroup::class);
    }

    public function produtos_familia()
    {
        return $this->hasMany(CardGroup::class)->where('type','familia');
    }

    public function produtos_parceiros()
    {
        return $this->hasMany(CardGroup::class)->where('type','parceiros');
    }


    public function familia()
    {
        return $this->hasMany(CardGroup::class)->where('type','familia');
    }

    public function parceiros()
    {
        return $this->hasMany(CardGroup::class)->where('type','parceiros');
    }

    public function getGruposAttribute()
    {
        return $this->produtos_parceiros()->pluck('produto_id','produto_id')->toArray();
    }
    public function selolink()    {

        return $this->belongsTo(Selo::class, 'selo_id');
    }
    public function coperat()
    {
        return $this->belongsTo(Coperat::class);
    }

    
    public function selos()    {

        return $this->belongsToMany(Selo::class);
    }

    
    public function getSeloAttribute()    {

        return $this->belongsToMany(Selo::class)->pluck('id','id');
    }
    
    
    public function loja(){
        return $this->belongsToMany(Loja::class);
    }
}
