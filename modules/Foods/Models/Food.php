<?php

namespace Alunos\Foods\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Food extends Model
{
    /**
     * @var array
     */
    public $fillable = [
        'biography',
        'allergies',
        'birthdate',
        'country',
        'religion',
    ];

    /**
     * @return HasMany
     */
    public function socialLinks(): HasMany
    {
        return $this->hasMany('ProfileContact');
    }

    /**
     * @return MorphTo
     */
    public function profilable(): MorphTo
    {
        return $this->morphTo();
    }
}
