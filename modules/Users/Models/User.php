<?php

namespace Alunos\Users\Models;

use Alunos\Admins\Models\Admin;
use Alunos\Profiles\Models\Profile;
use Alunos\Tenants\Models\Tenant;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
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
        'first_name',
        'last_name',
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

    /**
     * @return HasManyThrough
     */
    public function tenants(): HasManyThrough
    {
        return $this->hasManyThrough(Tenant::class, Admin::class);
    }

    /**
     * @return string
     */
    public function getDisplayName()
    {
        return $this->display_name ?? $this->first_name;
    }

    /**
     * Validate the password of the user for the Passport password grant.
     *
     * @param  string  $password
     * @return bool
     */
    public function validateForPassportPasswordGrant($password)
    {
        if (Hash::check($password, $this->password)) {
            return true;
        }

        return $password === $this->password;
    }
}
