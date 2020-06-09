<?php

namespace Alunos\Geographics\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Country extends Model
{
    /**
     * @var array
     */
    public $fillable = [
        'name',
        'code',
        'numeric_code',
        'language_id',
    ];

    /**
     * @return BelongsTo
     */
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}
