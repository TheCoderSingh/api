<?php

namespace Alunos\Admins\Models;

use Alunos\Profiles\Models\Notification;
use Alunos\Users\Models\User;
use Illuminate\Database\Eloquent\Model;
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
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
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
}
