<?php

namespace Alunos\Households\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Household extends Model
{
    /**
     * @var array
     */
    public $fillable = [
        'name',
        'type',
        'address',
    ];

    /**
     * @return HasMany
     */
    public function activities(): HasMany
    {
        return $this->hasMany(HouseholdActivity::class);
    }

    /**
     * @return HasMany
     */
    public function announcements(): HasMany
    {
        return $this->hasMany(HouseholdAnnouncement::class);
    }

    /**
     * @return HasMany
     */
    public function members(): HasMany
    {
        return $this->hasMany(HouseholdMember::class);
    }

    /**
     * @return HasMany
     */
    public function rooms(): HasMany
    {
        return $this->hasMany(HouseholdRoom::class);
    }

    /**
     * @return HasMany
     */
    public function issues(): HasMany
    {
        return $this->hasMany(HouseholdIssue::class);
    }

    /**
     * @return HasMany
     */
    public function rules(): HasMany
    {
        return $this->hasMany(HouseholdRule::class);
    }
}
