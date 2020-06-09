<?php

namespace Alunos\Profiles\Models;

use Alunos\Foods\Models\Food;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfileFood extends Model
{
    /**
     * @var array
     */
    public $fillable = [
        'profile_id',
        'food_id',
        'preference',
    ];

    /**
     * @return BelongsTo
     */
    public function profile(): BelongsTo
    {
        return $this->belongsTo(Notification::class);
    }

    /**
     * @return BelongsTo
     */
    public function food(): BelongsTo
    {
        return $this->belongsTo(Food::class);
    }
}
