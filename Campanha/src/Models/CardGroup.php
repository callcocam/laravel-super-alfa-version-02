<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Models;


use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use SIGA\Models\AbstractModel;


class CardGroup extends AbstractModel
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected function slugTo()
    {
        return false;
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
    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
