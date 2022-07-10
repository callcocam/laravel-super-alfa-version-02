<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use SIGA\Models\AbstractModel;
use SIGA\Models\Log;
use Campanha\Models\CardIndividual;

class Produto extends AbstractModel
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['familia_produtos'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
      //  'descricao_completa' => 'uppercase',
    ];


     /**
     * Interact with the descricao_completa.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function descricaoCompleta(): Attribute
    {
        return new Attribute(
            get: function ($value)  { return \Str::upper($value);},
            set: function ($value)  { return \Str::upper($value);},
        );
    }

    /**
     * Interact with the outras_especificacoes.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function outrasEspecificacoes(): Attribute
    {
        return new Attribute(
            get: function ($value)  { return \Str::upper($value);},
            set: function ($value)  { return \Str::upper($value);},
        );
    }

    /**
     * Interact with the categoria_produto.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function categoriaProduto(): Attribute
    {
        return new Attribute(
            get: function ($value)  { return \Str::upper($value);},
            set: function ($value)  { return \Str::upper($value);},
        );
    }

    /**
     * Interact with the sub_categoria.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function subCategoria(): Attribute
    {
        return new Attribute(
            get: function ($value)  { return \Str::upper($value);},
            set: function ($value)  { return \Str::upper($value);},
        );
    }

    // /**
    //  * Interact with the tipo_de_embalagem.
    //  *
    //  * @param  string  $value
    //  * @return \Illuminate\Database\Eloquent\Casts\Attribute
    //  */
    // protected function tipoDeEmbalagem(): Attribute
    // {
    //     return new Attribute(
    //         get: function ($value)  { return \Str::upper($value);},
    //         set: function ($value)  { return \Str::upper($value);},
    //     );
    // }

     /**
     * Interact with the marca.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function marca(): Attribute
    {
        return new Attribute(
            get: function ($value)  { return \Str::upper($value);},
            set: function ($value)  { return \Str::upper($value);},
        );
    }

     /**
     * Interact with the fragrancia_sabor.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function fragranciaSabor(): Attribute
    {
        return new Attribute(
            get: function ($value)  { return \Str::upper($value);},
            set: function ($value)  { return \Str::upper($value);},
        );
    }

     /**
     * Interact with the coperat_name.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function coperatName(): Attribute
    {
        return new Attribute(
            get: function ($value)  { return \Str::upper($value);},
            set: function ($value)  { return \Str::upper($value);},
        );
    }


     /**
     * Interact with the search.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function search(): Attribute
    {
        return new Attribute(
            get: function ($value)  { return \Str::upper($value);},
            set: function ($value)  { return \Str::upper($value);},
        );
    }

     /**
     * Interact with the segmento.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function segmento(): Attribute
    {
        return new Attribute(
            get: function ($value)  { return \Str::upper($value);},
            set: function ($value)  { return \Str::upper($value);},
        );
    }

    /**
     * Interact with the modelo.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function modelo(): Attribute
    {
        return new Attribute(
            get: function ($value)  { return \Str::upper($value);},
            set: function ($value)  { return \Str::upper($value);},
        );
    }

    /**
     * Interact with the cor.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function cor(): Attribute
    {
        return new Attribute(
            get: function ($value)  { return \Str::upper($value);},
            set: function ($value)  { return \Str::upper($value);},
        );
    }

    /**
     * Interact with the sabor.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function sabor(): Attribute
    {
        return new Attribute(
            get: function ($value)  { return \Str::upper($value);},
            set: function ($value)  { return \Str::upper($value);},
        );
    }

    /**
     * Interact with the tipo_de_frete.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function tipoDeFrete(): Attribute
    {
        return new Attribute(
            get: function ($value)  { return \Str::upper($value);},
            set: function ($value)  { return \Str::upper($value);},
        );
    }
     /**
     * Interact with the subsegmento.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function subsegmento(): Attribute
    {
        return new Attribute(
            get: function ($value)  { return \Str::upper($value);},
            set: function ($value)  { return \Str::upper($value);},
        );
    }

     /**
     * Interact with the volume_de_embalagem.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function volumeDeEmbalagem(): Attribute
    {
        return new Attribute(
            get: function ($value)  { return \Str::upper($value);},
            set: function ($value)  { return \Str::upper($value);},
        );
    }

     /**
     * Interact with the mva_ajustado.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function mvaAjustado(): Attribute
    {
        return new Attribute(
            get: function ($value)  { return \Str::upper($value);},
            set: function ($value)  { return \Str::upper($value);},
        );
    }

     /**
     * Interact with the mva_interno.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function mvaInterno(): Attribute
    {
        return new Attribute(
            get: function ($value)  { return \Str::upper($value);},
            set: function ($value)  { return \Str::upper($value);},
        );
    }

    protected function slugFrom()
    {
        return 'descricao_completa';
    }
    // descricao_completa

    public function ajustado()
    {

        return $this->belongsTo(Produto::class, 'update_id');
    }

    public function getLojasAttribute()
    {
        return $this->loja()->pluck('nome', 'id');
    }

    public function _lojas()
    {
        return $this->loja()->pluck('nome', 'id')->toArray();
    }
    public function loja()
    {

        return $this->belongsToMany(Loja::class);
    }

    public function familia_produtos()
    {

        return $this->belongsToMany(\Campanha\Models\FamiliaProduto::class);
    }

    public function grupo_produtos()
    {

        return $this->hasMany(\Campanha\Models\GrupoProduto::class);
    }

    public function embalagem()
    {

        return $this->hasOne(Embalagem::class, 'produto_id');
    }


    public function logs()
    {
        return $this->morphMany(Log::class, "logable");
    }

    public function coperat()
    {

        return $this->belongsTo(Coperat::class);
    }


    public function compra()
    {

        return $this->hasOne(Compra::class, 'produto_id');
    }

    public function marketing()
    {

        return $this->hasOne(Marketing::class, 'produto_id');
    }

    public function unidade_medida_name()
    {
        return $this->belongsTo(Medida::class, 'unidade_medida');
    }

    public function segmento_name()
    {
        return $this->belongsTo(TipoEmbalagem::class, 'tipo_de_embalagem');
    }

    public function subsegmento_name()
    {
        return $this->belongsTo(VolumeEmbalagem::class, 'volume_de_embalagem');
    }


    public function contaNivel01Name(){
        return $this->marketing->contaNivel01Name;
    }

    public function contaNivel02Name(){
        return $this->marketing->contaNivel01->name;
    }

    public function contaNivel03Name(){
        return $this->marketing->contaNivel04->name;
    }

    public function contaNivel04Name(){
        return $this->marketing->contaNivel04->name;
    }

    
    public function nivel($id){
        return Bc::find($id);
    }

    public function image()    {

        return $this->hasOne(Arquivo::class, 'produto_id');
    }

    public function card_individual()    {

        return $this->hasOne(CardIndividual::class, 'produto_id');
    }
}
