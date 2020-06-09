<?php

namespace Alunos\Tenants\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tenant extends Model
{
    use SoftDeletes;

    /**
     * @return HasMany
     */
    public function domains()
    {
        return $this->hasMany(TenantDomain::class);
    }
}
