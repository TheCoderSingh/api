<?php

namespace Alunos\Households\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HouseholdIssue extends Model
{
    /**
     * @var array
     */
    public $fillable = [
        'description',
        'household_member_id',
        'solved_at',
    ];

    /**
     * @var array
     */
    public $dates = [
        'solved_at',
    ];

    /**
     * @return BelongsTo
     */
    public function household(): BelongsTo
    {
        return $this->belongsTo(Household::class);
    }

    /**
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(HouseholdMember::class);
    }
}
