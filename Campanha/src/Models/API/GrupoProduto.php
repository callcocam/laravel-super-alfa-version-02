<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Models\API;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use SIGA\Models\AbstractModel;


class GrupoProduto extends AbstractModel
{
    use HasFactory;

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
        return $this->belongsTo(Produto::class)->select([
            "id",
            "cod_barras",
        ]);
    }

    public function produtos_campanhas()
    {
        return $this->belongsTo(ProdutosCampanha::class);
    }

}
