<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Campanha\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use SIGA\Models\AbstractModel;
use App\Models\Produto;

class FamiliaProduto extends AbstractModel
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $appends = ["produtos"];

     /**
     * Roles can belong to many produtos.
     *
     * @return BelongsToMany
     */
    public function produtos_familia(): BelongsToMany
    {
        return $this->belongsToMany(Produto::class)->orderBy('order')->withTimestamps();
    }
     /**
     * Roles can belong to many produtos.
     *
     * @return BelongsToMany
     */
    public function produtos(): BelongsToMany
    {
        return $this->belongsToMany(Produto::class)->orderBy('order')->withTimestamps();
    }
    /**
     * Roles can belong to many produtos.
     *
     */
    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function getProdutosAttribute()
    {
        return $this->produtos()->pluck('descricao_completa', 'id');
    }
}
