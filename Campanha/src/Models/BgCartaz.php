<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Campanha\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use SIGA\Models\AbstractModel;

class BgCartaz extends AbstractModel
{
    use HasFactory;
    protected $table ="bg_cartaz";

    protected $guarded = ['id'];

    
    protected function slugTo()
    {
        return false;
    }
}