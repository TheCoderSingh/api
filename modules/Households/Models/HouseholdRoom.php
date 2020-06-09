<?php

namespace Alunos\Households\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HouseholdRoom extends Model
{
    /**
     * @var array
     */
    public $fillable = [
        'name',
    ];

    public function household(): BelongsTo
    {
        return $this->belongsTo(Household::class);
    }
}
