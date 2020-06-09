<?php

namespace Alunos\Profiles\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfileHobby extends Model
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
    public function profile(): BelongsTo
    {
        return $this->belongsTo(Notification::class);
    }
}
