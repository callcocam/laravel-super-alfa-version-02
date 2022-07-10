<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models\Import;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SIGA\Models\AbstractModel;

class Compra extends Model
{
    use HasFactory;
    protected $table = 'compras';

    protected $guarded = ['id'];
    protected $fillable = [
        'id',
        'produto_id',
        'user_id',
        'codigo_interno',
        'status',
    ];

}
