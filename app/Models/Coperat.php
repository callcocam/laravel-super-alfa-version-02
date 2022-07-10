<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use Campanha\Models\ProdutosCampanha;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use SIGA\Models\AbstractModel;

class Coperat extends AbstractModel
{
    use HasFactory;

    protected $guarded = ['id'];

    public function produtos(){
        return $this->hasMany(Produto::class);
    }

    public function produtos_campanha(){
        return $this->hasMany(ProdutosCampanha::class)->orderBy('order');
    }


}
