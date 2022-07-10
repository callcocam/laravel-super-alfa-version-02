<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Acl\Models;


use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use SIGA\Acl\Concerns\RefreshesPermissionCache;
use SIGA\Acl\Contracts\Permission;
use SIGA\Models\AbstractModel;

class AbstractPermission extends AbstractModel implements Permission
{
    use RefreshesPermissionCache;

    /**
     * The attributes that are fillable via mass assignment.
     *
     * @var array
     */
  //  protected $fillable = ['name', 'name', 'slug', 'group_id', 'description'];

    /**
     * Create a new Permission instance.
     *
     * @param array $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('acl.tables.permissions'));
    }

    public function isUser()
    {
        return false;
    }

    /**
     * Permissions can belong to many roles.
     *
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(config('acl.models.role'))->withTimestamps();
    }
}
