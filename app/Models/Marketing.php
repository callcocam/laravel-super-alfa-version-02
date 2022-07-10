<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use SIGA\Models\AbstractModel;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Marketing extends AbstractModel
{
    use HasFactory;

    protected $guarded = ['id'];

     
     /**
     * Interact with the descricao_para_encarte.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function descricaoParaEncarte(): Attribute
    {
        return new Attribute(
            get: function ($value)  { return \Str::upper($value);},
            set: function ($value)  { return \Str::upper($value);},
        );
    }

     /**
     * Interact with the descricao_para_erp.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function descricaoParaErp(): Attribute
    {
        return new Attribute(
            get: function ($value)  { return \Str::upper($value);},
            set: function ($value)  { return \Str::upper($value);},
        );
    }

     /**
     * Interact with the descricao_comercial.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function descricaoComercial(): Attribute
    {
        return new Attribute(
            get: function ($value)  { return \Str::upper($value);},
            set: function ($value)  { return \Str::upper($value);},
        );
    }

     /**
     * Interact with the codigo_do_produto_a_ser_substituído.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function codigoDoProdutoASersubstituído(): Attribute
    {
        return new Attribute(
            get: function ($value)  { return \Str::upper($value);},
            set: function ($value)  { return \Str::upper($value);},
        );
    }
    protected function slugTo()
    {
        return false;
    }

    public function produto(){
        return $this->belongsTo(Produto::class);
    }

    public function contaNivel01(){
        return $this->belongsTo(Bc::class,'conta_nivel01')->where('nivel','1');
    }

    public function contaNivel02(){
        return $this->belongsTo(Bc::class,'conta_nivel02')->where('nivel','2');
    }

    public function contaNivel03(){
        return $this->belongsTo(Bc::class,'conta_nivel03')->where('nivel','3');
    }

    public function contaNivel04(){
        return $this->belongsTo(Bc::class,'conta_nivel04')->where('nivel','4');
    }

    public function contaNivel01Name(){
        return $this->belongsTo(Bc::class,'conta_nivel01')->where('nivel','1');
    }

    public function contaNivel02Name(){
        return $this->belongsTo(Bc::class,'conta_nivel02')->where('nivel','2');
    }

    public function contaNivel03Name(){
        return $this->belongsTo(Bc::class,'conta_nivel03')->where('nivel','3');
    }

    public function contaNivel04Name(){
        return $this->belongsTo(Bc::class,'conta_nivel04')->where('nivel','4');
    }
}
