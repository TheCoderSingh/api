<?php

namespace Alunos\Tips\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tip extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    public $fillable = [
        'content',
        'target',
    ];
}
