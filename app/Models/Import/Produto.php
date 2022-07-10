<?php

namespace App\Models\Import;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Import\Coperat;

class Produto extends Model
{
    use HasFactory;
    
    public $incrementing = false;

    protected $keyType = "string";
    protected $guarded = ['id'];
    protected $table = 'produtos';

     protected $with = ['compras','marketings'];
    // protected $fillable = [
    //     'id',
    //     'slug',
    //     'descricao_completa',
    //     'cod_barras',
    //     'cod_prod_fornecedor',
    //     'coperat_name',
    //     'user_id',
    //     'status',
    // ];

    public function coperats()
    {

        return $this->hasOne(Coperat::class);
    }
    
    public function compras()
    {
        return $this->hasOne(Compra::class, 'produto_id');
    }

    public function marketings()
    {

        return $this->hasOne(Marketing::class, 'produto_id');
    }

}
