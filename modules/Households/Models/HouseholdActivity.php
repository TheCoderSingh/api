<?php

namespace Alunos\Households\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class HouseholdActivity extends Model
{
    /**
     * @var array
     */
    public $fillable = [
        'description',
    ];

    /**
     * @return BelongsTo
     */
    public function household(): BelongsTo
    {
        return $this->belongsTo(Household::class);
    }

    /**
     * @return MorphTo
     */
    public function trigger(): MorphTo
    {
        $this->morphTo();
    }
}
