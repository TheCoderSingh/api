<?php

namespace Alunos\Households\Models;

use Alunos\Profiles\Models\Notification;
use Alunos\Users\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class HouseholdMember extends Model
{
    /**
     * @var array
     */
    public $fillable = [
        'household_id',
        'is_permanent',
        'is_admin',
        'user_id',
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

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return MorphMany
     */
    public function notifications(): MorphMany
    {
        return $this->morphMany(Notification::class, 'notifiable');
    }
}
