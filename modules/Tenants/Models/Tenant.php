<?php

namespace Alunos\Tenants\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Multitenancy\Models\Tenant as Tenancy;

class Tenant extends Tenancy
{
    use SoftDeletes;

    public $fillable = [
        'name',
        'domain',
    ];

    /**
     * @return HasMany
     */
    public function domains()
    {
        return $this->hasMany(TenantDomain::class);
    }
}
