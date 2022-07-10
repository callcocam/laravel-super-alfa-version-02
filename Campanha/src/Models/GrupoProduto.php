<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Models;


use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use SIGA\Models\AbstractModel;


class GrupoProduto extends AbstractModel
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected function slugTo()
    {
        return false;
    }

    public function campanha()
    {
        return $this->belongsTo(Campanha::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function produtos_campanhas()
    {
        return $this->belongsTo(ProdutosCampanha::class);
    }

}
