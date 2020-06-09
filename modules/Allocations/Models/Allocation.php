<?php

namespace Alunos\Allocations\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    /**
     * @var array
     */
    public $fillable = [
        'tenant_id',
        'household_id',
    ];
}
