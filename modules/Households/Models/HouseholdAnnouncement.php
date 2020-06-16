<?php

namespace Alunos\Households\Models;

use Alunos\Users\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Znck\Eloquent\Relations\BelongsToThrough;
use Znck\Eloquent\Traits\BelongsToThrough as BelongsToThroughTrait;

class HouseholdAnnouncement extends Model
{
    use BelongsToThroughTrait;

    /**
     * @var array
     */
    public $fillable = [
        'content',
        'household_id',
        'household_member_id',
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
    public function householdMember(): BelongsTo
    {
        return $this->belongsTo(HouseholdMember::class);
    }

    /**
     * @return mixed
     */
    public function author(): BelongsToThrough
    {
        return $this->belongsToThrough(User::class, HouseholdMember::class);
    }
}
