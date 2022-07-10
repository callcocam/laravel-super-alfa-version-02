<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use SIGA\Models\AbstractModel;

class Cluster extends AbstractModel
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $appends = ["lojas"];

    
    public function loja(){
        return $this->belongsToMany(Loja::class);
    }
    
    public function getLojasAttribute()
    {
        return $this->loja()->pluck('nome', 'id');
    }
}
