<?php

namespace Alunos\Users\Models;

use Alunos\Profiles\Models\Profile;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
    ];

    /**
     * @return BelongsToMany
     */
    public function guardians(): BelongsToMany
    {
        return $this
            ->belongsToMany(User::class, 'user_id', 'guardian_id')
            ->withPivot('relation_type');
    }

    /**
     * @return BelongsToMany
     */
    public function children(): BelongsToMany
    {
        return $this
            ->belongsToMany(User::class, 'guardian_id', 'user_id')
            ->withPivot('relation_type');
    }

    /**
     * @return HasOne
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }
}
