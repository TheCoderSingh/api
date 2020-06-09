<?php

namespace Alunos\Guardians\Models;

use Illuminate\Database\Eloquent\Model;

class Guardianship extends Model
{
    /**
     * @var array
     */
    public $fillable = [
        'relation_type',
    ];
}
