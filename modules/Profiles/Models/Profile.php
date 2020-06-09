<?php

namespace Alunos\Profiles\Models;

use Alunos\Foods\Models\Food;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Profile extends Model
{
    /**
     * @var array
     */
    public $fillable = [
        'biography',
        'allergies',
        'birthdate',
        'country_id',
        'language_id',
    ];

    /**
     * @return HasMany
     */
    public function socialLinks(): HasMany
    {
        return $this->hasMany(ProfileContact::class);
    }

    /**
     * @return HasMany
     */
    public function hobbies(): HasMany
    {
        return $this->hasMany(ProfileHobby::class);
    }

    /**
     * @return BelongsToMany
     */
    public function foods(): BelongsToMany
    {
        return $this
            ->belongsToMany(Food::class)
            ->using(ProfileFood::class)
            ->withPivot(['preference']);
    }

    /**
     * @return MorphTo
     */
    public function profilable(): MorphTo
    {
        return $this->morphTo();
    }
}
