<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use SIGA\Models\AbstractModel;

class Compra extends AbstractModel
{
    use HasFactory;

    protected $guarded = ['id'];

    protected function slugTo()
    {
        return false;
    }

    public function produto(){
        return $this->belongsTo(Produto::class);
    }
}
