<?php

namespace Alunos\Admins\Models;

use Alunos\Profiles\Models\Notification;
use Alunos\Tenants\Models\Tenant;
use Alunos\Users\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Admin extends Model
{
    /**
     * @var array
     */
    public $fillable = [
        'role',
        'user_id',
        'tenant_id',
    ];

    /**
     * @return HasMany
     */
    public function socialLinks(): HasMany
    {
        return $this->hasMany('ProfileContact');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    /**
     * @return MorphTo
     */
    public function profilable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @return MorphMany
     */
    public function notifications(): MorphMany
    {
        return $this->morphMany(Notification::class, 'notifiable');
    }

    // @TODO Apply tenant global scope
}
