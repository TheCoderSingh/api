<?php

namespace Alunos\Households\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HouseholdAnnouncement extends Model
{
    /**
     * @var array
     */
    public $fillable = [
        'content',
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
