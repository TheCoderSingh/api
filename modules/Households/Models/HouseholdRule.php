<?php

namespace Alunos\Households\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HouseholdRule extends Model
{
    /**
     * @var array
     */
    public $fillable = [
        'description',
    ];

    public function household(): BelongsTo
    {
        return $this->belongsTo(Household::class);
    }
}
