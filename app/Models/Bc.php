<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use SIGA\Models\AbstractModel;

class Bc extends AbstractModel
{
    use HasFactory;

    protected $guarded = ['id'];

    public function bc01(){
        return $this->hasMany(Bc::class, 'bc_id');
    }

    public function bc02(){
        return $this->hasMany(Bc::class, 'bc_id');
    }

    public function bc03(){
        return $this->hasMany(Bc::class, 'bc_id');
    }

    public function bc04(){
        return $this->hasMany(Bc::class, 'bc_id');
    }
}
