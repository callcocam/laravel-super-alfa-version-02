<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use SIGA\Models\AbstractModel;

class Loja extends AbstractModel
{
    use HasFactory;

    protected $guarded = ['id'];

    public function campanhas()
    {
        return $this->belongsToMany(\Campanha\Models\Campanha::class);
    }
}
