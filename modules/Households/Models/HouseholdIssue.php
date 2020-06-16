<?php

namespace Alunos\Households\Models;

use Alunos\Users\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Znck\Eloquent\Relations\BelongsToThrough;
use Znck\Eloquent\Traits\BelongsToThrough as BelongsToThroughTrait;

class HouseholdIssue extends Model
{
    use BelongsToThroughTrait;

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
     * @return mixed
     */
    public function author(): BelongsToThrough
    {
        return $this->belongsToThrough(User::class, HouseholdMember::class);
    }
}
